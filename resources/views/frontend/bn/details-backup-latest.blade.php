@extends('frontend.bn.app')

@section('title')
    {{$detailsContent->content_heading}}
@endsection
@php
    $sURL = fDesktopURL($detailsContent->content_id,$detailsContent->category->cat_slug,($detailsContent->subcategory ? $detailsContent->subcategory->subcat_slug : null),$detailsContent->content_type);
    $ogImage = url('share-image/'.$detailsContent->category->cat_slug).'?t='.date('Ymdhi').'&imgPath='.$detailsContent->img_bg_path;

@endphp

@section('customMeta')
    <meta content="500" http-equiv="refresh">
    <meta name="description"
          content="{{ !empty($detailsContent->meta_details) ? $detailsContent->meta_details : fGetWord(fFormatString($detailsContent->content_brief),20) }}"/>
    <link rel="canonical" href="{{$sURL}}">
    <meta name="keywords" content="{{ $detailsContent->meta_keywords }}">

    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ $sURL }}"/>
    <meta property="og:title" content="{{ $detailsContent->content_heading }}"/>
    <meta property="og:image" content="{{ $ogImage }}"/>
    <meta property="og:site_name" content="{{ config('app.url') }}"/>
    <meta property="og:description"
          content="{{ !empty($detailsContent->meta_details) ? $detailsContent->meta_details : fGetWord(fFormatString($detailsContent->content_brief),20) }}"/>
    <meta property="article:author" content="{{ url('/') }}"/>

    <meta name="twitter:title" content="{{ $detailsContent->content_heading }}">
    <meta name="twitter:description"
          content="{{ !empty($detailsContent->meta_details) ? $detailsContent->meta_details : fGetWord(fFormatString($detailsContent->content_brief),20) }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "NewsArticle",
		"url" : "{{$sURL}}",
		"mainEntityOfPage":{
			"@type":"WebPage",
			"name" : "{{ $detailsContent->content_heading }}",
			"@id":"{{$sURL}}"
		},
		"headline": "{{ $detailsContent->content_heading }}",
		"image": {
			"@type": "ImageObject",
			"url": "{{ $detailsContent->img_bg_path ? asset(config('appconfig.contentImagePath').$detailsContent->img_bg_path) : asset(config('appconfig.commonImagePath').'bg-default.jpg') }}"
		},
		"datePublished": "{{ date('d F Y, h:i a', strtotime($detailsContent->created_at)) }}",
		"dateModified": "{{ date('d F Y, h:i a', strtotime($detailsContent->updated_at)) }}",
		"author": {
			"@type": "Person",
			"url": "{{$authors->count() ? url('/author/'.$authors->first()->author_slug): url('/')}}",
			"name": "{{$authors->count() ? $authors->first()->author_name_bn : Cache::get('bnSiteSettings')->site_name}}"
		},
		"publisher": {
			"@type": "Organization",
			"name": "{{url('/')}}",
			"logo": {
				"@type": "ImageObject",
				"url": "{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}"
			}
		}
	}



    </script>
    <script type="application/ld+json">
	{
		"@context":"https://schema.org",
		"@type":"BreadcrumbList",
		"itemListElement":[
			{
				"@type":"ListItem",
				"position":1,
				"item":{
					"@id":"{{url('/')}}",
					"name":"Home"
				}
			},
			{
				"@type":"ListItem",
				"position":2,
				"item":{
					"@id":"{{url($detailsContent->category->cat_slug)}}",
					"name":"{{$detailsContent->category->cat_name_bn}}"
				}
			},
			{
				"@type":"ListItem",
				"position":3,
				"item":{
					"name": "{{$detailsContent->content_heading}}",
					"@id":"{{$sURL}}"
				}
			}
		]
	}



    </script>
@endsection

@section('fb-sdk')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_AUS/sdk.js#xfbml=1&version=v12.0&appId={{config('appconfig.fb_app_id')}}&autoLogAppEvents=1"></script>
@endsection

@section('custom-css')
    <style>

        /* Sticky Scroll */
        .col-sm-3.d-print-none {
            position: sticky;
            top: 50px;
        }
        .main-content .container {
            position: relative;
        }
        /* Sticky Scroll */
        figure.image figcaption {
            color: gray;
            font-size: 14px;
            border-bottom: 1px solid #ccc;
            padding: 0px 0px 5px 0px;
            line-height: 22px;
            margin-bottom: 10px;
        }
        .shareSocialIconss span {
            font-size: 12px;
        }
        .print_icon {
            display: inline-block;
            position: absolute;
            top: 5px;
            right: 0px;
        }
        .print_icon a{cursor: pointer;
            font-size: 16px;
            height: 40px;
            padding: 4px 8px;
            text-align: center;
            background-color: #222222;
            border-radius: 50%;
            color: #fff;}
        .socialShare_details a img {
            width: 28px;
            height: 28px;
        }
        .socialShare_details.d-flex a {
            margin-right: 9px;
        }
        div.shareSocialIconss img {
            width: 28px;
            height: 28px;
        }
        div.socialShare_details img, div.socialShare_details svg, div.shareSocialIconss img{
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }
        /*div.socialShare_details img:hover, div.socialShare_details svg:hover, div.shareSocialIconss img:hover {*/
        /*    -webkit-transform: scale(1.4);*/
        /*}*/
        div.socialShare_details img:hover, div.socialShare_details svg:hover, div.shareSocialIconss img:hover {
            /* -webkit-transform: scale(1.4); */
            top: -5px;
            position: relative;
        }

        .d-show-print {
            display: none;
        }

        .inside-news {
            width: 80%;
            margin-left: 9%;
        }

        .social-links_items {
            text-align: center;
            margin-right: -12px !important;
        }
        .postDetail_social h3 {
            text-align: center;
        }
        .social-links_items a:hover {
            color: transparent;
        }
        .social-links_items a {
            margin-right: 10px;
        }
        .social-links_items a:active, .social-links_items a:focus, .social-links_items a:visited {
            color: transparent;
        }
        /* Long Link Text block */
        .news-details .description p a {
            /*display: block;*/
            white-space: pre-wrap; /* css-3 */
            white-space: -moz-pre-wrap; /* Mozilla, since 1999 */
            white-space: -pre-wrap; /* Opera 4-6 */
            white-space: -o-pre-wrap; /* Opera 7 */
            word-wrap: break-word; /* Internet Explorer 5.5+ */
        }
        /* Long Link Text block */
        @media print {
            a[href]:after {
                display: none !important;
                visibility: hidden;
            }

            #veta-version, #back_to_top {
                display: none !important
            }

            .d-show-print {
                display: block;
                border-bottom: 1px solid black !important;
                margin-bottom: 30px !important;
            }
        }




    </style>
@endsection

@section('mainContent')

    <div class="main-content">
        <div class="container marginTop10">
            <!-- Top Section -->
            <p class="breadcrumb marginBottom0">
                <a href="{{ url('/') }}"><i class="fa fa-home"></i></a>
                <span>&raquo;</span>
                <a href="{{ url($detailsContent->category->cat_slug) }}"
                   class="active">{{ $detailsContent->category->cat_name_bn }}</a>
                @if($detailsContent->subcategory)
                    <span>&raquo;</span>
                    <a href="{{ url($detailsContent->category->cat_slug . '/' . $detailsContent->subcategory->subcat_slug) }}"
                       class="active">{{ $detailsContent->subcategory->subcat_name_bn }}</a>
                @endif
            </p>


        <!-- ================= Main Post Details =============== -->
            <div class="row marginBottom20 marginTop20">

                <div class="col-sm-9 single_news" data-href="{{$sURL}}" data-title="{{$detailsContent->content_heading}}" data-description="{{$detailsContent->content_brief}}" data-image_src="{{ url('share-image/'.$detailsContent->category->cat_slug).'?t='.date('Ymdhi').'&imgPath='.$detailsContent->img_bg_path }}" data-nid="{{$detailsContent->content_id}}" id="printArea">
                    <div class="d-show-print">
                        <img class="img-responsive" alt=""
                             src="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}">
                        <hr/>
                    </div>
                    <div class="news-details">
                        @if($detailsContent->content_sub_heading)
                            <b class="sub-heading"
                               style="font-size: 20px; margin-top: 15px;">{{ $detailsContent->content_sub_heading }}</b>
                        @endif
                        <h1>{{ $detailsContent->content_heading }}</h1>

                        <!-- First Author Start --->
                        <div class="marginTop10">
                            <div class="row d-flex align-items-center m-d-flex-none">
                                <div class="col-md-6">
                                    <div class="author-image d-flex align-items-center">
                                        @if($authors->count())
                                            @foreach($authors as $author)
                                                <span style="{{ $loop->iteration > 1 ? 'margin-left: 10px' : '' }}">
                                                    @if($author->img_path)
                                                        <img
                                                            src="{{asset(config('appconfig.authorImagePath').$author->img_path)}}"
                                                            alt="{{$author->author_name_bn}}">
                                                    @else
                                                        <img
                                                            src="{{asset('/media/common/'.Cache::get('bnSiteSettings')->favicon)}}"
                                                            alt="{{ Cache::get('bnSiteSettings')->site_name }}">
                                                    @endif
                                                    <a href="{{url('/author/'.$author->author_slug) }}">{{ $author->author_name_bn }}</a>
                                                </span>
                                                {{ $loop->count > 1 && $loop->iteration == 1 ? ',' : '' }}
                                            @endforeach

                                        @else
                                            <img src="{{asset('/media/common/'.Cache::get('bnSiteSettings')->favicon)}}"
                                                 alt="{{ Cache::get('bnSiteSettings')->site_name }}">
                                            @if($detailsContent->author_name != null)
                                                <a href="javascript:void(0)">{{ $detailsContent->author_name }}</a>
                                            @else
                                                <a href="javascript:void(0)">নতুনদেশ ডেস্ক</a>
                                            @endif
                                        @endif
                                    </div>
                                    <p class="news-time" style="margin: 5px 0">
                                        <i class="fa fa-clock-o"></i> {{ fFormatDateEn2Bn(date('d F Y, h:i a', strtotime($detailsContent->created_at))) }}
                                        {{ $detailsContent->updated_at ? '| আপডেট: ' . fFormatDateEn2Bn(date('d F Y, h:i a', strtotime($detailsContent->updated_at))) : '' }}
                                    </p>
                                </div>
                                <div class="col-md-6 text-right m-text-left d-print-none">
                                    <div class="row m-justify-content-start">
                                        <div class="col-sm-12 col-xs-12" style="margin-bottom: 5px;">
                                            <div class="social-share-box d-print-none" style="position: relative;">
                                                <!-- ShareThis BEGIN -->
                                                <div class="sharethis-inline-share-buttons" data-url="{{ $sURL }}" data-title="{{$detailsContent->content_heading}}"></div>
                                                <!-- ShareThis END -->

                                                <div class="print_icon">
                                                    <a style="cursor:pointer" onclick="printPageArea('printArea')" title="Print news" target="_blank" class="print-butn"><i class="fa fa-print fa-md"></i></a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- First Author Start $sURL --->



                        <hr style="margin: 0 0 12px 0">

                        <div class="imgbox">

                            @if($detailsContent->video_id)
                                @if($detailsContent->video_type == 1)
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <figure class="content-media content-media--video" id="featured-media">
                                            <iframe
                                                src="https://www.youtube.com/embed/{{ $detailsContent->video_id }}?enablejsapi=1&rel=1&showinfo=1&controls=1"
                                                frameborder="0" allowfullscreen></iframe>
                                        </figure>
                                    </div>
                                @elseif($detailsContent->video_type == 2)
                                    <div class="fb-video"
                                         data-href="https://www.facebook.com/watch/?v={{$detailsContent->video_id}}"
                                         data-width="auto" data-autoplay="false" data-show-captions="false"></div>
                                    {{--<div class="fb-video" data-href="https://www.facebook.com/{{ $detailsContent->video_id }}" data-autoplay="false" data-show-text="false" data-show-captions="false" data-allowfullscreen="true"></div>--}}
                                @endif

                            @else
                                <img
                                    src="{{ $detailsContent->img_bg_path ? asset(config('appconfig.contentImagePath').$detailsContent->img_bg_path) : asset(config('appconfig.commonImagePath').'bg-default.jpg') }}"
                                    class="img-responsive" alt="{{ $detailsContent->content_heading }}"
                                    title="{{ $detailsContent->content_heading }}">
                            @endif
                        </div>

                        @if($detailsContent->img_bg_caption)
                            <div class="caption">
                                {{ $detailsContent->img_bg_caption }}
                            </div>
                        @endif


                        <div>
                            @if($detailsContent->tags)
                                @php($tags = explode(',', $detailsContent->tags))
                                @if($tags[0] === 'ম্যান-টি-টোয়েন্টি-ওয়ার্ল্ড-কাপ-২০২২')
                                    <div>
                                        <img src="{{ asset('media/common/Report-Logo_2.png') }}"
                                             alt="Men T20 World Cup-2022"
                                             style="width: 187px!important; height: 88px!important; float: left!important; margin-right: 10px; margin-top: 5px;">
                                    </div>
                                @endif
                            @endif
                            <div class="description firstDescription" style="display: inline!important;">
                                {!! $detailsContent->content_details !!}
                            </div>
                        </div>
                    </div>

                    <div class="d-print-none">
                        <hr>
                        <div class="gist">
                            <p>বিভাগ :
                                <a href="{{ url($detailsContent->category->cat_slug) }}"> {{ $detailsContent->category->cat_name_bn }}</a>
                            </p>

                            @if($detailsContent->tags)
                                @php($tags = explode(',', $detailsContent->tags))
                                <p>বিষয় :
                                    @foreach($tags as $tag)
                                        <a href="{{ url('/topic/'.$tag) }}" class="bg-info"
                                           style="padding: 2px 5px; border-radius: 2px;">{{ $tag }}</a>
                                        @if(!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </p>
                            @endif
                        </div>
                        <hr>
                    </div>

                    <div class="d-print-none" style="padding: .5rem 0">
                        <div class="fb-comments" data-href="{{$sURL}}" data-width="100%"
                             data-numposts="5"></div>
                    </div>

                    {{-- Details after ad--}}
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.details.details-after-ad')
                    @else
                        @include('frontend.bn.ads.details.details-after-ad')
                    @endif


                </div>

                <div class="col-sm-3 d-print-none">

                {{-- Details right one ad --}}
                @if(isMobile())
                    @include('frontend.bn.mobile-ads.details.details-right-one-ad')
                @else
                    @include('frontend.bn.ads.details.details-right-one-ad')
                @endif

                <!-- First Right Side Category Post -->
                    {{--                    @if(!isMobile())--}}
                    <div>
                        <div class="common-title common-title-brown mb-4">
                            <span class="common-title-shape">
                                <span class="common-title-link">এই বিভাগের আরও </span>
                            </span>
                        </div>
                        <div class="cat-box-with-media default-height">

                            @foreach($moreContents as $content)

                                @php($sURL = fDesktopURL($content->content_id, $content->category->cat_slug, ($content->subcategory->subcat_slug ?? null), $content->content_type))

                                <div class="media">
                                    <div class="media-left">
                                        <div class="imgbox">
                                            <a href="{{ $sURL }}">
                                                <img
                                                    src="{{ $content->img_bg_path ? asset(config('appconfig.contentImagePath').$content->img_bg_path) : asset('/media/common/'.Cache::get('bnSiteSettings')->og_image) }}"
                                                    class="img-responsive" alt="{{ $content->content_heading }}"
                                                    title="{{ $content->content_heading }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="{{ $sURL }}">
                                                @if(!empty($content->video_id) || !empty($content->podcast_id))
                                                    <span class="video-audio-icon">
                                                        @if(!empty($content->video_id))
                                                            <i class="fa fa-play"></i>
                                                        @endif
                                                        @if(!empty($content->podcast_id))
                                                            <i class="fa fa-volume-up"></i>
                                                        @endif
                                                    </span>
                                                @endif
                                                {{ $content->content_heading }}
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                            @endforeach

                        </div>

                    </div>


                    {{--                    @endif--}}
                <!-- First Right Side Category Post -->
                    {{-- Details right two ad--}}
                    @if(isMobile())
                        @include('frontend.bn.mobile-ads.details.details-right-two-ad')
                    @else
                        @include('frontend.bn.ads.details.details-right-two-ad')
                    @endif

                    {{-- Details right three ad--}}
{{--                    @if(!isMobile())--}}
                        @include('frontend.bn.ads.details.details-right-three-ad')
{{--                    @endif--}}

                </div>


            </div>

            <!-- ================= Main Post Details =============== -->

            <!-- ================= First Related Post ================= -->

            @if(count($relatedContents) > 0)

                <div class="row related-news d-print-none">
                    <div class="col-sm-12">
                        <div class="common-title common-title-brown mb-4">
                            <span class="common-title-shape">
                                <a class="common-title-link" href="#">আরও পড়ুন</a>
                            </span>
                        </div>
                        <div class="row FlexRow">

                                @foreach($relatedContents as $content)

                                @php($sURL = fDesktopURL($content->content_id, $content->category->cat_slug, ($content->subcategory->subcat_slug ?? null), $content->content_type))

                                <div class="col-sm-3 col-xs-6">
                                    <div class="single_related">
                                        <div class="imgbox">
                                            <a href="{{ $sURL }}" title="{{ $content->content_heading }}">
                                                <img
                                                    src="{{ $content->img_bg_path ? asset(config('appconfig.contentImagePath').$content->img_bg_path) : asset('/media/common/'.Cache::get('bnSiteSettings')->og_image) }}"
                                                    class="img-responsive" alt="{{ $content->content_heading }}"
                                                    title="{{ $content->content_heading }}">
                                            </a>
                                        </div>
                                        <h3>
                                            <a href="{{ $sURL }}" title="{{ $content->content_heading }}">
                                                @if(!empty($content->video_id) || !empty($content->podcast_id))
                                                    <span class="video-audio-icon">
                                                        @if(!empty($content->video_id))
                                                            <i class="fa fa-play"></i>
                                                        @endif
                                                        @if(!empty($content->podcast_id))
                                                            <i class="fa fa-volume-up"></i>
                                                        @endif
                                                    </span>
                                                @endif
                                                {{ $content->content_heading }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>


                                @endforeach
                        </div>
                        {{-- Details Bottom Ad--}}
                        @if(isMobile())
                            @include('frontend.bn.mobile-ads.details.details-bottom-ad')
                        @else
                            @include('frontend.bn.ads.details.details-bottom-ad')
                        @endif
                    </div>
                </div>
            @endif
        <!-- ================= End First Related Post ================= -->

        </div>
    </div>
@endsection

@section('custom-js')


    <script>

        // Specific Content Print
        function printPageArea(areaID){
            var printContent = document.getElementById(areaID).innerHTML;
            printContent  += "</br></br></br><hr><div><img style='margin-bottom: 20px; margin-top: 10px' src='{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}' width='350px' /></br><h3 style='margin: 0;  padding: 0'>ইমেইল: info@dhakaprokash24.com</h3></br></div>";
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        }


    </script>


@endsection
