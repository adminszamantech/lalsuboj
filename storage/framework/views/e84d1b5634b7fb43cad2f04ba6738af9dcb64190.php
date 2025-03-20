
<?php
    $homeRightThreeAd = $ads['homePageAds']->where('position', 13)->first();

    $hasHomeRightThreeAdTime = true;
    if ($homeRightThreeAd && $homeRightThreeAd->start_time && $homeRightThreeAd->end_time && !\Carbon\Carbon::now()->between($homeRightThreeAd->start_time, $homeRightThreeAd->end_time)){
        $hasHomeRightThreeAdTime = false;
    }
?>

<?php if($homeRightThreeAd && $hasHomeRightThreeAdTime): ?>

    <div class="hidden-sm hidden-xs marginBottom20 <?php echo e($homeRightThreeAd->type != 4 ? 'advertisement' : ''); ?>">
        <div class="<?php echo e($homeRightThreeAd->type != 4 ? 'ad-box' : ''); ?>">
            
            <?php if($homeRightThreeAd->type == 3): ?>
                <a href="<?php echo e($homeRightThreeAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$homeRightThreeAd->desktop_image_path)); ?>" class="w-full" alt="Home Right Three Ad">
                </a>
            <?php else: ?>
                <?php echo $homeRightThreeAd->code; ?>

            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/ads/home/right-3-ad.blade.php ENDPATH**/ ?>