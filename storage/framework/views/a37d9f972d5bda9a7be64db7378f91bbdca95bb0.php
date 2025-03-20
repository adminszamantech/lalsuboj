

<?php
    $middleTwoAd = $ads['homePageAds']->where('position', 3)->first();

    $hasMiddleTwoAdTime = true;
    if ($middleTwoAd && $middleTwoAd->start_time && $middleTwoAd->end_time && !\Carbon\Carbon::now()->between($middleTwoAd->start_time, $middleTwoAd->end_time)){
        $hasMiddleTwoAdTime = false;
    }
?>

<?php if($middleTwoAd && $hasMiddleTwoAdTime): ?>
    <div class="desktop-middle-ad-2 mt-4">
            <div class="<?php echo e($middleTwoAd->type != 4 ? 'ad-box' : 'text-center'); ?>">

                <?php if($middleTwoAd->type == 3): ?>
                    <a href="<?php echo e($middleTwoAd->external_link); ?>" target="_blank" rel="nofollow">
                        <img src="<?php echo e(asset(config('appconfig.adPath').$middleTwoAd->desktop_image_path)); ?>" alt="Middle Two Ad">
                    </a>
                <?php else: ?>
                    <?php echo $middleTwoAd->code; ?>

                <?php endif; ?>
            </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/ads/home/middle-2-ad.blade.php ENDPATH**/ ?>