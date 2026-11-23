{{--
    Settings > Icon type
    The icon visitors click to open the widget (aioa-icon-type-1 ... icon_type_count),
    shown in the chosen widget color. Icons are published to public/vendor/allinoneaccessibility/images/icons.
--}}
<section class="aioa-card" aria-labelledby="icon-type-title">
    <h2 id="icon-type-title">Icon type</h2>
    <p class="aioa-desc">The icon visitors click to open the widget.</p>

    <fieldset class="aioa-fieldset">
        <legend class="visually-hidden">Select icon type</legend>
        <div class="aioa-icon-grid">
            @for ($i = 1; $i <= $aioa['icon_type_count']; $i++)
                <div class="aioa-icon-option">
                    <input type="radio" class="aioa-radio" id="edit-type-{{ $i }}" name="aioa_icon_type" value="aioa-icon-type-{{ $i }}" @if ($i === 1) checked @endif />
                    <label for="edit-type-{{ $i }}" class="aioa-icon-label">
                        <span class="aioa-icon"><img src="{{ $iconBase }}aioa-icon-type-{{ $i }}.svg" alt="" width="32" height="32" loading="lazy" /></span>
                        <span class="visually-hidden">Type {{ $i }}</span>
                    </label>
                </div>
            @endfor
        </div>
    </fieldset>
</section>
