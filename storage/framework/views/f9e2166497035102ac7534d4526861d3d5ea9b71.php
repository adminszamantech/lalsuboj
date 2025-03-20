<?php $__env->startSection('title', 'Ad List'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if(session()->has('successMsg')): ?>
            <div class="alert alert-success alert-dismissable fade in custom-alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> <?php echo e(session('successMsg')); ?>

            </div>
        <?php endif; ?>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
            <li class="active">Mobile Ads Position List</li>
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
                        <h3 class="box-title">List of Ad</h3>
                        <?php if(auth()->id() == 1): ?>
                            <a href="<?php echo e(route('bn-mobile-ads.create')); ?>" class="btn btn-primary btn-sm pull-right">
                                <i class="fa fa-plus"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <!-- /.box-header -->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Page</th>
                            <th>Position</th>
                            <th>Type</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($ad->id); ?></td>
                                <td>
                                    <?php echo e(config('customdata.ad_pages')[$ad->page]); ?>

                                </td>

                                <td>
                                    <?php echo e(config('customdata.mobile_ad_positions')[$ad->page][$ad->position]); ?>

                                </td>
                                <td>
                                    <?php echo e(config('customdata.ad_types')[$ad->type]); ?>

                                </td>
                                <td>
                                    <?php echo e($ad->start_time ? date('Y-m-d h:i:s a', strtotime($ad->start_time)) : ''); ?>

                                </td>
                                <td>
                                    <?php echo e($ad->end_time ? date('Y-m-d h:i:s a', strtotime($ad->end_time)) : ''); ?>

                                </td>
                                <td>
                                    <span class="btn btn-<?php echo e($ad->status == 1 ? 'success' : 'danger'); ?> btn-xs"><i
                                            class="fa fa-<?php echo e($ad->status == 1 ? 'check' : 'times'); ?>"></i></span>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('bn-mobile-ads.edit', $ad->id)); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/settings/bn/mobile-ads/list.blade.php ENDPATH**/ ?>