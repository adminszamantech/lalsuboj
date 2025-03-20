<?php $__env->startSection('title', 'Video Category Edit'); ?>

<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo e(route('bn-categories.index')); ?>">Category List</a></li>
      <li class="active">Edit Video Category</li>
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
          <form action="<?php echo e(route('bn-video-categories.update', $category->id)); ?>" method="post" class="form-horizontal col-sm-offset-1">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <div class="box-body">
              <div class="form-group">
                <label for="categoryName" class="col-sm-3 control-label">Category name <span class="required">*</span></label>

                <div class="col-sm-6">
                  <input type="text" name="categoryName" class="form-control" id="categoryName" value="<?php echo e($category->name); ?>">
                  <?php if($errors->has('categoryName')): ?> <span class="text-danger"><?php echo e($errors->first('categoryName')); ?></span> <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="categoryNameBn" class="col-sm-3 control-label">Category name (Bn) <span class="required">*</span></label>

                <div class="col-sm-6">
                  <input type="text" name="categoryNameBn" class="form-control" id="categoryNameBn" value="<?php echo e($category->name_bn); ?>">
                  <?php if($errors->has('categoryNameBn')): ?> <span class="text-danger"><?php echo e($errors->first('categoryNameBn')); ?></span> <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="metaKeywords" class="col-sm-3 control-label">Meta Keywords</label>

                <div class="col-sm-6">
                  <input type="text" name="metaKeywords" class="form-control" id="metaKeywords" value="<?php echo e($category->meta_keywords); ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="metaDescription" class="col-sm-3 control-label">Meta Description</label>

                <div class="col-sm-6">
                  <textarea name="metaDescription" id="metaDescription" class="form-control" placeholder="Meta description"><?php echo e($category->meta_description); ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="categoryPosition" class="col-sm-3 control-label">Category Position</label>
                <div class="col-sm-6">
                  <select class="form-control col-sm-6" name="categoryPosition" id="categoryPosition">
                    <option value="0">None</option>
                    <?php for($i=1; $i <= 40; $i++): ?>
                      <option value="<?php echo e($i); ?>" <?php echo e($category->position == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Status</label>
                <div class="col-sm-6">
                  <label class="radio-inline">
                    <input type="radio" name="status" value="1" <?php echo e($category->status == 1 ? 'checked' : ''); ?>>Active
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="status" value="2" <?php echo e($category->status == 2 ? 'checked' : ''); ?>>Inactive
                  </label>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                  <button type="submit" class="btn btn-info">Update</button>
                  <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default">Back</a>
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

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/settings/bn/video-category/category_edit.blade.php ENDPATH**/ ?>