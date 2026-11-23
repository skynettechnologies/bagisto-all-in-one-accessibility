<?php

namespace SkynetTechnologies\AllinOneAccessibility\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use SkynetTechnologies\AllinOneAccessibility\Services\SkynetWidget;

class AllinOneAccessibilityController extends Controller
{
    /**
     * Folder under public/ that holds the published assets.
     */
    public const ASSET_DIR = 'vendor/allinoneaccessibility';

    /**
     * Stylesheets in cascade order.
     */
    protected const STYLES = [
        'tokens.css',     // colors and sizes, light + dark theme (follows the Bagisto admin dark mode)
        'base.css',       // reset, typography, page layout, header (scoped to .aioa-app)
        'components.css', // buttons, cards, fields, toasts, loader
        'banners.css',    // plan notices (free / paid) and the site line
        'settings.css',   // color, widget size, position, icon type / size, save bar
        'tabs.css',       // tabs and the free plan lock overlay
        'paid.css',       // Paid Features tab: links, switches, mobile position
        'score.css',      // Accessibility Score tab
        'responsive.css', // phone overrides
        'bagisto.css',    // fits the page into the Bagisto admin layout
    ];

    /**
     * Scripts in dependency order. They are loaded one after another once the
     * Bagisto admin Vue app has mounted the page (see views/admin/index.blade.php).
     */
    protected const SCRIPTS = [
        'core.js',          // namespace, config, state, helpers, API calls
        'ui.js',            // toasts, busy buttons, view switching
        'tabs.js',          // Appearance Design / Paid Features / Accessibility Score tabs
        'plan.js',          // free / paid notices, site line, tabs for the plan
        'paid-features.js', // Paid Features tab: links, switches, widget position for mobile
        'score.js',         // Accessibility Score tab (scan results)
        'settings-form.js', // read and fill the settings form, color picker
        'save.js',          // "Save Changes"
        'dashboard.js',     // paid plan "Dashboard" button (sign-in link from check-website)
        'app.js',           // loads the website (registers it once when new) and starts the page
    ];

    /**
     * Create a new controller instance.
     */
    public function __construct(protected SkynetWidget $widget) {}

    /**
     * Settings page.
     */
    public function index(): View
    {
        $admin = auth()->guard('admin')->user();

        return view('allinoneaccessibility::admin.index', [
            'aioa' => config('allinoneaccessibility'),
            'iconBase' => asset(self::ASSET_DIR.'/images/icons').'/',
            'styles' => array_map(fn ($file) => $this->assetUrl('css/'.$file), self::STYLES),
            'scripts' => array_map(fn ($file) => $this->assetUrl('js/'.$file), self::SCRIPTS),
            'assetsPublished' => is_file(public_path(self::ASSET_DIR.'/js/core.js')),
            'boot' => [
                'domain' => $this->websiteDomain(),
                'name' => (string) ($admin->name ?? ''),
                'email' => (string) ($admin->email ?? ''),
                'iconBase' => asset(self::ASSET_DIR.'/images/icons').'/',
                'defaultColor' => config('allinoneaccessibility.default_color'),
                'routeUrl' => route('admin.allinoneaccessibility.route'),
                'csrfToken' => csrf_token(),
                'apiUpdateUrl' => config('allinoneaccessibility.api_base').'widget-setting-update-platform',
                'geoApiUrl' => config('allinoneaccessibility.geo_api'),
            ],
        ]);
    }

    /**
     * AJAX router of the settings page (POST ?action=<name>, JSON answers), limited to this
     * store's own website domain; the page never sends another one.
     */
    public function route(Request $request): JsonResponse
    {
        $fields = [];

        foreach (['url', 'username', 'email', 'no_required_eu'] as $key) {
            $value = $request->input($key);
            $fields[$key] = is_scalar($value) ? (string) $value : '';
        }

        $action = (string) $request->query('action', '');

        if (! in_array($action, ['fetchWidgetSettings', 'registerDomain', 'getDashboardLink', 'fetchScanDetails'], true)) {
            return response()->json(['error' => 'Unknown action.']);
        }

        if (SkynetWidget::normalizeDomain($fields['url']) !== $this->websiteDomain()) {
            return response()->json(['error' => 'This website domain does not belong to this store.']);
        }

        $result = match ($action) {
            'fetchWidgetSettings' => $this->widget->fetchWidgetSettings($fields),
            'registerDomain' => $this->widget->registerDomain($fields),
            'getDashboardLink' => $this->widget->getDashboardLink($fields),
            'fetchScanDetails' => $this->widget->getScanDetails($fields),
        };

        return response()->json($result);
    }

    /**
     * Normalized website domain whose settings are managed: AIOA_WEBSITE_DOMAIN, otherwise the
     * default channel's hostname, APP_URL or the admin page's own host.
     */
    protected function websiteDomain(): string
    {
        $candidates = [
            config('allinoneaccessibility.website'),
            rescue(fn () => core()->getDefaultChannel()?->hostname, null, false),
            config('app.url'),
            request()->getHost(),
        ];

        foreach ($candidates as $candidate) {
            $domain = SkynetWidget::normalizeDomain((string) $candidate);

            if ($domain !== '') {
                return $domain;
            }
        }

        return '';
    }

    /**
     * Public URL of a published asset with a version stamp (file modified time), so
     * browsers load the latest CSS / JS after an update.
     */
    protected function assetUrl(string $path): string
    {
        $file = public_path(self::ASSET_DIR.'/'.$path);

        return asset(self::ASSET_DIR.'/'.$path).'?v='.(is_file($file) ? filemtime($file) : 1);
    }
}
