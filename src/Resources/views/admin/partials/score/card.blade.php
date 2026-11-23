{{--
    Accessibility Score card: status, score ring and three figures.
    Included twice by accessibility-score:
      live   - filled by js/score.js from the route action fetchScanDetails ([data-field] elements)
      sample - fixed example values behind the free plan blur (no ids)

    $sample  true for the sample card
--}}
@php
    // Example values for the sample card
    $values = $sample ? [
        'status' => 'Compliant', 'score' => 98,
        'violations-pct' => '86.36%', 'violations-count' => '38 / 44',
        'alt-pct' => '0%', 'alt-count' => '0 / 0',
        'pages' => '13', 'pages-count' => '13 / 13',
    ] : array_fill_keys(['status', 'score', 'violations-pct', 'violations-count', 'alt-pct', 'alt-count', 'pages', 'pages-count'], '');

    // [value field, count field, label]
    $stats = [
        ['violations-pct', 'violations-count', 'Violations Remediated'],
        ['alt-pct', 'alt-count', 'Alt Text Remediated'],
        ['pages', 'pages-count', 'Web Pages Scanned'],
    ];
@endphp
<section class="aioa-card aioa-score" data-level="compliant" @unless ($sample) id="score-card" aria-labelledby="score-title" hidden @endunless>
    <div class="aioa-score-head">
        <h2 @unless ($sample) id="score-title" @endunless>Accessibility Score</h2>
        <p class="aioa-score-status" data-field="status">{{ $values['status'] }}</p>
    </div>

    <div class="aioa-score-body">
        <!-- Score ring: --p is the score in percent -->
        <div class="aioa-donut" style="--p:{{ (int) $values['score'] }}" role="img" aria-label="Accessibility score {{ (int) $values['score'] }}%">
            <svg viewBox="0 0 120 120" aria-hidden="true">
                <circle class="aioa-donut-track" cx="60" cy="60" r="52" />
                <circle class="aioa-donut-bar" cx="60" cy="60" r="52" pathLength="100" />
            </svg>
            <span class="aioa-donut-value" aria-hidden="true"><b data-field="score">{{ $values['score'] }}</b><small>%</small></span>
        </div>

        <div class="aioa-score-stats">
            @foreach ($stats as $stat)
                <div class="aioa-stat">
                    <p class="aioa-stat-value" data-field="{{ $stat[0] }}">{{ $values[$stat[0]] }}</p>
                    <p class="aioa-stat-label">{{ $stat[2] }}</p>
                    <p class="aioa-stat-count" data-field="{{ $stat[1] }}">{{ $values[$stat[1]] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    @unless ($sample)
        <!-- Last scan date and PDF report (when the API has one) -->
        <p class="aioa-score-foot">
            <span data-field="last-scan"></span>
            <a data-field="report" href="#" target="_blank" rel="noopener" hidden>Download PDF report<span class="visually-hidden"> (opens in a new tab)</span></a>
        </p>
    @endunless
</section>
