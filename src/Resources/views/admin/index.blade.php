{{--
    All in One Accessibility settings page (Admin > All in One Accessibility).

    The page is the <v-aioa-settings> Vue component, because everything inside the
    Bagisto admin layout is rendered by the admin Vue app. The component's template is
    plain HTML (v-pre: Vue does not compile it). Once Vue has mounted it, the page
    scripts (public/vendor/allinoneaccessibility/js) are loaded one after another and
    work on that HTML. The boot data they read is printed outside the Vue app.

    Variables (Http/Controllers/Admin/AllinOneAccessibilityController.php):
      $aioa             config('allinoneaccessibility')
      $iconBase         URL of the icon folder, with a trailing slash
      $styles, $scripts asset URLs in load order
      $assetsPublished  false until the assets are published
      $boot             data for js/core.js: domain, admin name and email, URLs, CSRF token
--}}
@php
    // Element id slug: "top_left" => "top-left", "aioa-extra-small-icon" => "extra-small"
    $aioaSlug = fn (string $value): string => str_replace(['aioa-', '-icon', '_'], ['', '', '-'], $value);
@endphp

<x-admin::layouts>
    <x-slot:title>
        @lang('allinoneaccessibility::app.title')
    </x-slot>

    @if ($assetsPublished)
        @push('styles')
            @foreach ($styles as $style)
                <link rel="stylesheet" href="{{ $style }}">
            @endforeach
        @endpush

        <v-aioa-settings>
            <p style="padding: 24px; text-align: center;">@lang('allinoneaccessibility::app.title')…</p>
        </v-aioa-settings>
    @else
        <div style="max-width: 900px; margin: 16px auto; padding: 16px 18px; border: 1px solid #f5c2c0; border-radius: 10px; background: #fdecea; color: #7a1c14; font-size: 14px; line-height: 1.5;">
            @lang('allinoneaccessibility::app.assets-missing')
            <code style="display: block; margin-top: 8px; padding: 8px 10px; border-radius: 6px; background: #fff; color: #1f1f24;">php artisan vendor:publish --tag=allinoneaccessibility-assets --force</code>
        </div>
    @endif

    @if ($assetsPublished)
        @pushOnce('scripts')
            <script type="text/x-template" id="v-aioa-settings-template">
                <div class="aioa-app" v-pre>
                    <div class="aioa-page">

                        @include('allinoneaccessibility::admin.partials.header')

                        <main>
                            @include('allinoneaccessibility::admin.partials.status')

                            <!-- Settings (shown once loading has finished) -->
                            <div id="settings_block" hidden>
                                @include('allinoneaccessibility::admin.partials.upgrade-banner')
                                @include('allinoneaccessibility::admin.partials.paid-banner')
                                @include('allinoneaccessibility::admin.partials.site-strip')
                                @include('allinoneaccessibility::admin.partials.settings-form')
                            </div>
                        </main>
                    </div>

                    <!-- Toast notifications (js/ui.js) -->
                    <div class="aioa-toasts" id="toasts" aria-live="polite"></div>
                </div>
            </script>

            <!-- Boot data for the page scripts (js/core.js) -->
            <script id="aioa-boot" type="application/json">@json($boot, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES)</script>

            <script type="module">
                app.component('v-aioa-settings', {
                    template: '#v-aioa-settings-template',

                    /**
                     * Load the page scripts in order, now that the HTML is in the page.
                     */
                    mounted() {
                        @json($scripts, JSON_UNESCAPED_SLASHES).reduce((loaded, src) => loaded.then(() => new Promise((resolve, reject) => {
                            const script = document.createElement('script');

                            script.src = src;
                            script.onload = resolve;
                            script.onerror = () => reject(new Error('Could not load ' + src));

                            document.body.appendChild(script);
                        })), Promise.resolve()).catch((error) => console.error('All in One Accessibility:', error));
                    },
                });
            </script>
        @endPushOnce
    @endif
</x-admin::layouts>
