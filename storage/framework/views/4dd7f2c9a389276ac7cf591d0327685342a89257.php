

<?php $__env->startSection('title', 'Bn Tag List'); ?>

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
            <li class="active">Bn Tag List</li>
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
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="col-sm-12">
                                <form action="<?php echo e(url('backend/bn-tags')); ?>" method="get">
                                    <div class="col-sm-5">
                                        <input name="keyword" class="form-control"
                                               placeholder="Search with Tag Name or tag Slug" type="text"
                                               value="<?php echo e(request()->keyword); ?>">
                                    </div>
                                    <div class="col-sm-5">

                                    </div>
                                    <div class="col-sm-2">
                                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                            <div class="btn-group" role="group">
                                                <button type="submit" class="btn bg-purple btn-sm btn-block"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <a href="<?php echo e(route('bn-tags.index')); ?>"
                                                   class="btn btn-warning btn-sm btn-block"><i class="fa fa-refresh"></i>
                                                </a>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <a href="<?php echo e(route('bn-tags.create')); ?>"
                                                   class="btn btn-primary btn-sm btn-block"><i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tag Name</th>
                            <th>Tag Slug</th>
                            <th>Approval</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($tag->tag_id); ?></td>
                                <td><?php echo e($tag->tag_name); ?></td>
                                <td><?php echo e($tag->tag_slug); ?></td>
                                <td>
                                    <span class="btn btn-<?php echo e($tag->approval == 1 ? 'success' : 'danger'); ?> btn-xs"><i
                                            class="fa fa-<?php echo e($tag->approval == 1 ? 'check' : 'times'); ?>"></i></span>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('bn-tags.edit', $tag->tag_id)); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="<?php echo e(route('bn-tags.destroy', $tag->tag_id)); ?>" method="post"
                                          style="display: inline">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>

                                        <button type="submit" class="btn btn-danger btn-xs"
                                                onclick="return confirm('Are you sure to delete this tag?')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($tags->appends($exPartPagination)->links('vendor.pagination.default')); ?>

                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/settings/bn/tag/bn_tag_list.blade.php ENDPATH**/ ?>