<header class="d-print-none">
    {{-- Header Top Banner Ad--}}
    @include('frontend.bn.ads.common.top-banner-ad')

    <div class="scrollmenu sidenav" id="mySidenav">

        <!-- <div class="header-info">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 hidden-xs">

                        @php
                            $bn= new \App\Http\Controllers\Frontend\BanglaDateController(time(), 24);
                            // $bn= new \App\Http\Controllers\Frontend\BanglaDateController(time(), 0);
                              $bnDate=$bn->get_date();

                              $enDate = $bn->fFormatDate(date('l, d F Y'));
                        @endphp

                        <small style="display: block;">
                            <i class="fa fa-map-marker"></i> ঢাকা &nbsp;
                            <i class="fa fa-calendar"></i> {{ $enDate }}
                            | {{ $bnDate[0]." ".$bnDate[1]." ".$bnDate[2] }}
                        </small>

                        {{--<small style="display: block;">
                            <i class="fa fa-map-marker"></i> ঢাকা &nbsp;
                            <i class="fa fa-calendar"></i> {{ (new \App\Http\Controllers\Frontend\BanglaDateController())->fFormatDate(date('l, d F Y')) }}
                        </small>--}}
                    </div>
                    <div class="col-sm-8 text-right d-flex align-items-center justify-content-end m-flex-direction-column">
                        <div class="search-container">
                            <form class="search_submit" target="_blank" action="{{url('search')}}" method="get" id="cse-search-box" role="search">
                                <div class="input-group input-group-sm">
                                    <input class="form-control search_submit" placeholder="অনুসন্ধানের জন্য লিখুন..." name="q" id="q" type="text">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" id="sa" name="sa" value=""><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>

                            {{--<button type="button" class="btn toggleSearchForm">
                                <i class="fa fa-search"></i>
                            </button>--}}
                        </div>

                        <div class="social-widgets d-flex align-items-center">
                            <a class="facebook" style="font-size: 20px;padding: 0px 8px;" href="https://www.facebook.com/dhakaprokash24" target="_blank" rel="nofollow">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a class="twitter" style="font-size: 20px;padding: 0px 8px; display: flex" href="https://twitter.com/dhakaprokash24" target="_blank" rel="nofollow">
                                <svg height="18" width="18" viewBox="0 0 24 24" aria-hidden="true" class="r-k200y r-18jsvk2 r-4qtqp9 r-yyyyoo r-5sfk15 r-dnmrzs r-kzbkwu r-bnwqim r-1plcrui r-lrvibr"><g><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></g></svg>
{{--                                <i class="fa fa-twitter"></i>--}}
                            </a>

                            <a class="youtube" style="font-size: 20px;padding: 0px 8px;" href="https://www.youtube.com/c/DhakaProkash" target="_blank" rel="nofollow">
                                <i class="fa fa-youtube-play"></i>
                            </a>

                            <a class="instagram" style="font-size: 20px;padding: 0px 8px;" href="https://www.instagram.com/dhakaprokash24/" target="_blank" rel="nofollow">
                                <i class="fa fa-instagram"></i>
                            </a>

                            <a class="linkedin" style="font-size: 20px;padding: 0px 8px;" href="https://www.linkedin.com/company/dhakaprokash" target="_blank" rel="nofollow">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="container">
            <div class="flex justify-between items-center">
                <div>
                    @php
                        $bn= new \App\Http\Controllers\Frontend\BanglaDateController(time(), 24);
                        // $bn= new \App\Http\Controllers\Frontend\BanglaDateController(time(), 0);
                          $bnDate=$bn->get_date();

                          $enDate = $bn->fFormatDate(date('l, d F Y'));
                    @endphp
                    <p style="display: block;">
                        {{ $enDate }}
                    </p>
                </div>
                <div>
                    <a href="{{ url('/') }}">
                        <img class="w-[400px]" src="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}" alt="{{ Cache::get('bnSiteSettings')->site_name }}">
                    </a>
                </div>
                <div>
                    <div class="flex flex-row items-center bg-gray-200 dark:bg-black px-4 py-2 rounded-full gap-4">
                        <div class="bg-white dark:bg-transparent rounded-full px-1 py-1 cursor-pointer" id="light_mode">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-8 h-8 dark:text-white text-red-500" role="button" title="Light Mode"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div class="rounded-full dark:bg-gray-200 px-1 py-1 cursor-pointer" id="dark_mode">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-8 h-8 dark:text-red-500 text-black" role="button" title="Dark Mode"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="container header-container paddingTopBottom10 hidden-xs">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-12 text-center">--}}
{{--                    <a href="{{ url('/') }}" class="lg-logo">--}}
{{--                        <img src="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}" alt="{{ Cache::get('bnSiteSettings')->site_name }}" style="width:350px;padding: 15px 0;">--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}

        <div id="stickyTopMenu">
            <span class="closebtn" onclick="closeNav('mySidenav')">&times;</span>
            <div class="menu_container">
                <div class="container">
                    <ul>
                        <li class="{{ !request()->segment(1) ? 'active' : '' }}">
                            <a href="{{ url('') }}"><i class="fa fa-home"></i></a>
                        </li>
                        <li class="{{ request()->is('latest/posts')  ? 'active' : '' }}">
                            <a href="{{ url('/latest/posts') }}">সর্বশেষ</a>
                        </li>
                        @php
                            $categories = bnHeaderCategory();
                            $topCategories = $categories->take(12)->pluck('cat_slug')->toArray();
                        @endphp
                        @foreach($categories as $category)
                            @if(in_array($category->cat_slug, $topCategories))
                                <li class="{{ request()->segment(1) == $category->cat_slug ? 'active' : '' }}">
                                    <a href="{{ url('/'.$category->cat_slug) }}">{{ $category->cat_name_bn }}</a></li>
                            @else
                                <li class="{{ request()->segment(1) == $category->cat_slug ? 'active' : '' }} visible-xs">
                                    <a href="{{ url('/'.$category->cat_slug) }}">{{ $category->cat_name_bn }}</a></li>
                            @endif
                        @endforeach
                        <li class="visible-xs">
                            <a href="{{ url('/archive') }}">আর্কাইভ</a>
                        </li>
                    </ul>

                    <div class="all_category_btn hidden-xs">
                        <span onclick="open_mega_menu('all_category')"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp; সব </span>
                        <div class="all_category" id="all_category">
                            <div class="container">
                                <span class="caretd" onclick="close_mega_menu('all_category');">
                                    <i class="fa fa-close"></i>
                                </span>
                                <ul class="row">
                                    @foreach($categories as $category)
                                        <li class="col-sm-2 {{in_array($category->cat_slug, $topCategories) ? 'visible-xs': ''}}">
                                            <a href="{{ url('/'.$category->cat_slug) }}">{{ $category->cat_name_bn }}</a>
                                        </li>
                                    @endforeach
                                    <li class="col-sm-2"><a href="{{ url('/photo') }}">ফটো গ্যালারি</a></li>
                                    <li class="col-sm-2"><a href="{{ url('/archive') }}">আর্কাইভ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-menu visible-xs clearfix">
        <div style="display: flex; align-items: center; margin: 0 10px">
            <div onclick="openNav('mySidenav')">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <a href="{{ url('/') }}" style="margin-left: 90px">
                <img src="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}" alt="Notun desh" style="width: 200px;">
            </a>

        </div>
    </div>
</header>
