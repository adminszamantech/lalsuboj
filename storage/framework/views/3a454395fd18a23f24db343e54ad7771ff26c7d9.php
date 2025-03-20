
<?php
    $categoryRightOneAd = $ads['categoryPageAds']->where('position', 3)->first();

    $hasCategoryRightOneAdTime = true;
    if ($categoryRightOneAd && $categoryRightOneAd->start_time && $categoryRightOneAd->end_time && !\Carbon\Carbon::now()->between($categoryRightOneAd->start_time, $categoryRightOneAd->end_time)){
        $hasCategoryRightOneAdTime = false;
    }
?>

<?php if($categoryRightOneAd && $hasCategoryRightOneAdTime): ?>

    <div class="marginBottom20 <?php echo e($categoryRightOneAd->type != 4 ? 'advertisement' : ''); ?>">
        <div class="hidden-sm hidden-xs <?php echo e($categoryRightOneAd->type != 4 ? 'ad-box' : ''); ?>">
            
            <?php if($categoryRightOneAd->type == 3): ?>
                <a href="<?php echo e($categoryRightOneAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$categoryRightOneAd->desktop_image_path)); ?>" alt="Category Right One Ad">
                </a>
            <?php else: ?>
                <?php echo $categoryRightOneAd->code; ?>

            <?php endif; ?>
        </div>

    </div>
<?php endif; ?>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/ads/category/category-right-one-ad.blade.php ENDPATH**/ ?>