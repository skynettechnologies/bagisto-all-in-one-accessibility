<!-- packages/SkynetTechnologies/AllinOneAccessibility/resources/views/custom-script.blade.php -->

<script>
(function () {

    var domain = window.location.origin;

    var apiUrl = "https://ada.skynettechnologies.us/api/widget-settings";

    var postData = new URLSearchParams();
    postData.append("website_url", domain);

    fetch(apiUrl, {
        method: "POST",
        body: postData
    })
    .then(function (response) {
        return response.json();
    })
    .then(function (apiResponse) {

        console.log("ADA Full API Response:", apiResponse);

        var no_required_eu = "1";

        if (apiResponse.Data && apiResponse.Data.no_required_eu) {
            no_required_eu = apiResponse.Data.no_required_eu;
        }

        console.log("ADA no_required_eu:", no_required_eu);

        setTimeout(function () {

            if (document.getElementById("aioa-adawidget")) {
                return;
            }

            const scriptEle = document.createElement("script");
            scriptEle.id = "aioa-adawidget";
            scriptEle.async = true;

            @if($parameters != null)
                const licensekey = "{{ $parameters->license_key }}";
                const color = "{{ $parameters->color_code }}";
                const position = "{{ $parameters->icon_position }}";
                const icon_type = "{{ $parameters->icon_type }}";
                const icon_size = "{{ $parameters->icon_size }}";
            @else
                const licensekey = "";
                const color = "";
                const position = "";
                const icon_type = "";
                const icon_size = "";
            @endif

            if (no_required_eu === "0") {

                // EU SCRIPT
                scriptEle.src =
                    "https://eu.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js" +
                    "?colorcode=" + encodeURIComponent(color) +
                    "&token=" + encodeURIComponent(licensekey) +
                    "&position=" + encodeURIComponent(position);

            } else {

                // NON-EU SCRIPT
                scriptEle.src =
                    "https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js" +
                    "?colorcode=" + encodeURIComponent(color) +
                    "&token=" + encodeURIComponent(licensekey) +
                    "&position=" + encodeURIComponent(position + "." + icon_type + "." + icon_size);
            }

            document.body.appendChild(scriptEle);

        }, 3000);

    })
    .catch(function (error) {
        console.error("API Error:", error);
    });

})();
</script>