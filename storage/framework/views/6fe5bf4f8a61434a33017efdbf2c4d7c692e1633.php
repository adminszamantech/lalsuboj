<?php $__env->startSection('title', 'Fix Bn Content Position'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('bn-content-position.index')); ?>">Special Position</a></li>
            <li class="active">Add Fixed Special Position </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if(session()->has('successMsg')): ?>
            <div class="alert alert-success alert-dismissable fade in custom-alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> <?php echo e(session('successMsg')); ?>

            </div>
        <?php endif; ?>
        <div class="row">
            <form action="<?php echo e(route('bnupdateContentPositionFixed')); ?>" method="post" class="form-horizontal" >
                <?php echo e(csrf_field()); ?>

                <div class="col-sm-6">
                    <div class="box box-solid">
                        <div class="box-group" id="accordion">
                            <div class="box box-default">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="position_number" class="col-sm-3 control-label">Special Position Number</label>
                                        <div class="col-sm-9">
                                            <select name="position_number" id="position_number" class="form-control">
                                                <option value="">--None--</option>
                                                <?php if(isset($position->position_number)): ?>
                                                    <?php for($i=1; $i<=11; $i++): ?>
                                                        <option value="<?php echo e($i); ?>" <?php if($position->position_number === $i): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                                                    <?php endfor; ?>
                                                <?php endif; ?>
                                            </select>
                                            <?php $__errorArgs = ['position_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class="text-danger"><?php echo e($message); ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_id" class="col-sm-3 control-label">News ID</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="news_id" placeholder="Enter news id" value="<?php echo e($position->news_id ?? null); ?>" class="form-control" name="news_id">
                                            <?php $__errorArgs = ['news_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class="text-danger"><?php echo e($message); ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-9">
                                            <label class="radio-inline">
                                                <input type="radio" name="is_fixed"  value="1" <?php if(isset($position->is_fixed)): ?> <?php if($position->is_fixed === 1): ?> checked <?php endif; ?> <?php endif; ?>>Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="is_fixed" value="0" <?php if(isset($position->is_fixed)): ?> <?php if($position->is_fixed === 0): ?> checked <?php endif; ?> <?php endif; ?>>Inactive
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3 control-label"></div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-info"> Fix Position</button>
                                            <a href="<?php echo e(route('bn-content-position.index')); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
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

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/bn/content_position/fix_content_position.blade.php ENDPATH**/ ?>