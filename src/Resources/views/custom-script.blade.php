<!-- packages/SkynetTechnologies/AllinOneAccessibility/resources/views/custom-script.blade.php -->

<!-- @if($parameters == null)
<script id="aioa-adawidget" src="https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?colorcode=&token=&position="></script>
@else
<script id="aioa-adawidget" src="https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?colorcode={{ $parameters->color_code }}&token={{ $parameters->license_key }}&position={{ $parameters->icon_position }}.{{ $parameters->icon_type }}.{{ $parameters->icon_size }}"></script>
@endif
-->

<!-- packages/SkynetTechnologies/AllinOneAccessibility/resources/views/custom-script.blade.php -->

@php
    /**
     * Detect EU using ipapi (server-side)
     * Note: This detects based on server-seen IP.
     */

    $isEU = false;

    try {
        $response = @file_get_contents('https://ipapi.co/json/');
        if ($response !== false) {
            $data = json_decode($response, true);
            $isEU = isset($data['in_eu']) && $data['in_eu'] === true;
        }
    } catch (\Exception $e) {
        $isEU = false;
    }

    $baseUrl = $isEU
        ? 'https://eu.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js'
        : 'https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js';
@endphp

@if ($parameters == null)
    <script
        id="aioa-adawidget"
        src="{{ $baseUrl }}?colorcode=&token=&position="
        defer>
    </script>
@else
    <script
        id="aioa-adawidget"
        src="{{ $baseUrl }}
            ?colorcode={{ urlencode($parameters->color_code) }}
            &token={{ urlencode($parameters->license_key) }}
            &position={{ urlencode($parameters->icon_position . '.' . $parameters->icon_type . '.' . $parameters->icon_size) }}"
        defer>
    </script>
@endif
