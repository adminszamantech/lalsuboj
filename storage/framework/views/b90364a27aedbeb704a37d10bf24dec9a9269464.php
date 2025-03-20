<?php $__env->startSection('title', 'User List'); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <?php if(session()->has('successMsg')): ?>
        <div class="alert alert-success alert-dismissable fade in custom-alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> <?php echo e(session('successMsg')); ?>

        </div>
      <?php endif; ?>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="active">User List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List of User</h3>
              <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.box-header -->
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e(config('customdata.user_roles')[$user->role]); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                      <span class="btn btn-<?php echo e($user->status == 1 ? 'success' : 'danger'); ?> btn-xs"><i class="fa fa-<?php echo e($user->status == 1 ? 'check' : 'times'); ?>"></i></span>
                    </td>
                    <td>
                        <?php if(!$user->provider): ?>
                          <a href="<?php echo e(route('users.getChangePassword', $user->id)); ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-lock"></i>
                          </a>
                        <?php endif; ?>
                      <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>

                      <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="post" style="display: inline">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>

                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this division?')">
                          <i class="fa fa-times"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/user/user/user_list.blade.php ENDPATH**/ ?>