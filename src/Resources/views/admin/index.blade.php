<?php
 $websitename = $_SERVER['HTTP_HOST'];

        $arrDetails = [
            'name' => $websitename,
            'email' => 'no-reply@' . $websitename,
            'company_name' => '',
            'website' => base64_encode($websitename),
            'package_type' => 'free-widget',
            'start_date' => date(DATE_ISO8601),
            'end_date' => '',
            'price' => '',
            'discount_price' => '0',
            'platform' => 'Bagisto',
            'api_key' => '',
            'is_trial_period' => '',
            'is_free_widget' => '1',
            'bill_address' => '',
            'country' => '',
            'state' => '',
            'city' => '',
            'post_code' => '',
            'transaction_id' => '',
            'subscr_id' => '',
            'payment_source' => '',
            'no_required_eu' => '',
        ];


        $apiUrl = "https://ada.skynettechnologies.us/api/get-autologin-link";

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'website' => base64_encode($websitename)
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        if (!isset($result['link'])) {

            $secondApiUrl = "https://ada.skynettechnologies.us/api/add-user-domain";

            $ch = curl_init($secondApiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrDetails));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_exec($ch);
            curl_close($ch);
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>All In One Accessibility Bagisto</title>
  <meta name="description" content="Bagisto App" />
  <!-- <link rel="stylesheet" href="{{ asset('themes/default/assets/css/bootstrap.min.css') }}"> -->
  <!-- <link rel="stylesheet" href="{{ asset('themes/default/assets/css/style.css?4=8') }}"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://sanity.skynettechnologies.us/assets/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">


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


    <h1> </h1>
    <style>

      .btn [class*=" icon-"],
      .btn [class^=icon-],
      .s-btn [class*=" icon-"],
      .s-btn [class^=icon-],
      [class*=" icon-"],
      [class^=icon-],
      i.icon,
      span.icon {
        /* background-repeat: no-repeat; */
        /* background-size: contain; */
        display: contents;
        /* height: 16px; */
        /* vertical-align: -3px; */
        /* width: 16px; */
      }

      @media (min-width: 768px) {
        .col-sm-4 {
          width: 100%;
        }
      }

      .all-in-one-accessibility-wrap .accessibility-settings .all-one-accessibility-form .icon-size-wrapper .option,
      .all-in-one-accessibility-wrap .accessibility-settings .all-one-accessibility-form .icon-type-wrapper .option {
        width: 130px;
        height: 130px;
        padding: 10px !important;
        text-align: center;
        background-color: #3c007f !important;
        outline: 4px solid #fff;
        outline-offset: -4px;
        border-radius: 10px;
      }
      .hide 
      {
        display : none !important;
      }

    </style>
    </head>

    <body>
       
  <div class="shopify-wrap-block">
    <div class="container">
      <div class="set-width">
         <img src="https://ada.skynettechnologies.us/public/trial-assets/images/all-in-one-accessibility-logo.svg" alt="All in One Accessibility - Skynet Technologies" style="align-items: center;display: block;margin-left: auto;margin-bottom:15px;margin-right: auto;width: 40%;">
        <div class="all-in-one-accessibility-wrap">
          <div class="accessibility-settings">
            <div class="all-one-accessibility-form" style="padding: 27px 40px 35px 100px !important;">
              <div class="all-one-accessibility-form-inner">

                  <div class="mb-3 row">
                    <div class="col-sm-12">
                      <div class="form-text">
                        <B>NOTE: Currently, All in One Accessibility is dedicated to enhancing accessibility
                          specifically for websites and online stores.</B>
                      </div>
                      <B>
                        <p class="form-text" id="upgrade_html_notes">Please <a
                            href="https://ada.skynettechnologies.us/trial-subscription" target="_blank">Upgrade</a>
                          to full
                          version of All in One Accessibility Pro with 10 days free trial</p>
                      </B>
                    </div>
                  </div>
              </div>
           
              <div class="mb-3 row " id="colorcode_html">
                <label for="inputPassword" class="col-sm-3 col-form-label">Hex color code:</label>
                <div class="col-sm-9">
                  <input type="text" name="colorcode" style="height:auto" class="form-control" id="colorcode" value="" />
                  <div class="form-text">You can customize the ADA Widget color. For example: FF5733</div>
                </div>
              </div>
              <div class="icon-custom-position-wrapper mb-3 row">
                <div class="mb-4">
                  <label class="custom-switcher ">
                    <span class="custom-switcher_right">
                      <input type="checkbox" id="custom-position-switcher" class="custom-switcher_inp_2"
                        value="1" />
                      <span class="custom-switcher_body" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Toggle to override <Top Left> position" data-bs-custom-class="switcher-tooltip">
                      </span>
                      <span class="fcol-sm-3 col-form-label">Enable precise accessibility widget icon position:</span>
                    </span>
                  </label>
                  <div class="custom-position-controls hide">
                    <div class="row">
                      <div class="col-auto">
                        <div class="input-group mb-3">
                          <input type="number" style="height:auto;border-bottom-right-radius: 0px;
                                  border-top-right-radius: 0px;" min="0" max="250" class="form-control" id="custom_position_x_value"
                            aria-label="Value in pixels" aria-describedby="pos-value-input_1" oninput="this.value = Math.min(Math.max(this.value, 0), 250)" />
                          <span class="input-group-text" style="height:auto" id="pos-value-input_1">PX</span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <select class="form-select" style="hheight:auto;color: black;" aria-label="Default select example">
                          <option selected value="cust-pos-to-the-right">To the right</option>
                          <option value="cust-pos-to-the-left">To the left</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-auto">
                        <div class="input-group mb-3">
                          <input type="number" style="height:auto;border-bottom-right-radius: 0px;              border-top-right-radius: 0px;" min="0" max="250" class="form-control" id="custom_position_y_value"
                            aria-label="Value in pixels" aria-describedby="pos-value-input_2" oninput="this.value = Math.min(Math.max(this.value, 0), 250)" />
                          <span class="input-group-text" style="height:auto" id="pos-value-input_2">PX</span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <select class="form-select" style="height:auto;color: black;" aria-label="Default select example">
                          <option selected value="cust-pos-to-the-lower">To the bottom</option>
                          <option value="cust-pos-to-the-upper">To the top</option>
                        </select>
                      </div>
                    </div>
                    <div class="description">0 - 250px are permitted values</div>
                  </div>
                </div>
              </div>
              <div class="mb-3 row widget-position" id="position_html">
                <label class="fcol-sm-3 col-form-label">Where would you like to place the accessibility icon on your
                  site?
                </label>
                <div class="col-sm-12 three-col">
                  <div
                    class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                    <input type="radio" id="edit-position-top-left" name="position" value="top_left"
                      class="form-radio" />

                    <label for="edit-position-top-left" class="option">Top left</label>
                  </div>
                  <div
                    class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                    <input type="radio" id="edit-position-top-center" name="position" value="top_center"
                      class="form-radio" />

                    <label for="edit-position-top-center" class="option">Top Center</label>
                  </div>
                  <div
                    class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                    <input type="radio" id="edit-position-top-right" name="position" value="top_right"
                      class="form-radio" />

                    <label for="edit-position-top-right" class="option">Top Right</label>
                  </div>
                  <div
                    class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                    <input type="radio" id="edit-position-middel-left" name="position" value="middle_left"
                      class="form-radio" />

                    <label for="edit-position-middel-left" class="option">Middle left</label>
                  </div>
                  <div
                    class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                    <input type="radio" id="edit-position-middel-right" name="position" value="middle_right"
                      class="form-radio" />

                    <label for="edit-position-middel-right" class="option">Middle Right</label>
                  </div>
                  <div
                    class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                    <input type="radio" id="edit-position-bottom-left" name="position" value="bottom_left"
                      class="form-radio" />

                    <label for="edit-position-bottom-left" class="option">Bottom left</label>
                  </div>
                  <div
                    class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                    <input type="radio" id="edit-position-bottom-center" name="position" value="bottom_center"
                      class="form-radio" />

                    <label for="edit-position-bottom-center" class="option">Bottom Center</label>
                  </div>
                  <div
                    class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                    <input type="radio" id="edit-position-bottom-right" checked="" name="position"
                      value="bottom_right" class="form-radio" />

                    <label for="edit-position-bottom-right" class="option">Bottom Right</label>
                  </div>
                </div>
              </div>
              <!-- widget icon size -->
              <label class="fcol-sm-3 col-form-label">Select Widget Size:</label>

              <div class="form-radios  mb-3">
                <div class="form-radio-item">
                  <input data-drupal-selector="edit-widget-size-regularsize" aria-describedby="edit-widget-size--description" type="radio" id="edit-widget-size-regularsize" name="widget_size" value="0" checked="checked" class="form-radio form-boolean form-boolean--type-radio" wfd-id="id15">
                  <label for="edit-widget-size-regularsize" class="form-item__label option">Regular Size</label>
                </div>
                <div class="form-radio-item">
                  <input data-drupal-selector="edit-widget-size-oversize" aria-describedby="edit-widget-size--description" type="radio" id="edit-widget-size-oversize" name="widget_size" value="1" class="form-radio form-boolean form-boolean--type-radio" wfd-id="id16">
                  <label for="edit-widget-size-oversize" class="form-item__label option">Oversize</label>
                </div>
                <div style="font-size: small;" id="edit-widget-size--wrapper--description" data-drupal-field-elements="description" class="fieldset__description">It only works on desktop view.</div>
              </div>

              <div class="icon-type-wrapper row " id="select_icon_type">
                <label class="fcol-sm-12 col-form-label" style="margin-left: -10.500px; margin-right: -10.500px;">Select icon type:</label>
                <div class="col-sm-12" style=" margin-right: -15px;">
                  <div class="row">
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-1" checked="" name="aioa_icon_type"
                          value="aioa-icon-type-1" class="form-radio" />
                        <label for="edit-type-1" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 1</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-2" name="aioa_icon_type" value="aioa-icon-type-2"
                          class="form-radio" />
                        <label for="edit-type-2" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-2.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 2</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-3" name="aioa_icon_type" value="aioa-icon-type-3"
                          class="form-radio" />
                        <label for="edit-type-3" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-3.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 3</span>
                        </label>
                      </div>
                    </div>

                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-4" name="aioa_icon_type" value="aioa-icon-type-4"
                          class="form-radio" />
                        <label for="edit-type-4" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-4.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 4</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-5" name="aioa_icon_type" value="aioa-icon-type-5"
                          class="form-radio" />
                        <label for="edit-type-5" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-5.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 5</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-6" name="aioa_icon_type" value="aioa-icon-type-6"
                          class="form-radio" />
                        <label for="edit-type-6" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-6.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 6</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-7" name="aioa_icon_type" value="aioa-icon-type-7"
                          class="form-radio" />
                        <label for="edit-type-7" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-7.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 7</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-8" name="aioa_icon_type" value="aioa-icon-type-8"
                          class="form-radio" />
                        <label for="edit-type-8" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-8.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 8</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-9" name="aioa_icon_type" value="aioa-icon-type-9"
                          class="form-radio" />
                        <label for="edit-type-9" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-9.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 9</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-10" name="aioa_icon_type" value="aioa-icon-type-10"
                          class="form-radio" />
                        <label for="edit-type-10" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-10.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 10</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-11" name="aioa_icon_type" value="aioa-icon-type-11"
                          class="form-radio" />
                        <label for="edit-type-11" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-11.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 11</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-12" name="aioa_icon_type" value="aioa-icon-type-12"
                          class="form-radio" />
                        <label for="edit-type-12" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-12.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 12</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-13" name="aioa_icon_type" value="aioa-icon-type-13"
                          class="form-radio" />
                        <label for="edit-type-13" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-13.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 13</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-14" name="aioa_icon_type" value="aioa-icon-type-14"
                          class="form-radio" />
                        <label for="edit-type-14" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-14.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 14</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-15" name="aioa_icon_type" value="aioa-icon-type-15"
                          class="form-radio" />
                        <label for="edit-type-15" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-15.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 15</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-16" name="aioa_icon_type" value="aioa-icon-type-16"
                          class="form-radio" />
                        <label for="edit-type-16" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-16.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 16</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-17" name="aioa_icon_type" value="aioa-icon-type-17"
                          class="form-radio" />
                        <label for="edit-type-17" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-17.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 17</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-18" name="aioa_icon_type" value="aioa-icon-type-18"
                          class="form-radio" />
                        <label for="edit-type-18" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-18.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 18</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-19" name="aioa_icon_type" value="aioa-icon-type-19"
                          class="form-radio" />
                        <label for="edit-type-19" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-19.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 19</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-20" name="aioa_icon_type" value="aioa-icon-type-20"
                          class="form-radio" />
                        <label for="edit-type-20" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-20.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 20</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-21" name="aioa_icon_type" value="aioa-icon-type-21"
                          class="form-radio" />
                        <label for="edit-type-21" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-21.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 21</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-22" name="aioa_icon_type" value="aioa-icon-type-22"
                          class="form-radio" />
                        <label for="edit-type-22" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-22.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 22</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-23" name="aioa_icon_type" value="aioa-icon-type-23"
                          class="form-radio" />
                        <label for="edit-type-23" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-23.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 23</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-24" name="aioa_icon_type" value="aioa-icon-type-24"
                          class="form-radio" />
                        <label for="edit-type-24" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-24.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 24</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-25" name="aioa_icon_type" value="aioa-icon-type-25"
                          class="form-radio" />
                        <label for="edit-type-25" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-25.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 25</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-26" name="aioa_icon_type" value="aioa-icon-type-26"
                          class="form-radio" />
                        <label for="edit-type-26" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-26.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 26</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-27" name="aioa_icon_type" value="aioa-icon-type-27"
                          class="form-radio" />
                        <label for="edit-type-27" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-27.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 27</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-28" name="aioa_icon_type" value="aioa-icon-type-28"
                          class="form-radio" />
                        <label for="edit-type-28" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-28.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 28</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-type-29" name="aioa_icon_type" value="aioa-icon-type-29"
                          class="form-radio" />
                        <label for="edit-type-29" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-29.svg"
                            width="65" height="65" style="height: 65px;" />
                          <span class="visually-hidden">Type 29</span>
                        </label>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="icon-custom-size-wrapper mb-3 row">
                  <div class="col-sm-12">
                    <label class="custom-switcher">
                      <span class="custom-switcher_right">
                        <input type="checkbox" id="custom-ssize-switcher" class="custom-switcher_inp_2" value="1" />
                        <span class="custom-switcher_body" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="Toggle to override selected size" data-bs-custom-class="switcher-tooltip">
                        </span>
                        <span class="fcol-sm-3 col-form-label">Enable icon custom size:</span>
                      </span>
                    </label>
                    <div class="custom-size-controls hide">
                      <div class="row">

                      </div>
                      <div class="col-auto controls ms-0">
                        <label for="exact-icon-size" class="fcol-sm-3 col-form-label">Select exact icon size:</label>
                        <div class="input-group mb-2">
                        <input type="number" class="form-control" style="height:auto" id="widget_icon_size_custom" name="widget_icon_size_custom" min="20" max="150"
                      onblur="this.value=this.value.trim()==''?20:Math.min(Math.max(parseInt(this.value),20),150)">

  
                        <span class="input-group-text" style="height:auto" id="size-value-input_1">PX</span>
                        </div>
                        <div class="description">20 - 150px are permitted values</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="icon-size-wrapper widget-icon row " id="select_icon_size">
                <label class="fcol-sm-12 col-form-label">Select icon size for Desktop: </label>

                <div class="col-sm-12" style="padding-right: calc(var(--bs-gutter-x)* .2);padding-left: calc(var(--bs-gutter-x)* .2);">
                  <div class="row">
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-size-big" name="aioa_icon_size" value="aioa-big-icon"
                          class="form-radio" />
                        <label for="edit-size-big" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                            width="75" height="75" style="height: 75px;" class="iconimg" />
                          <span class="visually-hidden">Big</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-size-medium" checked="" name="aioa_icon_size"
                          value="aioa-medium-icon" class="form-radio" />
                        <label for="edit-size-medium" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                            width="65" height="65" style="height: 65px;" class="iconimg" />
                          <span class="visually-hidden">Medium</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-size-default" name="aioa_icon_size" value="aioa-default-icon"
                          class="form-radio" />
                        <label for="edit-size-default" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                            width="55" height="55" style="height: 55px;" class="iconimg" />
                          <span class="visually-hidden">Default</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-size-small" name="aioa_icon_size" value="aioa-small-icon"
                          class="form-radio" />
                        <label for="edit-size-small" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                            width="45" height="45" style="height: 45px;" class="iconimg" />
                          <span class="visually-hidden">Small</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-size-extra-small" name="aioa_icon_size"
                          value="aioa-extra-small-icon" class="form-radio" />
                        <label for="edit-size-extra-small" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                            width="35" height="35" style="height: 35px;" class="iconimg" />
                          <span class="visually-hidden">Extra Small</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="icon-size-wrapper row" style="display: none">
                <label class="fcol-sm-12 col-form-label">Select icon size for mobile: </label>
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-size-big" name="aioa_icon_size_mb" value="aioa-big-icon-mb"
                          class="form-radio" />
                        <label for="edit-size-big" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                            width="75" height="75" />
                          <span class="visually-hidden">Big</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-size-medium" checked="" name="aioa_icon_size_mb"
                          value="aioa-medium-icon-mb" class="form-radio" />
                        <label for="edit-size-medium" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                            width="65" height="65" />
                          <span class="visually-hidden">Medium</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-size-default" name="aioa_icon_size_mb"
                          value="aioa-default-icon-mb" class="form-radio" />
                        <label for="edit-size-default" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                            width="55" height="55" />
                          <span class="visually-hidden">Default</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-size-small" name="aioa_icon_size_mb" value="aioa-small-icon-mb"
                          class="form-radio" />
                        <label for="edit-size-small" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                            width="45" height="45" />
                          <span class="visually-hidden">Small</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-auto mb-30">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-size-extra-small" name="aioa_icon_size_mb"
                          value="aioa-extra-small-icon-mb" class="form-radio" />
                        <label for="edit-size-extra-small" class="option">
                          <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                            width="35" height="35" />
                          <span class="visually-hidden">Extra Small</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="save-changes-btn">
                <!-- <button type="button" id="submit" onclick="f1()" class="btn btn-primary" style="padding: 2%;background-color: #420083;
                    ">Save Changes</button> -->
                <button type="submit" id="submit" onclick="f1()" class="btn btn-primary float-right">Save Changes</button>

                <div class="mt-3 row " id="save-changes-success">
                  <div class="col-sm-12">
                    <div class="form-text">It may take a few seconds for changes to appear on your website. If you
                      don't see the changes, try clearing your browser cache or checking in a private browsing window.
                    </div>
                  </div>
                </div>

              </div>
           
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


<script>

$(document).ready(function () {

  $(document).on("change", "#custom-position-switcher", function () {

    

      $(".custom-position-controls").toggleClass("hide");
      $(".widget-position").toggleClass("hide");

      is_widget_custom_position = $(this).is(":checked") ? 1 : 0;
  });


  $(document).on("change", "#custom-ssize-switcher", function () {

      $(".custom-size-controls").toggleClass("hide");
      $(".widget-icon").toggleClass("hide");

      is_widget_custom_size = $(this).is(":checked") ? 1 : 0;
  });

});
const domain = window.location.host;
console.log("domain : " + domain);

const defaultSettings = {
  widget_position: "bottom_right",
  widget_color_code: "#420083",
  widget_icon_type: "aioa-icon-type-1",
  widget_icon_size: "aioa-small-icon",
};

var domain_name = domain;
var website_name = btoa(domain_name);

let is_widget_custom_position = 0;
let is_widget_custom_size = 0;


/* =========================
   PAGE LOAD
========================= */

window.onload = function () {

  website_name = btoa(domain_name);

  fetchApiResponse(domain_name);
  fetchSettings();

  var server_name = domain;

};
// -----------------------------
// Populate form fields with settings
// -----------------------------
function populateSettings(settings) {

  if (settings.is_widget_custom_size == 1) {
    document.getElementById("custom-ssize-switcher").checked = true;
    const event = new Event('change');
    document.getElementById("custom-ssize-switcher").dispatchEvent(event);
    $(".custom-size-controls").removeClass("hide");
    $(".widget-icon").addClass("hide");
  } else {
    document.getElementById("custom-ssize-switcher").checked = false;
    const event = new Event('change');
    document.getElementById("custom-ssize-switcher").dispatchEvent(event);
    $(".custom-size-controls").addClass("hide");
    $(".widget-icon").removeClass("hide");
  }

  if (settings.is_widget_custom_position == 1) {
    document.getElementById("custom-position-switcher").checked = true;
    const event = new Event('change');
    document.getElementById("custom-position-switcher").dispatchEvent(event);
    $(".custom-position-controls").removeClass("hide");
    $(".widget-position").addClass("hide");
  } else {
    document.getElementById("custom-position-switcher").checked = false;
    const event = new Event('change');
    document.getElementById("custom-position-switcher").dispatchEvent(event);
    $(".custom-position-controls").addClass("hide");
    $(".widget-position").removeClass("hide");
  }

  const colorField = document.getElementById("colorcode");
  if (colorField) {
    colorField.value = settings.widget_color_code;
  }

  const typeOptions = document.querySelectorAll('input[name="aioa_icon_type"]');
  typeOptions.forEach((option) => {
    if (option.value === settings.widget_icon_type) {
      option.checked = true;
    }
  });

  $(document).on("change",'input[name="aioa_icon_type"]', function(){

    var ico_type = $('input[name="aioa_icon_type"]:checked').val();

    var iconImg = "https://www.skynettechnologies.com/sites/default/files/" + ico_type + ".svg";

    $(".iconimg").attr("src", iconImg);

});
  const sizeOptions = document.querySelectorAll('input[name="aioa_icon_size"]');
  sizeOptions.forEach((option) => {
    if (option.value === settings.widget_icon_size) {
      option.checked = true;
    }
  });

  const iconImg = `https://www.skynettechnologies.com/sites/default/files/${settings.widget_icon_type}.svg`;
  $(".iconimg").attr("src", iconImg);

  const widget_icon_size_custom = document.getElementById("widget_icon_size_custom");
  if (widget_icon_size_custom) {
    widget_icon_size_custom.value = settings.widget_icon_size_custom;
  }

  const positionRadio = document.querySelector(`input[name="position"][value="${settings.widget_position}"]`);
  if (positionRadio) {
    positionRadio.checked = true;
  }

  const widget_size = document.querySelector(`input[name="widget_size"][value="${settings.widget_size}"]`);
  if (widget_size) {
    widget_size.checked = true;
  }

  console.log(settings.widget_position_right);
  console.log(settings.widget_position_left);
  console.log(settings.widget_position_bottom);
  console.log(settings.widget_position_top);

  const customPositionXField = document.getElementById("custom_position_x_value");
  const xDirectionSelect = $(".custom-position-controls select")[0];

  if (customPositionXField && xDirectionSelect) {

    if (settings.widget_position_right != null && settings.widget_position_right >= 0) {
      customPositionXField.value = settings.widget_position_right;
      xDirectionSelect.value = "cust-pos-to-the-right";
    } 
    else if (settings.widget_position_left != null && settings.widget_position_left >= 0) {
      customPositionXField.value = settings.widget_position_left;
      xDirectionSelect.value = "cust-pos-to-the-left";
    } 
    else {
      customPositionXField.value = 0;
      xDirectionSelect.value = "cust-pos-to-the-right";
    }

  }

  const customPositionYField = document.getElementById("custom_position_y_value");
  const yDirectionSelect = $(".custom-position-controls select")[1];

  if (customPositionYField && yDirectionSelect) {

    if (settings.widget_position_bottom != null && settings.widget_position_bottom >= 0) {
      customPositionYField.value = settings.widget_position_bottom;
      yDirectionSelect.value = "cust-pos-to-the-lower";
    } 
    else if (settings.widget_position_top != null && settings.widget_position_top >= 0) {
      customPositionYField.value = settings.widget_position_top;
      yDirectionSelect.value = "cust-pos-to-the-upper";
    } 
    else {
      customPositionYField.value = 0;
      yDirectionSelect.value = "cust-pos-to-the-lower";
    }

  }

}


// -----------------------------
// API CALL
// -----------------------------
fetchApiResponse(domain_name);

/* =========================
   FETCH API RESPONSE
========================= */

function fetchApiResponse(domain_name) {

  const apiUrl = "https://ada.skynettechnologies.us/api/widget-settings";

  fetch(apiUrl, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        website_url: domain_name
      })
    })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then((result) => {

      if (result && result.Data && Object.keys(result.Data).length > 0) {

        is_widget_custom_position = result.Data.is_widget_custom_position
        is_widget_custom_size = result.Data.is_widget_custom_size

        const settings = {
          widget_position: result.Data.widget_position || defaultSettings.widget_position,
          widget_color_code: result.Data.widget_color_code || defaultSettings.widget_color_code,
          widget_icon_type: result.Data.widget_icon_type || defaultSettings.widget_icon_type,
          widget_icon_size: result.Data.widget_icon_size || defaultSettings.widget_icon_size,
          widget_size: result.Data.widget_size || defaultSettings.widget_size,
          widget_icon_size_custom: result.Data.widget_icon_size_custom || defaultSettings.widget_icon_size_custom,
          widget_position_top: result.Data.widget_position_top,
          widget_position_bottom: result.Data.widget_position_bottom,
          widget_position_left: result.Data.widget_position_left,
          widget_position_right: result.Data.widget_position_right,
          is_widget_custom_size: result.Data.is_widget_custom_size || 0,
          is_widget_custom_position: result.Data.is_widget_custom_position || 0,
        };

        populateSettings(settings);

      }

    })
    .catch(error => {
      console.error("Error fetching API:", error);
    });

}


/* =========================
   FETCH SETTINGS
========================= */

function fetchSettings() {

  const requestOptions = {
    method: "POST",
    redirect: "follow"
  };

  fetch(`https://ada.skynettechnologies.us/api/widget-settings?website_url=${domain_name}`, requestOptions)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((result) => {

      if (result && result.Data && Object.keys(result.Data).length > 0) {
        console.log("Widget settings fetched:", result.Data);
      }

    })
    .catch((error) => {
      console.error("Error fetching widget settings:", error);
      alert("Failed to fetch settings. Using default values.");
    });

}


/* =========================
   FORM EVENTS
========================= */

$('input[name="position"]').change(function() {
  var icon_position = document.querySelector('input[name="position"]:checked').value;
});

$('input[name="aioa_icon_type"]').change(function() {
  var icon_type = document.querySelector('input[name="aioa_icon_type"]:checked').value;
});

$('input[name="aioa_icon_size"]').change(function() {
  var icon_size = document.querySelector('input[name="aioa_icon_size"]:checked').value;
});


$('#license_key,#colorcode').change(function() {
  var license_key = $("#license_key").val();
  var colorcode = $("#colorcode").val();
});


/* =========================
   SAVE SETTINGS
========================= */

function f1() {

  var server_name = domain;

  var colorcode = $("#colorcode").val();
  var icon_position = document.querySelector('input[name="position"]:checked').value;
  var icon_type = document.querySelector('input[name="aioa_icon_type"]:checked').value;
  var icon_size = document.querySelector('input[name="aioa_icon_size"]:checked').value;
  var widget_size = document.querySelector('input[name="widget_size"]:checked').value;
  var widget_icon_size_custom = $("#widget_icon_size_custom").val();

  const custom_position_x = $("#custom_position_x_value").val() || null;
  const custom_position_y = $("#custom_position_y_value").val() || null;

  const x_position_direction = $(".custom-position-controls select").eq(0).val();
  const y_position_direction = $(".custom-position-controls select").eq(1).val();

  let widget_position_right = null;
  let widget_position_left = null;
  let widget_position_top = null;
  let widget_position_bottom = null;

  if (x_position_direction === "cust-pos-to-the-right") {
    widget_position_right = custom_position_x;
  } else if (x_position_direction === "cust-pos-to-the-left") {
    widget_position_left = custom_position_x;
  }

  if (y_position_direction === "cust-pos-to-the-lower") {
    widget_position_bottom = custom_position_y;
  } else if (y_position_direction === "cust-pos-to-the-upper") {
    widget_position_top = custom_position_y;
  }

  var url = 'https://ada.skynettechnologies.us/api/widget-setting-update-platform';

  var payload = {
    u: server_name,
    widget_position: icon_position,
    is_widget_custom_position: is_widget_custom_position,
    is_widget_custom_size: is_widget_custom_size,
    widget_color_code: colorcode,
    widget_icon_type: icon_type,
    widget_icon_size: icon_size,
    widget_size: widget_size,
    widget_icon_size_custom: widget_icon_size_custom,
    widget_position_right: widget_position_right,
    widget_position_left: widget_position_left,
    widget_position_top: widget_position_top,
    widget_position_bottom: widget_position_bottom
  };

  var xhr = new XMLHttpRequest();
  xhr.open('POST', url, true);
  xhr.setRequestHeader('Content-Type', 'application/json');

  xhr.onload = function () {

    if (xhr.status === 200) {

      try {

        var response = JSON.parse(xhr.responseText);

        if (response.msg) {
          alert(response.msg);
        } else {
          alert('Website Widget Settings saved successfully!');
        }

        location.reload();

      } catch (e) {

        console.error('Invalid JSON response:', xhr.responseText);
        alert('Settings saved, but response format is invalid.');

      }

    } else {

      console.error('HTTP Error:', xhr.status, xhr.statusText);
      alert('Error: Unable to update widget settings.');

    }

  };

  xhr.onerror = function () {
    console.error('Network error');
    alert('Network error. Please check your internet connection.');
  };

  xhr.send(JSON.stringify(payload));

}

</script>


  </x-admin::layouts>
</body>

</html>