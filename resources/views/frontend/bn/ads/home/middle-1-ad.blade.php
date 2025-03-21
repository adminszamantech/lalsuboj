{{-- 2 = Middle One Ad - home page --}}
@php
    $middleOneAd = $ads['homePageAds']->where('position', 2)->first();

    $hasMiddleOneAdTime = true;
    if ($middleOneAd && $middleOneAd->start_time && $middleOneAd->end_time && !\Carbon\Carbon::now()->between($middleOneAd->start_time, $middleOneAd->end_time)){
        $hasMiddleOneAdTime = false;
    }
@endphp

@if($middleOneAd && $hasMiddleOneAdTime)
    <div class="marginBottom10">
        {{--@if($middleOneAd->type != 4)
        <div class="header-ad" style="display: flex; justify-content: center; margin: 0 0 10px 0;">
            @endif--}}
            <div class="{{ $middleOneAd->type != 4 ? 'ad-box' : 'text-center' }}">
                {{-- Type 1=DFP, 2=Code, 3=Image --}}
                @if($middleOneAd->type == 3)
                    <a href="{{ $middleOneAd->external_link }}" target="_blank" rel="nofollow">
                        <img src="{{ asset(config('appconfig.adPath').$middleOneAd->desktop_image_path) }}" class="mx-auto" alt="Middle One Ad">
                    </a>
                @else
                    {!! $middleOneAd->code !!}
                @endif
            </div>
            {{--@if($middleOneAd->type != 4)
        </div>
            @endif--}}
    </div>
@endif
