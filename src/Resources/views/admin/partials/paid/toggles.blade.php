{{--
    Paid Features > widget behavior switches (sent as 1 / 0)
      widget_leave_page  Enable External Link Navigation On Widget
      is_sound_disabled  Disable Open Close sound on Widget
--}}
@php
    // [field name, label]
    $toggles = [
        ['widget_leave_page', 'Enable External Link Navigation On Widget'],
        ['is_sound_disabled', 'Disable Open Close sound on Widget'],
    ];
@endphp
<div class="aioa-pair">
    @foreach ($toggles as $toggle)
        <label class="aioa-card aioa-toggle-card" for="{{ $toggle[0] }}">
            <input type="checkbox" role="switch" class="aioa-switch" id="{{ $toggle[0] }}" name="{{ $toggle[0] }}" value="1" />
            <span>{{ $toggle[1] }}</span>
        </label>
    @endforeach
</div>
