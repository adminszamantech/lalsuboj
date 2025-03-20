<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $__env->yieldContent('title', cache('bnSiteSettings')->site_name); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/adminlte/bootstrap/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <?php echo $__env->yieldContent('custom-css'); ?>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/adminlte/dist/css/AdminLTE.min.css')); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/adminlte/dist/css/skins/_all-skins.min.css')); ?>">
    <!-- iCheck -->

    <link rel="stylesheet" href="<?php echo e(asset('backend/css/backend-style.css')); ?>">

</head>
<body class="hold-transition skin-purple-light sidebar-mini">
<div class="wrapper">
    <?php echo $__env->make('backend.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backend.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- /.content-wrapper -->
    <?php echo $__env->make('backend.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo e(asset('backend/adminlte/plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('backend/js/jquery-ui-1.11.4.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('backend/adminlte/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('backend/adminlte/dist/js/app.min.js')); ?>"></script>

<script type="text/javascript">
    function copy(that) {
        let inp = document.createElement('input');
        document.body.appendChild(inp)
        inp.value = that.textContent
        inp.select();
        document.execCommand('copy', false);
        inp.remove();
    }

    function tempAlert(msg, duration) {
        let el = document.createElement("div");
        // let tagBox = document.querySelector('.tag-box');
        el.classList.add('alert');
        el.setAttribute("style", "position:fixed;top:10%;left:50%;transform: translate(-50%, -50%); background-color:red;color:white;font-weight:bold");
        el.innerHTML = msg;
        setTimeout(function () {
            el.parentNode.removeChild(el);
        }, duration);
        document.body.appendChild(el);
    }

    const text = document.querySelectorAll('.tag-text');
    for (let i = 0; i < text.length; i++) {
        text[i].addEventListener('click', (event) => {
            tempAlert(`${text[i].innerHTML} : COPIED`, 1000);
        })
    }
</script>
<?php echo $__env->yieldContent('custom-js'); ?>
</body>
</html>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/app.blade.php ENDPATH**/ ?>