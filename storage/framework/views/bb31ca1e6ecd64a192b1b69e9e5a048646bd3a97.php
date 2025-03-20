
<?php
    $middleFiveAd = $ads['homePageAds']->where('position', 6)->first();

    $hasMiddleFiveAdTime = true;
    if ($middleFiveAd && $middleFiveAd->start_time && $middleFiveAd->end_time && !\Carbon\Carbon::now()->between($middleFiveAd->start_time, $middleFiveAd->end_time)){
        $hasMiddleFiveAdTime = false;
    }
?>

<?php if($middleFiveAd && $hasMiddleFiveAdTime): ?>
    <div class="desktop-ad-middle-5 mt-4">
        
            <div class="<?php echo e($middleFiveAd->type != 4 ? 'ad-box' : 'text-center'); ?>">
                
                <?php if($middleFiveAd->type == 3): ?>
                    <a href="<?php echo e($middleFiveAd->external_link); ?>" target="_blank" rel="nofollow">
                        <img src="<?php echo e(asset(config('appconfig.adPath').$middleFiveAd->desktop_image_path)); ?>" class="mx-auto" alt="Middle Five Ad">
                    </a>
                <?php else: ?>
                    <?php echo $middleFiveAd->code; ?>

                <?php endif; ?>
            </div>
            
    </div>
<?php endif; ?>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/ads/home/middle-5-ad.blade.php ENDPATH**/ ?>