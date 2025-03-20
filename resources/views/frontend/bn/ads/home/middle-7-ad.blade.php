{{-- Position 8 = Middle 7 Ad - home page --}}
@php
    $middleSevenAd = $ads['homePageAds']->where('position', 8)->first();

    $hasMiddleSevenAdTime = true;
    if ($middleSevenAd && $middleSevenAd->start_time && $middleSevenAd->end_time && !\Carbon\Carbon::now()->between($middleSevenAd->start_time, $middleSevenAd->end_time)){
        $hasMiddleSevenAdTime = false;
    }
@endphp

@if($middleSevenAd && $hasMiddleSevenAdTime)
    <div class="desktop-ad-middle-7 mt-4">
        <div class="{{ $middleSevenAd->type != 4 ? 'ad-box' : 'text-center' }}">
            {{-- Type 1=DFP, 2=Code, 3=Image --}}
            @if($middleSevenAd->type == 3)
                <a href="{{ $middleSevenAd->external_link }}" target="_blank" rel="nofollow">
                    <img src="{{ asset(config('appconfig.adPath').$middleSevenAd->desktop_image_path) }}" class="mx-auto" alt="Middle Seven Ad">
                </a>
            @else
                {!! $middleSevenAd->code !!}
            @endif
        </div>
    </div>
@endif
