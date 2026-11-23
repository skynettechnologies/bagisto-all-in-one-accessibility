@php
    $aioaMenuIcon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.296 81.296"><circle cx="40.648" cy="40.648" r="40.648" fill="#420083"/><path fill="#fff" transform="translate(6.249 6.244)" d="'.config('allinoneaccessibility.logo_path').'"/></svg>';
@endphp

<style>
    .icon-allinoneaccessibility {
        display: inline-block;
        flex-shrink: 0;
        width: 1em;
        height: 1em;
        background: url("data:image/svg+xml;base64,{{ base64_encode($aioaMenuIcon) }}") center / contain no-repeat;
    }
</style>
