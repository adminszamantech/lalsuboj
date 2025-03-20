
<?php
    $middleTenAd = $ads['homePageAds']->where('position', 10)->first();

    $hasMiddleTenAdTime = true;
    if ($middleTenAd && $middleTenAd->start_time && $middleTenAd->end_time && !\Carbon\Carbon::now()->between($middleTenAd->start_time, $middleTenAd->end_time)){
        $hasMiddleTenAdTime = false;
    }
?>

<?php if($middleTenAd && $hasMiddleTenAdTime): ?>
    <div class="desktop-middle-10 mt-4">
        <div class="<?php echo e($middleTenAd->type != 4 ? 'ad-box' : 'text-center'); ?>">
            
            <?php if($middleTenAd->type == 3): ?>
                <a href="<?php echo e($middleTenAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$middleTenAd->desktop_image_path)); ?>" class="mx-auto" alt="Middle Ten Ad">
                </a>
            <?php else: ?>
                <?php echo $middleTenAd->code; ?>

            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/ads/home/middle-10-ad.blade.php ENDPATH**/ ?>