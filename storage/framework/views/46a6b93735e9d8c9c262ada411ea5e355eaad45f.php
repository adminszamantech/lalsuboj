<?php $__env->startSection('title', 'BN Video List'); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb" style="display: inline-block; width: 500px">
            <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
            <li class="active">BN Videos</li>
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
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-5">
                        <form action="<?php echo e(route('bn-videos.index')); ?>" method="get" class="">
                            <div class="row">
                                <div class="col-sm-9">
                                    <input name="keyword" class="form-control" placeholder="Search by title or code" type="text">
                                </div>

                                <div class="col-sm-3">
                                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn bg-purple btn-sm btn-block"><i
                                                    class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-1">
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <a href="<?php echo e(route('bn-videos.create')); ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Type</th>
                  <th>Title</th>
                  <th>Code</th>

                  <th>Uploader</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($video->id); ?></td>
                    <td>
                        <?php echo e($video->type == 1 ? 'Youtube' : 'Facebook'); ?><br>
                        <span class="badge label-success"><?php echo e($video->category->name_bn); ?></span>
                    </td>
                    <td>
                      <?php echo e($video->title); ?>

                    </td>
                    <td>
                      <?php echo e($video->code); ?><br>
                        <?php if($video->is_live == 1): ?>
                            <span class="badge label-success">Live</span>
                        <?php endif; ?>
                    </td>

                    
                    <td>
                      <?php echo e($video->created_by); ?>

                    </td>
                      <td>
                          Insert: <span class="badge label-success"><?php echo e($video->created_at); ?></span><br/>
                          Update: <span class="badge label-primary"><?php echo e($video->updated_at); ?></span><br/>
                          Status:
                          <?php if($video->status == 1): ?>
                              <span class="badge label-success"><i class="fa fa-check"></i></span>
                          <?php else: ?>
                              <span class="badge label-danger"><i class="fa fa-close"></i></span>
                          <?php endif; ?>
                      </td>
                    <td>
                      <a href="<?php echo e(route('bn-videos.edit', $video->id)); ?>" class="btn btn-warning btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <form action="<?php echo e(route('bn-videos.destroy', $video->id)); ?>" method="post" style="display: inline">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>

                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this video?')">
                          <i class="fa fa-times"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            <?php echo e($videos->links('vendor.pagination.default')); ?>

          </div>
        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/bn/video/list.blade.php ENDPATH**/ ?>