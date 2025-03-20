<?php $__env->startSection('title', 'Video Category List'); ?>

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
        <li class="active">Video Category List</li>
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
              <h3 class="box-title">List of Video Category</h3>
              <a href="<?php echo e(route('bn-video-categories.create')); ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.box-header -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category Name</th>
                  <th>Category Name (Bn)</th>
                  <th>Category Position</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e(++$key); ?></td>
                    <td>
                        <?php echo e($category->name); ?>

                    </td>

                    <td>
                        <?php echo e($category->name_bn); ?>

                    </td>
                    <td><?php echo e($category->position); ?></td>
                    <td>
                      <span class="btn btn-<?php echo e($category->status == 1 ? 'success' : 'danger'); ?> btn-xs"><i class="fa fa-<?php echo e($category->status == 1 ? 'check' : 'times'); ?>"></i></span>
                    </td>
                    <td>
                      <a href="<?php echo e(route('bn-video-categories.edit', $category->id)); ?>" class="btn btn-warning btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <form action="<?php echo e(route('bn-video-categories.destroy', $category->id)); ?>" method="post" style="display: inline">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>

                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this category?')">
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

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/settings/bn/video-category/category_list.blade.php ENDPATH**/ ?>