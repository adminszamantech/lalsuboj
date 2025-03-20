
<?php
    $topBannerAd = $ads['commonAds']->where('position', 1)->first();

    $hasTopBannerAdTime = true;
    if ($topBannerAd && $topBannerAd->start_time && $topBannerAd->end_time && !\Carbon\Carbon::now()->between($topBannerAd->start_time, $topBannerAd->end_time)){
        $hasTopBannerAdTime = false;
    }

    $middleOneAd = $ads['homePageAds']->where('position', 1)->first();
    $hasMiddleOneAdTime = true;
    if ($middleOneAd && $middleOneAd->start_time && $middleOneAd->end_time && !\Carbon\Carbon::now()->between($middleOneAd->start_time, $middleOneAd->end_time)){
        $hasMiddleOneAdTime = false;
    }
?>

<?php if($topBannerAd && $hasTopBannerAdTime): ?>
    <div class="header-container py-2 border-b border-bc dark:border-gray-600">
        <?php if($topBannerAd->type != 4): ?>
            <div class="header-ad">
                <?php else: ?>
                    <div class="header-ad">
                        <?php endif; ?>
                        <div class="flex flex-row items-center justify-center">
                            
                            <?php if($topBannerAd->type == 3): ?>
                                <a href="<?php echo e($topBannerAd->external_link); ?>" target="_blank" rel="nofollow">
                                    <img src="<?php echo e(asset(config('appconfig.adPath').$topBannerAd->desktop_image_path)); ?>" alt="Header Ad">
                                </a>
                            <?php else: ?>
                                <?php echo $topBannerAd->code; ?>

                            <?php endif; ?>
                        </div>

                        
                    </div>
            </div>
        <?php else: ?>
            <?php if($hasMiddleOneAdTime): ?>
                <style>
                    @media  screen and (max-width: 767px) {
                        /*header {*/
                        /*    display: inline-block !important;*/
                        /*    width: 100%;*/
                        /*    position: absolute;*/
                        /*}*/

                        /*.main-content {*/
                        /*    padding-top: 60px !important;*/
                        /*}*/
                    }
                </style>
<?php endif; ?>


<?php endif; ?>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/ads/common/top-banner-ad.blade.php ENDPATH**/ ?>