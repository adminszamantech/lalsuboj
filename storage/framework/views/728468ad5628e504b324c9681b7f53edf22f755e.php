
<?php
    $homeRightTwoAd = $ads['homePageAds']->where('position', 12)->first();

    $hasHomeRightTwoAdTime = true;
    if ($homeRightTwoAd && $homeRightTwoAd->start_time && $homeRightTwoAd->end_time && !\Carbon\Carbon::now()->between($homeRightTwoAd->start_time, $homeRightTwoAd->end_time)){
        $hasHomeRightTwoAdTime = false;
    }
?>

<?php if($homeRightTwoAd && $hasHomeRightTwoAdTime): ?>

    <div class="">
        <div class="">
            
            <?php if($homeRightTwoAd->type == 3): ?>
                <a href="<?php echo e($homeRightTwoAd->external_link); ?>" target="_blank" rel="nofollow">
                    <img src="<?php echo e(asset(config('appconfig.adPath').$homeRightTwoAd->desktop_image_path)); ?>" class="w-full"  alt="Home Right Two Ad">
                </a>
            <?php else: ?>
                <?php echo $homeRightTwoAd->code; ?>

            <?php endif; ?>
        </div>











    </div>
<?php endif; ?>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/ads/home/right-2-ad.blade.php ENDPATH**/ ?>