{{-- Position 2 = Category Bottom Ad - category page --}}
@php
    $categoryBottomAd = $ads['categoryPageAds']->where('position', 2)->first();

    $hasCategoryBottomAdTime = true;
    if ($categoryBottomAd && $categoryBottomAd->start_time && $categoryBottomAd->end_time && !\Carbon\Carbon::now()->between($categoryBottomAd->start_time, $categoryBottomAd->end_time)){
        $hasCategoryBottomAdTime = false;
    }
@endphp

@if($categoryBottomAd && $hasCategoryBottomAdTime)
    <div class="marginTop20 mt-4 {{ $categoryBottomAd->type != 4 ? 'advertisement' : '' }}">
        @if($categoryBottomAd->type != 4)
        <div style="display: flex; justify-content: center; margin: 10px 0;">
            @endif
            <div class="">
                {{-- Type 1=DFP, 2=Code, 3=Image --}}
                @if($categoryBottomAd->type == 3)
                    <a href="{{ $categoryBottomAd->external_link }}" target="_blank" rel="nofollow">
                        <img src="{{ asset(config('appconfig.adPath').$categoryBottomAd->desktop_image_path) }}" class="mx-auto"  alt="Middle Three Ad">
                    </a>
                @else
                    {!! $categoryBottomAd->code !!}
                @endif
            </div>

        </div>
    </div>
@endif
