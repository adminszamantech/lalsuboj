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

    <script type="application/ld+json" data-schema="Organization">{
        "@context":"https://schema.org",
        "@type":"Organization",
        "name":"DhakaProkash24.com",
        "alternateName":"Dhaka Prokash",
        "description": "{{ Cache::get('bnSiteSettings')->meta_description }}",
        "foundingDate":"",
        "url":"{{url('/')}}",
        "sameAs": [
            "https://www.facebook.com/dhakaprokash24",
            "https://twitter.com/dhakaprokash24",
            "https://www.youtube.com/channel/UCeB7K4IRCC_Rb1w5HswUPnQ",
            "https://www.linkedin.com/company/dhakaprokash"
        ],
        "image": [
            "{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}"
        ],
        "logo":{
            "@type": "ImageObject",
            "name" : "Dhaka Prokash",
            "url": "{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}",
            "width": 350 ,
            "height": 60
        },
        "email":"info@dhakaprokash24.com",
        "telephone":"+8809613331010",
        "address":{
            "@type":"PostalAddress",
            "description":"৯৩, কাজী নজরুল ইসলাম এভিনিউ, (ষষ্ঠ তলা) কারওয়ান বাজার, ঢাকা-১২১৫।",
            "postalCode":"1215"
            }
        }



    </script>
    <script type="application/ld+json" data-schema="WebPage">{
        "@type":"Website",
        "name":"Dhaka Prokash",
        "description": "{{ Cache::get('bnSiteSettings')->meta_description }}",
        "url":"{{url('/')}}",
        "interactivityType":"mixed",
        "headline":"{{cache('bnSiteSettings')->title}}",
        "keywords":"{{ Cache::get('bnSiteSettings')->meta_keyword }}",
        "copyrightHolder": {
            "@type":"NewsMediaOrganization",
            "name":"Dhaka Prokash"
        },
        "potentialAction": {
            "@type":"SearchAction",
            "target":{
                "@type": "EntryPoint",
                "urlTemplate": "{{url('search')}}?q={search_term_string}"
            },
            "query-input":"required name=search_term_string"
        },
        "mainEntityOfPage": {
            "@type":"WebPage",
            "@id":"{{url('/')}}"
        },
        "@context":"https://schema.org"
    }



    </script>
@endsection

@php($bnCacheSettings = Cache::get('bnSiteSettings'))

@section('custom-css')
    @if($breakingContents->count())
        <link rel="stylesheet" href="{{ asset('frontend-assets/plugins/breaking/breaking.css') }}?id=11">
    @endif

    <link rel="stylesheet" href="{{ asset('frontend-assets/common/css/home.css') }}?id=13">
@endsection
@section('fb-sdk')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId={{config('appconfig.fb_app_id')}}&autoLogAppEvents=1"></script>
@endsection

@section('mainContent')

    <div class="main-content">
        @if($breakingContents->count())
            <div class="container">
                @include('frontend.bn.common.breaking-marquee')
            </div>
        @endif

        @if(isMobile())
            {{-- Mobile Home One Ad --}}
            @include('frontend.bn.mobile-ads.home.mobile-1-ad')
        @else
            {{-- Middle top Ad --}}
            @include('frontend.bn.ads.home.middle-top-ad')
        @endif

        {{--        Special section content only--}}

        {{--Election Special--}}
            @if($electionData)
                @include('frontend.bn.partials.special_election')
            @endif

        {{--Special Arrangement--}}


        <div class="container">
            {{-- Marquee/scroll news --}}
            {{--@if($breakingContents->count())
                @include('frontend.bn.common.breaking-marquee')
            @endif--}}
            @include('frontend.bn.partials.new-special-top')

            <!-- Top Section -->
            <div class="row marginBottom20 marginTop20">
                <div class="col-sm-9">
                    {{--Special Top Contents--}}
                    @include('frontend.bn.partials.special_top_contents')

                </div>

                {{-- Right bar--}}
                <div class="col-sm-3">
                    {{-- Mobile Home Three Ad --}}
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-3-ad')
                    @endif

                    {{-- Visual Media --}}
                    @include('frontend.bn.layouts.home-top-right-visual-media')

                    {{-- Mobile Home Four Ad --}}
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-4-ad')
                    @endif
                </div>
            </div>


            <!-- Top Section -->
            <div class="row marginBottom20">
                <div class="col-sm-9">

                    {{--Special Other Contents--}}
                    @include('frontend.bn.partials.special_other_contents')



                    {{-- Middle 2 Ad --}}
                    @if(!isMobile())
                        @include('frontend.bn.ads.home.middle-2-ad')
                    @endif


                    <div class="marginBottom20">
                        <div class="marginBottom20">
                            <div class="common-title common-title-brown mb-4">
                            <span class="common-title-shape">
                                <a class="common-title-link" href="{{ url('/national') }}">জাতীয়</a>
                            </span>
                            </div>
                            <div class="cat-box-with-media rem-first-border ">
                                @include('frontend.bn.partials.national_section')
                            </div>
                        </div>
                    </div>

                    @if(isMobile())
                        {{-- Mobile Home Six Ad --}}
                        @include('frontend.bn.mobile-ads.home.mobile-6-ad')
                    @else
                        {{-- Middle 3 Ad --}}
                        @include('frontend.bn.ads.home.middle-3-ad')
                    @endif

                    <div class="row marginBottom20">
                        <div class="col-sm-4 marginBottom20">
                            <div class="common-title common-title-brown mb-4">
                                <span class="common-title-shape">
                                    <a class="common-title-link" href="{{ url('/politics') }}">রাজনীতি</a>
                                </span>
                            </div>
                            <div class="cat-box-with-media default-height no-left">
                                @include('frontend.bn.partials.politics_section')
                            </div>
                            {{-- Mobile Home Seven Ad --}}
                            @if(isMobile())
                                @include('frontend.bn.mobile-ads.home.mobile-7-ad')
                            @endif
                        </div>

                        <div class="col-sm-4 marginBottom20">
                            <div class="common-title common-title-brown mb-4">
                                <span class="common-title-shape">
                                    <a class="common-title-link" href="{{ url('/economy') }}">অর্থনীতি</a>
                                </span>
                            </div>
                            <div class="cat-box-with-media default-height no-left">
                                @include('frontend.bn.partials.economic_section')
                            </div>
                            {{-- Mobile Home Eight Ad --}}
                            @if(isMobile())
                                @include('frontend.bn.mobile-ads.home.mobile-8-ad')
                            @endif
                        </div>

                        <div class="col-sm-4 marginBottom20">
                            <div class="common-title common-title-brown mb-4">
                                <span class="common-title-shape">
                                    <a class="common-title-link" href="{{ url('/international') }}">সারাবিশ্ব</a>
                                </span>
                            </div>
                            <div class="cat-box-with-media default-height no-left">
                                @include('frontend.bn.partials.international_section')
                            </div>
                        </div>
                    </div>

                    {{-- Middle 4 Ad --}}
                    @if(!isMobile())
                        @include('frontend.bn.ads.home.middle-4-ad')
                    @endif
                </div>

                {{-- Right bar--}}
                <div class="col-sm-3">
                    {{--@include('frontend.bn.ads.home.countdown')--}}

                    @if(isMobile())
                        {{-- Mobile Home Nine Ad --}}
                        @include('frontend.bn.mobile-ads.home.mobile-9-ad')
                    @else
                        {{-- Home Page Right One Ad--}}
                        @include('frontend.bn.ads.home.right-1-ad')
                    @endif

                    {{-- Home Page Right Two Ad--}}
                    @if(!isMobile())
                        @include('frontend.bn.ads.home.right-2-ad')
                    @endif

                    {{-- Countdown area--}}

                    <!-- Tab links -->
                    <div class="marginBottom20" style="box-shadow: 0 2px 1px 1px #d5d5d5;">
                        @include('frontend.bn.layouts.latestPopularBox')

                    </div>


                    @if(isMobile())
                        {{-- Mobile Home Ten Ad --}}
                        @include('frontend.bn.mobile-ads.home.mobile-10-ad')
                    @else
                        {{-- Home Page Right Three Ad--}}
                        @include('frontend.bn.ads.home.right-3-ad')
                    @endif


                    <!--============ Home Page Right Four Ad ============-->
                    @if(!isMobile())
                        @include('frontend.bn.ads.home.right-4-ad')
                    @endif
                    <!--============ Home Page Right Four Ad ============-->


                    <!--============ Home Page Right Five Ad ============-->

                    @if(!isMobile())
                        @include('frontend.bn.ads.home.right-5-ad')
                    @endif
                    <!--============ Home Page Right Five Ad ============-->

                    {{-- Home Page Right Six Ad--}}
                    {{--@if(!isMobile())--}}
                    {{--@include('frontend.bn.ads.home.right-6-ad')--}}
                    {{--@endif--}}


                    {{-- Home Page Right Seven Ad--}}
                    @if(!isMobile())
                        @include('frontend.bn.ads.home.right-7-ad')
                    @endif

                </div>
            </div>

            {{--Special Report--}}
            <div class="row marginBottom20">
                <div class="col-sm-12">
                    <div class="common-title common-title-brown mb-4">
                    <span class="common-title-shape">
                        <a class="common-title-link" href="{{ url('/special-report') }}">বিশেষ প্রতিবেদন</a>
                    </span>
                    </div>
                    <div class="cat-box-with-media rem-first-border">
                        @include('frontend.bn.partials.special_report_section')
                    </div>
                </div>
            </div>

            @if(isMobile())
                {{-- Mobile Home Eleven Ad --}}
                @include('frontend.bn.mobile-ads.home.mobile-11-ad')
            @endif
            <!-- Category Section -->
            <div class="row marginBottom20">
                {{--Sports--}}
                <div class="col-sm-9">
                    <div class="common-title common-title-brown mb-4">
                        <span class="common-title-shape">
                            <a class="common-title-link" href="{{ url('/sports') }}">খেলা</a>
                        </span>
                    </div>
                    <div class="cat-box-with-media rem-first-border ">
                        @include('frontend.bn.partials.sports_section')
                    </div>

                    @if(isMobile())
                        {{-- Mobile Home 12 Ad --}}
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif
                </div>

                {{--Saradesh--}}
                <div class="col-sm-3">
                    <div>
                        <div class="common-title common-title-brown mb-4">
                            <span class="common-title-shape">
                                <a class="common-title-link" href="{{ url('/saradesh') }}">সারাদেশ</a>
                            </span>
                        </div>
                        <div class="cat-box-with-media default-height rem-first-border">
                            @include('frontend.bn.partials.saradesh_section')
                        </div>
                    </div>
                </div>

                {{-- Mobile Home Eleven Ad --}}
                {{-- @include('frontend.bn.mobile-ads.home.mobile-11-ad')--}}
            </div>

{{--            @if(isMobile())--}}
{{--                 Mobile Home 12 Ad --}}
{{--                @include('frontend.bn.mobile-ads.home.mobile-12-ad')--}}
{{--            @else--}}
{{--                 Middle 5 Ad --}}
{{--                @include('frontend.bn.ads.home.middle-5-ad')--}}
{{--            @endif--}}

            <!-- Category Section -->

                <div class="col-md-12 col-sm-12">
                    @include('frontend.bn.ads.home.middle-5-ad')
                </div>
                {{--Entertainment--}}
                <div class="col-sm-9">
                    <div class="common-title common-title-brown mb-4">
                        <span class="common-title-shape">
                            <a class="common-title-link" href="{{ url('/entertainment') }}">বিনোদন</a>
                        </span>
                    </div>

                    <div class="cat-box-with-media">
                        @include('frontend.bn.partials.entertainment_section')
                    </div>
                </div>

                {{--Lifestyle--}}
                <div class="col-sm-3">
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif
                    <div>
                        <div class="common-title common-title-brown mb-4">
                            <span class="common-title-shape">
                                <a class="common-title-link" href="{{ url('/lifestyle') }}">লাইফস্টাইল</a>
                            </span>
                        </div>
                        <div class="cat-box-with-media default-height rem-first-border marginBottom20">
                            @include('frontend.bn.partials.lifestyle_section')
                        </div>
                    </div>
                </div>
            </div>

        </div>
            @if(isMobile())
                {{-- Mobile Home 12 Ad --}}
                @include('frontend.bn.mobile-ads.home.mobile-12-ad')
            @else
                {{-- Middle 6 Ad --}}
                @include('frontend.bn.ads.home.middle-6-ad')
            @endif


        @if(isMobile())
            @include('frontend.bn.mobile-ads.home.mobile-12-ad')
        @endif
        {{-- English Section --}}


        @if(isMobile())
            @include('frontend.bn.mobile-ads.home.mobile-12-ad')
        @else
            {{-- Middle 7 Ad --}}
            @include('frontend.bn.ads.home.middle-7-ad')
        @endif


        <div class="container marginTop20">

            <!-- Category Section -->
            <div class="row marginBottom20">
                {{--Law and Judiciary--}}
                <div class="col-sm-9">
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif
                    <div class="common-title common-title-brown mb-4">
                        <span class="common-title-shape">
                            <a class="common-title-link" href="{{ url('/law-court') }}">আইন আদালত </a>
                        </span>
                    </div>

                    <div class="cat-box-with-media">
                        @include('frontend.bn.partials.law_and_judiciary_section')
                    </div>
                </div>


                {{--Health--}}
                <div class="col-sm-3">
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif
                    <div>
                        <div class="common-title common-title-brown mb-4">
                            <span class="common-title-shape">
                                <a class="common-title-link" href="{{ url('/crime') }}">অপরাধ </a>
                            </span>
                        </div>
                        <div class="cat-box-with-media default-height rem-first-border marginBottom20">
                            @include('frontend.bn.partials.crime_section')
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Category Section -->

            <!-- 3 Category Section -->
            <div class="row marginBottom20">
                <div class="col-sm-6">
                    <div class="common-title common-title-brown mb-4">
                        <span class="common-title-shape">
                          <a class="common-title-link" href="{{ url('/technology') }}">বিজ্ঞান-তথ্যপ্রযুক্তি </a>
                        </span>
                    </div>
                    @if($technologyContents)
                        @include('frontend.bn.partials.technology_section')
                    @endif
                </div>

                <div class="col-sm-3">
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif
                    <div class="common-title common-title-brown mb-4">
                        <span class="common-title-shape">
                            <a class="common-title-link" href="{{ url('/career') }}">ক্যারিয়ার </a>
                        </span>
                    </div>
                    <div class="cat-box-with-media default-height no-left">
                        @include('frontend.bn.partials.career_section')
                    </div>
                </div>

                <div class="col-sm-3">
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif
                    <div class="common-title common-title-brown mb-4">
                        <span class="common-title-shape">
                          <a class="common-title-link" href="{{ url('/campus') }}">ক্যাম্পাস </a>
                        </span>
                    </div>
                    <div class="cat-box-with-media default-height no-left">
                        @include('frontend.bn.partials.campus_section')
                    </div>
                </div>
            </div>
            <!-- 3 Category Section End -->

            <!-- Video Section -->
            {{--@include('frontend.bn.partials.video_section')--}}

            @if(isMobile())
                @include('frontend.bn.mobile-ads.home.mobile-12-ad')
            @else
                {{-- Middle 8 Ad --}}
                @include('frontend.bn.ads.home.middle-8-ad')
            @endif

            {{-- Mobile Home Sixteen Ad --}}
            {{--            @include('frontend.bn.mobile-ads.home.mobile-16-ad')--}}

            <div class="row marginBottom20">
                {{--Culture--}}
                <div class="col-sm-3">
                    <div class="common-title common-title-brown mb-4">
                    <span class="common-title-shape">
                        <a class="common-title-link" href="{{ url('/art-culture') }}">শিল্প-সংস্কৃতি</a>
                    </span>
                    </div>
                    <div class="cat-box-with-media default-height no-left">
                        @include('frontend.bn.partials.culture_section')
                    </div>
                </div>

                {{--Health--}}
                <div class="col-sm-3">
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif
                    <div class="common-title common-title-brown mb-4">
                    <span class="common-title-shape">
                        <a class="common-title-link" href="{{ url('/health') }}">স্বাস্থ্য</a>
                    </span>
                    </div>
                    <div class="cat-box-with-media default-height no-left">
                        @include('frontend.bn.partials.health_section')
                    </div>

                    {{-- Mobile Home Fifteen Ad --}}
                    {{--@include('frontend.bn.mobile-ads.home.mobile-15-ad')--}}
                </div>

                {{--Education--}}
                <div class="col-sm-3">
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif
                    <div class="common-title common-title-brown mb-4">
                    <span class="common-title-shape">
                        <a class="common-title-link" href="{{ url('/education') }}">শিক্ষা</a>
                    </span>
                    </div>
                    <div class="cat-box-with-media default-height no-left">
                        @include('frontend.bn.partials.education_section')
                    </div>
                </div>

                {{--Religion--}}
                <div class="col-sm-3">
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif
                    <div class="common-title common-title-brown mb-4">
                    <span class="common-title-shape">
                        <a class="common-title-link" href="{{ url('/religion') }}">ধর্ম</a>
                    </span>
                    </div>
                    <div class="cat-box-with-media default-height no-left">
                        @include('frontend.bn.partials.religion_section')
                    </div>
                </div>
            </div>

            @if(isMobile())
                @include('frontend.bn.mobile-ads.home.mobile-12-ad')
            @endif

            <div class="row marginBottom20">
                {{--Child and Adolescent--}}
                <div class="col-sm-3">
                    <div class="common-title common-title-brown mb-4">
                    <span class="common-title-shape">
                        <a class="common-title-link" href="{{ url('/child-adolescent') }}">শিশু-কিশোর</a>
                    </span>
                    </div>
                    <div class="cat-box-with-media default-height no-left">
                        @include('frontend.bn.partials.children_section')
                    </div>
                </div>

                {{--Motivation--}}
                <div class="col-sm-3">
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif
                    <div class="common-title common-title-brown mb-4">
                    <span class="common-title-shape">
                        <a class="common-title-link" href="{{ url('/motivation') }}">মোটিভেশন</a>
                    </span>
                    </div>
                    <div class="cat-box-with-media default-height no-left">
                        @include('frontend.bn.partials.motivation_section')
                    </div>
                </div>

                {{--Probash--}}
                <div class="col-sm-3">
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif
                    <div class="common-title common-title-brown mb-4">
                    <span class="common-title-shape">
                        <a class="common-title-link" href="{{ url('/probash') }}">প্রবাস</a>
                    </span>
                    </div>
                    <div class="cat-box-with-media default-height no-left">
                        @include('frontend.bn.partials.probash_section')
                    </div>
                </div>

                {{--Corporate--}}
                <div class="col-sm-3">
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif

                    <div class="common-title common-title-brown mb-4">
                    <span class="common-title-shape">
                        <a class="common-title-link" href="{{ url('/corporate') }}">করপোরেট কর্নার</a>
                    </span>
                    </div>
                    <div class="cat-box-with-media default-height no-left">
                        @include('frontend.bn.partials.corporate_section')
                    </div>
                </div>
            </div>

            @if(isMobile())
                @include('frontend.bn.mobile-ads.home.mobile-12-ad')
            @else
                {{-- Middle 9 Ad --}}
                @include('frontend.bn.ads.home.middle-9-ad')
            @endif
        <!-- 3 Category Section -->
            <!--
            <div class="row marginBottom20">
                <div class="col-sm-6">
                    <div class="common-title common-title-brown mb-4">
                        <span class="common-title-shape">
                          <a class="common-title-link" href="{{ url('/literature') }}">সাহিত্য </a>
                        </span>
                    </div>
                    @include('frontend.bn.partials.literature_section')

                    @if(isMobile())
                        {{-- Mobile Home 12 Ad --}}
                        @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                    @endif
                </div>
                <div class="col-sm-3">
                    <div class="common-title common-title-brown mb-4">
                    <span class="common-title-shape">
                      <a class="common-title-link" href="{{ url('/opinion') }}">মতামত </a>
                    </span>
                    </div>
                    <div class="cat-box-with-media default-height no-left">
                        @include('frontend.bn.partials.opinion_section')
                    </div>
                </div>
                {{-- Mobile Home Twelve Ad --}}
                @if(isMobile())
                    {{-- Mobile Home 12 Ad --}}
                    @include('frontend.bn.mobile-ads.home.mobile-12-ad')
                @endif

                <div class="col-sm-3">
                    <div class="common-title common-title-brown mb-4">
                    <span class="common-title-shape">
                        <a class="common-title-link" href="{{ url('/special-article') }}">বিশেষ নিবন্ধ </a>
                    </span>
                    </div>
                    <div class="cat-box-with-media default-height no-left">
                        @include('frontend.bn.partials.special_article_section')
                    </div>
                </div>
            </div> -->
            <!-- 3 Category Section End -->
        </div>


        {{--Photo Gallery--}}
        @include('frontend.bn.partials.photo_gallery')

        @if(isMobile())
            @include('frontend.bn.mobile-ads.home.mobile-12-ad')
        @else
            {{-- Middle 9 Ad --}}
            @include('frontend.bn.ads.home.middle-9-ad')
        @endif
{{--    </div>--}}

{{--    @include('frontend.bn.ads.common.site-block-ad')--}}
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

    <script>
        let showModal = (title, videoType, videoID) => {
            let modal = document.createElement('div');
            modal.className = "modal";
            modal.id = "popup-video";
            modal.setAttribute("tabindex", "-1");
            modal.setAttribute("role", "dialog");
            modal.setAttribute("aria-labelledby", "popup-video-label");

            let modalDialog = document.createElement('div');
            modalDialog.className = "modal-dialog modal-lg";
            modalDialog.setAttribute("role", "document");

            let modalHeader = document.createElement('div');
            modalHeader.className = "modal-header";
            modalHeader.style.background = '#FFF';

            let modalBody = document.createElement('div');
            modalBody.className = "modal-body";
            modalBody.style.background = '#FFF';

            modalHeader.innerHTML = `<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                     <h4 class="modal-title" id="myModalLabel">${title}</h4>`;

            if (videoType == 1) {
                modalBody.innerHTML = `<div class="embed-responsive embed-responsive-16by9">
                            <figure class="content-media content-media--video" id="featured-media">
                                <iframe src="https://www.youtube.com/embed/${videoID}?enablejsapi=1&rel=1&showinfo=1&controls=1&autoplay=1&mute=1" frameborder="0" allowfullscreen data-width="220" allow='autoplay'></iframe>
                            </figure>
                        </div>`;
            } else {
                modalBody.innerHTML = `<iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https://www.facebook.com/dhakaprokash24/videos/${videoID}&show_text=false&width=560&t=0&autoplay=true" width="100%" height="480" style="border:none;overflow:hidden" allowfullscreen="true" allow="autoplay;" allowFullScreen="true"></iframe>`;
            }

            modalDialog.append(modalHeader);
            modalDialog.append(modalBody);
            modal.append(modalDialog);

            document.body.append(modal);

            $('#popup-video').modal('show');

            $('#popup-video').on('hide.bs.modal', function (e) {
                document.getElementById('popup-video').remove();
            })
        };
    </script>

    <script src="{{ asset('frontend-assets/plugins/tab/tab.js') }}?id=123"></script>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>



        $(document).ready(function () {
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";

            $('.leftLst, .rightLst').click(function () {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });

            ResCarouselSize();

            $(window).resize(function () {
                ResCarouselSize();
            });

            //this function define the size of the items
            function ResCarouselSize() {
                var itemClass = ('.item');
                var id = 0;
                var sampwidth = $(itemsMainDiv).width();
                $(itemsDiv).each(function () {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;

                    $(this).parent().attr("id", "MultiCarousel" + id);

                    itemWidth = sampwidth / 1;

                    $(this).css({'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers});
                    $(this).find(itemClass).each(function () {
                        $(this).outerWidth(itemWidth);
                    });

                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");

                });
            }

            //this function used to move the items
            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");

                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                } else if (e == 1) {
                    var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");

                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            //It is used to get some elements from btn
            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }
        });
    </script>
@endsection
