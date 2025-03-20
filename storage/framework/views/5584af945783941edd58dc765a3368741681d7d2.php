

<?php $__env->startSection('title', 'Manual Photo List'); ?>

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
        <li class="active">Manual Photo List</li>
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
              <h3 class="box-title">List of Manual Photo</h3>
              <a href="<?php echo e(route('manual-photos.create')); ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.box-header -->
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Photo</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($photo->photo_id); ?></td>
                    <td>
                      <input type="text" value="<?php echo e(asset(config('appconfig.contentImagePath').$photo->img_path)); ?>" id="url-<?php echo e($photo->photo_id); ?>" class="form-control"  style="display: inline; width: 90%" readonly>
                      <button type="button" onclick="copyUrl(<?php echo e($photo->photo_id); ?>)" class="btn btn-primary">Copy</button><br/>
                      <img src="<?php echo e(asset(config('appconfig.contentImagePath').$photo->img_path)); ?>">
                    </td>
                    <td>
                      <a href="<?php echo e(route('manual-photos.edit', $photo->photo_id)); ?>" class="btn btn-warning btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <form action="<?php echo e(route('manual-photos.destroy', $photo->photo_id)); ?>" method="post" style="display: inline">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>

                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this photo?')">
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

<?php $__env->startSection('custom-js'); ?>
  <script>
   function copyUrl(id){
    //alert('hello');
    document.getElementById('url-'+id).select();
    //alert(d);
    document.execCommand('copy');
   }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/manualphoto/manual_photo_list.blade.php ENDPATH**/ ?>