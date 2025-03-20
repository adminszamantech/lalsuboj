
<?php
    $middleSevenAd = $ads['homePageAds']->where('position', 8)->first();

    $hasMiddleSevenAdTime = true;
    if ($middleSevenAd && $middleSevenAd->start_time && $middleSevenAd->end_time && !\Carbon\Carbon::now()->between($middleSevenAd->start_time, $middleSevenAd->end_time)){
        $hasMiddleSevenAdTime = false;
    }
?>

<?php if($middleSevenAd && $hasMiddleSevenAdTime): ?>
    <div class="desktop-ad-middle-7 mt-4">
        <div class="<?php echo e($middleSevenAd->type != 4 ? 'ad-box' : 'text-center'); ?>">
            
            <?php if($middleSevenAd->type == 3): ?>
                <a href="<?php echo e($middleSevenAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$middleSevenAd->desktop_image_path)); ?>" class="mx-auto" alt="Middle Seven Ad">
                </a>
            <?php else: ?>
                <?php echo $middleSevenAd->code; ?>

            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/ads/home/middle-7-ad.blade.php ENDPATH**/ ?>