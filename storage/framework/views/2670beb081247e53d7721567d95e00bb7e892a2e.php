    <div class="flex flex-col mb-2 ">
        <div class="category_header flex justify-between items-center dark:border-b-4 pb-1 dark:pb-2 dark:pt-1 dark:pb-1 border-b" style="border-color: red">
            <a href="/politics" class="flex flex-row gap-8 justify-center px-2">
                <div class="flex flex-row relative mt-2">
                    <!-- First Square -->
                    <div style="background: #00704A" class="w-4 h-4 absolute left-0 top-0 right-0"></div>
                    <!-- Second Square -->
                    <div class="w-4 h-4 bg-red-500 absolute left-2 top-2 bottom-0"></div>
                </div>
                <h2 class="category_text font-semibold text-base-color-3 dark:text-slate-200">রাজনীতি <i style="color:red; font-size:18px" class="fa fa-chevron-right"></i></h2>
            </a>
            
        </div>
        <div class="grid grid-cols-12 gap-4 md:gap-8 py-4 border-b border-custom-bc dark:border-gray-600">
            <div class="col-span-12 md:col-span-4 border-b md:border-b-0 border-custom-bc dark:border-gray-600 pb-2 md:pb-0 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                <?php $ptTopContent = $politicsContents->shift() ?>
                <a href="<?php echo e(postURL($ptTopContent->category->cat_slug, $ptTopContent->content_id)); ?>" class="flex flex-col gap-2 hover:no-underline focus:no-underline group">
                    <div class=" overflow-hidden">
                        <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($ptTopContent->img_bg_path ? asset(config('appconfig.contentImagePath').$ptTopContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>"  alt="">
                    </div>
                    <div class="flex flex-col gap-3">
                        <h2 class="category-heading-text text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong><?php echo e($ptTopContent->content_heading); ?></strong></h2>
                        <p class="lead-short-text text-[#555555] dark:text-gray-400"><?php echo fGetWord(fFormatString($ptTopContent->content_details), 50); ?></p>
                    </div>
                </a>
            </div>
           
            <div class="col-span-12 md:col-span-4 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                <div class="flex flex-col gap-8">
                    <?php ($ptOtherContents = $politicsContents->splice(0,3)); ?>
                    <?php if(count($ptOtherContents) > 0): ?>
                        <?php $__currentLoopData = $ptOtherContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ptOthercontent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($ptOthercontent): ?>
                                <a href="<?php echo e(postURL($ptOthercontent->category->cat_slug, $ptOthercontent->content_id)); ?>" class="grid grid-cols-2 gap-2 hover:no-underline focus:no-underline group relative after:content-[''] after:absolute after:-bottom-4 after:left-0 after:w-full after:h-[1px] after:border-b after:border-custom-bc md:last:after:border-0 after:dark:border-gray-600 after:dark:border-gray-600">
                                    <div>
                                        <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong><?php echo e($ptOthercontent->content_heading); ?></strong></h2>
                                        <p class="lead-short-text text-black dark:text-gray-400"><?php echo fGetWord(fFormatString($ptOthercontent->content_details), 8); ?></p>
                                    </div>
                                    <div class="overflow-hidden">
                                        <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($ptOthercontent->img_bg_path ? asset(config('appconfig.contentImagePath').$ptOthercontent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-span-12 md:col-span-4">
                <div class="flex flex-col gap-4 md:gap-8">
                    <?php ($ptAnotherContents = $politicsContents->splice(0,3)); ?>
                    <?php if(count($ptAnotherContents) > 0): ?>
                        <?php $__currentLoopData = $ptAnotherContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ptAnthercontent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($ptAnthercontent): ?>
                                <a href="<?php echo e(postURL($ptAnthercontent->category->cat_slug, $ptAnthercontent->content_id)); ?>" class="grid grid-cols-2 gap-2 hover:no-underline focus:no-underline group border-b md:border-b-0 border-custom-bc dark:border-gray-600 last:border-b-0 relative md:after:content-[''] md:after:absolute after:-bottom-4 after:left-0 after:w-full after:h-[1px] md:after:border-b after:border-custom-bc last:after:border-0 after:dark:border-gray-600">
                                    <div>
                                        <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong><?php echo e($ptAnthercontent->content_heading); ?></strong></h2>
                                        <p class="lead-short-text text-black dark:text-gray-400"><?php echo fGetWord(fFormatString($ptAnthercontent->content_details), 8); ?></p>
                                    </div>
                                    <div class="overflow-hidden">
                                        <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($ptAnthercontent->img_bg_path ? asset(config('appconfig.contentImagePath').$ptAnthercontent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/partials/new_politics.blade.php ENDPATH**/ ?>