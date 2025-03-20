
<?php
    $categoryTopAd = $ads['categoryPageAds']->where('position', 1)->first();

    $hasCategoryTopAdTime = true;
    if ($categoryTopAd && $categoryTopAd->start_time && $categoryTopAd->end_time && !\Carbon\Carbon::now()->between($categoryTopAd->start_time, $categoryTopAd->end_time)){
        $hasCategoryTopAdTime = false;
    }
?>

<?php if($categoryTopAd && $hasCategoryTopAdTime): ?>
    <div class="marginTop20 mt-4 <?php echo e($categoryTopAd->type != 4 ? 'advertisement' : ''); ?>" align="center">
        <?php if($categoryTopAd->type != 4): ?>
            <div style="display: flex; justify-content: center;">
                <?php endif; ?>
                <div class="hidden-sm hidden-xs <?php echo e($categoryTopAd->type != 4 ? 'ad-box' : ''); ?>" style="<?php echo e($categoryTopAd->type == 2 ? 'min-width: 728px; max-height: 90px' : ''); ?>">
                    
                    <?php if($categoryTopAd->type == 3): ?>
                        <a href="<?php echo e($categoryTopAd->external_link); ?>" target="_blank" rel="nofollow">
                            <img src="<?php echo e(asset(config('appconfig.adPath').$categoryTopAd->desktop_image_path)); ?>" class="mx-auto" alt="Category Top Ad">
                        </a>
                    <?php else: ?>
                        <?php echo $categoryTopAd->code; ?>

                    <?php endif; ?>
                </div>


            </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/ads/category/category-top-ad.blade.php ENDPATH**/ ?>