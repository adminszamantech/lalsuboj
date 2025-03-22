<div class="grid grid-cols-1 md:grid-cols-12 gap-8 my-4 border-b border-custom-bc dark:border-gray-600 pb-4">
    <div class="col-span-12 md:col-span-9 md:relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:-right-4 md:after:w-[1px] md:after:h-full md:after:border-r after:dark:border-gray-600 after:border-custom-bc">
        <!-- First & Second Lead Post --->

        <?php ($spTopContent = $specialTopContents->shift()); ?>
        <div class="grid grid-cols-1 md:grid-cols-12 md:gap-8 pb-4 border-b border-custom-bc dark:border-gray-600">
            <div
                class="col-span-12 md:relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:-right-4 md:after:w-[1px] md:after:h-full  after:dark:border-gray-600">
                <!-- First Lead Post --->
                <a href="<?php echo e(postURL($spTopContent->category->cat_slug, $spTopContent->content_id)); ?>"
                    class="grid grid-cols-12 h-full hover:no-underline focus:no-underline group">

                    <div class="col-span-12 md:col-span-7 overflow-hidden">
                        <img class="h-full w-full group-hover:scale-110 duration-500"
                            src="<?php echo e($spTopContent->img_bg_path ? asset(config('appconfig.contentImagePath') . $spTopContent->img_bg_path) : asset(config('appconfig.commonImagePath') . Cache::get('bnSiteSettings')->og_image)); ?>"
                            alt="">
                    </div>
                    <div class="col-span-12 md:col-span-5 px-8 py-8 flex flex-col gap-0">
                        <span
                            class="lead_category text-red-500 text-base font-semibold"><?php echo e($spTopContent->category->cat_name_bn); ?>

                        </span>
                        <h2 class="lead-text font-semibold text-black dark:text-slate-300">
                            <strong><?php echo e($spTopContent->content_heading); ?></strong></h2>
                        <p class="lead-short-text text-black dark:text-gray-400"><?php echo fGetWord(fFormatString($spTopContent->content_details), 12); ?></p>
                    </div>
                </a>
                <!-- First Lead Post --->
            </div>
            

        </div>
        <!--/ First & Second Lead Post --->

        <div class="grid grid-cols-2 gap-2 md:grid-cols-4 md:gap-8 pt-4 pb-4 border-b border-custom-bc dark:border-gray-600">
            <?php ($spBottomFourContents = $specialTopContents->splice(1, 4)); ?>
            <?php $__currentLoopData = $spBottomFourContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spBottomFourContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($spBottomFourContent): ?>
                    <a href="<?php echo e(postURL($spBottomFourContent->category->cat_slug, $spBottomFourContent->content_id)); ?>"
                        class="flex flex-col gap-2 hover:no-underline focus:no-underline group relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:left-4 md:after:w-full md:after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600 mb-4 md:mb-0 border-b md:border-b-0 last:border-b-0 border-custom-bc dark:border-gray-600">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500"
                                src="<?php echo e($spBottomFourContent->img_bg_path ? asset(config('appconfig.contentImagePath') . $spBottomFourContent->img_bg_path) : asset(config('appconfig.commonImagePath') . Cache::get('bnSiteSettings')->og_image)); ?>"
                                alt="">
                        </div>
                        <div>
                            <span class="lead_category text-red-500 text-base-color-2 text-base"><strong><?php echo e($spBottomFourContent->category->cat_name_bn); ?></strong></span>
                            <h2
                                class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300">
                                <strong><?php echo e($spBottomFourContent->content_heading); ?></strong></h2>
                            <p class="lead-short-text text-black dark:text-gray-400"><?php echo fGetWord(fFormatString($spBottomFourContent->content_details), 8); ?></p>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="grid grid-cols-2 gap-2 md:grid-cols-4 md:gap-8 pt-4">

            <?php ($spBottomMoreFourContents = $specialTopContents->splice(1, 4)); ?>
            <?php $__currentLoopData = $spBottomMoreFourContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spBottomMoreFourContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($spBottomMoreFourContent): ?>
                    <a href="<?php echo e(postURL($spBottomMoreFourContent->category->cat_slug, $spBottomMoreFourContent->content_id)); ?>"
                        class="flex flex-col gap-2 hover:no-underline focus:no-underline group relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:left-4 md:after:w-full md:after:h-full md:after:border-r after:border-custom-bc mb-4 md:mb-0 after:dark:border-gray-600 border-b md:border-b-0 border-custom-bc dark:border-gray-600">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500"
                                src="<?php echo e($spBottomMoreFourContent->img_bg_path ? asset(config('appconfig.contentImagePath') . $spBottomMoreFourContent->img_bg_path) : asset(config('appconfig.commonImagePath') . Cache::get('bnSiteSettings')->og_image)); ?>"
                                alt="">
                        </div>
                        <div>
                            <span
                                class="lead_category text-red-500 text-base-color-2 text-base"><strong><?php echo e($spBottomMoreFourContent->category->cat_name_bn); ?></strong></span>
                            <h2
                                class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300">
                                <strong><?php echo e($spBottomMoreFourContent->content_heading); ?></strong></h2>
                            <p class="lead-short-text text-black dark:text-gray-400"><?php echo fGetWord(fFormatString($spBottomMoreFourContent->content_details), 8); ?></p>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>



    <div class="col-span-12 md:col-span-3">
        <div class="flex flex-col gap-3">
            <?php echo $__env->make('frontend.bn.partials.latest_posts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

</div>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/partials/new-special-top.blade.php ENDPATH**/ ?>