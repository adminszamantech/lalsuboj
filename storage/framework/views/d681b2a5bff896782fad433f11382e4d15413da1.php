
<?php $__env->startSection('title','Upozilla List'); ?>

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
            <li class="active">Upozilla List</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">List of Upozilla</h3>
                        <a href="<?php echo e(route('upozillas.create')); ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Upozilla Name</th>
                                    <th>Upozilla Name (Bangla)</th>
                                    <th>District Name</th>
                                    <th style="width:160px;">Action</th>
                                </tr>
                                <?php $no = $upozillas->firstItem() ?>
                                <?php $__currentLoopData = $upozillas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upozilla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($no); ?></td>
                                        <td><?php echo e($upozilla->upozilla_name); ?></td>
                                        <td><?php echo e($upozilla->upozilla_name_bn); ?></td>
                                        <td><?php echo e($upozilla->district->district_name); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('upozillas.edit', $upozilla->upozilla_id)); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                            <form action="<?php echo e(route('upozillas.destroy', $upozilla->upozilla_id)); ?>" method="post" style="display: inline">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                                <button type="submit" onclick="return confirm('Are you sure to delete this upozilla?')" class="btn btn-danger btn-xs">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                    <?php $no++ ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="5"><?php echo e($upozillas->links('vendor.pagination.default')); ?></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/settings/upozilla/upozilla_list.blade.php ENDPATH**/ ?>