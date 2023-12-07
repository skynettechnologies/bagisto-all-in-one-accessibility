<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>All In One Accessibility Bagisto</title>
  <meta name="description" content="Bagisto App" />
  <link rel="stylesheet" href="{{ asset('themes/default/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('themes/default/assets/css/style.css?4=8') }}">
</head>

<body>
  <x-admin::layouts>
    <x-slot:title>
      All in One Accessibility
    </x-slot:title>
    <!-- {{ count($aioaData) }}
    @foreach ($aioaData as $item)
    {{ $item->license_key }}
    {{ $item->color_code }}
    {{ $item->icon_position }}
    {{ $item->icon_type }}
    {{ $item->icon_size }}
    @endforeach -->
    <div class="flex gap-[16px] justify-between max-sm:flex-wrap">
      <p class="py-[11px] text-[20px] text-gray-800 dark:text-white font-bold">
        All in One Accessibility
      </p>
      <div class="flex gap-x-[10px] items-center">
      </div>
    </div>
    <div id="api-response">
    </div>
    <div class="shopify-wrap-block">
      <div class="container">
        <div class="set-width">
          <div class="all-in-one-accessibility-wrap">
            <div class="accessibility-settings">
              <div class="all-one-accessibility-form">
                <div class="all-one-accessibility-form-inner">
                  <form id="widget-form" name="widget-form" class="form-controler"
                    action="{{ count($aioaData) > 0 ? route('aioa.update', ['id' => $item->id]) : route('admin.aioa.store') }}"
                    method="post">
                    @csrf
                    <div class="mb-3 row">
                      <div class="col-sm-12">
                        <div class="form-text">
                          <B>NOTE: Currently, All in One Accessibility is dedicated to enhancing accessibility
                            specifically for websites and online stores.</B>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3 row" id="license_key_html">
                      <label for="inputPassword" class="col-sm-3 col-form-label">License Key required for full
                        version:</label>
                      <div class="col-sm-9">
                        <input type="text" name="license_key" class="form-control" id="license_key"
                          value="{{ isset($item) ? $item->license_key : '' }}" onkeyup="mylicensekey()" />
                        <p class="form-text" id="upgrade_html_notes">Please <a
                            href="https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&variation_id=117&quantity=1&utm_medium=bagisto&utm_campaign=purchase-plan"
                            target="_blank">Upgrade</a>
                          to full
                          version of All in One Accessibility Pro</p>
                        <p class="form-text d-none" id="error_message">Please enter valid License Key</p>
                      </div><br>
                    </div>
                    <div class="mb-3 row" id="colorcode_html">
                      <label for="inputPassword" class="col-sm-3 col-form-label">Hex color code:</label>
                      <div class="col-sm-9">
                        <input type="text" name="color_code" class="form-control" id="color_code"
                          value="{{ isset($item) ? $item->color_code : '' }}" />
                        <div class="form-text">You can customize the ADA Widget color. For example: FF5733</div>
                      </div>
                    </div>
                    <div class="mb-3 row" id="position_html">
                      <label class="fcol-sm-3 col-form-label">Where would you like to place the accessibility icon on
                        your
                        site?
                      </label>
                      <div class="col-sm-12 three-col">
                        <div
                          class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                          <input type="radio" id="edit-position-top-left" name="icon_position" value="top_left"
                            class="form-radio" {{ isset($item) ? $item->icon_position === 'top_left' ? 'checked' : '' :
                          '' }}/>
                          <label for="edit-position-top-left" class="option">Top left</label>
                        </div>
                        <div
                          class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                          <input type="radio" id="edit-position-top-center" name="icon_position" value="top_center"
                            class="form-radio" {{ isset($item) ? $item->icon_position === 'top_center' ? 'checked' : ''
                          : '' }} />
                          <label for="edit-position-top-center" class="option">Top Center</label>
                        </div>
                        <div
                          class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                          <input type="radio" id="edit-position-top-right" name="icon_position" value="top_right"
                            class="form-radio" {{ isset($item) ? $item->icon_position === 'top_right' ? 'checked' : '' :
                          '' }} />
                          <label for="edit-position-top-right" class="option">Top Right</label>
                        </div>
                        <div
                          class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                          <input type="radio" id="edit-position-middel-left" name="icon_position" value="middel_left"
                            class="form-radio" {{ isset($item) ? $item->icon_position === 'middel_left' ? 'checked' : ''
                          : '' }} />
                          <label for="edit-position-middel-left" class="option">Middle left</label>
                        </div>
                        <div
                          class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                          <input type="radio" id="edit-position-middel-right" name="icon_position" value="middel_right"
                            class="form-radio" {{ isset($item) ? $item->icon_position === 'middel_right' ? 'checked' :
                          '' : '' }} />
                          <label for="edit-position-middel-right" class="option">Middle Right</label>
                        </div>
                        <div
                          class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                          <input type="radio" id="edit-position-bottom-left" name="icon_position" value="bottom_left"
                            class="form-radio" {{ isset($item) ? $item->icon_position === 'bottom_left' ? 'checked' : ''
                          : '' }}/>
                          <label for="edit-position-bottom-left" class="option">Bottom left</label>
                        </div>
                        <div
                          class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                          <input type="radio" id="edit-position-bottom-center" name="icon_position"
                            value="bottom_center" class="form-radio" {{ isset($item) ? $item->icon_position ===
                          'bottom_center' ? 'checked' : '' : '' }} />
                          <label for="edit-position-bottom-center" class="option">Bottom Center</label>
                        </div>
                        <div
                          class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                          <input type="radio" id="edit-position-bottom-right" name="icon_position" value="bottom_right"
                            class="form-radio" {{ isset($item) ? $item->icon_position === 'bottom_right' ? 'checked' :
                          '' : '' }} />
                          <label for="edit-position-bottom-right" class="option">Bottom Right</label>
                        </div>
                      </div>
                    </div>
                    <!-- && $item->license_key === "" -->
                    @if(!isset($item))
                    <div class="icon-type-wrapper row d-none" id="select_icon_type">
                      <label class="fcol-sm-12 col-form-label">Select icon type:</label>
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-type-1" checked="" name="icon_type" value="aioa-icon-type-1"
                                class="form-radio radio-opt" onchange="changetype(this)" />
                              <label for="edit-type-1" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-1.svg"
                                  width="65" height="65" />
                                <span class="visually-hidden">Type 1</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-type-2" name="icon_type" value="aioa-icon-type-2"
                                class="form-radio radio-opt" onchange="changetype(this)" />
                              <label for="edit-type-2" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-2.svg"
                                  width="65" height="65" />
                                <span class="visually-hidden">Type 2</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-type-3" name="icon_type" value="aioa-icon-type-3"
                                class="form-radio radio-opt" onchange="changetype(this)" />
                              <label for="edit-type-3" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-3.svg"
                                  width="65" height="65" />
                                <span class="visually-hidden">Type 3</span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="icon-size-wrapper row d-none" id="select_icon_size">
                      <label class="fcol-sm-12 col-form-label">Select icon size for Desktop: </label>
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-size-big" name="icon_size" value="aioa-big-icon"
                                class="form-radio" />
                              <label for="edit-size-big" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-1.svg"
                                  width="75" height="75" />
                                <span class="visually-hidden">Big</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-size-medium" checked="" name="icon_size"
                                value="aioa-medium-icon" class="form-radio" />
                              <label for="edit-size-medium" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-1.svg"
                                  width="65" height="65" />
                                <span class="visually-hidden">Medium</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-size-default" name="icon_size" value="aioa-default-icon"
                                class="form-radio" />
                              <label for="edit-size-default" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-1.svg"
                                  width="55" height="55" />
                                <span class="visually-hidden">Default</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-size-small" name="icon_size" value="aioa-small-icon"
                                class="form-radio" />
                              <label for="edit-size-small" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-1.svg"
                                  width="45" height="45" />
                                <span class="visually-hidden">Small</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-size-extra-small" name="icon_size"
                                value="aioa-extra-small-icon" class="form-radio" />
                              <label for="edit-size-extra-small" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-1.svg"
                                  width="35" height="35" />
                                <span class="visually-hidden">Extra Small</span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @else
                    <div class="icon-type-wrapper row" id="select_icon_type">
                      <label class="fcol-sm-12 col-form-label">Select icon type:</label>
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-type-1" name="icon_type" value="aioa-icon-type-1" onchange="changetype(this)" 
                                class="form-radio radio-opt" {{ isset($item) ? $item->icon_type === 'aioa-icon-type-1' ? 'checked'
                              : '' : '' }} />
                              <label for="edit-type-1" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-1.svg"
                                  width="65" height="65" />
                                <span class="visually-hidden">Type 1</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-type-2" name="icon_type" value="aioa-icon-type-2" onchange="changetype(this)" 
                                class="form-radio radio-opt" {{ isset($item) ? $item->icon_type === 'aioa-icon-type-2' ? 'checked'
                              : '' : '' }} />
                              <label for="edit-type-2" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-2.svg"
                                  width="65" height="65" />
                                <span class="visually-hidden">Type 2</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-auto mb-30">
                            <div class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-type-3" name="icon_type" value="aioa-icon-type-3" onchange="changetype(this)" 
                                class="form-radio radio-opt" {{ isset($item) ? $item->icon_type === 'aioa-icon-type-3' ? 'checked'
                              : '' : '' }}/>
                              <label for="edit-type-3" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-3.svg"
                                  width="65" height="65" />
                                <span class="visually-hidden">Type 3</span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="icon-size-wrapper row" id="select_icon_size">
                      <label class="fcol-sm-12 col-form-label">Select icon size for Desktop: </label>
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-size-big" name="icon_size" value="aioa-big-icon"
                                class="form-radio" {{ isset($item) ? $item->icon_size === 'aioa-big-icon' ? 'checked' :
                              '' : '' }}/>
                              <label for="edit-size-big" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-1.svg"
                                  width="75" height="75" />
                                <span class="visually-hidden">Big</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-size-medium" name="icon_size" value="aioa-medium-icon"
                                class="form-radio" {{ isset($item) ? $item->icon_size === 'aioa-medium-icon' ? 'checked'
                              : '' : '' }} />
                              <label for="edit-size-medium" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-1.svg"
                                  width="65" height="65" />
                                <span class="visually-hidden">Medium</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-size-default" name="icon_size" value="aioa-default-icon"
                                class="form-radio" {{ isset($item) ? $item->icon_size === 'aioa-default-icon' ?
                              'checked' : '' : '' }} />
                              <label for="edit-size-default" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-1.svg"
                                  width="55" height="55" />
                                <span class="visually-hidden">Default</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-size-small" name="icon_size" value="aioa-small-icon"
                                class="form-radio" {{ isset($item) ? $item->icon_size === 'aioa-small-icon' ? 'checked'
                              : '' : '' }} />
                              <label for="edit-size-small" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-1.svg"
                                  width="45" height="45" />
                                <span class="visually-hidden">Small</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-auto mb-30">
                            <div
                              class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                              <input type="radio" id="edit-size-extra-small" name="icon_size"
                                value="aioa-extra-small-icon" class="form-radio" {{ isset($item) ? $item->icon_size ===
                              'aioa-extra-small-icon' ? 'checked' : '' : '' }} />
                              <label for="edit-size-extra-small" class="option">
                                <img
                                  src="https://skynettechnologies.com/sites/default/files/python/aioa-icon-type-1.svg"
                                  width="35" height="35" />
                                <span class="visually-hidden">Extra Small</span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    <div class="save-changes-btn">
                      <button type="submit" id="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                    <div class="mt-3 row d-none" id="save-changes-success">
                      <div class="col-sm-12">
                        <div class="form-text">It may take a few seconds for changes to appear on your website. If you
                          don't see the changes, try clearing your browser cache or checking in a private browsing
                          window.
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
      $(document).ready(function () {

      });
      const sizeOptions = document.querySelectorAll('input[name="icon_size"]');
      const sizeOptionsImg = document.querySelectorAll('input[name="icon_size"] + label img');
      const typeOptions = document.querySelectorAll('input[name="icon_type"]');
      const positionOptions = document.querySelectorAll('input[name="icon_position"]');
      const custSizePreview = document.querySelector(".custom-size-preview img");
      const custSizePreviewLabel = document.querySelector(".custom-size-preview .value span");
      // Set default value to custom position inputs
      var positions = {
        top_left: [20, 20],
        middel_left: [20, 50],
        bottom_center: [50, 20],
        top_center: [50, 20],
        middel_right: [20, 50],
        bottom_right: [20, 20],
        top_right: [20, 20],
        bottom_left: [20, 20],
      };
      console.log("aioa_icon_type :", document.querySelector('.radio-opt'));
      // Set icon on type select

      // radio-opt

      let changetype=  (event) => {
          console.log("click :", event);
          
          var ico_type = document.querySelector('input[name="icon_type"]:checked').value;

          sizeOptionsImg.forEach((option2) => {

            console.log("option2  2 :", ico_type);

            option2.setAttribute("src", "https://skynettechnologies.com/sites/default/files/python/" + ico_type + ".svg");

            console.log("option2  2 :", option2);
          });
        };
      // typeOptions.forEach((option) => {
      //   console.log("option :", option);

        
      // });

      function handleRadioChange() {
        // Get the selected value
        var selectedValue;
        for (var i = 0; i < typeOptions.length; i++) {
          if (typeOptions[i].checked) {
            selectedValue = typeOptions[i].value;
            break;
          }
        }

        // Do something with the selected value
        console.log("Selected color: " + selectedValue);
      }

      // Attach the event listener to each radio input
      for (var i = 0; i < typeOptions.length; i++) {
        typeOptions[i].addEventListener('change', handleRadioChange);
      }

      // Set icon on size select
      sizeOptions.forEach((option) => {
        var ico_size_value = document
          .querySelector('input[name="icon_size"]:checked + label img')
          .getAttribute("width");
        // Set default value to custom size input
        option.addEventListener("click", (event) => {
          var ico_width = document
            .querySelector('input[name="icon_size"]:checked + label img')
            .getAttribute("width");
          var ico_height = document
            .querySelector('input[name="icon_size"]:checked + label img')
            .getAttribute("height");
          custSizePreview.setAttribute("width", ico_width);
          custSizePreview.setAttribute("height", ico_height);
          custSizePreviewLabel.innerHTML = ico_width;
        });
      });
    </script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        fetch('https://www.skynettechnologies.com/add-ons/discount_offer.php?platform=bagisto') // Replace with your API endpoint
          .then(response => response.text())
          .then(data => {
            document.getElementById('api-response').innerHTML = data;
          })
          .catch(error => {
            console.error('Error fetching data:', error);
          });
      });
      async function licenseKey(license_key_change) {
        var formdata = new FormData();
        formdata.append("token", license_key_change);
        formdata.append("SERVER_NAME", "");
        var requestOptions = {
          method: 'POST',
          body: formdata,
        };
        let response_v = await fetch("https://www.skynettechnologies.com/add-ons/license-api.php", requestOptions)
        return await response_v.json();
      }
      function mylicensekey() {
        var license_key_change = $("#license_key").val();
        var license_key_valid = null;
        licenseKey(license_key_change).then(function (locale) {
          license_key_valid = locale.valid;
          if (license_key_valid == 1) {
            $("#select_icon_type").removeClass("d-none");
            $("#select_icon_size").removeClass("d-none");
            $("#error_message").addClass("d-none");
            $("#upgrade_html_notes").addClass("d-none");
          }
          else {
            $("#upgrade_html_notes").removeClass("d-none");
            $("#error_message").removeClass("d-none").css("color", "red");
            $("#select_icon_type").addClass("d-none");
            $("#select_icon_size").addClass("d-none");
          }
        })
      }
      $('#license_key,#color_code').change(function () {
        var license_key = $("#license_key").val();
        var color_code = $("#color_code").val();
      })
      $('input[name="icon_position"]').change(function () {
        var icon_position = document.querySelector('input[name="icon_position"]:checked').value;
      });
      $('input[name="icon_type"]').change(function () {
        var aioa_icon_type = document.querySelector('input[name="icon_type"]:checked').value;
        console.log("icon Type 1234 : ", aioa_icon_type);
      });
      $('input[name="icon_size"]').change(function () {
        var icon_size = document.querySelector('input[name="icon_size"]:checked').value;
      });
    </script>
  </x-admin::layouts>
</body>

</html>