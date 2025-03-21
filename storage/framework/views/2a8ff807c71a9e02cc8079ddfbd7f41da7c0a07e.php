<div class="grid grid-cols-1 md:grid-cols-12 gap-8 my-4 border-b border-custom-bc dark:border-gray-600 pb-4">
    <div class="col-span-12 md:col-span-9 md:relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:-right-4 md:after:w-[1px] md:after:h-full md:after:border-r after:dark:border-gray-600 after:border-custom-bc">
        <!-- First & Second Lead Post --->

        <?php ($spTopContent = $specialTopContents->shift()); ?>
        <div class="grid grid-cols-1 md:grid-cols-12 md:gap-8 pb-4 border-b border-custom-bc dark:border-gray-600">
            <div class="col-span-9 bg-[#0c2b57] md:relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:-right-4 md:after:w-[1px] md:after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                <!-- First Lead Post --->
                <a href="<?php echo e(postURL($spTopContent->category->cat_slug, $spTopContent->content_id)); ?>" class="grid grid-cols-12 h-full hover:no-underline focus:no-underline group">
                    <div class="col-span-12 md:col-span-5 px-8 py-8 flex flex-col gap-0">
                        <span class="lead_category text-red-500 text-base font-semibold"><?php echo e($spTopContent->category->cat_name_bn); ?> </span>
                        <h2 class="lead-text font-semibold text-white dark:text-slate-300"><?php echo e($spTopContent->content_heading); ?></h2>
                        <p class="lead-short-text text-white dark:text-gray-400"><?php echo fGetWord(fFormatString($spTopContent->content_details), 12); ?></p>
                    </div>
                    <div class="col-span-12 md:col-span-7 overflow-hidden">
                        <img class="h-full w-full group-hover:scale-110 duration-500" src="<?php echo e($spTopContent->img_bg_path ? asset(config('appconfig.contentImagePath').$spTopContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                    </div>
                </a>
                <!-- First Lead Post --->
            </div>

            <div class="col-span-12 md:col-span-3 mt-6 md:mt-0 ">
                <!-- Second Lead Post --->
                <?php if($specialTopContents[0]): ?>
                    <a href="<?php echo e(postURL($specialTopContents[0]->category->cat_slug, $specialTopContents[0]->content_id)); ?>" class="flex flex-col gap-2 hover:no-underline focus:no-underline group relative">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($specialTopContents[0]->img_bg_path ? asset(config('appconfig.contentImagePath').$specialTopContents[0]->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                        </div>
                       <div>
                           <span class="lead_category text-red-500 font-semibold text-base-color-2 text-base"><?php echo e($specialTopContents[0]->category->cat_name_bn); ?></span>
                           <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><?php echo e($specialTopContents[0]->content_heading); ?></h2>
                       </div>
                    </a>
                <?php endif; ?>
                <!--/ Second Lead Post --->
            </div>
        </div>
        <!--/ First & Second Lead Post --->

        <div class="grid grid-cols-1 md:grid-cols-4 md:gap-8 pt-4 pb-4 border-b border-custom-bc dark:border-gray-600">
            <?php ($spBottomFourContents = $specialTopContents->splice(1,4)); ?>
            <?php $__currentLoopData = $spBottomFourContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spBottomFourContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($spBottomFourContent): ?>
                    <a href="<?php echo e(postURL($spBottomFourContent->category->cat_slug, $spBottomFourContent->content_id)); ?>" class="flex flex-col gap-2 hover:no-underline focus:no-underline group relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:left-4 md:after:w-full md:after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600 mb-4 md:mb-0 border-b md:border-b-0 last:border-b-0 border-custom-bc dark:border-gray-600">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($spBottomFourContent->img_bg_path ? asset(config('appconfig.contentImagePath').$spBottomFourContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                        </div>
                        <div>
                            <span class="lead_category text-red-500 text-base-color-2 text-base"><?php echo e($spBottomFourContent->category->cat_name_bn); ?></span>
                            <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><?php echo e($spBottomFourContent->content_heading); ?></h2>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 md:gap-8 pt-4">

            <?php ($spBottomMoreFourContents = $specialTopContents->splice(1,4)); ?>
            <?php $__currentLoopData = $spBottomMoreFourContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spBottomMoreFourContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($spBottomMoreFourContent): ?>
                    <a href="<?php echo e(postURL($spBottomMoreFourContent->category->cat_slug, $spBottomMoreFourContent->content_id)); ?>" class="flex flex-col gap-2 hover:no-underline focus:no-underline group relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:left-4 md:after:w-full md:after:h-full md:after:border-r after:border-custom-bc mb-4 md:mb-0 after:dark:border-gray-600 border-b md:border-b-0 border-custom-bc dark:border-gray-600">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($spBottomMoreFourContent->img_bg_path ? asset(config('appconfig.contentImagePath').$spBottomMoreFourContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                        </div>
                        <div>
                            <span class="lead_category text-red-500 text-base-color-2 text-base"><?php echo e($spBottomMoreFourContent->category->cat_name_bn); ?></span>
                            <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><?php echo e($spBottomMoreFourContent->content_heading); ?></h2>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>



    <div class="col-span-12 md:col-span-3">
        <div class="flex flex-col gap-3">
            <?php echo $__env->make('frontend.bn.ads.home.right-1-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('frontend.bn.ads.home.right-2-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('frontend.bn.ads.home.right-3-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

</div>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/partials/new-special-top.blade.php ENDPATH**/ ?>