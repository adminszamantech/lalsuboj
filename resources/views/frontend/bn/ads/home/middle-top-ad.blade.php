{{-- 1 = Middle Top Ad - home page --}}
@php
    $middleTopAd = $ads['homePageAds']->where('position', 1)->first();

    $hasMiddleTopAdTime = true;
    if ($middleTopAd && $middleTopAd->start_time && $middleTopAd->end_time && !\Carbon\Carbon::now()->between($middleTopAd->start_time, $middleTopAd->end_time)){
        $hasMiddleTopAdTime = false;
    }
@endphp

@if($middleTopAd && $hasMiddleTopAdTime)
    <div class="middle-top-ad pt-4">
        <div class="news_container">
            {{-- Type 1=DFP, 2=Code, 3=Image --}}
            @if($middleTopAd->type == 3)
                <a href="{{ $middleTopAd->external_link }}" target="_blank" rel="nofollow">
                    <img src="{{ asset(config('appconfig.adPath').$middleTopAd->desktop_image_path) }}" class="mx-auto" alt="Middle Top Ad">
                </a>
            @else
                {!! $middleTopAd->code !!}
            @endif
        </div>
    </div>
    
@endif
