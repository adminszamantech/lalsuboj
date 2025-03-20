

<?php $__env->startSection('title', 'Photo Album Position Edit'); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
          <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="active">Photo Album Position</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action="<?php echo e(route('photo-album-positions.update', $position->position_id)); ?>" method="post" class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <div class="col-sm-12">
                    <div class="box box-solid">
                        <div class="box-group" id="accordion">
                            <div class="box box-default">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="position_name">Position Name <span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="position_name" id="position_name" value="<?php echo e($position->position_name); ?>">
                                            <?php if($errors->has('position_name')): ?> <span class="text-danger"><?php echo e($errors->first('position_name')); ?></span><?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="category_id">Category ID</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="category_id" id="category_id" value="<?php echo e($position->cat_id); ?>">
                                            <?php if($errors->has('category_id')): ?> <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span><?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="special_cat_id">Special Category ID</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="special_cat_id" id="special_cat_id" value="<?php echo e($position->special_cat_id); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="subcat_id">Sub Category ID</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="subcat_id" id="subcat_id" value="<?php echo e($position->subcat_id); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="totalContent">Total Content</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="totalContent" id="totalContent" value="<?php echo e($position->total_content); ?>">
                                            <?php if($errors->has('totalContent')): ?> <span class="text-danger"><?php echo e($errors->first('totalContent')); ?></span><?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-6">
                                            <label class="radio-inline">
                                                <input type="radio" name="status" value="1" <?php echo e($position->status == 1 ? 'checked' : ''); ?>>Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" value="2" <?php echo e($position->status == 2 ? 'checked' : ''); ?>>Inactive
                                            </label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-3 control-label"></div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> Update</button>
                                            <a href="<?php echo e(route('photo-album-positions.index')); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/photo/position/album_position_edit.blade.php ENDPATH**/ ?>