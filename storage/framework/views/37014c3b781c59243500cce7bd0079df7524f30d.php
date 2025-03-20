<?php $__env->startSection('title', cache('bnSiteSettings')->title); ?>

<?php $__env->startSection('customMeta'); ?>
    <meta content="500" http-equiv="refresh">
    <meta name="description" content="<?php echo e(Cache::get('bnSiteSettings')->meta_description); ?>"/>
    <link rel="canonical" href="<?php echo e(url('/')); ?>">
    <meta name="keywords" content="<?php echo e(Cache::get('bnSiteSettings')->meta_keyword); ?>">

    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo e(url('/')); ?>"/>
    <meta property="og:title" content="<?php echo e(Cache::get('bnSiteSettings')->title); ?>"/>
    <meta property="og:image"
          content="<?php echo e(asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>"/>
    <meta property="og:description" content="<?php echo e(Cache::get('bnSiteSettings')->meta_description); ?>"/>

    <meta name="twitter:title" content="<?php echo e(Cache::get('bnSiteSettings')->title); ?>">
    <meta name="twitter:description" content="<?php echo e(Cache::get('bnSiteSettings')->meta_description); ?>">
    <meta name="twitter:image"
          content="<?php echo e(asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>">

<?php $__env->stopSection(); ?>

<?php ($bnCacheSettings = Cache::get('bnSiteSettings')); ?>

<?php $__env->startSection('custom-css'); ?>
    <?php if($breakingContents->count()): ?>
        <link rel="stylesheet" href="<?php echo e(asset('frontend-assets/plugins/breaking/breaking.css')); ?>?id=11">
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('fb-sdk'); ?>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=<?php echo e(config('appconfig.fb_app_id')); ?>&autoLogAppEvents=1"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>

    <div class="home-content">
        
        <?php echo $__env->make('frontend.bn.ads.home.middle-top-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <div class="news_container">
           
            <?php if(count($specialTopContents) > 0): ?>
                <?php echo $__env->make('frontend.bn.partials.new-special-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            
            <?php echo $__env->make('frontend.bn.ads.home.middle-1-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <!-- National Section --->
            <?php if(count($nationalContents) > 0): ?>
                <?php echo $__env->make('frontend.bn.ads.category.category-top-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('frontend.bn.partials.new_national_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <!--/ National Section --->


            <!-- Politics Section --->
            <?php if(count($politicsContents) > 0): ?>
                <?php echo $__env->make('frontend.bn.partials.new_politics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <!--/ Politics Section --->

            <?php echo $__env->make('frontend.bn.ads.home.middle-3-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <!-- Saradesh Section --->
            <?php if(count($saradeshContents) > 0): ?>
                
                <?php echo $__env->make('frontend.bn.partials.new_saradesh_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <!--/ Saradesh Section --->
            <?php echo $__env->make('frontend.bn.ads.category.category-top-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Sports Section --->
            <!--/ Sports Section --->
                <?php echo $__env->make('frontend.bn.ads.home.middle-5-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
       
        <!-- Entertainment Section --->
        <?php if(count($entertainmentContents) > 0): ?>
        
        <div class="bg-[#eff5f4] py-4 dark:bg-[#26334d] my-8">
            <div class="news_container">
                <?php if(count($sportsContents) > 0): ?>
                    <?php echo $__env->make('frontend.bn.partials.new_sports_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php echo $__env->make('frontend.bn.partials.new_entertainment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <?php endif; ?>
        <!--/ Entertainment Section --->
        <?php echo $__env->make('frontend.bn.ads.home.middle-6-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="news_container">
            
        <!-- International & Economy Section --->
        <div class="news_container mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-b border-custom-bc dark:border-gray-600 pb-4">
                <?php if($internationalContents->count()): ?>
                    <div class="relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                        <?php echo $__env->make('frontend.bn.partials.new_international', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
                <?php if($economyContents->count()): ?>
                    <div class="relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                        <?php echo $__env->make('frontend.bn.partials.new_economy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
           
        <!--/ International Section --->
        </div>
        <?php echo $__env->make('frontend.bn.ads.home.middle-7-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="news_container mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-b border-custom-bc dark:border-gray-600 pb-4">
                <?php if($lawContents->count()): ?>
                    <div class="relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                        <?php echo $__env->make('frontend.bn.partials.new_law_court', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
                <?php if($technologyContents->count()): ?>
                    <div class="relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                        <?php echo $__env->make('frontend.bn.partials.new_technology', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php echo $__env->make('frontend.bn.ads.home.middle-8-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.bn.ads.category.category-top-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="news_container mt-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 border-b border-custom-bc dark:border-gray-600 pb-4">
               
                <?php if($healthContents->count()): ?>
                    <div class="relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                        <?php echo $__env->make('frontend.bn.partials.new_health', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
                <?php if($educationContents->count()): ?>
                    <div class="relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                        <?php echo $__env->make('frontend.bn.partials.new_education', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
                <?php if($lifestyleContents->count()): ?>
                    <div class="">
                        <?php echo $__env->make('frontend.bn.partials.new_lifestyle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
        
        <?php echo $__env->make('frontend.bn.ads.home.middle-9-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php echo $__env->make('frontend.bn.ads.home.middle-10-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Photo Gallery Section --->
        <?php if(count($photoAlbums) > 0): ?>
           <div class="bg-[#e7e7e7] py-4 dark:bg-[#26334d] my-8">
               <div class="news_container">
                   <?php echo $__env->make('frontend.bn.partials.new_photo_gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               </div>
           </div>
        <?php endif; ?>
        <!--/ Photo gallery Section --->

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('frontend-assets/plugins/bootstrap/bootstrap.min.js')); ?>"></script>
    

    <?php if($breakingContents->count()): ?>
        <script src="<?php echo e(asset('frontend-assets/plugins/breaking/breaking.js')); ?>"></script>
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
    <?php endif; ?>


    <script src="<?php echo e(asset('frontend-assets/plugins/tab/tab.js')); ?>?id=123"></script>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.bn.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/home-new.blade.php ENDPATH**/ ?>