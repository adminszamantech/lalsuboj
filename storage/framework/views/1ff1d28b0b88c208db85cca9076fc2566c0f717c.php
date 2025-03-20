
<?php
    $middleThreeAd = $ads['homePageAds']->where('position', 4)->first();

    $hasMiddleThreeAdTime = true;
    if ($middleThreeAd && $middleThreeAd->start_time && $middleThreeAd->end_time && !\Carbon\Carbon::now()->between($middleThreeAd->start_time, $middleThreeAd->end_time)){
        $hasMiddleThreeAdTime = false;
    }
?>

<?php if($middleThreeAd && $hasMiddleThreeAdTime): ?>
    <div class="desktop-middle-ad-3 mt-4">
        <div class="<?php echo e($middleThreeAd->type != 4 ? 'ad-box' : 'text-center'); ?>">
            
            <?php if($middleThreeAd->type == 3): ?>
                <a href="<?php echo e($middleThreeAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$middleThreeAd->desktop_image_path)); ?>" class="mx-auto" alt="Middle Three Ad">
                </a>
            <?php else: ?>
                <?php echo $middleThreeAd->code; ?>

            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/ads/home/middle-3-ad.blade.php ENDPATH**/ ?>