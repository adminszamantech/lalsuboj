<?php $__env->startSection('title', 'Election List'); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb" style="display: inline-block; width: 500px">
            <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
            <li class="active">Elections</li>
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
            
            <!-- /.box-header -->

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Total Seat</th>
                  <th>Party One</th>
                  <th>Party Two</th>
                  <th>Party Three</th>
                  <th>Party Four</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $elections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $election): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($election->id); ?></td>
                    <td>
                      <?php echo e($election->title); ?>

                    </td>
                    <td>
                      <?php echo e($election->total_center); ?>

                    </td>

                    <td>
                      <?php echo e($election->party_one_name); ?>

                    </td>

                      <td>
                          <?php echo e($election->party_two_name); ?>

                      </td>
                      <td>
                          <?php echo e($election->party_three_name); ?>

                      </td>
                      <td>
                          <?php echo e($election->party_four_name); ?>

                      </td>
                      <td>
                          <span class="btn btn-<?php echo e($election->status == 1 ? 'success' : 'danger'); ?> btn-xs"><i class="fa fa-<?php echo e($election->status == 1 ? 'check' : 'times'); ?>"></i></span>
                      </td>
                    <td>
                      <a href="<?php echo e(route('elections.edit', $election->id)); ?>" class="btn btn-warning btn-xs">
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

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/bn/election/list.blade.php ENDPATH**/ ?>