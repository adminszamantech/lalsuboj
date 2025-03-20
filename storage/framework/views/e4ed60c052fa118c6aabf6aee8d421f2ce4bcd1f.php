

<?php $__env->startSection('title', 'Subcategory Edit'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <<li><a href="<?php echo e(route('bn-subcategories.index')); ?>">Subcategory List</a></li>
            <li class="active">Edit Subcategory</li>
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
                    <form action="<?php echo e(route('bn-subcategories.update', $subcategory->subcat_id)); ?>" method="post" class="form-horizontal col-sm-offset-1">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="categoryType" class="col-sm-3 control-label">Category</label>
                                <div class="col-sm-6">
                                    <select class="form-control col-sm-6" name="category" id="category">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->cat_id); ?>" <?php echo e($category->cat_id == $subcategory->cat_id ? 'selected' : ''); ?>><?php echo e($category->cat_name_bn); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subcategoryName" class="col-sm-3 control-label">Subategory name
                                    <span class="required">*</span></label>

                                <div class="col-sm-6">
                                    <input type="text" name="subcategoryName" class="form-control" id="subcategoryName" value="<?php echo e($subcategory->subcat_name); ?>">
                                    <?php if($errors->has('subcategoryName')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('subcategoryName')); ?></span> <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subcategoryNameBn" class="col-sm-3 control-label">Subcategory name (Bn)
                                    <span class="required">*</span></label>

                                <div class="col-sm-6">
                                    <input type="text" name="subcategoryNameBn" class="form-control" id="subcategoryNameBn" value="<?php echo e($subcategory->subcat_name_bn); ?>">
                                    <?php if($errors->has('subcategoryNameBn')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('subcategoryNameBn')); ?></span> <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="metaKeyword" class="col-sm-3 control-label">Meta Keyword</label>
                                <div class="col-sm-6">
                                    <input type="text" name="metaKeyword" class="form-control" id="metaKeyword" value="<?php echo e($subcategory->subcat_meta_keyword); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="metaDescription" class="col-sm-3 control-label">Meta Description</label>
                                <div class="col-sm-6">
                                    <textarea name="metaDescription" id="metaDescription" class="form-control" placeholder="Meta description"><?php echo e($subcategory->subcat_meta_description); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subcategoryPosition" class="col-sm-3 control-label">Subcategory
                                    Position</label>
                                <div class="col-sm-6">
                                    <select class="form-control col-sm-6" name="subcategoryPosition" id="subcategoryPosition">
                                        <option value="1">None</option>
                                        <?php for($i=1; $i <= 10; $i++): ?>
                                            <option value="<?php echo e($i+1); ?>" <?php echo e($subcategory->subcat_position == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php echo e($subcategory->status == 1 ? 'checked' : ''); ?>>Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="2" <?php echo e($subcategory->status == 2 ? 'checked' : ''); ?>>Inactive
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <button type="submit" class="btn btn-info">Update</button>
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

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/settings/bn/subcategory/subcategory_edit.blade.php ENDPATH**/ ?>