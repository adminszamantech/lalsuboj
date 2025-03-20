

<?php $__env->startSection('title', 'Photo Album Position List'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb" style="display: inline-block; width: 500px">
            <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
            <li class="active">Photo Album Position List</li>
        </ol>
        <?php if(session()->has('successMsg')): ?>
            <div class="alert alert-success alert-dismissable fade in custom-alert" style="display: inline-block">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> <?php echo e(session('successMsg')); ?>

            </div>
        <?php endif; ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">List of Position</h3>
                        

                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <tbody>
                            <tr>
                                <th>Position Name</th>
                                <th>Category ID</th>
                                <th>News IDs</th>
                                <th style="width:100px;">Action</th>
                            </tr>
                            <?php $__currentLoopData = $content_positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content_position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($content_position->position_name); ?>

                                        <?php if($content_position->special_cat_id): ?>
                                            <small class="label label-info">Special</small>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($content_position->special_cat_id ?? $content_position->cat_id); ?></td>
                                    <td><?php echo e($content_position->content_ids); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('photo-album-positions.getChangePosition', $content_position->position_id)); ?>"
                                           class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Change Position</a>

                                        <?php if(auth()->user()->role == 1): ?>
                                            <a href="<?php echo e(route('photo-album-positions.edit', $content_position->position_id)); ?>"
                                               class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit </a>
                                            
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/photo/position/album_position_list.blade.php ENDPATH**/ ?>