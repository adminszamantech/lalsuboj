<div id="mobileHeader" class="mobile_container w-full bg-white md:hidden">
    <div class="mobile_header_top border-b py-1 border-custom-bc dark:bg-[#131d24] dark:border-gray-600">
        <div class="news_container">
            <div class=" flex flex-row justify-between items-center">
                <?php
                    $mobileBn= new \App\Http\Controllers\Frontend\BanglaDateController(time(), 0);
                      $mobileBnDate=$mobileBn->get_date();

                      $mobileEnDate = $mobileBn->fFormatDate(date('l, d F Y'));
                ?>
                <div class="text-sm dark:text-slate-300">
                     <i class="fa fa-calendar"></i> <?php echo e($mobileEnDate); ?>

                    , <?php echo e($mobileBnDate[0]." ".$mobileBnDate[1]." ".$mobileBnDate[2]); ?>

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
                    <a href="<?php echo e(url('/')); ?>" class="">
                        <img class="w-[200px]" src="<?php echo e(asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo)); ?>" alt="<?php echo e(Cache::get('bnSiteSettings')->site_name); ?>">
                    </a>
                </div>
                <div class="relative">
                    <div onclick="searchBox()" class="search_btn dark:text-white cursor-pointer z-50">
                        <i class="fa fa-search"></i>
                    </div>
                    <div onclick="searchBox()" class="search_close dark:text-white text-xl cursor-pointer hidden z-50">
                        <i class="fa fa-close"></i>
                    </div>
                    <div class="search_box absolute right-6 -top-[7px] hidden">
                       <div class="flex flex-row items-center">
                           <input id="search_input" type="text" class="px-4 flex w-[300px] focus:outline-none py-2 border-custom-bc dark:text-slate-300 dark:bg-black dark:border-gray-600" placeholder="অনুসন্ধান করুন">
                           <div onclick="searchNews()" class="cursor-pointer searchbtn border-custom-bc dark:border-gray-600 px-4 py-2 bg-gray-400">
                               <i class="fa fa-search"></i>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mobile_hamburger_menu w-full fixed top-0 left-0 z-[999999999999] ">
    <div class="h-screen w-full relative bg-white dark:bg-[#131d24] h-screen overflow-y-scroll">
        <div class="fixed top-0 left-0 bg-white dark:bg-[#131d24] w-full mobile_header_menu">
            <div class="flex flex-row item-center justify-center pt-2 pb-1">
                <div class="logo">
                    <a href="<?php echo e(url('/')); ?>"><img class="w-44" src="<?php echo e(asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo)); ?>" alt="<?php echo e(Cache::get('bnSiteSettings')->site_name); ?>"></a>
                </div>
                <div class="close_button text-2xl dark:text-red-500"><i class="fa fa-close"></i></div>
            </div>
            <div class=" flex flex-row justify-center pb-1 dark:text-slate-300 items-center">
                <?php
                    $mobileBn= new \App\Http\Controllers\Frontend\BanglaDateController(time(), 0);
                      $mobileBnDate=$mobileBn->get_date();

                      $mobileEnDate = $mobileBn->fFormatDate(date('l, d F Y'));
                ?>
                <div class="text-sm dark:text-slate-300">
                    <i class="fa fa-calendar"></i> <?php echo e($mobileEnDate); ?>

                    , <?php echo e($mobileBnDate[0]." ".$mobileBnDate[1]." ".$mobileBnDate[2]); ?>

                </div>
            </div>
            
        </div>
        <!-- Close button for menu -->
        <div class="mobile_menus px-8 mt-15 pt-0 pb-4 h-screen overflow-y-auto">
            <div class="grid grid-cols-2 gap-5">
                <?php $mobile_menus = bnHeaderCategory() ?>
                <a class="dark:text-slate-300 border-b pb-2 border-custom-bc dark:border-gray-600 text-[16px] font-semibold" href="<?php echo e(url('/latest/news')); ?>">সর্বশেষ</a>
                <?php $__currentLoopData = $mobile_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mobile_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="dark:text-slate-300 border-b pb-2 border-custom-bc dark:border-gray-600 text-[16px] font-semibold" href="<?php echo e(url('/'.$mobile_menu->cat_slug)); ?>"><?php echo e($mobile_menu->cat_name_bn); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- Add more menu items as needed -->

            <div class="social_icons mt-4 py-2  dark:border-gray-600">
                <h4 class="mt-2 mb-3"><b>অনুসরণ করুন</b></h4>
                <div class="flex gap-5">
                    <?php if(Cache::get('bnSiteSettings')->facebook): ?>
                        <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->facebook); ?>" target="_blank">
                            <div style="background: #0866ff; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-facebook"></i>
                                
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if(Cache::get('bnSiteSettings')->twitter): ?>
                        <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->twitter); ?>" target="_blank">
                            <div style="background: #00ACEE; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-twitter"></i>
                                
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if(Cache::get('bnSiteSettings')->instagram): ?>
                        <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->instagram); ?>" target="_blank">
                            <div style="background: #C13584; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-instagram"></i>
                                
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if(Cache::get('bnSiteSettings')->youtube): ?>
                        <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->youtube); ?>">
                            <div style="background: #FF0000; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-youtube"></i>
                                
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if(Cache::get('bnSiteSettings')->linkedin): ?>
                        <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->linkedin); ?>" target="_blank">
                            <div style="background: #0077B5; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-300 menuClass ease-out dark:group-hover:border-white">
                                <i class="fa fa-linkedin"></i>
                                
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
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


   
    // Search News
    function searchNews(){
        let keyword = $('#search_input').val()
        if (keyword.length > 0){
            window.location.href = "<?php echo e(url('/search?q=')); ?>"+keyword
        }
    }
   


</script>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/common/mobile-header.blade.php ENDPATH**/ ?>