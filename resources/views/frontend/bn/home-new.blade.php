@extends('frontend.bn.app')

@section('title', cache('bnSiteSettings')->title)

@section('customMeta')
    <meta content="500" http-equiv="refresh">
    <meta name="description" content="{{ Cache::get('bnSiteSettings')->meta_description }}"/>
    <link rel="canonical" href="{{url('/')}}">
    <meta name="keywords" content="{{ Cache::get('bnSiteSettings')->meta_keyword }}">

    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ url('/') }}"/>
    <meta property="og:title" content="{{ Cache::get('bnSiteSettings')->title }}"/>
    <meta property="og:image"
          content="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}"/>
    <meta property="og:description" content="{{ Cache::get('bnSiteSettings')->meta_description }}"/>

    <meta name="twitter:title" content="{{ Cache::get('bnSiteSettings')->title }}">
    <meta name="twitter:description" content="{{ Cache::get('bnSiteSettings')->meta_description }}">
    <meta name="twitter:image"
          content="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}">

@endsection

@php($bnCacheSettings = Cache::get('bnSiteSettings'))

@section('custom-css')
    @if($breakingContents->count())
        <link rel="stylesheet" href="{{ asset('frontend-assets/plugins/breaking/breaking.css') }}?id=11">
    @endif
@endsection
@section('fb-sdk')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId={{config('appconfig.fb_app_id')}}&autoLogAppEvents=1"></script>
@endsection

@section('mainContent')

    <div class="home-content">
        
        @include('frontend.bn.ads.home.middle-top-ad')
        
        <div class="news_container">
           
            @if(count($specialTopContents) > 0)
                @include('frontend.bn.partials.new-special-top')
            @endif
            
            @include('frontend.bn.ads.home.middle-1-ad')
            
            <!-- National Section --->
            @if(count($nationalContents) > 0)
                @include('frontend.bn.ads.category.category-top-ad')
                @include('frontend.bn.partials.new_national_section')
            @endif
            <!--/ National Section --->


            <!-- Politics Section --->
            @if(count($politicsContents) > 0)
                @include('frontend.bn.partials.new_politics')
            @endif
            <!--/ Politics Section --->

            @include('frontend.bn.ads.home.middle-3-ad')
            
            <!-- Saradesh Section --->
            @if(count($saradeshContents) > 0)
                
                @include('frontend.bn.partials.new_saradesh_section')
            @endif
            <!--/ Saradesh Section --->
            @include('frontend.bn.ads.category.category-top-ad')
            <!-- Sports Section --->
            <!--/ Sports Section --->
                @include('frontend.bn.ads.home.middle-5-ad')
        </div>
       
        <!-- Entertainment Section --->
        @if(count($entertainmentContents) > 0)
        
        <div class="bg-[#eff5f4] py-4 dark:bg-[#26334d] my-8">
            <div class="news_container">
                @if(count($sportsContents) > 0)
                    @include('frontend.bn.partials.new_sports_section')
                @endif
                @include('frontend.bn.partials.new_entertainment')
            </div>
        </div>
        @endif
        <!--/ Entertainment Section --->
        @include('frontend.bn.ads.home.middle-6-ad')
        <div class="news_container">
            
        <!-- International & Economy Section --->
        <div class="news_container mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-b border-custom-bc dark:border-gray-600 pb-4">
                @if($internationalContents->count())
                    <div class="relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                        @include('frontend.bn.partials.new_international')
                    </div>
                @endif
                @if($economyContents->count())
                    <div class="relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                        @include('frontend.bn.partials.new_economy')
                    </div>
                @endif
            </div>
        </div>
           
        <!--/ International Section --->
        </div>
        @include('frontend.bn.ads.home.middle-7-ad')
        <div class="news_container mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-b border-custom-bc dark:border-gray-600 pb-4">
                @if($lawContents->count())
                    <div class="relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                        @include('frontend.bn.partials.new_law_court')
                    </div>
                @endif
                @if($technologyContents->count())
                    <div class="relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                        @include('frontend.bn.partials.new_technology')
                    </div>
                @endif
            </div>
        </div>
        @include('frontend.bn.ads.home.middle-8-ad')
        @include('frontend.bn.ads.category.category-top-ad')
        <div class="news_container mt-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 border-b border-custom-bc dark:border-gray-600 pb-4">
               
                @if($healthContents->count())
                    <div class="relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                        @include('frontend.bn.partials.new_health')
                    </div>
                @endif
                @if($educationContents->count())
                    <div class="relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                        @include('frontend.bn.partials.new_education')
                    </div>
                @endif
                @if($lifestyleContents->count())
                    <div class="">
                        @include('frontend.bn.partials.new_lifestyle')
                    </div>
                @endif
            </div>
            
        </div>
        
        @include('frontend.bn.ads.home.middle-9-ad')
        
        @include('frontend.bn.ads.home.middle-10-ad')
        <!-- Photo Gallery Section --->
        @if(count($photoAlbums) > 0)
           <div class="bg-[#e7e7e7] py-4 dark:bg-[#26334d] my-8">
               <div class="news_container">
                   @include('frontend.bn.partials.new_photo_gallery')
               </div>
           </div>
        @endif
        <!--/ Photo gallery Section --->

    </div>

@endsection

@section('custom-js')
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend-assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
    {{--    <script src="{{ asset('frontend-assets/plugins/countdown/countdown-timer.js') }}?id=1"></script>--}}

    @if($breakingContents->count())
        <script src="{{ asset('frontend-assets/plugins/breaking/breaking.js') }}"></script>
        <script>
            $(window).load(function () {
                jQuery.noConflict();
                $("#breaking-section").breakingNews({
                    effect: "fade",
                    autoplay: true,
                    timer: 3000,
                    color: 'darkred'
                });
            });
        </script>
    @endif


    <script src="{{ asset('frontend-assets/plugins/tab/tab.js') }}?id=123"></script>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@endsection
