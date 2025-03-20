<header class="print:hidden hidden md:block header_top bg-white dark:bg-transparent border-b border-gray-300 dark:border-0">

    <div class="news_container">
        <div class="flex justify-between items-center">
            <div class="dark:text-white">
                @php
                    $bn= new \App\Http\Controllers\Frontend\BanglaDateController(time(), 0);
                      $bnDate=$bn->get_date();

                      $enDate = $bn->fFormatDate(date('l, d F Y'));
                @endphp
                <p style="display: block;">
                    <i class="fa fa-calendar"></i> {{ $enDate }}
                </p>
            </div>
            <div>
                <a href="{{ url('/') }}" class="py-4 block">
                    <img class="logo_header" src="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}" alt="{{ Cache::get('bnSiteSettings')->site_name }}">
                </a>
            </div>

            <div>
                <div class="flex gap-4 justify-center items-center">
                    @if(Cache::get('bnSiteSettings')->facebook)
                        <a class="group" href="{{ Cache::get('bnSiteSettings')->facebook }}" target="_blank">
                            <div style="background: #0866ff; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-facebook"></i>
                            </div>
                        </a>
                    @endif
                    @if(Cache::get('bnSiteSettings')->twitter)
                        <a class="group" href="{{ Cache::get('bnSiteSettings')->twitter }}" target="_blank">
                            <div style="background: #00ACEE; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-twitter"></i>
                              
                            </div>
                        </a>
                    @endif
                    @if(Cache::get('bnSiteSettings')->instagram)
                        <a class="group" href="{{ Cache::get('bnSiteSettings')->instagram }}" target="_blank">
                            <div style="background: #C13584; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-instagram"></i>
                                
                            </div>
                        </a>
                    @endif
                    @if(Cache::get('bnSiteSettings')->youtube)
                        <a class="group" href="{{ Cache::get('bnSiteSettings')->youtube }}">
                            <div style="background: #FF0000; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-youtube"></i>
                            </div>
                        </a>
                    @endif
                    @if(Cache::get('bnSiteSettings')->linkedin)
                        <a class="group" href="{{Cache::get('bnSiteSettings')->linkedin}}" target="_blank">
                            <div style="background: #0077B5; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-linkedin"></i>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header_menu_container hidden md:block sticky top-0 w-full z-50">
    <div class="header_menu hidden md:block bg-white dark:bg-[#26334d] dark:border-t dark:border-b dark:border-[#fff2]">
        <div class="news_container">
            <!-- Header Section -->
            <div class="flex justify-between items-center">
                <div class="flex flex-row items-center">
                    <!-- Desktop Menu -->
                    
                   
                    {{-- <nav class="flex gap-3 font-semibold space-x-6 dark:text-slate-100 text-[15px]" style="flex-wrap: wrap;">
                        <a href="{{ url('/latest/news') }}" class="{{ request()->is('latest/news')  ? 'active' : '' }} relative after:absolute duration-200 after:top-[13px] after:ml-1 hover:text-base-color-hover hover:after:content-['⮞'] py-3">সর্বশেষ</a>
                        @php
                            $categories = bnHeaderToCategory();
                        @endphp
                        @foreach($categories as $category)
                            <a href="{{ url('/'.$category->cat_slug) }}" class="relative after:absolute duration-200 after:top-[13px] after:ml-1 hover:text-base-color-hover py-3">{{ $category->cat_name_bn }}</a>
                        @endforeach
                    </nav>  --}}

                    <nav class="font-semibold py-4 dark:text-slate-100 text-[25px]">
                        <a href="{{ url('/latest/news') }}" style="padding-right:30px;" class="{{ request()->is('latest/news') ? 'active' : '' }} relative after:absolute duration-200 after:top-[13px] after:ml-1 hover:text-base-color-hover py-3">সর্বশেষ</a>
                        @php
                            $categories = bnHeaderToCategory();
                        @endphp
                        @foreach($categories as $category)
                            <a href="{{ url('/'.$category->cat_slug) }}" style="padding-right:30px;" class="relative after:absolute duration-200 after:top-[13px] after:ml-1 hover:text-base-color-hover py-3">{{ $category->cat_name_bn }}</a>
                        @endforeach
                    </nav>
                        
                    
                </div>
                <div class="flex flex-row gap-3 items-center relative">
                    <div class="relative">
                        <div onclick="searchBox()" class="search_btn dark:text-white cursor-pointer z-50">
                            <i class="fa fa-search"></i>
                        </div>
                        <div onclick="searchBox()" class="search_close dark:text-white text-xl cursor-pointer hidden z-50">
                            <i class="fa fa-close"></i>
                        </div>
                        <div class="search_box absolute right-6 -top-[7px] hidden">
                           <div class="flex flex-row items-center">
                               <input id="search_keyword" type="text" class="px-4 flex w-[400px] focus:outline-none py-2 border-custom-bc dark:text-slate-300 dark:bg-black dark:border-gray-600" placeholder="অনুসন্ধান করুন">
                               <div onclick="searchNews()" class="cursor-pointer searchbtn border-custom-bc dark:border-gray-600 px-4 py-2 bg-gray-400">
                                   <i class="fa fa-search"></i>
                               </div>
                           </div>
                        </div>
                    </div>
                    {{-- <div class="dark_light_mode">
                        <div class="flex flex-row items-center bg-gray-200 dark:bg-black rounded-full gap-2">
                            <div class="bg-white dark:bg-transparent rounded-full px-1 py-1 cursor-pointer hidden mobile_light_mode_btn" id="mobile_light_mode">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-4 w-4 dark:text-white text-red-500" role="button" title="Light Mode"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="rounded-full dark:bg-gray-200 px-1 py-1 cursor-pointer mobile_dark_mode_btn" id="mobile_dark_mode">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-4 w-4 dark:text-red-500 text-black" role="button" title="Dark Mode"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            </div>
                        </div>
                    </div> --}}
                    <div id="menu-icon" class="menu_icon text-xl cursor-pointer dark:text-white">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-3">
        <div class="relative max-w-[1248px] mx-auto">
            <div id="mega-menu" class="transition-transform transform translate-y-[60px] invisible duration-200 absolute left-0 -top-[5px] left-0 w-full mega_menu_container z-50">
                <div class="w-full bg-white dark:bg-[#26334d] px-10 mega_menu_item_container">
                    <div class="mega_menu_header py-3 dark:text-slate-300 text-sm font-semibold border-b border-custom-bc dark:border-gray-600">
                        <i class="fa fa-calendar"></i> {{ $enDate }}
                    , {{ $bnDate[0]." ".$bnDate[1]." ".$bnDate[2] }}
                    </div>
                    <div class="grid grid-cols-7 items-center justify-center gap-6 py-8">
                        @php $mega_menus = bnHeaderCategory() @endphp
                        <a class="text-sm font-semibold dark:text-slate-300 menuClass hover:pl-2 hover:text-base-color-hover relative after:absolute after:top-[1px] after:ml-2 hover:after:content-['⮞']" href="{{ url('/latest/news') }}">সর্বশেষ</a>
                        @foreach($mega_menus as $mega_menu)
                            <a class="text-sm menuClass font-semibold dark:text-slate-300 hover:pl-2 hover:text-base-color-hover relative after:absolute after:top-[1px] after:ml-2 hover:after:content-['⮞']" href="{{ url('/'.$mega_menu->cat_slug) }}">{{ $mega_menu->cat_name_bn }}</a>
                        @endforeach
                    </div>
                    <div class="social_icons py-4 border-t border-custom-bc">
                        <div class="flex gap-8 justify-center items-center">
                            @if(Cache::get('bnSiteSettings')->facebook)
                            <a class="group" href="{{ Cache::get('bnSiteSettings')->facebook }}" target="_blank">
                                <div style="background: #0866ff; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                    <i class="fa fa-facebook"></i>
                                    
                                </div>
                            </a>
                            @endif
                            @if(Cache::get('bnSiteSettings')->twitter)
                            <a class="group" href="{{ Cache::get('bnSiteSettings')->twitter }}" target="_blank">
                                <div style="background: #00ACEE; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                    <i class="fa fa-twitter"></i>
                                   
                                </div>
                            </a>
                            @endif
                            @if(Cache::get('bnSiteSettings')->instagram)
                            <a class="group" href="{{ Cache::get('bnSiteSettings')->instagram }}" target="_blank">
                                <div style="background: #C13584; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                    <i class="fa fa-instagram"></i>
                                    
                                </div>
                            </a>
                            @endif
                            @if(Cache::get('bnSiteSettings')->youtube)
                            <a class="group" href="{{ Cache::get('bnSiteSettings')->youtube }}">
                                <div style="background: #FF0000; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                    <i class="fa fa-youtube"></i>
                                  
                                </div>
                            </a>
                            @endif
                            @if(Cache::get('bnSiteSettings')->linkedin)
                            <a class="group" href="{{Cache::get('bnSiteSettings')->linkedin}}" target="_blank">
                                <div style="background: #0077B5; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                    <i class="fa fa-linkedin"></i>
                                    
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    let search_status = false;

    function searchBox() {
        if (search_status === false) {
            search_status = true;
            $('.search_btn').addClass('hidden');
            $('.search_close').removeClass('hidden');

            // Slide down the search box
            $('.search_box').removeClass('hidden').addClass('show');
            $('.searchbtn').addClass('border')
            $('.search_box input').addClass('border')
        } else {
            search_status = false;
            $('#search_keyword').val('');
            $('.search_btn').removeClass('hidden');
            $('.search_close').addClass('hidden');

            // Slide up the search box
            $('.search_box').removeClass('show');
            // Add a slight delay before hiding to complete the slide-up transition
            setTimeout(() => {
                $('.search_box').addClass('hidden');
                $('.search_box input').addClass('border')
                $('.searchbtn').addClass('border')
            }, 300); // Match the duration of the CSS transition
        }
    }

    $(document).ready(function() {
        // Click event on document to hide search box when clicking outside
        $(document).click(function(event) {
            var $target = $(event.target);
            if (!$target.closest('.search_box').length && !$target.closest('.search_btn').length && !$target.closest('.search_close').length) {
                if (search_status) {
                    search_status = false;
                    $('#search_keyword').val('');
                    $('.search_btn').removeClass('hidden');
                    $('.search_close').addClass('hidden');
                    $('.searchbtn').removeClass('border')
                    $('.search_box input').removeClass('border')
                    // Slide up the search box
                    $('.search_box').removeClass('show');
                    setTimeout(() => {
                        $('.search_box').addClass('hidden');
                    }, 300); // Match the duration of the CSS transition

                }
            }
        });
    });


    // Search News
    function searchNews(){
        let keyword = $('#search_keyword').val()
        if (keyword.length > 0){
            window.location.href = "{{ url('/search?q=') }}"+keyword
        }
    }


    document.addEventListener('DOMContentLoaded', function() {
        const menuIcon = document.getElementById('menu-icon');
        const megaMenu = document.getElementById('mega-menu');

        function toggleMegaMenu() {
            if (megaMenu.classList.contains('translate-y-[60px]')) {
                megaMenu.classList.remove('translate-y-[60px]');
                megaMenu.classList.remove('invisible');
                megaMenu.classList.add('translate-y-0');
                $('.menuClass').addClass('duration-300');
            } else {
                megaMenu.classList.remove('translate-y-0');
                megaMenu.classList.add('translate-y-[60px]');
                megaMenu.classList.add('invisible');
                $('.menuClass').removeClass('duration-300');
            }
        }

        function handleClickOutside(event) {
            if (!menuIcon.contains(event.target) && !megaMenu.contains(event.target)) {
                megaMenu.classList.remove('translate-y-0');
                megaMenu.classList.add('translate-y-[60px]');
                megaMenu.classList.add('invisible');
                $('.menuClass').removeClass('duration-300');
            }
        }

        menuIcon.addEventListener('click', function() {
            toggleMegaMenu();
        });

        // Add an event listener for clicks outside the menu
        document.addEventListener('click', handleClickOutside);

        // Optional: If you want to close the mega menu when resizing the window, uncomment the following:
        // window.addEventListener('resize', function() {
        //     if (window.innerWidth >= 768) { // Assuming md breakpoint is 768px
        //         megaMenu.classList.remove('translate-y-0', 'invisible');
        //         megaMenu.classList.add('translate-y-[60px]');
        //     }
        // });
    });
</script>
