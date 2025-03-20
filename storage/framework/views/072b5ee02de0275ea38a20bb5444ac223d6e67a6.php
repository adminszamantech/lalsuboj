

<?php $__env->startSection('title', 'Change User Password'); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('users.index')); ?>">User List</a></li>
        <li class="active">Change User Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- form start -->
            <form action="<?php echo e(route('users.postChangePassword', $user->id)); ?>" method="post" class="form-horizontal col-sm-offset-1">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('PUT')); ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">New Password <span class="required">*</span></label>
                  <div class="col-sm-6">
                    <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                    <?php if($errors->has('password')): ?> <span class="text-danger"><?php echo e($errors->first('password')); ?></span> <?php endif; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="confirm_password" class="col-sm-2 control-label">Confirm Password <span class="required">*</span></label>
                  <div class="col-sm-6">
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm password">
                    <?php if($errors->has('password_confirmation')): ?> <span class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></span> <?php endif; ?>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-6">
	                <button type="submit" class="btn btn-info">Change</button>
	                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-default">Back</a>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>    
<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/user/user/change_password.blade.php ENDPATH**/ ?>