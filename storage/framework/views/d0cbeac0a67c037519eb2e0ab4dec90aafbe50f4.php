
<?php
    $middleTopAd = $ads['homePageAds']->where('position', 1)->first();

    $hasMiddleTopAdTime = true;
    if ($middleTopAd && $middleTopAd->start_time && $middleTopAd->end_time && !\Carbon\Carbon::now()->between($middleTopAd->start_time, $middleTopAd->end_time)){
        $hasMiddleTopAdTime = false;
    }
?>

<?php if($middleTopAd && $hasMiddleTopAdTime): ?>
    <div class="middle-top-ad pt-4">
        <div class="news_container">
            
            <?php if($middleTopAd->type == 3): ?>
                <a href="<?php echo e($middleTopAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$middleTopAd->desktop_image_path)); ?>" class="mx-auto" alt="Middle Top Ad">
                </a>
            <?php else: ?>
                <?php echo $middleTopAd->code; ?>

            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/ads/home/middle-top-ad.blade.php ENDPATH**/ ?>