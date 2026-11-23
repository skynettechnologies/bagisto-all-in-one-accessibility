{{--
    Tabs above the settings (js/tabs.js):
      Appearance Design   - color, widget size, position, icon type and icon size
      Paid Features       - widget position for mobile, links, widget behavior
      Accessibility Score - scan results of the website
    Printed in the free plan order; on a paid plan AIOA.tabs.setPlan moves them to
    Accessibility Score, Paid Features, Appearance Design.
    The last two show a lock while the website is not on a paid plan.
--}}
@php
    // [id, label, locked on the free plan]
    $tabs = [
        ['appearance', 'Appearance Design', false],
        ['paid', 'Paid Features', true],
        ['score', 'Accessibility Score', true],
    ];
@endphp
<div class="aioa-tabs" role="tablist" aria-label="Settings">
    @foreach ($tabs as $i => $tab)
        <button type="button" role="tab" class="aioa-tab" id="tab-{{ $tab[0] }}" data-tab="{{ $tab[0] }}"
            aria-controls="panel-{{ $tab[0] }}" aria-selected="{{ $i === 0 ? 'true' : 'false' }}" tabindex="{{ $i === 0 ? '0' : '-1' }}">
            <span class="aioa-tab-label">{{ $tab[1] }}</span>
            @if ($tab[2])
                <!-- Lock: shown while the website is not on a paid plan (AIOA.tabs.setPlan) -->
                <span class="aioa-tab-lock" data-tab-lock hidden>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><rect x="5" y="11" width="14" height="10" rx="2" /><path d="M8 11V8a4 4 0 0 1 8 0v3" /></svg>
                    <span class="visually-hidden">(paid plan)</span>
                </span>
            @endif
        </button>
    @endforeach
</div>
