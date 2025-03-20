
<?php
    $categoryRightTwoAd = $ads['categoryPageAds']->where('position', 4)->first();

    $hasCategoryRightTwoAdTime = true;
    if ($categoryRightTwoAd && $categoryRightTwoAd->start_time && $categoryRightTwoAd->end_time && !\Carbon\Carbon::now()->between($categoryRightTwoAd->start_time, $categoryRightTwoAd->end_time)){
        $hasCategoryRightTwoAdTime = false;
    }
?>

<?php if($categoryRightTwoAd && $hasCategoryRightTwoAdTime): ?>

    <div class="marginBottom20 marginTop20 <?php echo e($categoryRightTwoAd->type != 4 ? 'advertisement' : ''); ?>">
        <div class="hidden-sm hidden-xs <?php echo e($categoryRightTwoAd->type != 4 ? 'ad-box' : ''); ?>">
            
            <?php if($categoryRightTwoAd->type == 3): ?>
                <a href="<?php echo e($categoryRightTwoAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$categoryRightTwoAd->desktop_image_path)); ?>" alt="Category Right Two Ad">
                </a>
            <?php else: ?>
                <?php echo $categoryRightTwoAd->code; ?>

            <?php endif; ?>
        </div>

    </div>
<?php endif; ?>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/ads/category/category-right-two-ad.blade.php ENDPATH**/ ?>