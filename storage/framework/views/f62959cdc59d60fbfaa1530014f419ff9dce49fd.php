

<?php $__env->startSection('title', 'Photo Album Edit'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('photo-albums.index')); ?>"><i class="fa fa-dashboard"></i> Photo Album List</a></li>
            <li class="active">Photo Album Edit</li>
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
                        <h3 class="box-title">Photo Album Edit</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo e(route('photo-albums.update', $album->album_id)); ?>" method="post"
                          enctype="multipart/form-data" class="form-horizontal col-sm-offset-1">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PUT')); ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="category" class="col-sm-2 control-label">Choose Category</label>
                                <div class="col-sm-8">
                                    <select class="form-control col-sm-6" name="category" id="category">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->cat_id); ?>" <?php echo e($album->category->cat_id == $category->cat_id ? 'selected' : ''); ?>><?php echo e($category->cat_name_bn); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="albumName" class="col-sm-2 control-label">Album name <span class="required">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="albumName" class="form-control" id="albumName" placeholder="Album name" value="<?php echo e($album->album_name); ?>">
                                    <?php if($errors->has('albumName')): ?> <span class="text-danger"><?php echo e($errors->first('albumName')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="shortDescription" class="col-sm-2 control-label">Short Description <span class="required">*</span></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="shortDescription" rows="2" placeholder="Album Short Description"><?php echo e($album->short_description); ?></textarea>
                                    <?php if($errors->has('shortDescription')): ?> <span
                                        class="text-danger"><?php echo e($errors->first('shortDescription')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div id="moreBlock">
                                <?php ($photos = $album->album_details); ?>
                                <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div id="uploadBlock" data-no="<?php echo e($key); ?>">
                                        <?php if(!$loop->first || !$loop->last): ?><hr><?php endif; ?>
                                        <div class="form-group">

                                            <label for="photo" class="col-sm-2 control-label">
                                                Choose Photo
                                                <?php if($loop->first): ?><span class="required">*</span><?php endif; ?>
                                            </label>
                                            <div class="col-sm-8">
                                                <img src="<?php echo e(asset(config('appconfig.photoAlbumImagePath').($photo['img'] ?? ''))); ?>" alt="Image">
                                                <div class="text-danger" style="margin-bottom: 5px;">Dimension: 750 X 480 pixel
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <input type="file" name="photo[<?php echo e($key); ?>]" id="photo" class="form-control" style="height: auto">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="well well-sm no-margin" style="padding: 3px 9px;">
                                                            <label><input type="checkbox" name="featureImage[<?php echo e($key); ?>]" class="featureImage" id="featureImage-<?php echo e($key); ?>" onchange="changeCheckbox(<?php echo e($key); ?>)" value="2"
                                                                    <?php echo e($photo['featureImage'] == 2 ? ' checked' : ''); ?>> Album Cover?</label>
                                                            <?php if(!$loop->first): ?>
                                                                <button type="button" id="removeBlock" class="btn btn-xs btn-danger pull-right"><i class="fa fa-close"></i></button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if($errors->has('photo')): ?> <span class="text-danger"><?php echo e($errors->first('photo')); ?></span> <?php endif; ?>
                                                <?php if($errors->has('photo.*')): ?> <span class="text-danger"><?php echo e($errors->first('photo.*')); ?></span> <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="photoCaption" class="col-sm-2 control-label">Photo Caption <span class="required">*</span></label>
                                            <div class="col-sm-8">
                                                <textarea name="photoCaption[<?php echo e($key); ?>]" id="photoCaption" class="form-control col-sm-6" rows="3"><?php echo e($photo['caption'] ?? ''); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-8">
                                    <button type="button" id="addMore" class="btn btn-primary">Add More</button>
                                </div>
                            </div>
                            <hr>

                            







                            
                            
                            
                            
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-8">
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php echo e($album->status == 1 ? 'checked' : ''); ?>>Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="2" <?php echo e($album->status == 2 ? 'checked' : ''); ?>>Inactive
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <button type="submit" class="btn btn-info">Update</button>
                                    <button type="submit" class="btn btn-default">Cancel</button>
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

<?php $__env->startSection('custom-js'); ?>

    <script type="text/javascript">
        

        $(function () {
            // radio yes-no
            $('.radioBtn a').on('click', function () {
                var sel = $(this).data('title');
                var tog = $(this).data('toggle');
                $('#' + tog).prop('value', sel);

                $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
                $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
            });



            $("#addMore").click(function () {
                var nod = $("#moreBlock #uploadBlock").last().attr('data-no');
                ++nod;
                console.log(nod);

                $('#moreBlock').append(
                        `<div id="uploadBlock" data-no="`+nod+`">
                        <hr>
                        <div class="form-group">
                            <label for="photo" class="col-sm-2 control-label">Choose Photo</label>
                            <div class="col-sm-8">
                                <div class="text-danger" style="margin-bottom: 5px;">Dimension: 750 X 480 pixel
                                    &amp; Max size: 100kb
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input type="file" name="photo[`+nod+`]" id="photo" class="form-control" style="height: auto">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="well well-sm no-margin" style="padding: 3px 9px;">
                                            <label><input type="checkbox" name="featureImage[`+nod+`]" id="featureImage-`+nod+`" class="featureImage" onchange="changeCheckbox(`+nod+`)" value="2"> Album Cover?</label>
                                            <button type="button" id="removeBlock" class="btn btn-xs btn-danger pull-right"><i class="fa fa-close"></i></button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="photoCaption" class="col-sm-2 control-label">Photo Caption</label>
                                <div class="col-sm-8">
                                    <textarea name="photoCaption[`+nod+`]" id="photoCaption" class="form-control col-sm-6" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>`
                );

            });


            $("#moreBlock").on('click', '#removeBlock', function (e) {
//                alert('ok');
                $(this).parents("#uploadBlock").remove();
            });
        });

        function changeCheckbox(id) {
            $('#moreBlock input.featureImage').not($("#featureImage-"+id)).prop('checked', false);
        }
        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        
        


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/photo/edit_photo_album.blade.php ENDPATH**/ ?>