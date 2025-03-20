<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Notundesh24'); ?></title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo e(asset('/media/common/'.Cache::get('bnSiteSettings')->favicon)); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend-assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
<!-- Custom css -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend-assets/common/css/style.css')); ?>">
    <style>
        body {
            overflow-x: auto; /* Must be 'scroll' not 'auto' */
            -webkit-overflow-scrolling: touch;
        }
    </style>
    <?php echo $__env->yieldContent('custom-css'); ?>
    <meta content="500" http-equiv="refresh">
    <meta property="fb:pages" content="2273091126341395" />
    <meta property="fb:app_id" content="<?php echo e(config('appconfig.fb_app_id')); ?>"/>
    <meta property="og:site_name" content="<?php echo e(config('app.url')); ?>"/>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@notundesh24">
    <meta name="robots" content="index,follow">
    <?php echo $__env->yieldContent('customMeta'); ?>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=67d9544354a3d000192a4590&product=inline-share-buttons&source=platform" async="async"></script>
    
    <!-- Load ShareThis  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>


<?php echo $__env->yieldContent('fb-sdk'); ?>

<div id="news_wrapping">
    <?php echo $__env->make('frontend.bn.ads.common.top-banner-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.bn.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.bn.common.mobile-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="main-content">
        <?php echo $__env->yieldContent('mainContent'); ?>
    </div>

    <?php echo $__env->make('frontend.bn.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php echo $__env->yieldContent('custom-js'); ?>

<!-- Custom js -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
</script>
</body>
</html>



<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/app.blade.php ENDPATH**/ ?>