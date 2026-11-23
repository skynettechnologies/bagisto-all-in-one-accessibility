{{--
    Paid Features tab. Read, filled and checked by js/paid-features.js and saved
    together with the Appearance Design settings (paid plans only).
    Free plan: the content is blurred and inert, with the upgrade overlay on top (lock).
--}}
<div class="aioa-lockable">
    <div class="aioa-lock-content aioa-stack">
        @include('allinoneaccessibility::admin.partials.paid.mobile-position')
        @include('allinoneaccessibility::admin.partials.paid.links')
        @include('allinoneaccessibility::admin.partials.paid.toggles')
    </div>
    @include('allinoneaccessibility::admin.partials.lock', ['lockId' => 'paid-lock', 'lockMod' => ''])
</div>
