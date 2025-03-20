<?php $__env->startSection('title'); ?>
    <?php echo e($detailAlbum->album_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>

    <div class="news_container">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-12">
                <nav class="print:hidden pt-4">
                    <ol class="flex items-center gap-1 text-sm text-gray-600 border-b border-custom-bc dark:border-gray-500 w-fit">
                        <li>
                            <a href="<?php echo e(url('/photos')); ?>" class="block transition hover:text-gray-700 dark:text-gray-200 dark:hover:text-gray-300 text-base">ফটো গ্যালারি </a>
                        </li>
                    </ol>
                </nav>
                <div class="detail_image w-[800px] max-w-full mx-auto pb-4">
                    <div class="news_heading py-4 border-b border-custom-bc dark:border-gray-600 print:border-none print:pb-1 print:pt-3">
                        <h2 class="text-2xl lg:text-3xl leading-[35px] lg:leading-[35px] dark:text-slate-200 print:text-2xl"><?php echo e($detailAlbum->album_name); ?></h2>
                    </div>
                    <div class="demo-gallery">
                        <ul id="lightgallery" class="list-unstyled">
                            <?php ($photos = $detailAlbum->album_details); ?>
                            <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single-block auto my-4">
                                    <div class="img-box">
                                        <img class="w-full" src="<?php echo e(asset(config('appconfig.photoAlbumImagePath'). $photo['img'])); ?>" alt="<?php echo e($photo['caption']); ?>">
                                    </div>
                                    <?php if($photo['caption']): ?>
                                        <p class="py-1 px-4 text-center bg-black text-white"><?php echo e($photo['caption']); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.bn.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/photo/details.blade.php ENDPATH**/ ?>