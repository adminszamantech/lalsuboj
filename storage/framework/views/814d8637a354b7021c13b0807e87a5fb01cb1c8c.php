

<?php $__env->startSection('title', 'Edit News'); ?>

<?php $__env->startSection('custom-css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/adminlte/plugins/cropbox/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('backend/adminlte/plugins/tag-it-master/css/jquery.tagit.css')); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('backend/adminlte/plugins/tag-it-master/css/tagit.ui-zendesk.css')); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('backend/adminlte/plugins/input-tags/tags.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/token-input.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('bn-contents.index')); ?>">Bn News List</a></li>
            <li class="active">Edit News</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- form start -->
            <form action="<?php echo e(route('bn-contents.update', $content->content_id)); ?>" method="post"
                  enctype="multipart/form-data">
                <div class="col-md-8" style="padding-right: 0">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="newsHeading">News Heading <span class="required">*</span></label>
                                <input type="text" name="newsHeading" value="<?php echo e($content->content_heading); ?>"
                                       class="form-control" id="newsHeading" placeholder="News Heading">
                                <?php if($errors->has('newsHeading')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('newsHeading')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="newsHeading">News Subheading</label>
                                <input type="text" name="newsSubheading" class="form-control" id="newsSubheading"
                                       placeholder="News Subheading" value="<?php echo e($content->content_sub_heading); ?>">
                            </div>

                            <div class="form-group">
                                <label for="metaKeywords">Meta Keywords <span class="required">*</span></label>
                                <textarea name="metaKeywords" id="metaKeywords" class="form-control"
                                          placeholder="Comma separated meta keywords"><?php echo e($content->meta_keywords); ?></textarea>
                                <?php if($errors->has('metaKeywords')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('metaKeywords')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="briefNews">Meta Description <span class="required">*</span></label>
                                <textarea name="briefNews" id="briefNews" class="form-control" rows="4"
                                          placeholder="Meta Description / Brief News"><?php echo e($content->content_brief); ?></textarea>
                                <?php if($errors->has('briefNews')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('briefNews')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="detailsNews">Details News <span class="required">*</span></label>
                                <textarea name="detailsNews" id="detailsNews" class="form-control textarea" rows="10"
                                          placeholder="Details News"><?php echo e($content->content_details); ?></textarea>
                                <?php if($errors->has('detailsNews')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('detailsNews')); ?></span>
                                <?php endif; ?>
                                <input name="image" type="file" id="upload" class="hidden">
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="box box-success text-center">
                                            <h3>Large Image</h3>
                                            <div class="text-danger" style="margin-bottom: 5px;">Dimension: 750 X 390
                                                pixel & Max size: 150kb
                                            </div>

                                            <?php if($errors->has('largeImage')): ?>
                                                <span class="text-danger"><?php echo e($errors->first('largeImage')); ?></span>
                                            <?php endif; ?>
                                            <img
                                                src="<?php echo e(asset(config('appconfig.contentImagePath').$content->img_bg_path)); ?>"
                                                class="img-thumbnail img-responsive" style="margin-bottom: 10px;">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <input type="file" name="largeImage" class="largeImage"
                                                           id="largeImage">
                                                </div>
                                                <div class="col-sm-8">
                                                    <label for="largeImage" class="btn bg-purple btn-flat pull-left">Local</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" name="ImageBGCaption" class="form-control"
                                                           id="ImageBGCaption" placeholder="Image caption"
                                                           value="<?php echo e($content->img_bg_caption ?? old('ImageBGCaption')); ?>"
                                                           style="margin-top: 5px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-body form-horizontal">
                            <div class="form-group">
                                <label for="contentType" class="col-sm-3">Content Type </label>
                                <div class="col-sm-9">
                                    <select name="contentType" class="form-control" id="contentType">
                                        <option value="1" <?php echo e($content->content_type == 1? 'selected':''); ?>>News</option>
                                        <option value="2" <?php echo e($content->content_type == 2? 'selected':''); ?>>Article
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category" class="col-sm-3">Category</label>
                                <div class="col-sm-9">
                                    <select name="category" class="form-control" id="category">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($category->cat_id); ?>" <?php echo e($content->cat_id == $category->cat_id? 'selected' : ''); ?>><?php echo e($category->cat_name_bn); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php if($errors->has('category')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('category')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="subCategory" class="col-sm-3">SubCategory</label>
                                <div class="col-sm-9">
                                    <select id="subCategory" name="subCategory" class="form-control"></select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="specialCategory" class="col-sm-3">Special Category</label>
                                <div class="col-sm-9">
                                    <select name="specialCategory" id="specialCategory" class="form-control">
                                        <option value="1">--None--</option>
                                        <?php $__currentLoopData = $specialCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($specialCategory->cat_id); ?>" <?php echo e($content->special_cat_id == $specialCategory->cat_id ? 'selected' : ''); ?>><?php echo e($specialCategory->cat_name_bn); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="country" class="col-sm-3">Country</label>
                                <div class="col-sm-9">
                                    <select name="country" id="country" class="form-control">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($country->country_id); ?>" <?php echo e($country->country_id == $content->country_id ? 'selected' : ''); ?>><?php echo e($country->country_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="district" class="col-sm-3">District</label>
                                <div class="col-sm-9">
                                    <select name="district" id="district" class="form-control">
                                        <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($district->district_id); ?>" <?php echo e($content->district_id == $district->district_id ? 'selected' : ''); ?>><?php echo e($district->district_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="upozilla" class="col-sm-3">Upozilla</label>
                                <div class="col-sm-9">
                                    <select id="upozilla" name="upozilla" class="form-control"></select>
                                </div>
                            </div>

                            <!--<div class="form-group">
                                <label for="writer" class="col-sm-3">Author</label>
                                <div class="col-sm-9">
                                    <select name="writer" id="writer" class="form-control">
                                        <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($author->author_slug); ?>" <?php echo e($content->author_slugs == $author->author_slug ? 'selected' : ''); ?>><?php echo e($author->author_name_bn); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label class="col-sm-3">Author</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="author" name="author" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3" for="podcastId">Author Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="authorName" class="form-control"
                                           value="<?php echo e($content->author_name ?? old('authorName')); ?>"">
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label for="reporter" class="col-sm-3">Reporter</label>
                                <div class="col-sm-9">
                                    <select name="reporter" id="reporter" class="form-control">
                                        <?php $__currentLoopData = $mis_reporters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reporter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($reporter->user_id); ?>"><?php echo e($reporter->user_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('reporter')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('reporter')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div> -->

                            <!-- <div class="form-group">
                                <label class="col-sm-3">Related ID</label>
                                <div class="col-sm-9">
                                    <ul class="myTags" id="prevNewsIds">
                                        <?php $relatedIds = explode(',', $content->related_ids); ?>
                                        <?php $__currentLoopData = $relatedIds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($relatedId); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div> -->

                            <!-- <div class="form-group">
                                <label class="col-sm-3">P.GalleryID</label>
                                <div class="col-sm-9">
                                    <ul class="myTags" id="photoGalaryIds">
                                        <?php $photoIds = explode(',', $content->photo_ids); ?>
                                        <?php $__currentLoopData = $photoIds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photoId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($photoId); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    </ul>
                                </div>
                            </div> -->

                            <!-- <div class="form-group">
                                <label class="col-sm-3" for="podcastId">Podcast ID</label>
                                <div class="col-sm-9">
                                    <input type="text" id="podcastId" name="podcastId" class="form-control"
                                           value="<?php echo e($content->podcast_id); ?>">
                                </div>
                            </div> -->

                            <!--<div class="form-group">
                                <label class="col-sm-3" for="videoType">Video Type</label>
                                <div class="col-sm-9">
                                    <select name="videoType" id="videoType" class="form-control">
                                        <option value="">Choose type</option>
                                        <option value="1" <?php echo e($content->video_type == 1 ? 'selected' : ''); ?>>Youtube
                                        </option>
                                        <option value="2" <?php echo e($content->video_type == 2 ? 'selected' : ''); ?>>Facebook
                                        </option>
                                    </select>
                                </div>
                            </div>  -->

                           <!-- <div class="form-group">
                                <label class="col-sm-3" for="videoId">Video ID</label>
                                <div class="col-sm-9">
                                    <input type="text" id="videoId" name="videoId" value="<?php echo e($content->video_id); ?>"
                                           class="form-control">
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label class="col-sm-3">Normal Tag</label>
                                <div class="col-sm-9">

                                    <input type="text" class="form-control" value="<?php echo e(str_replace('-', ' ', $content->tags)); ?>" id="ptaginput" name="normalTags" data-role="tagsinput" />
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <label for="status" class="col-sm-3">Show?</label>
                                <input type="hidden" name="status" id="status" value="<?php echo e($content->status); ?>">
                                <div class="col-sm-9">
                                    <div class="btn-group radioBtn">
                                        <a class="btn btn-primary btn-sm <?php echo e($content->status == 1 ? 'active' : 'notActive'); ?>"
                                           data-toggle="status" data-title="1">Yes</a>
                                        <a class="btn btn-primary btn-sm <?php echo e($content->status == 2 ? 'active' : 'notActive'); ?>"
                                           data-toggle="status" data-title="2">No</a>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box box-success text-center">
                                        <h3>OG Image</h3>
                                        <img
                                            src="<?php echo e($content->og_image); ?>"
                                            alt="OG Image" style="width: 320px;">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-info btn-block">Update</button>
                                </div>
                                <div class="col-sm-4" style="padding-left: 0;">
                                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default btn-block">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->

    <!-- Modal EXSM Archive -->
    <div class="modal fade" id="ExSMImageArchive" tabindex="-1" role="dialog" aria-labelledby="ExSMImageArchive">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="ExSMImageArchive">Extra SM Image Archive</h4>
                </div>
                <div class="modal-body">
                    <div class="filemanager">
                        <div class="search">
                            <input type="search" class="form-control" placeholder="Find a file.."/>
                        </div>
                    </div>
                    <div class="result"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal SM Archive -->
    <div class="modal fade" id="SMImageArchive" tabindex="-1" role="dialog" aria-labelledby="SMImageArchive">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="SMImageArchive">SM Image Archive</h4>
                </div>
                <div class="modal-body">
                    <div class="filemanager">
                        <div class="search">
                            <input type="search" class="form-control" placeholder="Find a file.."/>
                        </div>
                    </div>
                    <div class="result"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- BG Archive Modal-->
    <div class="modal fade" id="BGImageArchive" tabindex="-1" role="dialog" aria-labelledby="BGImageArchive">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="BGImageArchive">BG Image Archive</h4>
                </div>
                <div class="modal-body">
                    <div class="filemanager">
                        <div class="search">
                            <input type="search" class="form-control" placeholder="Find a file.."/>
                        </div>
                    </div>
                    <div class="result"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End archive modal -->


    <!-- Start upload modal SM crop-->
    <div class="modal fade" id="cropSM" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Crop image</h4>
                </div>
                <div class="modal-body">
                    <div class="imageBox">
                        <div class="thumbBox"></div>
                    </div>
                    <div class="action">
                        <input type="file" id="file" style="float:left; width:250px">
                        <input type="button" id="btnCrop" value="Crop" style="float:right">
                        <input type="button" id="btnZoomIn" value="+" style="float:right">
                        <input type="button" id="btnZoomOut" value="-" style="float:right">
                    </div>
                    <div class="cropped"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End upload modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('backend/adminlte/plugins/cropbox/jquery/cropbox-min.js')); ?>"></script>
    <script type="text/javascript"
            src="<?php echo e(asset('backend/adminlte/plugins/tag-it-master/js/tag-it.min.js')); ?>"></script>
    <script type="text/javascript"
            src="<?php echo e(asset('backend/adminlte/plugins/input-tags/bootstrap-tagsinput.min.js')); ?>"></script>

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
        });

        // Input Tags
        $('#ptaginput').tagsinput({
            confirmKeys: [44] // 13 is Enter, 44 is comma
        });

        $(window).load(function () {
            var options = {thumbBox: '.thumbBox', imgSrc: ''};
            var cropper = $('.imageBox').cropbox(options);
            $('#file').on('change', function () {
                $('.cropped').empty();
                var reader = new FileReader();
                reader.onload = function (e) {
                    options.imgSrc = e.target.result;
                    cropper = $('.imageBox').cropbox(options);
                };
                reader.readAsDataURL(this.files[0]);
                this.files = [];
            });
            $('#btnCrop').on('click', function () {
                var img = cropper.getDataURL();
                $('.cropped').empty();
                $('.cropped').append('<img src="' + img + '">');
                $(".cropped img").dblclick(function () {
                    var ImgSrc = $(this).attr("src");
                    var ImageSMPath = document.getElementById("ImageSMPath");
                    ImageSMPath.value = ImgSrc;
                    var filename = document.getElementById('file').files[0].name;
                    document.getElementById("ImageSMLocalName").value = filename;
                    //console.log(ImageSMName)
                    $('#cropSM').modal('hide');
                });
            });
            $('#btnZoomIn').on('click', function () {
                cropper.zoomIn();
            });
            $('#btnZoomOut').on('click', function () {
                cropper.zoomOut();
            });
        });

        // Pre-populate existing subcategory dropdown
        $.get('<?php echo e(url("admin/backend/subcat-populate?cat_id=")); ?>' + <?php echo e($content->cat_id); ?>, function (data) {
            $('#subCategory').prepend('<option value="1" selected>--None--</option>');
            $.each(data, function (index, subcatObj) {
                $('#subCategory').append('<option value="' + subcatObj.subcat_id + '"' + (subcatObj.subcat_id == <?php echo e($content->subcat_id); ?> ? 'selected' : '') + '>' + subcatObj.subcat_name_bn + '</option>');
            });

        });
        // Sub category populated when select a category
        $('#category').on('change', function (e) { // Pre-populate subcategory dropdown
            console.log(e);
            var cat_id = e.target.value;
            $('#subCategory').empty();
            $.get('<?php echo e(url("admin/backend/subcat-populate?cat_id=")); ?>' + cat_id, function (data) {
                $.each(data, function (index, subcatObj) {
                    $('#subCategory').append('<option value="' + subcatObj.subcat_id + '">' + subcatObj.subcat_name_bn + '</option>');
                });
                $('#subCategory').prepend('<option value="1" selected>--None--</option>');
            });
        });

        $('#upozilla').prepend('<option value="1" selected>--None--</option>');
        $.get('<?php echo e(url("admin/backend/upozilla-populate?district_id=")); ?>' + <?php echo e($content->district_id); ?>, function (data) {
            var id = <?php echo e($content->upozilla_id); ?>

            $.each(data, function (index, upozillaObj) {
                var html = '<option value="' + upozillaObj.upozilla_id + '"';
                if (id == upozillaObj.upozilla_id) {
                    html += ' selected';
                }
                html += '>' + upozillaObj.upozilla_name + '</option>';
                //alert(upozillaObj);
                $('#upozilla').append(html);
            });
        });

        $('#district').on('change', function (e) { // Pre-populate upozilla with selecting district dropdown
            console.log(e);
            var district_id = e.target.value;
            //alert(upozilla_id);
            $('#upozilla').empty();
            $.get('<?php echo e(url("admin/backend/upozilla-populate?district_id=")); ?>' + district_id, function (data) {
                $.each(data, function (index, upozillaObj) {
                    //alert(upozillaObj);
                    $('#upozilla').append('<option value="' + upozillaObj.upozilla_id + '">' + upozillaObj.upozilla_name + '</option>');
                });
                $('#upozilla').prepend('<option value="1" selected>--None--</option>');
            });
        });

        // Previous news id's tag-it
        $('#prevNewsIds').tagit({
            fieldName: "prevNewsIds[]"
        });

        // Previous Photo galary id tag-it
        $('#photoGalaryIds').tagit({
            fieldName: "photoGalaryIds[]"
        });
        // Previous meta keyword tag-it
        $('#metaKeyword').tagit({
            fieldName: "metaKeyword[]"
        });

    </script>
    <script src="<?php echo e(asset('backend/js/jquery.tokeninput.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            
            
            
            

            $("#author").tokenInput("<?php echo e(url('admin/backend/author-search')); ?>", {
                preventDuplicates: true,
                prePopulate: <?php echo !empty($author_list) ? json_encode($author_list) : '[]'; ?>
            });

        });
    </script>
    <script src="<?php echo e(asset('backend/adminlte/cute-file-browser/js/script.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/tinymce/tinymce.min.js')); ?>"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '.textarea',
            plugins: 'advlist autolink lists textcolor colorpicker link code wordcount media image imagetools searchreplace charmap anchor visualblocks fullscreen table contextmenu paste',
            menubar: true,
            image_caption: true,
            height: "300",
            toolbar1: 'insertfile | bold italic fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor link code media image',
            rel_list: [
                {title: 'nofollow', value: 'nofollow'},
                {title: 'follow', value: 'follow'}
            ],
            fontsize_formats: "8pt 10pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 28pt 30pt 36pt",
            file_picker_callback: function (callback, value, meta) {
                if (meta.filetype == 'image') {
                    $('#upload').trigger('click');
                    $('#upload').on('change', function () {
                        var file = this.files[0];
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var imagevalue = e.target.result;
                            var filename = $("#upload").val().substring($("#upload").val().lastIndexOf('\\') + 1);
                            $.post('<?php echo e(url("admin/backend/attach-photo-upload")); ?>', {
                                "_token": "<?php echo e(csrf_token()); ?>",
                                'filename': filename,
                                'imagevalue': imagevalue
                            }, function (data) {
                                var data = '<?php echo e(config('app.url')); ?>' + '/media/content/images/' + data;
                                //console.log(data);
                                callback(data, {
                                    alt: '',
                                    width: '100%',
                                    height: 'auto'
                                });
                            });
                        };
                        reader.readAsDataURL(file);
                    });
                }
            },
            toolbar: "...| removeformat | ...",
            media_live_embeds: true,
            relative_urls: false,
            remove_script_host: false,
            extended_valid_elements: 'script[type|src|charset]'
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/bn/content/content_edit.blade.php ENDPATH**/ ?>