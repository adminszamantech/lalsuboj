<?php $__env->startSection('title', cache('bnSiteSettings')->title); ?>

<?php $__env->startSection('mainContent'); ?>

    <div class="news_container">
        <div class="flex flex-col gap-4">

            <!-- Bangladesh Photo -->
            <?php if(count($bangladeshAlbums) > 0): ?>
                <div class="border-b border-b-[#dee2e6] mt-4 dark:border-gray-600">
                    <a href="<?php echo e(url('/photos/bangladesh')); ?>" class=" dark:text-slate-200 font-semibold">
                        <h1 class="text-xl md:text-2xl">বাংলাদেশ</h1>
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <?php $__currentLoopData = $bangladeshAlbums->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($albumURL = fAlbumURL($album->album_id, $album->category->cat_slug)); ?>
                    <a href="<?php echo e($albumURL); ?>" class="col-span-12 md:col-span-3 mb-6 bg-[#efefef] dark:bg-[#26334d] dark:text-slate-300">
                        <div class="lead-post group overflow-hidden">
                            <div class="relative">
                                <img src="<?php echo e(!empty($album->feature_image['img']) ? asset(config('appconfig.photoAlbumImagePath').$album->feature_image['img']) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="<?php echo e($album->album_name); ?>" class="mx-auto w-full group-hover:scale-110 duration-300">
                            </div>
                        </div>
                        <div class="image-caption px-4 py-4">
                            <h4 class="text-xl"><?php echo e($album->album_name); ?></h4>
                        </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <!-- End Bangladesh Photo -->

            <!-- Entertainment Photo -->
            <?php if(count($entertainmentAlbums) > 0): ?>
                <div class="border-b border-b-[#dee2e6] pb-2">
                    <a href="<?php echo e(url('/photos/entertainment')); ?>" class=" dark:text-slate-200 font-semibold">
                        <h1 class="text-xl md:text-2xl">বিনোদন</h1>
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <?php $__currentLoopData = $entertainmentAlbums->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($albumURL = fAlbumURL($album->album_id, $album->category->cat_slug)); ?>
                        <a href="<?php echo e($albumURL); ?>" class="col-span-12 md:col-span-3 mb-6 bg-[#efefef] dark:bg-[#26334d] dark:text-slate-300">
                            <div class="lead-post group overflow-hidden">
                                <div class="relative">
                                    <img src="<?php echo e(!empty($album->feature_image['img']) ? asset(config('appconfig.photoAlbumImagePath').$album->feature_image['img']) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="<?php echo e($album->album_name); ?>" class="mx-auto w-full group-hover:scale-110 duration-300">
                                </div>
                            </div>
                            <div class="image-caption px-4 py-4">
                                <h4 class="text-xl"><?php echo e($album->album_name); ?></h4>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <!-- End Entertainment Photo -->

            <!-- Sports Photo -->
            <?php if(count($sportsAlbums) > 0): ?>
                <div class="border-b border-b-[#dee2e6] pb-2">
                    <a href="<?php echo e(url('/photos/sports')); ?>" class=" dark:text-slate-200 font-semibold">
                        <h1 class="text-xl md:text-2xl">খেলা</h1>
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <?php $__currentLoopData = $sportsAlbums->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($albumURL = fAlbumURL($album->album_id, $album->category->cat_slug)); ?>
                        <a href="<?php echo e($albumURL); ?>" class="col-span-12 md:col-span-3 mb-6 bg-[#efefef] dark:bg-[#26334d] dark:text-slate-300">
                            <div class="lead-post group overflow-hidden">
                                <div class="relative">
                                    <img src="<?php echo e(!empty($album->feature_image['img']) ? asset(config('appconfig.photoAlbumImagePath').$album->feature_image['img']) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="<?php echo e($album->album_name); ?>" class="mx-auto w-full group-hover:scale-110 duration-300">
                                </div>
                            </div>
                            <div class="image-caption px-4 py-4">
                                <h4 class="text-xl"><?php echo e($album->album_name); ?></h4>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <!-- End Sports Photo -->

            <!-- Lifestyle Photo -->
            <?php if(count($lifestyleAlbums) > 0): ?>
                <div class="border-b border-b-[#dee2e6] pb-2">
                    <a href="<?php echo e(url('/photos/lifestyle')); ?>" class=" dark:text-slate-200 font-semibold">
                        <h1 class="text-xl md:text-2xl">লাইফস্টাইল</h1>
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <?php $__currentLoopData = $lifestyleAlbums->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($albumURL = fAlbumURL($album->album_id, $album->category->cat_slug)); ?>
                        <a href="<?php echo e($albumURL); ?>" class="col-span-12 md:col-span-3 mb-6 bg-[#efefef] dark:bg-[#26334d] dark:text-slate-300">
                            <div class="lead-post group overflow-hidden">
                                <div class="relative">
                                    <img src="<?php echo e(!empty($album->feature_image['img']) ? asset(config('appconfig.photoAlbumImagePath').$album->feature_image['img']) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="<?php echo e($album->album_name); ?>" class="mx-auto w-full group-hover:scale-110 duration-300">
                                </div>
                            </div>
                            <div class="image-caption px-4 py-4">
                                <h4 class="text-xl"><?php echo e($album->album_name); ?></h4>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <!-- End Lifestyle Photo -->

            <!-- International Photo -->
            <?php if(count($internationalAlbums) > 0): ?>
                <div class="border-b border-b-[#dee2e6] pb-2">
                    <a href="<?php echo e(url('/photos/international')); ?>" class=" dark:text-slate-200 font-semibold">
                        <h1 class="text-xl md:text-2xl">আন্তর্জাতিক</h1>
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <?php $__currentLoopData = $internationalAlbums->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($albumURL = fAlbumURL($album->album_id, $album->category->cat_slug)); ?>
                        <a href="<?php echo e($albumURL); ?>" class="col-span-12 md:col-span-3 mb-6 bg-[#efefef] dark:bg-[#26334d] dark:text-slate-300">
                            <div class="lead-post group overflow-hidden">
                                <div class="relative">
                                    <img src="<?php echo e(!empty($album->feature_image['img']) ? asset(config('appconfig.photoAlbumImagePath').$album->feature_image['img']) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="<?php echo e($album->album_name); ?>" class="mx-auto w-full group-hover:scale-110 duration-300">
                                </div>
                            </div>
                            <div class="image-caption px-4 py-4">
                                <h4 class="text-xl"><?php echo e($album->album_name); ?></h4>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <!-- End International Photo -->

            <!-- Technology Photo -->
            <?php if(count($technologyAlbums) > 0): ?>
                <div class="border-b border-b-[#dee2e6] pb-2">
                    <a href="<?php echo e(url('/photos/science-and-technology')); ?>" class=" dark:text-slate-200 font-semibold">
                        <h1 class="text-xl md:text-2xl">বিজ্ঞান ও প্রযুক্তি</h1>
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <?php $__currentLoopData = $technologyAlbums->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($albumURL = fAlbumURL($album->album_id, $album->category->cat_slug)); ?>
                        <a href="<?php echo e($albumURL); ?>" class="col-span-12 md:col-span-3 mb-6 bg-[#efefef] dark:bg-[#26334d] dark:text-slate-300">
                            <div class="lead-post group overflow-hidden">
                                <div class="relative">
                                    <img src="<?php echo e(!empty($album->feature_image['img']) ? asset(config('appconfig.photoAlbumImagePath').$album->feature_image['img']) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="<?php echo e($album->album_name); ?>" class="mx-auto w-full group-hover:scale-110 duration-300">
                                </div>
                            </div>
                            <div class="image-caption px-4 py-4">
                                <h4 class="text-xl"><?php echo e($album->album_name); ?></h4>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <!-- End Technology Photo -->

        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.bn.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/photo/home.blade.php ENDPATH**/ ?>