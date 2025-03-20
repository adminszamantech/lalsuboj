
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/adminlte/bootstrap/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <title>লগইন | লালসবুজ২৪.কম</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background:url('<?php echo e(asset('backend/adminlte/dist/img/login-background.jpg')); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .main_container {
            text-align: center;
            width: 500px;
            margin: 0 auto;
            padding: 0 20px;
        }
        h1 {
            font-size: 3em;
            color: #333;
        }
        p {
            font-size: 1.5em;
            color: #666;
        }

        .login_container{
            background: #008970;
            padding: 20px 20px;
        }
        .login-box-msg {
            background: #000;
            padding: 10px 10px;
            text-align: center;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="main_container">
    <div class="login-box-msg">লালসবুজ২৪.কম</div>
    <div class="login_container">
        <form action="<?php echo e(route('admin.login.submit')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <?php if($errors->has('username')): ?>
                    <span class="help-block">
                <strong class="text-danger"><?php echo e($errors->first('username')); ?></strong>
            </span>
                <?php endif; ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                <strong class="text-danger"><?php echo e($errors->first('password')); ?></strong>
            </span>
                <?php endif; ?>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" >LOG IN</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
</div>
</body>
</html>
<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/auth/login.blade.php ENDPATH**/ ?>