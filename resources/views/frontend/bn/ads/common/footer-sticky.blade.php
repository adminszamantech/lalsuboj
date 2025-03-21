{{-- Position 3 = Footer Sticky Ad --}}
@php
    $footerStickyAd = isMobile() ? $mobileAds['commonAds']->where('position', 3)->first() : $ads['commonAds']->where('position', 3)->first();

    /*if (!empty($footerStickyAd)) {
        $cookieKey = '__dp24m-footer-sticky';
        $minuteDifference = 5;  //show after a specific period in minutes
    //        $numberToShow = 3;

        $hasFooterStickyAdTime = false;
        if (!Illuminate\Support\Facades\Cookie::has($cookieKey)) {
            //Time Difference
            Illuminate\Support\Facades\Cookie::queue(Illuminate\Support\Facades\Cookie::make($cookieKey, 'popup-blocker', $minuteDifference, null, null, false, false));
            $hasFooterStickyAdTime = true;
        }
    }*/

    /*$hasFooterStickyAdTime = true;
    if ($footerStickyAd && $footerStickyAd->start_time && $footerStickyAd->end_time && !\Carbon\Carbon::now()->between($footerStickyAd->start_time, $footerStickyAd->end_time)){
        $hasFooterStickyAdTime = false;
    }*/
@endphp

{{--@if($footerStickyAd && $hasFooterStickyAdTime)--}}
@if($footerStickyAd)
    @if($footerStickyAd->type != 4)
    <div class="desktop-footer-sticky-ad footer-ad d-print-none {{ $footerStickyAd->type != 4 ? 'advertisement' : '' }}" style="display: flex; justify-content: center; margin-top: 4px;">
    @else
    <div class="footer-ad d-print-none {{ $footerStickyAd->type != 4 ? 'advertisement' : '' }}" style="text-align: center">
    @endif
        <div class="{{ $footerStickyAd->type != 4 ? 'ad-box' : '' }}"  align="center">
            {{-- Type 1=DFP, 2=Code, 3=Image --}}
            @if($footerStickyAd->type == 3)
                <a href="{{ $footerStickyAd->external_link }}" target="_blank" rel="nofollow">
                    <img src="{{ asset(config('appconfig.adPath').$footerStickyAd->desktop_image_path) }}" alt="Footer Ad">
                </a>
            @else
                {!! $footerStickyAd->code !!}
            @endif
        </div>

        {{--<div class="hidden-md hidden-lg {{ $footerStickyAd->type != 4 ? 'ad-box' : '' }}">
            --}}{{-- Type 1=DFP, 2=Code, 3=Image --}}{{--
            @if($footerStickyAd->type == 3)
                <a href="{{ $footerStickyAd->external_link }}" target="_blank" rel="nofollow">
                    <img src="{{ asset(config('appconfig.adPath').$footerStickyAd->mobile_image_path) }}" alt="Footer Ad">
                </a>
            @else
                {!! $footerStickyAd->code !!}
            @endif
        </div>--}}

        <div class="ad-close-btn" onclick="hideFooterAd()"></div>
        <script type="text/javascript">
            function hideFooterAd() {
                document.querySelector('.footer-ad').style.display = "none";
                document.querySelector('footer').style.paddingBottom = "0";
            }
        </script>
    </div>
@else
    <script>
        document.querySelector('footer').style.paddingBottom = "0";
    </script>
@endif
