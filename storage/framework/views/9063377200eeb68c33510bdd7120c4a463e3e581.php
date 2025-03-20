<header class="print:hidden hidden md:block header_top bg-white dark:bg-transparent border-b border-gray-300 dark:border-0">
    

    <div class="news_container">
        <div class="flex justify-between items-center">
            <div class="dark:text-white">
                <?php
                    $bn= new \App\Http\Controllers\Frontend\BanglaDateController(time(), 0);
                    // $bn= new \App\Http\Controllers\Frontend\BanglaDateController(time(), 0);
                      $bnDate=$bn->get_date();

                      $enDate = $bn->fFormatDate(date('l, d F Y'));
                ?>
                <p style="display: block;">
                    <?php echo e($enDate); ?>

                </p>
            </div>
            <div>
                <a href="<?php echo e(url('/')); ?>" class="py-4 block">
                    <img class="logo_header" src="<?php echo e(asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo)); ?>" alt="<?php echo e(Cache::get('bnSiteSettings')->site_name); ?>">
                </a>
            </div>










            <div>
                <div class="flex gap-4 justify-center items-center">
                    <?php if(Cache::get('bnSiteSettings')->facebook): ?>
                        <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->facebook); ?>" target="_blank">
                            <div class="w-8 h-8 border-[1px] border-black/30 dark:border-white/40 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <svg class="w-4 h-4 fill-[#0866ff] dark:fill-[#0866ff]" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-337 273 123.5 256" xml:space="preserve">
                                <path d="M-260.9,327.8c0-10.3,9.2-14,19.5-14c10.3,0,21.3,3.2,21.3,3.2l6.6-39.2c0,0-14-4.8-47.4-4.8c-20.5,0-32.4,7.8-41.1,19.3 c-8.2,10.9-8.5,28.4-8.5,39.7v25.7H-337V396h26.5v133h49.6V396h39.3l2.9-38.3h-42.2V327.8z"></path>
                            </svg>
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if(Cache::get('bnSiteSettings')->twitter): ?>
                        <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->twitter); ?>" target="_blank">
                            <div class="w-8 h-8 border-[1px] border-black/30 dark:border-white/40 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <svg class="w-4 h-4 fill-black dark:fill-white" viewBox="0 0 512 512">
                                    <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
                                </svg>
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if(Cache::get('bnSiteSettings')->instagram): ?>
                        <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->instagram); ?>" target="_blank">
                            <div class="w-8 h-8 border-[1px] border-black/30 dark:border-white/40 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <svg class="w-4 h-4 stroke-[#C13584] dark:stroke-[#C13584]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M12 15.5C13.933 15.5 15.5 13.933 15.5 12C15.5 10.067 13.933 8.5 12 8.5C10.067 8.5 8.5 10.067 8.5 12C8.5 13.933 10.067 15.5 12 15.5Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M17.6361 7H17.6477" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if(Cache::get('bnSiteSettings')->youtube): ?>
                        <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->youtube); ?>">
                            <div class="w-8 h-8 border-[1px] border-black/30 dark:border-white/40 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <svg class="w-4 h-4 fill-[#FF0000] dark:fill-[#FF0000]" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-271 311.2 256 179.8" xml:space="preserve">
                                <path d="M-59.1,311.2h-167.8c0,0-44.1,0-44.1,44.1v91.5c0,0,0,44.1,44.1,44.1h167.8c0,0,44.1,0,44.1-44.1v-91.5 C-15,355.3-15,311.2-59.1,311.2z M-177.1,450.3v-98.5l83.8,49.3L-177.1,450.3z"></path>
                            </svg>
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if(Cache::get('bnSiteSettings')->linkedin): ?>
                        <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->linkedin); ?>" target="_blank">
                            <div class="w-8 h-8 border-[1px] border-black/30 dark:border-white/40 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <svg class="w-4 h-4 fill-[#0077B5] dark:fill-[#0077B5]" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"></path>
                                </svg>
                            </div>
                        </a>
                    <?php endif; ?>
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
                    <nav class="flex gap-3 font-semibold space-x-6 dark:text-slate-100 text-[15px]">
                        <a href="<?php echo e(url('/latest/news')); ?>" class="<?php echo e(request()->is('latest/news')  ? 'active' : ''); ?> relative after:absolute duration-200 after:top-[13px] after:ml-1 hover:text-base-color-hover hover:after:content-['⮞'] py-3">সর্বশেষ</a>
                        <?php
                            $categories = bnHeaderToCategory();
                        ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(url('/'.$category->cat_slug)); ?>" class="relative after:absolute duration-200 after:top-[13px] after:ml-1 hover:text-base-color-hover hover:after:content-['⮞'] py-3"><?php echo e($category->cat_name_bn); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <div class="dark_light_mode">
                        <div class="flex flex-row items-center bg-gray-200 dark:bg-black rounded-full gap-2">
                            <div class="bg-white dark:bg-transparent rounded-full px-1 py-1 cursor-pointer hidden mobile_light_mode_btn" id="mobile_light_mode">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-4 w-4 dark:text-white text-red-500" role="button" title="Light Mode"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="rounded-full dark:bg-gray-200 px-1 py-1 cursor-pointer mobile_dark_mode_btn" id="mobile_dark_mode">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-4 w-4 dark:text-red-500 text-black" role="button" title="Dark Mode"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            </div>
                        </div>
                    </div>
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
                        <i class="fa fa-calendar"></i> <?php echo e($enDate); ?>

                        | <?php echo e($bnDate[0]." ".$bnDate[1]." ".$bnDate[2]); ?>

                    </div>
                    <div class="grid grid-cols-7 items-center justify-center gap-6 py-8">
                        <?php $mega_menus = bnHeaderCategory() ?>
                        <a class="text-sm font-semibold dark:text-slate-300 menuClass hover:pl-2 hover:text-base-color-hover relative after:absolute after:top-[1px] after:ml-2 hover:after:content-['⮞']" href="<?php echo e(url('/latest/news')); ?>">সর্বশেষ</a>
                        <?php $__currentLoopData = $mega_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mega_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="text-sm menuClass font-semibold dark:text-slate-300 hover:pl-2 hover:text-base-color-hover relative after:absolute after:top-[1px] after:ml-2 hover:after:content-['⮞']" href="<?php echo e(url('/'.$mega_menu->cat_slug)); ?>"><?php echo e($mega_menu->cat_name_bn); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="social_icons py-4 border-t border-custom-bc">
                        <div class="flex gap-8 justify-center items-center">
                            <?php if(Cache::get('bnSiteSettings')->facebook): ?>
                            <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->facebook); ?>" target="_blank">
                                <div class="w-8 h-8 border-[1px] border-black/30 dark:border-white/40 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                    <svg class="w-4 h-4 fill-[#0866ff] dark:fill-[#0866ff]" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-337 273 123.5 256" xml:space="preserve">
                                <path d="M-260.9,327.8c0-10.3,9.2-14,19.5-14c10.3,0,21.3,3.2,21.3,3.2l6.6-39.2c0,0-14-4.8-47.4-4.8c-20.5,0-32.4,7.8-41.1,19.3 c-8.2,10.9-8.5,28.4-8.5,39.7v25.7H-337V396h26.5v133h49.6V396h39.3l2.9-38.3h-42.2V327.8z"></path>
                            </svg>
                                </div>
                            </a>
                            <?php endif; ?>
                            <?php if(Cache::get('bnSiteSettings')->twitter): ?>
                            <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->twitter); ?>" target="_blank">
                                <div class="w-8 h-8 border-[1px] border-black/30 dark:border-white/40 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                    <svg class="w-4 h-4 fill-black dark:fill-white" viewBox="0 0 512 512">
                                        <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
                                    </svg>
                                </div>
                            </a>
                            <?php endif; ?>
                            <?php if(Cache::get('bnSiteSettings')->instagram): ?>
                            <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->instagram); ?>" target="_blank">
                                <div class="w-8 h-8 border-[1px] border-black/30 dark:border-white/40 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                    <svg class="w-4 h-4 stroke-[#C13584] dark:stroke-[#C13584]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12 15.5C13.933 15.5 15.5 13.933 15.5 12C15.5 10.067 13.933 8.5 12 8.5C10.067 8.5 8.5 10.067 8.5 12C8.5 13.933 10.067 15.5 12 15.5Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M17.6361 7H17.6477" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </a>
                            <?php endif; ?>
                            <?php if(Cache::get('bnSiteSettings')->youtube): ?>
                            <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->youtube); ?>">
                                <div class="w-8 h-8 border-[1px] border-black/30 dark:border-white/40 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                    <svg class="w-4 h-4 fill-[#FF0000] dark:fill-[#FF0000]" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-271 311.2 256 179.8" xml:space="preserve">
                                <path d="M-59.1,311.2h-167.8c0,0-44.1,0-44.1,44.1v91.5c0,0,0,44.1,44.1,44.1h167.8c0,0,44.1,0,44.1-44.1v-91.5 C-15,355.3-15,311.2-59.1,311.2z M-177.1,450.3v-98.5l83.8,49.3L-177.1,450.3z"></path>
                            </svg>
                                </div>
                            </a>
                            <?php endif; ?>
                            <?php if(Cache::get('bnSiteSettings')->linkedin): ?>
                            <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->linkedin); ?>" target="_blank">
                                <div class="w-8 h-8 border-[1px] border-black/30 dark:border-white/40 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                    <svg class="w-4 h-4 fill-[#0077B5] dark:fill-[#0077B5]" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"></path>
                                    </svg>
                                </div>
                            </a>
                            <?php endif; ?>
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
            window.location.href = "<?php echo e(url('/search?q=')); ?>"+keyword
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
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/common/header.blade.php ENDPATH**/ ?>