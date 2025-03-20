

<?php $__env->startSection('title', 'Category Edit'); ?>

<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo e(route('bn-categories.index')); ?>">Category List</a></li>
      <li class="active">Edit Category</li>
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
          <form action="<?php echo e(route('bn-categories.update', $category->cat_id)); ?>" method="post" class="form-horizontal col-sm-offset-1">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <div class="box-body">
              <div class="form-group">
                <label for="categoryType" class="col-sm-3 control-label">Category type</label>
                <div class="col-sm-6">
                  <select class="form-control col-sm-6" name="categoryType" id="categoryType">
                    <?php $__currentLoopData = config('customdata.cat_types'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($key); ?>" <?php echo e($category->cat_type == $key ? 'selected' : ''); ?>><?php echo e($cat_type); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="categoryName" class="col-sm-3 control-label">Category name <span class="required">*</span></label>

                <div class="col-sm-6">
                  <input type="text" name="categoryName" class="form-control" id="categoryName" value="<?php echo e($category->cat_name); ?>">
                  <?php if($errors->has('categoryName')): ?> <span class="text-danger"><?php echo e($errors->first('categoryName')); ?></span> <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="categoryNameBn" class="col-sm-3 control-label">Category name (Bn) <span class="required">*</span></label>

                <div class="col-sm-6">
                  <input type="text" name="categoryNameBn" class="form-control" id="categoryNameBn" value="<?php echo e($category->cat_name_bn); ?>">
                  <?php if($errors->has('categoryNameBn')): ?> <span class="text-danger"><?php echo e($errors->first('categoryNameBn')); ?></span> <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="metaKeyword" class="col-sm-3 control-label">Meta Keyword</label>

                <div class="col-sm-6">
                  <input type="text" name="metaKeyword" class="form-control" id="metaKeyword" value="<?php echo e($category->cat_meta_keyword); ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="metaDescription" class="col-sm-3 control-label">Meta Description</label>

                <div class="col-sm-6">
                  <textarea name="metaDescription" id="metaDescription" class="form-control" placeholder="Meta description"><?php echo e($category->cat_meta_description); ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="categoryPosition" class="col-sm-3 control-label">Category Position</label>
                <div class="col-sm-6">
                  <select class="form-control col-sm-6" name="categoryPosition" id="categoryPosition">
                    <option value="0">None</option>
                    <?php for($i=1; $i <= 40; $i++): ?>
                      <option value="<?php echo e($i); ?>" <?php echo e($category->cat_position == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Show at Top Menu?</label>
                <div class="col-sm-6">
                  <label class="radio-inline">
                    <input type="radio" name="topMenu" value="1" <?php echo e($category->top_menu == 1 ? 'checked' : ''); ?>>Yes
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="topMenu" value="2" <?php echo e($category->top_menu == 2 ? 'checked' : ''); ?>>No
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Show at Footer Menu?</label>
                <div class="col-sm-6">
                  <label class="radio-inline">
                    <input type="radio" name="footerMenu" value="1" <?php echo e($category->footer_menu == 1 ? 'checked' : ''); ?>>Yes
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="footerMenu" value="2" <?php echo e($category->footer_menu == 2 ? 'checked' : ''); ?>>No
                  </label>
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
<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/settings/bn/category/category_edit.blade.php ENDPATH**/ ?>