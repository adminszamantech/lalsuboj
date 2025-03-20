<?php $__env->startSection('title', 'Category List'); ?>

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
        <li class="active">Category List</li>
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
              <h3 class="box-title">List of Category</h3>
              
            </div>
            <!-- /.box-header -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category Name</th>
                  <th>Category Name (Bn)</th>
                  <th>Show Menu</th>
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
                      <?php if($category->cat_type == 2): ?>
                        <span class="label label-info"><?php echo e($category->cat_name); ?></span>
                      <?php else: ?>
                        <?php echo e($category->cat_name); ?>

                      <?php endif; ?>
                    </td>

                    <td>
                      <?php if($category->cat_type == 2): ?>
                        <span class="label label-info"><?php echo e($category->cat_name_bn); ?></span>
                      <?php else: ?>
                        <?php echo e($category->cat_name_bn); ?>

                      <?php endif; ?>
                    </td>
                    <td>
                      Top Menu: <span class="label label-<?php echo e($category->top_menu == 1 ? 'success' : 'danger'); ?>"><?php echo e($category->top_menu == 1 ? 'Yes' : 'No'); ?></span><br>
                      Footer Menu: <span class="label label-<?php echo e($category->footer_menu == 1 ? 'success' : 'danger'); ?>"><?php echo e($category->footer_menu == 1 ? 'Yes' : 'No'); ?></span>
                    </td>
                    <td><?php echo e($category->cat_position); ?></td>
                    <td>
                      <span class="btn btn-<?php echo e($category->status == 1 ? 'success' : 'danger'); ?> btn-xs"><i class="fa fa-<?php echo e($category->status == 1 ? 'check' : 'times'); ?>"></i></span>
                    </td>
                    <td>
                      <a href="<?php echo e(route('bn-categories.edit', $category->cat_id)); ?>" class="btn btn-warning btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <form action="<?php echo e(route('bn-categories.destroy', $category->cat_id)); ?>" method="post" style="display: inline">
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

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/settings/bn/category/category_list.blade.php ENDPATH**/ ?>