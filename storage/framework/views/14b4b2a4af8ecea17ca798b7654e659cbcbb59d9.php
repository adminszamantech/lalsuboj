

<?php $__env->startSection('title', 'Create Author'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('bn-authors.index')); ?>">Author List</a></li>
            <li class="active">Add Author</li>
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
                    <form action="<?php echo e(route('bn-authors.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal col-sm-offset-1">
                        <?php echo e(csrf_field()); ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="author_type" class="col-sm-3 control-label">User Type</label>
                                <div class="col-sm-6">
                                    <select class="form-control col-sm-6" name="author_type" id="author_type">
                                        <?php $__currentLoopData = config('customdata.author_types'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $author_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"><?php echo e($author_type); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author_name" class="col-sm-3 control-label">Author Name
                                    <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="author_name" class="form-control" id="author_name" placeholder="Author name" value="<?php echo e(old('author_name')); ?>">
                                    <?php if($errors->has('author_name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('author_name')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author_slug" class="col-sm-3 control-label">Author Slug
                                    <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="author_slug" class="form-control" id="author_slug" placeholder="Author Slug" value="<?php echo e(old('author_slug')); ?>">
                                    <?php if($errors->has('author_slug')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('author_slug')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author_name_bn" class="col-sm-3 control-label">Author Name (Bn)
                                    <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="author_name_bn" class="form-control" id="author_name_bn" placeholder="Author name bangla" value="<?php echo e(old('author_name_bn')); ?>">
                                    <?php if($errors->has('author_name_bn')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('author_name_bn')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author_initial" class="col-sm-3 control-label">Author Initial
                                    <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="author_initial" class="form-control" id="author_initial" placeholder="Author initial" value="<?php echo e(old('author_initial')); ?>">
                                    <?php if($errors->has('author_initial')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('author_initial')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author_initial_bn" class="col-sm-3 control-label">Author Initial (Bn)
                                    <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="author_initial_bn" class="form-control" id="author_initial_bn" placeholder="Author initial bangla" value="<?php echo e(old('author_initial_bn')); ?>">
                                    <?php if($errors->has('author_initial_bn')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('author_initial_bn')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author_bio" class="col-sm-3 control-label">Author Bio</label>
                                <div class="col-sm-6">
                                    <textarea name="author_bio" id="author_bio" class="form-control" placeholder="Author biodata"><?php echo e(old('author_bio')); ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author_bio_bn" class="col-sm-3 control-label">Author Bio (Bn)</label>
                                <div class="col-sm-6">
                                    <textarea name="author_bio_bn" id="author_bio_bn" class="form-control" placeholder="Author biodata bangla"><?php echo e(old('author_bio_bn')); ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author_image" class="col-sm-3 control-label">Author Image</label>
                                <div class="col-sm-6">
                                    <input type="file" name="author_image" id="author_image" class="form-control">
                                    <?php if($errors->has('author_image')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('author_image')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <button type="reset" class="btn btn-default">Clear</button>
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

<?php $__env->startSection('custom-js'); ?>
    <script type="text/javascript">
        $("#author_name").blur(function () { // Create Author name slug and initial
            var str = this.value;
            $("#author_slug").val(str.trim().toLowerCase().replace(/  /g, '-').replace(/ /g, '-').replace(/[^\w-]+/g, '-'));
            $("#author_initial").val(str.match(/\b\w/g).join('').toUpperCase());
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/settings/bn/author/bn_author_create.blade.php ENDPATH**/ ?>