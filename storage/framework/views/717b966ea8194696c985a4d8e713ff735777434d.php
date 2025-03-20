
<?php
    $middleEightAd = $ads['homePageAds']->where('position', 9)->first();

    $hasMiddleEightAdTime = true;
    if ($middleEightAd && $middleEightAd->start_time && $middleEightAd->end_time && !\Carbon\Carbon::now()->between($middleEightAd->start_time, $middleEightAd->end_time)){
        $hasMiddleEightAdTime = false;
    }
?>

<?php if($middleEightAd && $hasMiddleEightAdTime): ?>
    <div class="desktop-ad-middle-8 mt-4">
        <div class="<?php echo e($middleEightAd->type != 4 ? 'ad-box' : 'text-center'); ?>">
            
            <?php if($middleEightAd->type == 3): ?>
                <a href="<?php echo e($middleEightAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$middleEightAd->desktop_image_path)); ?>" class="mx-auto" alt="Middle Eight Ad">
                </a>
            <?php else: ?>
                <?php echo $middleEightAd->code; ?>

            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/ads/home/middle-8-ad.blade.php ENDPATH**/ ?>