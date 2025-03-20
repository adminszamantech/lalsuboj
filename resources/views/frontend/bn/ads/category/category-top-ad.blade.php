{{-- 1 = Category Top Ad - category page --}}
@php
    $categoryTopAd = $ads['categoryPageAds']->where('position', 1)->first();

    $hasCategoryTopAdTime = true;
    if ($categoryTopAd && $categoryTopAd->start_time && $categoryTopAd->end_time && !\Carbon\Carbon::now()->between($categoryTopAd->start_time, $categoryTopAd->end_time)){
        $hasCategoryTopAdTime = false;
    }
@endphp

@if($categoryTopAd && $hasCategoryTopAdTime)
    <div class="marginTop20 mt-4 {{ $categoryTopAd->type != 4 ? 'advertisement' : '' }}" align="center">
        @if($categoryTopAd->type != 4)
            <div style="display: flex; justify-content: center;">
                @endif
                <div class="hidden-sm hidden-xs {{ $categoryTopAd->type != 4 ? 'ad-box' : '' }}" style="{{ $categoryTopAd->type == 2 ? 'min-width: 728px; max-height: 90px' : '' }}">
                    {{-- Type 1=DFP, 2=Code, 3=Image --}}
                    @if($categoryTopAd->type == 3)
                        <a href="{{ $categoryTopAd->external_link }}" target="_blank" rel="nofollow">
                            <img src="{{ asset(config('appconfig.adPath').$categoryTopAd->desktop_image_path) }}" class="mx-auto" alt="Category Top Ad">
                        </a>
                    @else
                        {!! $categoryTopAd->code !!}
                    @endif
                </div>


            </div>
    </div>
@endif
