<div class="flex flex-col mb-2">
    <div class="category_header flex justify-between items-center dark:border-b-4 pb-1 dark:pb-2 dark:pt-1 dark:pb-1 border-b" style="border-color: red">
        <a href="<?php echo e(url('/technology')); ?>" class="flex flex-row gap-8 justify-center px-2">
            <div class="flex flex-row relative mt-2">
                <!-- First Square -->
                <div style="background: #00704A" class="w-4 h-4 absolute left-0 top-0 right-0"></div>
                <!-- Second Square -->
                <div class="w-4 h-4 bg-red-500 absolute left-2 top-2 bottom-0"></div>
            </div>
            <h2 class="category_text font-semibold text-base-color-3 dark:text-slate-200">তথ্যপ্রযুক্তি <i style="color:red; font-size:18px" class="fa fa-chevron-right"></i></h2>
        </a>
    </div>
    <div class="grid grid-cols-12 gap-4 md:gap-8 py-4">
        
        <div class="col-span-12 md:col-span-12">
            <div class="flex flex-col gap-2 grid grid-cols-2 gap-2">
                <?php ($techOtherContents = $technologyContents->splice(0,4)); ?>
                <?php if(count($techOtherContents) > 0): ?>
                    <?php $__currentLoopData = $techOtherContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $techOtherContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($techOtherContent): ?>
                            <a href="<?php echo e(postURL($techOtherContent->category->cat_slug, $techOtherContent->content_id)); ?>" class="grid grid-cols-1 gap-2 hover:no-underline focus:no-underline group relative after:content-[''] after:absolute after:-bottom-4 after:left-0 after:w-full after:h-[1px after:dark:border-gray-600 after:dark:border-gray-600">
                                <div class="overflow-hidden">
                                    <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($techOtherContent->img_bg_path ? asset(config('appconfig.contentImagePath').$techOtherContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                                </div>
                                <div>
                                    <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong><?php echo e($techOtherContent->content_heading); ?></strong></h2>
                                    <p class="lead-short-text text-black dark:text-gray-400"><?php echo fGetWord(fFormatString($techOtherContent->content_details), 10); ?></p>
                                </div>
                               
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/partials/new_technology.blade.php ENDPATH**/ ?>