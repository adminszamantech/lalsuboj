<?php $__env->startSection('title', 'BN Video Create'); ?>

<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo e(route('bn-videos.index')); ?>">BN Video List</a></li>
      <li class="active">BN Videos</li>
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
            <h3 class="box-title">Create BN Video</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form action="<?php echo e(route('bn-videos.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="category">Category <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <select name="category" id="category" class="form-control" required>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"<?php echo e(old('category') == $category->id ? ' selected' : ''); ?>><?php echo e($category->name_bn); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="type">Video Type <span class="required">*</span></label>
                <div class="col-sm-6">
                  <select name="type" id="type" class="form-control" onchange="toggleType(this)" required>
                    <option value="">Choose type</option>
                    <option value="1"<?php echo e(old('type') == 1 ? ' selected' : ''); ?>>Youtube</option>
                    <option value="2"<?php echo e(old('type') == 2 ? ' selected' : ''); ?>>Facebook</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Title <span class="required">*</span></label>
                <div class="col-sm-6">
                  <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo e(old('title')); ?>" required />
                  <?php if($errors->has('title')): ?> <span class="text-danger"><?php echo e($errors->first('title')); ?></span> <?php endif; ?>
                </div>
              </div>

                <div class="form-group" id="image">
                    <label for="image" class="col-sm-2 control-label">Image <span class="required">*</span></label>
                    <div class="col-sm-6">
                        <div class="text-info" style="margin-bottom: 5px;">Dimension: 750 X 390 pixel & Max size: 100kb</div>
                        <input type="file" name="image" id="image" class="form-control col-sm-6" style="height: auto">
                        <?php if($errors->has('image')): ?> <span class="text-danger"><?php echo e($errors->first('image')); ?></span> <?php endif; ?>
                    </div>
                </div>

              <div class="form-group">
                <label for="code" class="col-sm-2 control-label">Code</label>
                <div class="col-sm-6">
                  <input type="text" name="code" class="form-control" id="code" placeholder="Code" value="<?php echo e(old('code')); ?>">
                  <?php if($errors->has('code')): ?> <span class="text-danger"><?php echo e($errors->first('code')); ?></span> <?php endif; ?>
                </div>
              </div>

                <div class="form-group">
                    <label for="metaKeywords" class="col-sm-2 control-label">Meta Keywords</label>
                    <div class="col-sm-6">
                        <textarea name="metaKeywords" class="form-control" id="metaKeywords" placeholder="Meta Keywords"><?php echo e(old('metaKeywords')); ?></textarea>
                        <?php if($errors->has('metaKeywords')): ?> <span class="text-danger"><?php echo e($errors->first('metaKeywords')); ?></span> <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="metaDescription" class="col-sm-2 control-label">Meta Description</label>
                    <div class="col-sm-6">
                        <textarea name="metaDescription" class="form-control" id="metaDescription" placeholder="Meta Description"><?php echo e(old('metaDescription')); ?></textarea>
                        <?php if($errors->has('metaDescription')): ?> <span class="text-danger"><?php echo e($errors->first('metaDescription')); ?></span> <?php endif; ?>
                    </div>
                </div>

             
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="target">Open On</label>
                    <div class="col-sm-6">
                        <select name="target" id="target" class="form-control" required>
                            <option value="1"<?php echo e(old('target') == 1 ? ' selected' : ''); ?>>Same Site</option>
                            <option value="2"<?php echo e(old('target') == 2 ? ' selected' : ''); ?>>New Window</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Live?</label>
                    <div class="col-sm-6">
                        <label class="radio-inline">
                            <input type="radio" name="is_live" value="1" checked>Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_live" value="0">No
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-6">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="1" checked>Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="2">Inactive
                        </label>
                    </div>
                </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                  <button type="submit" class="btn btn-info">Submit</button>
                  <button type="reset" class="btn btn-default">Reset</button>
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

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/bn/video/create.blade.php ENDPATH**/ ?>