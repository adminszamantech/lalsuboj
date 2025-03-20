
<?php
    $categoryBottomAd = $ads['categoryPageAds']->where('position', 2)->first();

    $hasCategoryBottomAdTime = true;
    if ($categoryBottomAd && $categoryBottomAd->start_time && $categoryBottomAd->end_time && !\Carbon\Carbon::now()->between($categoryBottomAd->start_time, $categoryBottomAd->end_time)){
        $hasCategoryBottomAdTime = false;
    }
?>

<?php if($categoryBottomAd && $hasCategoryBottomAdTime): ?>
    <div class="marginTop20 mt-4 <?php echo e($categoryBottomAd->type != 4 ? 'advertisement' : ''); ?>">
        <?php if($categoryBottomAd->type != 4): ?>
        <div style="display: flex; justify-content: center; margin: 10px 0;">
            <?php endif; ?>
            <div class="">
                
                <?php if($categoryBottomAd->type == 3): ?>
                    <a href="<?php echo e($categoryBottomAd->external_link); ?>" target="_blank" rel="nofollow">
                        <img src="<?php echo e(asset(config('appconfig.adPath').$categoryBottomAd->desktop_image_path)); ?>" class="mx-auto"  alt="Middle Three Ad">
                    </a>
                <?php else: ?>
                    <?php echo $categoryBottomAd->code; ?>

                <?php endif; ?>
            </div>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/ads/category/category-bottom-ad.blade.php ENDPATH**/ ?>