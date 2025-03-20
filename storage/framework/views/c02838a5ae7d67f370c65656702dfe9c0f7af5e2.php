<div class="flex flex-col">
    <div class="latest_news bg-base-color dark:bg-[#26334d] dark:border-t dark:border-[#fff2] text-white text-center">
        <h2 class="text-xl py-2 flex flex-row gap-4 dark:text-slate-200 justify-center items-center">
                    <span class="relative flex h-4 w-4">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                   </span>
            সর্বশেষ খবর
        </h2>
    </div>
    <div class="latest_post_tab">
        <?php if(count($latestContents) > 0): ?>
            <?php $__currentLoopData = $latestContents->splice(0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(postURL($latContent->category->cat_slug, $latContent->content_id)); ?>" class="grid grid-cols-12 hover:no-underline focus:no-underline group border-b border-custom-bc dark:border-gray-600 py-4 group">
                    <div class="col-span-7">
                        <h2 class="text-[18px] m-0 text-base-color pr-2 group-hover:text-base-color-hover dark:text-slate-300"><?php echo e($latContent->content_heading); ?></h2>
                    </div>
                    <div class="col-span-5 overflow-hidden">
                        <img src="<?php echo e($latContent->img_bg_path ? asset(config('appconfig.contentImagePath').$latContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" class="w-full group-hover:scale-110 duration-500" alt="">
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a href="/latest/news" class="px-4 py-2 text-center block text-white bg-base-color hover:bg-base-color-3 hover:no-underline focus:no-underline group hover:text-white rounded text-base mt-4">আরও পড়ুন</a>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/partials/latest_posts.blade.php ENDPATH**/ ?>