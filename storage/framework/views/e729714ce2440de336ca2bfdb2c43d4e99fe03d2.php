
<?php
    $middleSixAd = $ads['homePageAds']->where('position', 7)->first();

    $hasMiddleSixAdTime = true;
    if ($middleSixAd && $middleSixAd->start_time && $middleSixAd->end_time && !\Carbon\Carbon::now()->between($middleSixAd->start_time, $middleSixAd->end_time)){
        $hasMiddleSixAdTime = false;
    }
?>

<?php if($middleSixAd && $hasMiddleSixAdTime): ?>
    <div class="desktop-ad-middle-6 mt-4">
        <div class="<?php echo e($middleSixAd->type != 4 ? 'ad-box' : 'text-center'); ?>">
            
            <?php if($middleSixAd->type == 3): ?>
                <a href="<?php echo e($middleSixAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$middleSixAd->desktop_image_path)); ?>" class="mx-auto" alt="Middle Six Ad">
                </a>
            <?php else: ?>
                <?php echo $middleSixAd->code; ?>

            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/ads/home/middle-6-ad.blade.php ENDPATH**/ ?>