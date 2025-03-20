
<?php
    $middleFourAd = $ads['homePageAds']->where('position', 5)->first();

    $hasMiddleFourAdTime = true;
    if ($middleFourAd && $middleFourAd->start_time && $middleFourAd->end_time && !\Carbon\Carbon::now()->between($middleFourAd->start_time, $middleFourAd->end_time)){
        $hasMiddleFourAdTime = false;
    }
?>

<?php if($middleFourAd && $hasMiddleFourAdTime): ?>
    <div class="desktop-ad-middle-4 mt-4">
        <div class="<?php echo e($middleFourAd->type != 4 ? 'ad-box' : 'text-center'); ?>">
            
            <?php if($middleFourAd->type == 3): ?>
                <a href="<?php echo e($middleFourAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$middleFourAd->desktop_image_path)); ?>" class="mx-auto" alt="Middle Four Ad">
                </a>
            <?php else: ?>
                <?php echo $middleFourAd->code; ?>

            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/ads/home/middle-4-ad.blade.php ENDPATH**/ ?>