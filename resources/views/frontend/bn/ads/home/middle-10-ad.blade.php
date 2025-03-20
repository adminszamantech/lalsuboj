{{-- Position 10 = Middle 10 Ad - home page --}}
@php
    $middleTenAd = $ads['homePageAds']->where('position', 10)->first();

    $hasMiddleTenAdTime = true;
    if ($middleTenAd && $middleTenAd->start_time && $middleTenAd->end_time && !\Carbon\Carbon::now()->between($middleTenAd->start_time, $middleTenAd->end_time)){
        $hasMiddleTenAdTime = false;
    }
@endphp

@if($middleTenAd && $hasMiddleTenAdTime)
    <div class="desktop-middle-10 mt-4">
        <div class="{{ $middleTenAd->type != 4 ? 'ad-box' : 'text-center' }}">
            {{-- Type 1=DFP, 2=Code, 3=Image --}}
            @if($middleTenAd->type == 3)
                <a href="{{ $middleTenAd->external_link }}" target="_blank" rel="nofollow">
                    <img src="{{ asset(config('appconfig.adPath').$middleTenAd->desktop_image_path) }}" class="mx-auto" alt="Middle Ten Ad">
                </a>
            @else
                {!! $middleTenAd->code !!}
            @endif
        </div>
    </div>
@endif
