<?php $__env->startSection('title', 'Create User'); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('users.index')); ?>">User List</a></li>
        <li class="active">Add User</li>
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
            <form action="<?php echo e(route('users.store')); ?>" method="post" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Full Name <span class="required">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Full name">
                    <?php if($errors->has('name')): ?> <span class="text-danger"><?php echo e($errors->first('name')); ?></span> <?php endif; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="designation" class="col-sm-2 control-label">Designation <span class="required">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation">
                    <?php if($errors->has('designation')): ?> <span class="text-danger"><?php echo e($errors->first('designation')); ?></span> <?php endif; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email <span class="required">*</span></label>
                  <div class="col-sm-6">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    <?php if($errors->has('email')): ?> <span class="text-danger"><?php echo e($errors->first('email')); ?></span> <?php endif; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Username <span class="required">*</span></label>

                  <div class="col-sm-6">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                    <?php if($errors->has('username')): ?> <span class="text-danger"><?php echo e($errors->first('username')); ?></span> <?php endif; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password <span class="required">*</span></label>
                  <div class="col-sm-6">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
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
                  <label for="role" class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-6">
                    <select class="form-control col-sm-6" name="role" id="role">
                      <?php $__currentLoopData = config('customdata.user_roles'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($role); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>

                <div class="form-group" id="category-section" style="display: none">
                  <label for="role" class="col-sm-2 control-label">Category Permission</label>
                  <div class="col-sm-7">
                    <div style="padding: 10px; border: 1px solid lightgrey">
                      <div class="row">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <label class="col-sm-3">
                            <input name="category[]" type="checkbox" value="<?php echo e($category->cat_id); ?>"> <?php echo e($category->cat_name_bn); ?>

                          </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-8">
                      <label class="radio-inline">
                          <input type="radio" name="status" value="1" checked>Active
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="status" value="0">Inactive
                      </label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-6">
	                <button type="submit" class="btn btn-info">Submit</button>
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

<?php $__env->startSection('custom-js'); ?>
  <script>
    $(function() {

      $('#role').change(function() {
        var roleId = $(this).val();

        // Show/hide category section
        if (roleId == 4) {
          $("#category-section").css('display', 'block');
        } else {
          $("#category-section").css('display', 'none');
        }

      });
    });
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/user/user/user_create.blade.php ENDPATH**/ ?>