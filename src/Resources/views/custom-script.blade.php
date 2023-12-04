<!-- packages/SkynetTechnologies/AllinOneAccessibility/resources/views/custom-script.blade.php -->

@if($parameters == null)
<script id="aioa-adawidget" src="https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?colorcode=&token=&position="></script>
@else
<script id="aioa-adawidget" src="https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?colorcode={{ $parameters->color_code }}&token={{ $parameters->license_key }}&position={{ $parameters->icon_position }}.{{ $parameters->icon_type }}.{{ $parameters->icon_size }}"></script>
@endif

