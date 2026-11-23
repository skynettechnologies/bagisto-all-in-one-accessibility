<?php

namespace SkynetTechnologies\AllinOneAccessibility\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class SkynetWidget
{
    /**
     * Widget position for mobile fields, which widget-settings leaves out (see withMobileFields()).
     */
    private const MOBILE_FIELDS = [
        'is_mobile_position',
        'is_widget_custom_position_mobile',
        'widget_position_mobile',
        'widget_position_top_mobile',
        'widget_position_bottom_mobile',
        'widget_position_left_mobile',
        'widget_position_right_mobile',
        'widget_position_vertical_center_offset_mobile',
        'widget_position_horizontal_center_offset_mobile',
    ];

    /**
     * Normalize input such as "https://www.Example.com/shop" to "www.example.com".
     */
    public static function normalizeDomain(?string $value): string
    {
        $value = strtolower(trim((string) $value));
        $value = preg_replace('#^[a-z][a-z0-9+.-]*://#', '', $value);
        $value = preg_replace('#[/?\#].*$#', '', $value);
        $value = preg_replace('#:\d+$#', '', $value);

        return trim($value, '.');
    }

    /**
     * True for a domain name such as "example.com" or for "localhost"; IP addresses are rejected,
     * because Skynet keeps one registration per host.
     */
    public static function isValidDomain(string $domain): bool
    {
        return (bool) preg_match('/^(?:localhost|(?=.{3,253}$)(?:[a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?\.)+[a-z]{2,63})$/D', $domain);
    }

    /**
     * Settings of a domain, or ['not_registered' => true] for a new one; never registers anything.
     *
     * @param  array  $req  ['url' => domain]
     */
    public function fetchWidgetSettings(array $req): array
    {
        $url = self::normalizeDomain($req['url'] ?? '');

        if (! self::isValidDomain($url)) {
            return ['error' => 'A valid domain is required, for example example.com or localhost.'];
        }

        $data = $this->getSettingsData($url);

        if ($data === false) {
            return ['error' => 'Unable to load widget settings. Please try again.'];
        }

        if ($data === null) {
            return ['not_registered' => true];
        }

        return $data;
    }

    /**
     * Register the free widget for a new domain once, then wait for its settings. A domain that is
     * registered by then is only loaded, and nothing is registered when the API cannot be reached.
     *
     * @param  array  $req  ['url' => domain, 'username' => admin name, 'email' => admin email, 'no_required_eu' => '0' EU | '1' not EU]
     */
    public function registerDomain(array $req): array
    {
        $url = self::normalizeDomain($req['url'] ?? '');

        if (! self::isValidDomain($url)) {
            return ['error' => 'A valid domain is required, for example example.com or localhost.'];
        }

        $data = $this->getSettingsData($url);

        if ($data === false) {
            return ['error' => 'Unable to load widget settings. Please try again.'];
        }

        if ($data === null) {
            $this->register($url, $req['username'] ?? '', $req['email'] ?? '', ($req['no_required_eu'] ?? '') === '0' ? '0' : '1');

            $data = $this->waitForSettings($url);
        }

        if ($data === null) {
            return [
                'error' => 'Your website was registered, but its settings are not ready yet. Please try again in a moment.',
                'pending' => true,
            ];
        }

        return $data;
    }

    /**
     * Dashboard sign-in link of a paid plan ("manage_domain" from check-website); the api_key and
     * the rest of the answer are never passed on.
     *
     * @param  array  $req  ['url' => domain]
     */
    public function getDashboardLink(array $req): array
    {
        $url = self::normalizeDomain($req['url'] ?? '');

        if (! self::isValidDomain($url)) {
            return ['error' => 'A valid domain is required, for example example.com or localhost.'];
        }

        $res = $this->post(config('allinoneaccessibility.check_website_api'), ['domain' => $url]);

        if ($res === null) {
            return ['error' => 'Unable to load the dashboard link right now.'];
        }

        $link = (string) ($res['manage_domain'] ?? '');

        if (! preg_match('#^https://#i', $link)) {
            return ['error' => 'No dashboard link was found for '.$url.'.'];
        }

        return ['link' => $link];
    }

    /**
     * Accessibility Score card values of a domain, or ['no_scan' => true] while it was never scanned
     * or a scan is still running (scanner status 201).
     *
     * @param  array  $req  ['url' => domain]
     */
    public function getScanDetails(array $req): array
    {
        $url = self::normalizeDomain($req['url'] ?? '');

        if (! self::isValidDomain($url)) {
            return ['error' => 'Enter a valid domain, for example example.com or localhost'];
        }

        $res = $this->post(config('allinoneaccessibility.scan_api'), [
            'lang_code' => config('allinoneaccessibility.scan_lang'),
            'website' => base64_encode($url),
        ]);

        if ($res === null) {
            return ['error' => 'Unable to load the accessibility score right now. Please try again.'];
        }

        $data = $res['Data'] ?? null;
        $inProgress = (int) ($res['status'] ?? 0) === 201;

        if (
            $inProgress
            || empty($data)
            || ! is_array($data)
        ) {
            return ['no_scan' => true, 'in_progress' => $inProgress, 'message' => (string) ($res['msg'] ?? '')];
        }

        $site = $this->post(config('allinoneaccessibility.check_website_api'), ['domain' => $url]);

        return $this->scoreSummary($data, $site['alt_count'] ?? null);
    }

    /**
     * Register the free widget (add-user-domain) with the admin's name and email, or with the
     * website and no-reply@<website without www.> when they are missing or invalid.
     */
    private function register(string $url, string $name, string $email, string $noRequiredEu): ?array
    {
        $name = trim($name);
        $email = trim($email);

        return $this->apiPost('add-user-domain', [
            'name' => $name !== '' ? $name : $url,
            'email' => filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : 'no-reply@'.preg_replace('/^www\./', '', $url),
            'company_name' => '',
            'website' => base64_encode($url),
            'package_type' => 'free-widget',
            'start_date' => Carbon::now('UTC')->format('Y-m-d\TH:i:sO'),
            'end_date' => '',
            'price' => '',
            'discount_price' => '0',
            'platform' => config('allinoneaccessibility.platform'),
            'api_key' => '',
            'is_trial_period' => '',
            'is_free_widget' => '1',
            'no_required_eu' => $noRequiredEu,
            'bill_address' => '',
            'country' => '',
            'state' => '',
            'city' => '',
            'post_code' => '',
            'transaction_id' => '',
            'subscr_id' => '',
            'payment_source' => '',
        ]);
    }

    /**
     * Settings of a registered domain, null when it is not registered, or false when the
     * API could not be reached or did not answer with JSON.
     *
     * @return array|false|null
     */
    private function getSettingsData(string $url)
    {
        $res = $this->apiPost('widget-settings', ['website_url' => $url]);

        if ($res === null) {
            return false;
        }

        if (
            empty($res['Data'])
            || ! is_array($res['Data'])
        ) {
            return null;
        }

        return $this->withMobileFields($url, $res['Data']);
    }

    /**
     * Add the widget position for mobile of a paid plan from the widget's own settings endpoint;
     * fields widget-settings already sent win, and a failed call keeps the settings as they are.
     */
    private function withMobileFields(string $url, array $data): array
    {
        if ((int) ($data['is_free_widget'] ?? 0) === 1) {
            return $data;
        }

        $res = $this->post(config('allinoneaccessibility.widget_settings_api'), ['website_url' => $url]);
        $widget = $res['Data'] ?? null;

        if (! is_array($widget)) {
            return $data;
        }

        foreach (self::MOBILE_FIELDS as $field) {
            if (
                ! array_key_exists($field, $data)
                && array_key_exists($field, $widget)
            ) {
                $data[$field] = $widget[$field];
            }
        }

        return $data;
    }

    /**
     * Poll for the settings of a domain that was just registered, one second apart.
     */
    private function waitForSettings(string $url, int $attempts = 3): ?array
    {
        for ($i = 0; $i < $attempts; $i++) {
            sleep(1);

            $data = $this->getSettingsData($url);

            if (is_array($data)) {
                return $data;
            }
        }

        return null;
    }

    /**
     * Score card values from the scanner's "Data": score 0 - 99 with its level, violations from the
     * summary (or the checks), alt text from check-website, and pages scanned.
     */
    private function scoreSummary(array $data, $altCount): array
    {
        $score = max(0, min(99, (int) round((float) ($data['success_percentage'] ?? 0))));

        $level = $this->scoreLevel($score);

        [$fixed, $total] = $this->violations($data);

        $reportUrl = (string) ($data['pdf_report_url'] ?? '');

        return [
            'domain' => (string) ($data['domain'] ?? ''),
            'score' => $score,
            'level' => $level[1],
            'status' => $level[2],
            'violations' => $this->ratio($fixed, $total),
            'alt_text' => $this->altText($altCount),
            'pages' => [
                'scanned' => (int) ($data['total_scan_pages'] ?? 0),
                'total' => (int) ($data['total_selected_pages'] ?? $data['total_pages'] ?? 0),
            ],
            'last_scan' => (string) ($data['last_scan'] ?? ''),
            'report_url' => preg_match('#^https://#i', $reportUrl) ? $reportUrl : '',
        ];
    }

    /**
     * First score level (minimum, level, label) whose minimum the score reaches.
     */
    private function scoreLevel(int $score): array
    {
        $levels = config('allinoneaccessibility.score_levels');

        foreach ($levels as $level) {
            if ($score >= $level[0]) {
                return $level;
            }
        }

        return $levels[count($levels) - 1];
    }

    /**
     * Fixed and total violations: the scanner's summary when it sends one, otherwise the sum of every
     * check (the API spells the keys "acessibility_voilation" and "voilation_remediated").
     */
    private function violations(array $data): array
    {
        if (isset($data['summary']['total_violations'], $data['summary']['total_fixed'])) {
            return [(int) $data['summary']['total_fixed'], (int) $data['summary']['total_violations']];
        }

        $groups = $data['acessibility_voilation'] ?? [];

        $fixed = 0;
        $total = 0;

        foreach (array_merge($groups['voilation_remediated'] ?? [], $groups['require_manual_action'] ?? []) as $check) {
            $fixed += (int) ($check['total_fixed'] ?? 0);
            $total += (int) ($check['total_fixed'] ?? 0) + (int) ($check['total_error'] ?? 0);
        }

        return [$fixed, $total];
    }

    /**
     * Alt Text Remediated from check-website's alt_count: only images with a missing alt tag still
     * need work, and no alt_count gives 0 / 0.
     */
    private function altText($altCount): array
    {
        $count = is_array($altCount) ? $altCount : [];

        $images = fn (string $key): int => max(0, (int) ($count[$key] ?? 0));

        $fixed = $images('total_decorative_images') + $images('total_update_alt_text') + $images('total_other_images');

        return $this->ratio($fixed, $fixed + $images('total_missing_alt_tag'));
    }

    /**
     * Fixed, total and percentage, for example ['fixed' => 38, 'total' => 44, 'percentage' => 86.36].
     */
    private function ratio(int $fixed, int $total): array
    {
        return [
            'fixed' => $fixed,
            'total' => $total,
            'percentage' => $total > 0 ? round($fixed / $total * 100, 2) : 0,
        ];
    }

    /**
     * POST form fields to a Skynet API endpoint relative to api_base.
     */
    private function apiPost(string $endpoint, array $fields): ?array
    {
        return $this->post(config('allinoneaccessibility.api_base').$endpoint, $fields);
    }

    /**
     * POST form fields with the User-Agent the API firewall requires (HTTP 406 without one) and TLS
     * verification on; the decoded JSON, also of a 4xx answer, or null on a network or JSON error.
     */
    private function post(string $url, array $fields): ?array
    {
        try {
            $response = Http::asForm()
                ->acceptJson()
                ->withUserAgent(config('allinoneaccessibility.user_agent'))
                ->timeout((int) config('allinoneaccessibility.http_timeout'))
                ->withOptions(['allow_redirects' => false])
                ->post($url, $fields);
        } catch (\Throwable $e) {
            return null;
        }

        $decoded = $response->json();

        return is_array($decoded) ? $decoded : null;
    }
}
