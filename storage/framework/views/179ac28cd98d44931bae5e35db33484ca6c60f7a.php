<?php $__env->startSection('title', 'Ad Edit'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('bn-ads.index')); ?>">Ads Position List</a></li>
            <li class="active">Edit Ad Position</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <!-- form start -->
                    <form action="<?php echo e(route('bn-ads.update', $ad->id)); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="ad_page" class="col-sm-2 control-label">Ad Type</label>
                                <div class="col-sm-6">
                                    <select class="form-control col-sm-6" name="ad_type" id="ad_type" onchange="showAdType(this)">
                                        <?php $__currentLoopData = config('customdata.ad_types'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ad_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>" <?php echo e($ad->type == $key ? 'selected' : ''); ?>><?php echo e($ad_type); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ad_page" class="col-sm-2 control-label">Ad Page</label>
                                <div class="col-sm-6">
                                    <div class="form-control" id="external_link"><?php echo e(config('customdata.ad_pages')[$ad->page]); ?></div>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ad_position" class="col-sm-2 control-label">Ad Position</label>
                                <div class="col-sm-6">
                                    <div class="form-control" id="external_link"><?php echo e(config('customdata.ad_positions')[$ad->page][$ad->position]); ?></div>
                                    
                                </div>
                            </div>

                            <div class="form-group type-dfp" style="display: <?php echo e($ad->type == 1 ? 'block' : 'none'); ?>">
                                <label for="header_code" class="col-sm-2 control-label">Header Code</label>

                                <div class="col-sm-6">
                                    <textarea name="header_code" id="header_code" class="form-control" placeholder="<Header Code/>" rows="2"><?php echo e($ad->dfp_header_code); ?></textarea>
                                </div>
                            </div>

                            <div class="form-group type-code type-dfp" style="display: <?php echo e($ad->type == 1 || $ad->type == 2 || $ad->type == 4 ? 'block' : 'none'); ?>">
                                <label for="code" class="col-sm-2 control-label">Code</label>

                                <div class="col-sm-6">
                                    <textarea name="code" id="code" class="form-control" placeholder="<Code/>" rows="5"><?php echo e($ad->code); ?></textarea>
                                </div>
                            </div>

                            <div class="form-group type-image" style="display: <?php echo e($ad->type == 3 ? 'block' : 'none'); ?>">
                                <label for="desktop_image_path" class="col-sm-2 control-label">Desktop Image</label>
                                <div class="col-sm-6">
                                    <?php if(!empty($ad->desktop_image_path)): ?>
                                        <img src="<?php echo e(asset(config('appconfig.adPath').$ad->desktop_image_path)); ?>" alt="ad-image" style="width: 300px; margin-bottom: 10px;">
                                    <?php endif; ?>
                                    <input type="file" name="desktop_image_path" id="desktop_image_path" accept="image/*" class="form-control col-sm-6" style="height: auto">
                                    <?php if($errors->has('desktop_image_path')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('desktop_image_path')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group type-image" style="display: <?php echo e($ad->type == 3 ? 'block' : 'none'); ?>">
                                <label for="mobile_image_path" class="col-sm-2 control-label">Mobile Image</label>
                                <div class="col-sm-6">
                                    <?php if(!empty($ad->mobile_image_path)): ?>
                                        <img src="<?php echo e(asset(config('appconfig.adPath').$ad->mobile_image_path)); ?>" alt="ad-image" style="width: 300px; margin-bottom: 10px;">
                                    <?php endif; ?>
                                    <input type="file" name="mobile_image_path" id="mobile_image_path" accept="image/*" class="form-control col-sm-6" style="height: auto">
                                    <?php if($errors->has('mobile_image_path')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('mobile_image_path')); ?></span> <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group type-image" style="display: <?php echo e($ad->type == 3 ? 'block' : 'none'); ?>">
                                <label for="external_link" class="col-sm-2 control-label">External Link</label>

                                <div class="col-sm-6">
                                    <input type="text" name="external_link" class="form-control" id="external_link" placeholder="Link" value="<?php echo e($ad->external_link); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="start_time" class="col-sm-2 control-label">Start Time</label>

                                <div class="col-sm-6">
                                    <input type=datetime-local step=1 name="start_time" id="start_time" class="form-control" value="<?php echo e($ad->start_time ? date('Y-m-d\TH:i:s', strtotime($ad->start_time)) : ''); ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="end_time" class="col-sm-2 control-label">End Time</label>

                                <div class="col-sm-6">
                                    <input type=datetime-local step=1 name="end_time" id="end_time" class="form-control" value="<?php echo e($ad->end_time ? date('Y-m-d\TH:i:s', strtotime($ad->end_time)) : ''); ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php echo e($ad->status == 1 ? 'checked' : ''); ?>>Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="2" <?php echo e($ad->status == 2 ? 'checked' : ''); ?>>Inactive
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-info">Update</button>
                                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-default">Back</a>
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
    <script>
        let adPosition = document.querySelector('#ad_position');
        let positions = <?php echo json_encode(config('customdata.ad_positions'), 15, 512) ?>;

        let dfpItems = document.querySelectorAll('.type-dfp');
        let codeItems = document.querySelectorAll('.type-code');
        let imageItems = document.querySelectorAll('.type-image');

        function showPositions(event) {
            adPosition.innerHTML = '';
            Object.keys(positions).forEach(function (key) {
                if (key == event.value) {
                    let vales = positions[key];
                    Object.keys(vales).forEach(function (key) {
                        let option = document.createElement('option');
                        option.value = key;
                        option.text = vales[key]
                        adPosition.append(option);
                    });
                }
            });
        }

        function showAdType(event) {
            if (event.value == 1) {//dfp
                imageItems.forEach(item => {
                    item.style.display = 'none';
                    item.querySelector('input').required = false;
                });
                codeItems.forEach(item => {
                    item.style.display = 'none';
                    item.querySelector('textarea').required = false;
                });
                dfpItems.forEach(item => {
                    item.style.display = 'block';
                    item.querySelector('textarea').required = true;
                });
            } else if (event.value == 2) {//html
                imageItems.forEach(item => {
                    item.style.display = 'none';
                    item.querySelector('input').required = false;
                });
                dfpItems.forEach(item => {
                    item.style.display = 'none';
                    item.querySelector('textarea').required = false;
                });
                codeItems.forEach(item => {
                    item.style.display = 'block';
                    item.querySelector('textarea').required = true;
                });
            } else if (event.value == 3) {//image
                codeItems.forEach(item => {
                    item.style.display = 'none';
                    item.querySelector('textarea').required = false;
                });
                dfpItems.forEach(item => {
                    item.style.display = 'none';
                    item.querySelector('textarea').required = false;
                });
                imageItems.forEach(item => {
                    item.style.display = 'block';
                });
            } else { // Google AdSense
                imageItems.forEach(item => {
                    item.style.display = 'none';
                    item.querySelector('input').required = false;
                });
                dfpItems.forEach(item => {
                    item.style.display = 'none';
                    item.querySelector('textarea').required = false;
                });
                codeItems.forEach(item => {
                    item.style.display = 'block';
                    item.querySelector('textarea').required = true;
                });
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/szamymni/notundesh24.com/resources/views/backend/settings/bn/ads/edit.blade.php ENDPATH**/ ?>