
<?php
    $homeRightOneAd = $ads['homePageAds']->where('position', 11)->first();

    $hasHomeRightOneAdTime = true;
    if ($homeRightOneAd && $homeRightOneAd->start_time && $homeRightOneAd->end_time && !\Carbon\Carbon::now()->between($homeRightOneAd->start_time, $homeRightOneAd->end_time)){
        $hasHomeRightOneAdTime = false;
    }
?>

<?php if($homeRightOneAd && $hasHomeRightOneAdTime): ?>
    <div class="marginBottom20">
        <div class="<?php echo e($homeRightOneAd->type != 4 ? 'ad-box' : ''); ?>">
            
            <?php if($homeRightOneAd->type == 3): ?>
                <a href="<?php echo e($homeRightOneAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$homeRightOneAd->desktop_image_path)); ?>" class="w-full" alt="Home Right One Ad">
                </a>
            <?php else: ?>
                <?php echo $homeRightOneAd->code; ?>

            <?php endif; ?>
        </div>
    </div>

<?php endif; ?>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/ads/home/right-1-ad.blade.php ENDPATH**/ ?>