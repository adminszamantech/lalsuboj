<div class="grid grid-cols-1 md:grid-cols-12 gap-8 py-4 md:mt-8">
    <div class="col-span-12 md:col-span-12 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
        <div class="category_header flex justify-between items-center dark:border-b-4 pb-1 dark:pb-2 dark:pt-1 dark:pb-1 border-b" style="border-color: red">
            <a href="/saradesh" class="flex flex-row gap-8 justify-center px-2">
                <div class="flex flex-row relative mt-2">
                    <!-- First Square -->
                    <div style="background: #00704A" class="w-4 h-4 absolute left-0 top-0 right-0"></div>
                    <!-- Second Square -->
                    <div class="w-4 h-4 bg-red-500 absolute left-2 top-2 bottom-0"></div>
                </div>
                <h2 class="category_text font-semibold text-base-color-3 dark:text-slate-200">সারাদেশ <i style="color:red; font-size:18px" class="fa fa-chevron-right"></i></h2>
            </a>
        </div>
        <!-- First & Second Lead Post --->
        <?php ($saradeshContent = $saradeshContents->shift()); ?>
        <div class="grid grid-cols-1 md:grid-cols-12 md:gap-8 py-4 border-b border-custom-bc dark:border-gray-600">
            <div class="col-span-12 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600 border-b-0 pb-6 md:border-b-0 md:pb-0 border-custom-bc dark:border-gray-600">
                <!-- First Lead Post --->
                <a href="<?php echo e(postURL($saradeshContent->category->cat_slug, $saradeshContent->content_id)); ?>" class="grid grid-cols-12 gap-4  h-full hover:no-underline focus:no-underline group group">
                    <div class="col-span-12 md:col-span-7 overflow-hidden">
                        <img class="h-full w-full group-hover:scale-110 duration-500" src="<?php echo e($saradeshContent->img_bg_path ? asset(config('appconfig.contentImagePath').$saradeshContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                    </div>
                    <div class="col-span-12 md:col-span-5 flex flex-col gap-6 items-center justify-center">
                        <h2 class="category-heading-text dark:text-slate-300 text-base-color group-hover:text-base-color-hover"><strong><?php echo e($saradeshContent->content_heading); ?></strong></h2>
                        <p class="lead-short-text text-[#555555] dark:text-gray-400"><?php echo fGetWord(fFormatString($saradeshContent->content_details), 70); ?></p>
                    </div>
                </a>
                <!-- First Lead Post --->
            </div>
          
        </div>
        <!--/ First & Second Lead Post --->

        <div class="grid grid-cols-2 gap-2 md:grid-cols-4 md:gap-8 pt-4 pb-4 md:border-b border-custom-bc dark:border-gray-600">
            <?php ($sportBtContents = $saradeshContents->splice(1,4)); ?>
            <?php $__currentLoopData = $sportBtContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sportBottomCont): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($sportBottomCont): ?>
                    <a href="<?php echo e(postURL($sportBottomCont->category->cat_slug, $sportBottomCont->content_id)); ?>" class="flex flex-col gap-2 hover:no-underline focus:no-underline group group relative md:after:content-[''] md:after:absolute after:top-0 after:left-4 md:after:w-full md:after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600 mb-4 md:mb-0 border-b md:border-b-0 border-custom-bc dark:border-gray-600">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($sportBottomCont->img_bg_path ? asset(config('appconfig.contentImagePath').$sportBottomCont->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                        </div>
                        <div>
                            <h2 class="post-title m-0 py-2 dark:text-slate-300 text-base-color group-hover:text-base-color-hover"><strong><?php echo e($sportBottomCont->content_heading); ?></strong></h2>
                            <p class="lead-short-text text-black dark:text-gray-400"><?php echo fGetWord(fFormatString($sportBottomCont->content_details), 8); ?></p>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php echo $__env->make('frontend.bn.ads.home.middle-4-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    

</div>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/partials/new_saradesh_section.blade.php ENDPATH**/ ?>