<div id="mobileHeader" class="mobile_container w-full bg-white md:hidden">
    <div class="mobile_header_top border-b py-1 border-custom-bc dark:bg-[#131d24] dark:border-gray-600">
        <div class="news_container">
            <div class=" flex flex-row justify-between items-center">
                @php
                    $mobileBn= new \App\Http\Controllers\Frontend\BanglaDateController(time(), 0);
                      $mobileBnDate=$mobileBn->get_date();

                      $mobileEnDate = $mobileBn->fFormatDate(date('l, d F Y'));
                @endphp
                <div class="text-sm dark:text-slate-300">
                     <i class="fa fa-calendar"></i> {{ $mobileEnDate }}
                    , {{ $mobileBnDate[0]." ".$mobileBnDate[1]." ".$mobileBnDate[2] }}
                </div>
            </div>
        </div>
    </div>
    <div class="mobile_header_bottom header_menu dark:border-gray-600 dark:border-b dark:shadow-md dark:bg-[#26334d]">
        <div class="news_container">
            <div class="flex flex-row justify-between items-center py-2">
                <div class="mobile_button cursor-pointer">
                    <div class="text-xl dark:text-slate-300">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
                <div class="logo">
                    <a href="{{ url('/') }}" class="">
                        <img class="w-[200px]" src="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}" alt="{{ Cache::get('bnSiteSettings')->site_name }}">
                    </a>
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
            </div>
        </div>
    </div>
</div>
<div class="mobile_hamburger_menu w-full fixed top-0 left-0 z-[999999999999] ">
    <div class="h-screen w-full relative bg-white dark:bg-[#131d24] h-screen overflow-y-scroll">
        <div class="fixed top-0 left-0 bg-white dark:bg-[#131d24] w-full mobile_header_menu">
            <div class="flex flex-row item-center justify-center pt-2 pb-1">
                <div class="logo">
                    <a href="{{ url('/') }}"><img class="w-44" src="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}" alt="{{ Cache::get('bnSiteSettings')->site_name }}"></a>
                </div>
                <div class="close_button text-2xl dark:text-red-500"><i class="fa fa-close"></i></div>
            </div>
            <div class=" flex flex-row justify-center pb-1 dark:text-slate-300 items-center">
                @php
                    $mobileBn= new \App\Http\Controllers\Frontend\BanglaDateController(time(), 0);
                      $mobileBnDate=$mobileBn->get_date();

                      $mobileEnDate = $mobileBn->fFormatDate(date('l, d F Y'));
                @endphp
                <div class="text-sm dark:text-slate-300">
                    <i class="fa fa-calendar"></i> {{ $mobileEnDate }}
                    , {{ $mobileBnDate[0]." ".$mobileBnDate[1]." ".$mobileBnDate[2] }}
                </div>
            </div>
            <div class="social_icons py-2 border-t border-b border-custom-bc dark:border-gray-600">
                <div class="flex gap-[50px] justify-center items-center">
                    @if(Cache::get('bnSiteSettings')->facebook)
                        <a class="group" href="{{ Cache::get('bnSiteSettings')->facebook }}" target="_blank">
                            <div style="background: #0866ff; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-facebook"></i>
                                {{-- <svg class="w-4 h-4 fill-[#0866ff] dark:fill-[#0866ff]" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-337 273 123.5 256" xml:space="preserve">
                                <path d="M-260.9,327.8c0-10.3,9.2-14,19.5-14c10.3,0,21.3,3.2,21.3,3.2l6.6-39.2c0,0-14-4.8-47.4-4.8c-20.5,0-32.4,7.8-41.1,19.3 c-8.2,10.9-8.5,28.4-8.5,39.7v25.7H-337V396h26.5v133h49.6V396h39.3l2.9-38.3h-42.2V327.8z"></path>
                            </svg> --}}
                            </div>
                        </a>
                    @endif
                    @if(Cache::get('bnSiteSettings')->twitter)
                        <a class="group" href="{{ Cache::get('bnSiteSettings')->twitter }}" target="_blank">
                            <div style="background: #00ACEE; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-twitter"></i>
                                {{-- <svg class="w-4 h-4 fill-black dark:fill-white" viewBox="0 0 512 512">
                                    <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
                                </svg> --}}
                            </div>
                        </a>
                    @endif
                    @if(Cache::get('bnSiteSettings')->instagram)
                        <a class="group" href="{{ Cache::get('bnSiteSettings')->instagram }}" target="_blank">
                            <div style="background: #C13584; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-instagram"></i>
                                {{-- <svg class="w-4 h-4 stroke-[#C13584] dark:stroke-[#C13584]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M12 15.5C13.933 15.5 15.5 13.933 15.5 12C15.5 10.067 13.933 8.5 12 8.5C10.067 8.5 8.5 10.067 8.5 12C8.5 13.933 10.067 15.5 12 15.5Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M17.6361 7H17.6477" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg> --}}
                            </div>
                        </a>
                    @endif
                    @if(Cache::get('bnSiteSettings')->youtube)
                        <a class="group" href="{{ Cache::get('bnSiteSettings')->youtube }}">
                            <div style="background: #FF0000; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-youtube"></i>
                                {{-- <svg class="w-4 h-4 fill-[#FF0000] dark:fill-[#FF0000]" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-271 311.2 256 179.8" xml:space="preserve">
                                <path d="M-59.1,311.2h-167.8c0,0-44.1,0-44.1,44.1v91.5c0,0,0,44.1,44.1,44.1h167.8c0,0,44.1,0,44.1-44.1v-91.5 C-15,355.3-15,311.2-59.1,311.2z M-177.1,450.3v-98.5l83.8,49.3L-177.1,450.3z"></path>
                            </svg> --}}
                            </div>
                        </a>
                    @endif
                    @if(Cache::get('bnSiteSettings')->linkedin)
                        <a class="group" href="{{Cache::get('bnSiteSettings')->linkedin}}" target="_blank">
                            <div style="background: #0077B5; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-linkedin"></i>
                                {{-- <svg class="w-4 h-4 fill-[#0077B5] dark:fill-[#0077B5]" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"></path>
                                </svg> --}}
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <!-- Close button for menu -->
        <div class="mobile_menus px-8 mt-36 pt-0 pb-4 h-screen overflow-y-auto">
            <div class="grid grid-cols-2 gap-5">
                @php $mobile_menus = bnHeaderCategory() @endphp
                <a class="dark:text-slate-300 border-b pb-2 border-custom-bc dark:border-gray-600 text-[16px] font-semibold" href="{{ url('/latest/news') }}">সর্বশেষ</a>
                @foreach($mobile_menus as $mobile_menu)
                    <a class="dark:text-slate-300 border-b pb-2 border-custom-bc dark:border-gray-600 text-[16px] font-semibold" href="{{ url('/'.$mobile_menu->cat_slug) }}">{{ $mobile_menu->cat_name_bn }}</a>
                @endforeach
            </div>
            <!-- Add more menu items as needed -->
        </div>
    </div>
</div>
<script>
    window.onscroll = function() {mobileHeaderScroll()};
    let mobileHeader = document.getElementById('mobileHeader')
    function mobileHeaderScroll(){
        if (window.pageYOffset > 10) {
            mobileHeader.classList.add('mobile_sticky_header')
            $(".main-content").addClass('pt-[90px] md:pt-0')
        }else{
            mobileHeader.classList.remove('mobile_sticky_header')
            $(".main-content").removeClass('pt-[90px] md:pt-0')
        }
    }

    // Check for saved preference in localStorage
    if (localStorage.getItem('theme') == 'dark') {
        document.body.classList.add('dark');
        $('.mobile_light_mode_btn').removeClass('hidden')
        $('.mobile_dark_mode_btn').addClass('hidden')
        $('.mobile_header_bottom').removeClass('header_menu')
    }

    // Light Mode
    $('.mobile_light_mode_btn').click(function (){
        document.body.classList.remove('dark');
        localStorage.setItem('theme', 'light');
        $(this).addClass('hidden');
        $('.mobile_dark_mode_btn').removeClass('hidden')
        $('.mobile_header_bottom').removeClass('hidden').addClass('header_menu');
    })


    $('.mobile_dark_mode_btn').click(function (){
        document.body.classList.add('dark');
        localStorage.setItem('theme', 'dark');
        $(this).addClass('hidden');
        $('.mobile_light_mode_btn').removeClass('hidden');
        $('.mobile_header_bottom').removeClass('header_menu')
    })

    document.addEventListener('DOMContentLoaded', () => {
        const menuButton = document.querySelector('.mobile_button');
        const menu = document.querySelector('.mobile_hamburger_menu');
        const closeButton = document.querySelector('.mobile_hamburger_menu .close_button'); // Assuming you'll add a close button

        menuButton.addEventListener('click', () => {
            menu.classList.toggle('open');
            document.getElementsByTagName('body')[0].classList.add('overflow-hidden')
        });

        if (closeButton) {
            closeButton.addEventListener('click', () => {
                menu.classList.remove('open');
                document.getElementsByTagName('body')[0].classList.remove('overflow-hidden')
            });
        }
    });

</script>
