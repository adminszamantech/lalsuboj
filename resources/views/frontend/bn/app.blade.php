<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Notundesh24')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('/media/common/'.Cache::get('bnSiteSettings')->favicon)}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('frontend-assets/common/css/style.css') }}">
    <style>
        body {
            overflow-x: auto; /* Must be 'scroll' not 'auto' */
            -webkit-overflow-scrolling: touch;
        }
    </style>
    @yield('custom-css')
    <meta content="500" http-equiv="refresh">
    <meta property="fb:pages" content="2273091126341395" />
    <meta property="fb:app_id" content="{{config('appconfig.fb_app_id')}}"/>
    <meta property="og:site_name" content="{{ config('app.url') }}"/>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@notundesh24">
    <meta name="robots" content="index,follow">
    @yield('customMeta')
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=67d9544354a3d000192a4590&product=inline-share-buttons&source=platform" async="async"></script>
    {{-- <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=66e16872abc00d00197bffed&product=inline-share-buttons' async='async'></script> --}}
    <!-- Load ShareThis  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>


@yield('fb-sdk')

<div id="news_wrapping">
    @include('frontend.bn.ads.common.top-banner-ad')
    @include('frontend.bn.common.header')
    @include('frontend.bn.common.mobile-header')

    <div class="main-content">
        @yield('mainContent')
    </div>

    @include('frontend.bn.common.footer')
</div>

@yield('custom-js')

<!-- Custom js -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
</script>
</body>
</html>



