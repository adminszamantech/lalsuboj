<?php $__env->startSection('title', 'Photo Album List'); ?>

<?php $__env->startSection('custom-css'); ?>
  <link href="<?php echo e(asset('backend/adminlte/plugins/datepicker/datepicker3.css')); ?>" rel="stylesheet">

    <style>
        .album-row {
            margin: 5px;
        }

        .album-row > div {
            padding: 5px;
        }

        .album-row .panel .panel-body {
            padding: 0px!important;
        }

        .album-row .panel .panel-body img{
            width: 100%;
            height: auto;
        }

        .panel-footer h4{
            margin-top: 0px!important;
            margin-bottom: 2px!important;
        }

        .label-secondary {
            background-color: grey;
        }

        .panel-footer a{
            color: #000!important;
        }

        .panel-footer a:hover{
            color: red!important;
        }

        .panel-body:hover + .panel-footer a{
            color: red!important;
        }
    </style>
<?php $__env->stopSection(); ?>

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
        <li class="active">Photo Album List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
            <!-- .box-header -->
            <div class="box-header">
                <div class="row">
                  <div class="col-sm-6">
                    <form action="<?php echo e(route('photo-albums.index')); ?>" method="get">
                      <div class="row">
                        <label class="col-sm-2" for="catId">Category</label>
                        <div class="col-sm-3">
                          <select class="form-control" id="catId" name="catId">
                            <option value="">Choose category</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($category->cat_id); ?>"<?php echo e(request('catId') == $category->cat_id ? ' selected' : ''); ?>>
                                  <?php echo e($category->cat_name_bn); ?>

                              </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>

                        <div class="col-sm-5">
                          <div class="input-group">
                                <span class="input-group-addon">
                                    <label for="dateRange"><i class="fa fa-calendar"></i></label>
                                </span>
                            <input type="text" class="form-control pull-right" name="date" placeholder="Date" id="datepicker">
                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                              <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                            </div>
                            <div class="btn-group" role="group">
                              <a href="<?php echo e(route('photo-albums.index')); ?>" class="btn bg-aqua-gradient"><i class="fa fa-refresh"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="col-sm-6">
                    <form action="<?php echo e(route('photo-albums.index')); ?>" method="get">
                      <div class="row">
                        <label class="col-sm-2" for="searchBy">Search by</label>
                        <div class="col-sm-3">
                          <select class="form-control" id="searchBy" name="searchBy">
                            <option value="1">Album ID</option>
                            <option value="2">Album Name</option>
                            <option value="3">Writer</option>
                            <option value="4">Top Home</option>
                          </select>
                        </div>
                        <div class="col-sm-5">
                          <input name="keyword" class="form-control" placeholder="Search" type="text">
                        </div>
                        <div class="col-sm-2" style="padding-left: 0">
                          <button type="submit" class="btn bg-purple btn-bg"><i class="fa fa-search"></i></button>
                          <a href="<?php echo e(route('photo-albums.create')); ?>" class="btn btn-primary btn-bg pull-right" title="Add New Album"><i class="fa fa-plus"></i></a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
            <!-- /.box-header -->

            <!-- Album list -->
            <div class="row album-row">
                <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <span class="label label-secondary"><?php echo e($album->album_id ?? ''); ?></span>
                                        <span class="label label-primary"><?php echo e($album->category->cat_name_bn ?? ''); ?></span>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <a href="<?php echo e(route('photo-albums.edit', $album->album_id)); ?>" class="btn btn-warning btn-xs">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="<?php echo e(route('photo-albums.destroy', $album->album_id)); ?>" method="post" style="display: inline">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this album?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-body">
                                <a href="<?php echo e(fAlbumURL($album->album_id, $album->category->cat_slug)); ?>" target="_blank">
                                    <img src="<?php echo e(!empty($album->feature_image['img']) ? asset(config('appconfig.photoAlbumImagePath').$album->feature_image['img']) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>">
                                </a>
                            </div>
                            <div class="panel-footer">
                                <a href="<?php echo e(fAlbumURL($album->album_id, $album->category->cat_slug)); ?>" target="_blank">
                                    <p><?php echo e(Str::limit($album->album_name, 40)); ?></p>
                                </a>
                                Status: <span class="label <?php echo e($album->status == 1 ? 'label-success' : 'label-danger'); ?>"><?php echo e($album->status == 1 ? 'Active' : 'Inactive'); ?></span><br/>
                                Uploaded by: <span class="label label-secondary"><?php echo e($album->uploader->name); ?></span><br/>
                                Created: <span class="label label-default"><?php echo e(date('d-m-Y, h:ia', strtotime($album->created_at))); ?></span><br/>
                            </div>
                        </div>
                    </div> <!-- Loop -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Album list End-->

            <!-- Pagination -->
            <?php echo e($albums->appends(['catId' => request('catId'), 'date' => request('date'), 'searchBy' => request('searchBy')])->links()); ?>

            <!-- Pagination End-->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
  <script src="<?php echo e(asset('backend/adminlte/plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
  <script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: "dd/mm/yyyy",
      todayHighlight: true,
    })
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/photo/photo_album_list.blade.php ENDPATH**/ ?>