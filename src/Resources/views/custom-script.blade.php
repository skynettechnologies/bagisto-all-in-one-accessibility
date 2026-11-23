{{--
    All in One Accessibility widget, added to every storefront page
    (event bagisto.shop.layout.body.after, see Providers/EventServiceProvider.php).

    The settings live at Skynet Technologies (saved from Admin > All in One
    Accessibility). This script reads them for the store's domain, then loads the EU
    or the non-EU widget script with the saved color, position, icon type and size.
--}}
<script>
    (function () {
        if (document.getElementById('aioa-adawidget')) {
            return;
        }

        var token = @json($token ?? '');
        var body = new URLSearchParams();

        body.append('website_url', window.location.hostname);

        fetch(@json(config('allinoneaccessibility.api_base') . 'widget-settings'), { method: 'POST', body: body })
            .then(function (response) {
                return response.json();
            })
            .then(function (response) {
                var data = (response && response.Data) || {};
                var isEu = String(data.no_required_eu) === '0';
                var color = data.widget_color_code || '';
                var position = String(data.widget_position || 'bottom_right').replace(/^middel_/, 'middle_');
                var iconType = data.widget_icon_type || 'aioa-icon-type-1';
                var iconSize = data.widget_icon_size || 'aioa-default-icon';

                setTimeout(function () {
                    if (document.getElementById('aioa-adawidget')) {
                        return;
                    }

                    var script = document.createElement('script');

                    script.id = 'aioa-adawidget';
                    script.async = true;
                    script.src = (isEu ? @json(config('allinoneaccessibility.widget_script_eu')) : @json(config('allinoneaccessibility.widget_script')))
                        + '?colorcode=' + encodeURIComponent(color)
                        + '&token=' + encodeURIComponent(token)
                        + '&position=' + encodeURIComponent(isEu ? position : position + '.' + iconType + '.' + iconSize);

                    document.body.appendChild(script);
                }, 3000);
            })
            .catch(function (error) {
                console.error('All in One Accessibility: could not load the widget settings.', error);
            });
    })();
</script>
