{{-- Position 5 = Middle 4 Ad - home page --}}
@php
    $middleFourAd = $ads['homePageAds']->where('position', 5)->first();

    $hasMiddleFourAdTime = true;
    if ($middleFourAd && $middleFourAd->start_time && $middleFourAd->end_time && !\Carbon\Carbon::now()->between($middleFourAd->start_time, $middleFourAd->end_time)){
        $hasMiddleFourAdTime = false;
    }
@endphp

@if($middleFourAd && $hasMiddleFourAdTime)
    <div class="desktop-ad-middle-4 mt-4">
        <div class="{{ $middleFourAd->type != 4 ? 'ad-box' : 'text-center' }}">
            {{-- Type 1=DFP, 2=Code, 3=Image --}}
            @if($middleFourAd->type == 3)
                <a href="{{ $middleFourAd->external_link }}" target="_blank" rel="nofollow">
                    <img src="{{ asset(config('appconfig.adPath').$middleFourAd->desktop_image_path) }}" class="mx-auto" alt="Middle Four Ad">
                </a>
            @else
                {!! $middleFourAd->code !!}
            @endif
        </div>
    </div>
@endif
