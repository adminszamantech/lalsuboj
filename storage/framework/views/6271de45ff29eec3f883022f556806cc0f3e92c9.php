<div class="flex flex-col mb-2">
    <div class="category_header flex justify-between items-center dark:border-b-4 pb-1 dark:pb-2 dark:pt-1 dark:pb-1 border-b border-custom-dbc">
        <a href="<?php echo e(url('/education')); ?>" class="flex flex-row gap-8 justify-center px-2">
            <div class="flex flex-row relative mt-2">
                <!-- First Square -->
                <div class="w-4 h-4 bg-blue-500 absolute left-0 top-0 right-0"></div>
                <!-- Second Square -->
                <div class="w-4 h-4 bg-red-500 absolute left-2 top-2 bottom-0"></div>
            </div>
            <h2 class="category_text font-semibold text-base-color-3 dark:text-slate-200">শিক্ষা</h2>
        </a>

        <a href="<?php echo e(url('/education')); ?>" class="px-3 py-1 dark:bg-black text-white bg-base-color hover:no-underline focus:no-underline group hover:text-white hover:bg-base-color-3 rounded text-base">
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>
    <div class="grid grid-cols-12 gap-4 md:gap-8 py-4">
        <div class="col-span-12 relative ">
            <div class="flex flex-col gap-4">
                <?php ($educationOtherContents = $educationContents->splice(0,5)); ?>
                <?php if(count($educationOtherContents) > 0): ?>
                    <?php $__currentLoopData = $educationOtherContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educationOtherContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($educationOtherContent): ?>
                            <a href="<?php echo e(postURL($educationOtherContent->category->cat_slug, $educationOtherContent->content_id)); ?>" class="grid grid-cols-12 gap-2 hover:no-underline focus:no-underline group relative after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-full after:h-[1px] after:border-b after:border-custom-bc md:last:after:border-0 after:dark:border-gray-600 after:dark:border-gray-600">
                                <div class="col-span-8">
                                    <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><?php echo e($educationOtherContent->content_heading); ?></h2>
                                </div>
                                <div class="overflow-hidden col-span-4">
                                    <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($educationOtherContent->img_bg_path ? asset(config('appconfig.contentImagePath').$educationOtherContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/partials/new_education.blade.php ENDPATH**/ ?>