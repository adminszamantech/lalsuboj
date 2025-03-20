
<?php
    $middleOneAd = $ads['homePageAds']->where('position', 2)->first();

    $hasMiddleOneAdTime = true;
    if ($middleOneAd && $middleOneAd->start_time && $middleOneAd->end_time && !\Carbon\Carbon::now()->between($middleOneAd->start_time, $middleOneAd->end_time)){
        $hasMiddleOneAdTime = false;
    }
?>

<?php if($middleOneAd && $hasMiddleOneAdTime): ?>
    <div class="marginBottom10">
        
            <div class="<?php echo e($middleOneAd->type != 4 ? 'ad-box' : 'text-center'); ?>">
                
                <?php if($middleOneAd->type == 3): ?>
                    <a href="<?php echo e($middleOneAd->external_link); ?>" target="_blank" rel="nofollow">
                        <img src="<?php echo e(asset(config('appconfig.adPath').$middleOneAd->desktop_image_path)); ?>" class="mx-auto" alt="Middle One Ad">
                    </a>
                <?php else: ?>
                    <?php echo $middleOneAd->code; ?>

                <?php endif; ?>
            </div>
            
    </div>
<?php endif; ?>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/ads/home/middle-1-ad.blade.php ENDPATH**/ ?>