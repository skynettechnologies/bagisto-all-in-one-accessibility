{{--
    Tabs + widget settings form. Each Appearance Design section lives in
    partials/settings/, the paid tabs in paid-features and accessibility-score.
    The form is read and filled by js/settings-form.js (+ paid-features.js) and
    saved by js/save.js. The save bar shows on Appearance Design, and on Paid
    Features on a paid plan (js/tabs.js).
--}}
@include('allinoneaccessibility::admin.partials.tabs')

<form id="widget-form" name="widget-form" class="aioa-form" novalidate>

    <!-- Appearance Design -->
    <div class="aioa-tabpanel" role="tabpanel" id="panel-appearance" aria-labelledby="tab-appearance" tabindex="0">
        <div class="aioa-columns">
            @include('allinoneaccessibility::admin.partials.settings.color')
            @include('allinoneaccessibility::admin.partials.settings.widget-size')
        </div>

        @include('allinoneaccessibility::admin.partials.settings.position')
        @include('allinoneaccessibility::admin.partials.settings.icon-type')
        @include('allinoneaccessibility::admin.partials.settings.icon-size')
    </div>

    <!-- Paid Features -->
    <div class="aioa-tabpanel" role="tabpanel" id="panel-paid" aria-labelledby="tab-paid" tabindex="0" hidden>
        @include('allinoneaccessibility::admin.partials.paid-features')
    </div>

    <!-- Accessibility Score -->
    <div class="aioa-tabpanel" role="tabpanel" id="panel-score" aria-labelledby="tab-score" tabindex="0" hidden>
        @include('allinoneaccessibility::admin.partials.accessibility-score')
    </div>

    <!-- Save bar (Appearance Design, and Paid Features on a paid plan); stays at the bottom of the screen while scrolling -->
    <div id="save-area">
        @include('allinoneaccessibility::admin.partials.settings.save-bar')
    </div>

</form>
