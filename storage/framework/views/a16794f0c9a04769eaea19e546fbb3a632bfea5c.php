<div class="flex flex-col py-4">

    <div class="category_header flex justify-between items-center dark:border-b-4 pb-1 dark:pb-2 dark:pt-1 dark:pb-1 border-b border-custom-dbc">
        <a href="/photos" class="flex flex-row gap-8 justify-center px-2">
            <div class="flex flex-row relative mt-2">
                <!-- First Square -->
                <div class="w-4 h-4 bg-blue-500 absolute left-0 top-0 right-0"></div>
                <!-- Second Square -->
                <div class="w-4 h-4 bg-red-500 absolute left-2 top-2 bottom-0"></div>
            </div>
            <h2 class="category_text font-semibold text-base-color-3 dark:text-slate-200">ছবি</h2>
        </a>

        <a href="/photos" class="px-3 py-1 dark:bg-black text-white bg-base-color hover:no-underline focus:no-underline group hover:text-white hover:bg-base-color-3 rounded text-base">
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>

    <div class="grid grid-cols-12 gap-4 py-4 border-b border-custom-bc dark:border-gray-600">

        <?php ($leadAlbum = $photoAlbums->shift()); ?>
        <?php ($leadAlbumURL = fAlbumURL($leadAlbum->album_id, $leadAlbum->category->cat_slug)); ?>
        <div class="col-span-12 md:col-span-6">
            <a href="<?php echo e($leadAlbumURL); ?>" class="relative">
                <img class="h-full" src="<?php echo e(asset(config('appconfig.photoAlbumImagePath') . ($leadAlbum->feature_image['img']))); ?>"
                     alt="<?php echo e($leadAlbum->album_name); ?>">
                <div class="absolute bottom-0 left-0 text-white px-4 bg-black py-2 w-full">
                    <h2><?php echo e($leadAlbum->album_name); ?></h2>
                </div>
            </a>
        </div>
        <div class="col-span-12 md:col-span-6 h-full">
            <div class="grid grid-cols-2 gap-4 h-full">
                <?php $__currentLoopData = $photoAlbums->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php ($albumURL = fAlbumURL($album->album_id, $album->category->cat_slug)); ?>
                    <a href="<?php echo e($albumURL); ?>" class="relative group overflow-hidden h-full">
                        <img class="h-full" src="<?php echo e(asset(config('appconfig.photoAlbumImagePath') . ($album->feature_image['img']))); ?>" alt="<?php echo e($album->album_name); ?>">
                        <div class="absolute group-hover:top-0 duration-200 -top-full left-0 h-full text-white px-4 backdrop-blur-sm bg-black/50 py-2 w-full">
                            <h2><?php echo e($album->album_name); ?></h2>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>

</div>

<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/partials/new_photo_gallery.blade.php ENDPATH**/ ?>