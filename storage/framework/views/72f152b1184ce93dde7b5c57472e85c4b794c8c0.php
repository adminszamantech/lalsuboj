<?php $__env->startSection('title', 'Counter'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('elections.index')); ?>">Counter</a></li>
            <li class="active">Counter</li>
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
                        <h3 class="box-title">Counter</h3>
                    </div>
                    <?php if(session()->has('successMsg')): ?>
                        <div class="alert alert-success alert-dismissable fade in custom-alert" style="display: inline-block">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> <?php echo e(session('successMsg')); ?>

                        </div>
                    <?php endif; ?>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo e(route('admin.update')); ?>" method="post" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                        <div class="box-body">


                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Counter Name <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="counter_name" class="form-control" id="counter_name" placeholder="Title" value="<?php echo e($counter->counter_name); ?>" required />
                                    <?php if($errors->has('title')): ?> <span class="text-danger"><?php echo e($errors->first('title')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-sm-2 control-label">Counter Date</label>
                                <div class="col-sm-6">
                                    <input type="date" id="date" value="<?php echo e(date('Y-m-d', strtotime($counter->date))); ?>" class="form-control" name="date">
                                    <?php if($errors->has('total_center')): ?> <span class="text-danger"><?php echo e($errors->first('total_center')); ?></span> <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="time" class="col-sm-2 control-label">Counter Time</label>
                                <div class="col-sm-6">
                                    <input type="time" id="time" value="<?php echo e($counter->time); ?>" name="time" class="form-control">
                                    <?php if($errors->has('total_center')): ?> <span class="text-danger"><?php echo e($errors->first('total_center')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php echo e($counter->status == 1 ? 'checked' : ''); ?>>Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="2" <?php echo e($counter->status == 2 ? 'checked' : ''); ?>>Inactive
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <button type="submit" class="btn btn-info">Update</button>
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

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/szamymni/notundesh24.com/resources/views/backend/counter/index.blade.php ENDPATH**/ ?>