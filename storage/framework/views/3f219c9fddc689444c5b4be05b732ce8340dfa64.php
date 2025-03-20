<div class="flex flex-col mb-2">
    <div class="category_header flex justify-between items-center dark:border-b-4 pb-1 dark:pb-2 dark:pt-1 dark:pb-1 border-b border-custom-dbc">
        <a href="<?php echo e(url('/crime')); ?>" class="flex flex-row gap-8 justify-center px-2">
            <div class="flex flex-row relative mt-2">
                <!-- First Square -->
                <div class="w-4 h-4 bg-blue-500 absolute left-0 top-0 right-0"></div>
                <!-- Second Square -->
                <div class="w-4 h-4 bg-red-500 absolute left-2 top-2 bottom-0"></div>
            </div>
            <h2 class="category_text font-semibold text-base-color-3 dark:text-slate-200">অপরাধ</h2>
        </a>

        <a href="<?php echo e(url('/crime')); ?>" class="px-3 py-1 dark:bg-black text-white bg-base-color hover:no-underline focus:no-underline group hover:text-white hover:bg-base-color-3 rounded text-base">
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>
    <div class="grid grid-cols-12 gap-4 md:gap-8 py-4">
        <div class="col-span-12 md:col-span-6 border-b md:border-b-0 border-custom-bc dark:border-gray-600 pb-2 md:pb-0 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
            <?php $crimeContentFirst = $crimeContents->shift() ?>
            <a href="<?php echo e(postURL($crimeContentFirst->category->cat_slug, $crimeContentFirst->content_id)); ?>" class="flex flex-col gap-2 hover:no-underline focus:no-underline group">
                <div class=" overflow-hidden">
                    <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($crimeContentFirst->img_bg_path ? asset(config('appconfig.contentImagePath').$crimeContentFirst->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>"  alt="">
                </div>
                <div class="flex flex-col gap-3">
                    <h2 class="category-heading-text text-base-color group-hover:text-base-color-hover dark:text-slate-300"><?php echo e($crimeContentFirst->content_heading); ?></h2>
                    <p class="lead-short-text text-[#555555] dark:text-gray-400"><?php echo fGetWord(fFormatString($crimeContentFirst->content_details), 20); ?></p>
                </div>
            </a>
        </div>
        <div class="col-span-12 md:col-span-6 relative ">
            <div class="flex flex-col gap-8">
                <?php ($crimeOtherContents = $crimeContents->splice(0,3)); ?>
                <?php if(count($crimeOtherContents) > 0): ?>
                    <?php $__currentLoopData = $crimeOtherContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crimeOtherContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($crimeOtherContent): ?>
                            <a href="<?php echo e(postURL($crimeOtherContent->category->cat_slug, $crimeOtherContent->content_id)); ?>" class="grid grid-cols-2 gap-2 hover:no-underline focus:no-underline group relative after:content-[''] after:absolute after:-bottom-4 after:left-0 after:w-full after:h-[1px] after:border-b after:border-custom-bc md:last:after:border-0 after:dark:border-gray-600 after:dark:border-gray-600">
                                <div>
                                    <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><?php echo e($crimeOtherContent->content_heading); ?></h2>
                                </div>
                                <div class="overflow-hidden">
                                    <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($crimeOtherContent->img_bg_path ? asset(config('appconfig.contentImagePath').$crimeOtherContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/partials/new_crime.blade.php ENDPATH**/ ?>