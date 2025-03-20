

<?php $__env->startSection('title', 'Upload Manual Photo'); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('manual-photos.index')); ?>">Manual Photo List</a></li>
        <li class="active">Add Manual Photo</li>
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
              <h3 class="box-title">Upload Manual Photo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo e(route('manual-photos.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal col-sm-offset-1">
              <?php echo e(csrf_field()); ?>

              <div class="box-body">
                  <div class="form-group">
                      <label for="manualPhoto" class="col-sm-2 control-label">Choose Photo</label>
                      <div class="col-sm-6">
                          <input type="file" name="manualPhoto" id="manualPhoto" class="form-control col-sm-6" style="height: auto">
                          <?php if($errors->has('manualPhoto')): ?>
                              <span class="text-danger"><?php echo e($errors->first('manualPhoto')); ?></span> <?php endif; ?>
                      </div>
                  </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-6">
	                <button type="submit" class="btn btn-info">Submit</button>
	                <button type="submit" class="btn btn-default">Cancel</button>
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

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/manualphoto/manual_photo_create.blade.php ENDPATH**/ ?>