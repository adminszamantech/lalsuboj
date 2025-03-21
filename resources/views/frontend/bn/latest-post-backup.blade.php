@extends('frontend.bn.app')

@section('title',  'সর্বশেষ । ঢাকা প্রকাশ')

@section('custom-css')
    <style>
        .red-text{
            color: red;
        }

        .subCat-list {
            display:flex;
            margin-top:3px;
            margin-bottom: 0px!important;
            margin-left: 40px;
            font-size: 15px!important;
            padding: 0px!important;
        }

        .subCat-list li{
            display:block;
            margin-left:6px;
            margin-right:6px;
        }

        .subCat-list span{
            display:block;
            color: #3375AF;
        }

        .subCat-list li a {
            text-decoration: none;
        }

        .subCat-list li a:hover {
            cursor: pointer;
            color: red;
        }

        .common-title {
            display: flex;
        }

        .breadcrumb p {
            margin-bottom: 0px!important;
        }

        .breadcrumb a {
            color: #3375AF;
        }
    </style>
@endsection

{{--@section('customMeta')--}}
{{--    <meta content="500" http-equiv="refresh">--}}
{{--    <link rel="canonical" href="{{url($category->cat_slug)}}">--}}
{{--    <meta name="description" content="{{!empty($category->cat_meta_description) ? $category->cat_meta_description : ''}}">--}}

{{--    <meta property="og:type" content="website" />--}}
{{--    <meta property="og:url" content="{{url($category->cat_slug)}}"/>--}}
{{--    <meta property="og:title" content="{{$category->cat_name_bn. ' । ঢাকা প্রকাশ'}}"/>--}}
{{--    <meta property="og:image" content="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}"/>--}}
{{--    <meta property="og:description" content="{{!empty($category->cat_meta_description) ? $category->cat_meta_description : ''}}"/>--}}

{{--    <meta name="twitter:title" content="{{$category->cat_name_bn. ' । ঢাকা প্রকাশ'}}">--}}
{{--    <meta name="twitter:description" content="{{!empty($category->cat_meta_description) ? $category->cat_meta_description : ''}}">--}}
{{--    <meta name="twitter:image" content="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}">--}}
{{--@endsection--}}

@section('mainContent')
    <div class="main-content marginTop10">
        <div class="container">

            <!-- Top Section -->
            <div class="breadcrumb marginBottom0" style="display: flex!important;white-space: nowrap">
                <div style="display: flex">
                    <a href="{{ url('/') }}"><i class="fa fa-home" style="color: black"></i></a>
                    <span>&raquo;</span>
                    <a href="{{ url('/latest/posts') }}" class="active">সর্বশেষ</a>
                </div>
{{--                @php($subCategories = $category->subcategories)--}}
{{--                <ul class="subCat-list" style="overflow: auto;">--}}
{{--                    @foreach($subCategories as $subCategory)--}}
{{--                        <li>--}}
{{--                            <a href="{{ url($category->cat_slug.'/'.$subCategory->subcat_slug) }}">{{ $subCategory->subcat_name_bn }}</a>--}}
{{--                        </li>--}}
{{--                        <span>{{ !$loop->last ? '|' : null }}</span>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
            </div>

            {{-- Category after breadcrumb ad--}}
            @include('frontend.bn.ads.category.category-top-ad')

            <div class="row marginBottom20 marginTop20 categoryeffect">
                <div class="col-sm-9">
                    <div class="cat-lead-box">
                        @if($contents->count())
                            @php($topCatContent = $contents->shift())
                            @php($sURL = fDesktopURL($topCatContent->content_id, $topCatContent->category->cat_slug, ($topCatContent->subcategory->subcat_slug ?? null), $topCatContent->content_type))
                            <div class="row lead">
                                <div class="col-sm-6">
                                    <div class="imgbox">
                                        <a href="{{ $sURL }}">
                                            <img src="{{ $topCatContent->img_bg_path ? asset(config('appconfig.contentImagePath').$topCatContent->img_bg_path) : asset(config('appconfig.commonImagePath').'bg-default.jpg') }}"  class="img-responsive" alt="{{ $topCatContent->content_heading }}" title="{{ $topCatContent->content_heading }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h3 style="font-size: 26px">
                                        <a href="{{ $sURL }}" title="{{ $topCatContent->content_heading }}">
                                            @if(!empty($topCatContent->video_id) || !empty($topCatContent->podcast_id))
                                                <span class="video-audio-icon">
                                                @if(!empty($topCatContent->video_id))
                                                        <i class="fa fa-play"></i>
                                                    @endif
                                                    @if(!empty($topCatContent->podcast_id))
                                                        <i class="fa fa-volume-up"></i>
                                                    @endif
                                                </span>
                                            @endif
                                            @if($topCatContent->content_sub_heading)
                                                {{--                                                <b class="sub-heading">{{ $topCatContent->content_sub_heading }}</b>--}}
                                                <span class="red-text">{{ $topCatContent->content_sub_heading }}</span> /
                                            @endif
                                            {{ $topCatContent->content_heading }}
                                        </a>
                                    </h3>
                                    <p class="hidden-xs">{{ fGetWord(fFormatString($topCatContent->content_details), 60) }}</p>
                                </div>
                            </div>

                            <div class="cat-box-with-media default-height">
                                <div class="row">

                                    @if($contents)

                                        @foreach($contents as $content)

                                            @php($sURL = fDesktopURL($content->content_id, $content->category->cat_slug, ($content->subcategory->subcat_slug ?? null), $content->content_type))

                                            <div class="col-sm-6">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <div class="imgbox">
                                                            <a href="{{ $sURL }}">
                                                                <img src="{{ $content->img_bg_path ? asset(config('appconfig.contentImagePath').$content->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}"  class="img-responsive" alt="{{ $content->content_heading }}" title="{{ $content->content_heading }}">
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
                                                                @if($content->content_sub_heading)
                                                                    {{--                                                                    <b class="sub-heading">{{ $content->content_sub_heading }}</b>--}}
                                                                    <span class="red-text">{{ $content->content_sub_heading }}</span> /
                                                                @endif
                                                                {{ $content->content_heading }}
                                                            </a>
                                                        </h4>
                                                        <p>
                                                            <small class="text-muted">
                                                                <i class="fa fa-calendar"></i>
                                                                {{ fFormatDateEn2Bn(date('d F Y, h:i a', strtotime($content->created_at))) }}
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            @if($loop->count > $loop->iteration && $loop->iteration % 2 == 0)
                                </div><div class="row">
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif
                        <hr>

                        {{ $contents->links('vendor.pagination.bn-default') }}

                    </div>


                    {{-- Category Bottom Ad--}}
                    @include('frontend.bn.ads.category.category-bottom-ad')

                </div>
                <div class="col-sm-3">
                    {{-- Category Right One Ad--}}
                    @include('frontend.bn.ads.category.category-right-one-ad')

                    <div>
                        @if($otherCatContents->count())
                            <div class="common-title common-title-brown mb-4">
                                <span class="common-title-shape">
                                    <a class="common-title-link" href="{{ url($otherCatContents->first()->category->cat_slug) }}">{{ $otherCatContents->first()->category->cat_name_bn }}</a>
                                </span>
                            </div>
                            <div class="cat-box-with-media default-height">
                                @foreach($otherCatContents as $content)

                                    @php($sURL = fDesktopURL($content->content_id, $content->category->cat_slug, ($content->subcategory->subcat_slug ?? null), $content->content_type))

                                    <div class="media">
                                        <div class="media-left">
                                            <div class="imgbox">
                                                <a href="{{ $sURL }}">
                                                    <img src="{{ $content->img_xs_path ? asset(config('appconfig.contentImagePath').$content->img_xs_path) : asset(config('appconfig.commonImagePath').'xs-default.jpg') }}"  class="img-responsive" alt="{{ $content->content_heading }}" title="{{ $content->content_heading }}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a href="{{ $sURL }}">
                                                    @if($content->content_sub_heading)
                                                        {{--                                                        <b class="sub-heading">{{ $intTopContent->content_sub_heading }}</b>--}}
                                                        <span class="red-text">{{ $content->content_sub_heading }}</span> /
                                                    @endif
                                                    {{ $content->content_heading }}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Category Right Two Ad--}}
                    @include('frontend.bn.ads.category.category-right-two-ad')

                    {{-- Category Right Three Ad--}}
                    @include('frontend.bn.ads.category.category-right-three-ad')
                </div>
            </div>
        </div>
    </div>
@endsection
