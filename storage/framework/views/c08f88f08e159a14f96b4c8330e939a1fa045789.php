<?php $__env->startSection('title', 'Election Edit'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('elections.index')); ?>">Election List</a></li>
            <li class="active">Edit Election</li>
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
                        <h3 class="box-title">Edit Election</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo e(route('elections.update', $election->id)); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                        <div class="box-body">

                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Title <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo e($election->title); ?>" required />
                                    <?php if($errors->has('title')): ?> <span class="text-danger"><?php echo e($errors->first('title')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="total_center" class="col-sm-2 control-label">Total Seat</label>
                                <div class="col-sm-6">
                                    <input type="text" name="total_center" class="form-control" id="total_center" placeholder="Total Seat" value="<?php echo e($election->total_center); ?>">
                                    <?php if($errors->has('total_center')): ?> <span class="text-danger"><?php echo e($errors->first('total_center')); ?></span> <?php endif; ?>
                                </div>
                            </div>









                            <div class="form-group">
                                <label for="party_one_name" class="col-sm-2 control-label">Party One Name</label>
                                <div class="col-sm-6">
                                    <input type="text" name="party_one_name" class="form-control" id="party_one_name" placeholder="Party One Name" value="<?php echo e($election->party_one_name); ?>">
                                    <?php if($errors->has('party_one_name')): ?> <span class="text-danger"><?php echo e($errors->first('party_one_name')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="party_one_votes" class="col-sm-2 control-label">Party One Total Seat</label>
                                <div class="col-sm-6">
                                    <input type="text" name="party_one_votes" class="form-control" id="party_one_votes" placeholder="Party One Total Vote" value="<?php echo e($election->party_one_votes); ?>">
                                    <?php if($errors->has('party_one_votes')): ?> <span class="text-danger"><?php echo e($errors->first('party_one_votes')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="party_two_name" class="col-sm-2 control-label">Party Two Name</label>
                                <div class="col-sm-6">
                                    <input type="text" name="party_two_name" class="form-control" id="party_two_name" placeholder="Party Two Name" value="<?php echo e($election->party_two_name); ?>">
                                    <?php if($errors->has('party_two_name')): ?> <span class="text-danger"><?php echo e($errors->first('party_two_name')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="party_two_votes" class="col-sm-2 control-label">Party Two Total Seat</label>
                                <div class="col-sm-6">
                                    <input type="text" name="party_two_votes" class="form-control" id="party_two_votes" placeholder="Party Two Total Vote" value="<?php echo e($election->party_two_votes); ?>">
                                    <?php if($errors->has('party_two_votes')): ?> <span class="text-danger"><?php echo e($errors->first('party_two_votes')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="party_three_name" class="col-sm-2 control-label">Party Three Name</label>
                                <div class="col-sm-6">
                                    <input type="text" name="party_three_name" class="form-control" id="party_three_name" placeholder="Party Two Name" value="<?php echo e($election->party_three_name); ?>">
                                    <?php if($errors->has('party_three_name')): ?> <span class="text-danger"><?php echo e($errors->first('party_three_name')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="party_three_votes" class="col-sm-2 control-label">Party Three Total Seat</label>
                                <div class="col-sm-6">
                                    <input type="text" name="party_three_votes" class="form-control" id="party_three_votes" placeholder="Party three Total Seat" value="<?php echo e($election->party_three_votes); ?>">
                                    <?php if($errors->has('party_three_votes')): ?> <span class="text-danger"><?php echo e($errors->first('party_two_votes')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="party_three_name" class="col-sm-2 control-label">Party Four Name</label>
                                <div class="col-sm-6">
                                    <input type="text" name="party_four_name" class="form-control" id="party_four_name" placeholder="Party Two Name" value="<?php echo e($election->party_four_name); ?>">
                                    <?php if($errors->has('party_four_name')): ?> <span class="text-danger"><?php echo e($errors->first('party_four_name')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="party_four_votes" class="col-sm-2 control-label">Party Four Total Seat</label>
                                <div class="col-sm-6">
                                    <input type="text" name="party_four_votes" class="form-control" id="party_four_votes" placeholder="Party four Total Seat" value="<?php echo e($election->party_four_votes); ?>">
                                    <?php if($errors->has('party_four_votes')): ?> <span class="text-danger"><?php echo e($errors->first('party_four_votes')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php echo e($election->status == 1 ? 'checked' : ''); ?>>Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="2" <?php echo e($election->status == 2 ? 'checked' : ''); ?>>Inactive
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

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/bn/election/edit.blade.php ENDPATH**/ ?>