<div class="grid grid-cols-1 md:grid-cols-12 gap-8 py-6">
    <div class="col-span-12 md:col-span-9 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:dark:border-gray-600 after:border-custom-bc items-center  dark:border-[#fff2]">
        <div class="category_header flex justify-between items-center dark:border-b-4 pb-1 dark:pb-2 dark:pt-1 dark:pb-1 border-b border-custom-dbc">
            <a href="/national" class="flex flex-row gap-8 justify-center px-2">
                <div class="flex flex-row relative mt-2">
                    <!-- First Square -->
                    <div class="w-4 h-4 bg-blue-500 absolute left-0 top-0 right-0"></div>
                    <!-- Second Square -->
                    <div class="w-4 h-4 bg-red-500 absolute left-2 top-2 bottom-0"></div>
                </div>
                <h2 class="category_text font-semibold text-base-color-3 dark:text-slate-200"> জাতীয়</h2>
            </a>

            <a href="/national" class="px-3 py-1 dark:bg-black text-white bg-base-color hover:no-underline focus:no-underline group hover:text-white hover:bg-base-color-3 rounded text-base">
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <!-- First & Second Lead Post --->
        <?php ($nationalContent = $nationalContents->shift()); ?>
        <div class="grid grid-cols-1 md:grid-cols-12 md:gap-8 py-4 border-b border-custom-bc dark:border-gray-600">
            <div class="col-span-9 border-b md:border-b-0 border-custom-bc dark:border-gray-600 pb-4 md:pb-0 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                <!-- First Lead Post --->
                <a href="<?php echo e(postURL($nationalContent->category->cat_slug, $nationalContent->content_id)); ?>" class="grid grid-cols-12 gap-4  h-full hover:no-underline focus:no-underline group group">
                    <div class="col-span-12 md:col-span-5 flex flex-col gap-6">
                        <h2 class="category-heading-text text-base-color group-hover:text-base-color-hover dark:text-slate-300"><?php echo e($nationalContent->content_heading); ?></h2>
                        <p class="lead-short-text text-[#555555] dark:text-gray-400"><?php echo fGetWord(fFormatString($nationalContent->content_details), 20); ?></p>
                    </div>
                    <div class="col-span-12 md:col-span-7 overflow-hidden">
                        <img class="h-full w-full group-hover:scale-110 duration-500" src="<?php echo e($nationalContent->img_bg_path ? asset(config('appconfig.contentImagePath').$nationalContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                    </div>
                </a>
                <!-- First Lead Post --->
            </div>

            <div class="col-span-12 md:col-span-3 mt-6 md:mt-0 ">
                <!-- Second Lead Post --->
                <?php if($nationalContents[0]): ?>
                    <a href="<?php echo e(postURL($nationalContents[0]->category->cat_slug, $nationalContents[0]->content_id)); ?>" class="flex flex-col gap-2 hover:no-underline focus:no-underline group group relative">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($nationalContents[0]->img_bg_path ? asset(config('appconfig.contentImagePath').$nationalContents[0]->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                        </div>
                        <div>
                            <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><?php echo e($nationalContents[0]->content_heading); ?></h2>
                        </div>
                    </a>
            <?php endif; ?>
            <!--/ Second Lead Post --->
            </div>
        </div>
        <!--/ First & Second Lead Post --->

        <div class="grid grid-cols-1 md:grid-cols-4 md:gap-8 pt-4 pb-4 md:border-b border-b-0 border-custom-bc dark:border-gray-600">
            <?php ($nationalBtContents = $nationalContents->splice(1,6)); ?>

            <?php $__currentLoopData = $nationalBtContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ntBottomCont): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($ntBottomCont): ?>
                    <a href="<?php echo e(postURL($ntBottomCont->category->cat_slug, $ntBottomCont->content_id)); ?>" class="flex flex-col gap-2 hover:no-underline focus:no-underline group group relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:left-4 md:after:w-full md:after:h-full md:after:border-r md:after:border-custom-bc md:after:dark:border-gray-600 mb-4 md:mb-0 border-b md:border-b-0 pb-2 md:pb-0 border-custom-bc dark:border-gray-600">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($ntBottomCont->img_bg_path ? asset(config('appconfig.contentImagePath').$ntBottomCont->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                        </div>
                        <div>
                            <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><?php echo e($ntBottomCont->content_heading); ?></h2>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

           <?php echo $__env->make('frontend.bn.ads.home.middle-2-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

    <div class="col-span-12 md:col-span-3">
        <?php echo $__env->make('frontend.bn.partials.latest_posts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

</div>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/partials/new_national_section.blade.php ENDPATH**/ ?>