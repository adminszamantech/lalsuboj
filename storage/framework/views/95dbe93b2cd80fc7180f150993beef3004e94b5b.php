
<?php
    $categoryRightThreeAd = $ads['categoryPageAds']->where('position', 5)->first();

    $hasCategoryRightThreeAdTime = true;
    if ($categoryRightThreeAd && $categoryRightThreeAd->start_time && $categoryRightThreeAd->end_time && !\Carbon\Carbon::now()->between($categoryRightThreeAd->start_time, $categoryRightThreeAd->end_time)){
        $hasCategoryRightThreeAdTime = false;
    }
?>

<?php if($categoryRightThreeAd && $hasCategoryRightThreeAdTime): ?>

    <div class="marginTop20 <?php echo e($categoryRightThreeAd->type != 4 ? 'advertisement' : ''); ?>">
        <div class="hidden-sm hidden-xs <?php echo e($categoryRightThreeAd->type != 4 ? 'ad-box' : ''); ?>">
            
            <?php if($categoryRightThreeAd->type == 3): ?>
                <a href="<?php echo e($categoryRightThreeAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$categoryRightThreeAd->desktop_image_path)); ?>" alt="Category Right Two Ad">
                </a>
            <?php else: ?>
                <?php echo $categoryRightThreeAd->code; ?>

            <?php endif; ?>
        </div>
        
    </div>
<?php endif; ?>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/ads/category/category-right-three-ad.blade.php ENDPATH**/ ?>