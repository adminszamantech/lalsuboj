
<?php
    $middleNineAd = $ads['homePageAds']->where('position', 10)->first();

    $hasMiddleNineAdTime = true;
    if ($middleNineAd && $middleNineAd->start_time && $middleNineAd->end_time && !\Carbon\Carbon::now()->between($middleNineAd->start_time, $middleNineAd->end_time)){
        $hasMiddleNineAdTime = false;
    }
?>

<?php if($middleNineAd && $hasMiddleNineAdTime): ?>
    <div class="desktop-ad-middle-9 mt-4">
        
            <div class="<?php echo e($middleNineAd->type != 4 ? 'ad-box' : 'text-center'); ?>">
                
                <?php if($middleNineAd->type == 3): ?>
                    <a href="<?php echo e($middleNineAd->external_link); ?>" target="_blank" rel="nofollow">
                        <img src="<?php echo e(asset(config('appconfig.adPath').$middleNineAd->desktop_image_path)); ?>" class="mx-auto" alt="Middle Nine Ad">
                    </a>
                <?php else: ?>
                    <?php echo $middleNineAd->code; ?>

                <?php endif; ?>
            </div>

            
            
    </div>
<?php endif; ?>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/ads/home/middle-9-ad.blade.php ENDPATH**/ ?>