{{--
    Settings > Widget color
    Native color picker + hex field + preset colors. The "Live preview" chip and
    the icon previews further down the page take the chosen color (--widget-color).
--}}
<section class="aioa-card" aria-labelledby="color-title">
    <div class="aioa-card-head">
        <div>
            <h2 id="color-title">Widget color</h2>
            <p class="aioa-desc">Pick a color or enter a hex code.</p>
        </div>
        <!-- Live preview: the widget button in the chosen color and icon type -->
        <div class="aioa-live" aria-hidden="true">
            <span class="aioa-live-icon"><img class="iconimg" src="{{ $iconBase }}aioa-icon-type-1.svg" alt="" /></span>
            <span class="aioa-live-text">Live<br>preview</span>
        </div>
    </div>

    <!-- Picker + hex code + reset -->
    <div class="aioa-color-row">
        <input type="color" class="aioa-swatch" id="colorpicker" value="#{{ strtolower($aioa['default_color']) }}" aria-label="Open color picker" />
        <div class="aioa-affix aioa-hex" data-for="colorcode">
            <span class="aioa-affix-text" aria-hidden="true">#</span>
            <input type="text" name="colorcode" id="colorcode" value="{{ $aioa['default_color'] }}" maxlength="7" spellcheck="false" autocomplete="off" aria-label="Hex color code" aria-describedby="colorcode-hint colorcode-error" />
        </div>
        <button type="button" class="aioa-btn" id="color-reset">Reset</button>
    </div>
    <p class="aioa-hint" id="colorcode-hint">For example: FF5733</p>
    <p class="aioa-error" id="colorcode-error" hidden>Enter a valid hex color code, for example FF5733.</p>

    <!-- Presets -->
    <div class="aioa-presets" role="group" aria-label="Preset colors">
        @foreach ($aioa['preset_colors'] as $hex => $name)
            <button type="button" class="aioa-preset" style="--c:#{{ $hex }}" data-color="{{ $hex }}" aria-pressed="false" aria-label="{{ $name . ' #' . $hex }}" title="{{ $name }}"></button>
        @endforeach
    </div>
</section>
