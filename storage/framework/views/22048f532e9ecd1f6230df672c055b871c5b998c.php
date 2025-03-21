<?php $__env->startSection('title', 'Bn Video Position List'); ?>

<?php $__env->startSection('custom-css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/jquery-ui.css')); ?>">
    <style>
        .ui-widget.ui-widget-content{max-height: 500px; overflow-y: scroll; overflow-x: hidden;}
        .item{list-style: none; background: lightgray; padding: 5px; margin: 2px 0; width: 100%; cursor: move;}
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
        <li><a href="<?php echo e(route('bn-video-position.index')); ?>">Bn Video Position List</a></li>
        <li class="active">Set Position</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-body">
                        <br>
                        <div class="form-inline">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="position" value="<?php echo e($bnPosition->position_id); ?>">
                            <div class="form-group">
                                <?php
                                    $aid = explode('/', URL::current());
                                ?>
                                <label for="title" class="control-label">Choose position </label>
                                <select id="positionName" name="positionName" class="form-control">
                                    <?php $__currentLoopData = $allPositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($position->position_id); ?>" <?php echo e($position->position_id == $aid[count($aid)-1]? 'selected' : ''); ?>><?php echo e($position->position_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title" class="control-label">Title </label>
                                <input type="text" name="term" id="title" class="form-control" placeholder="News ID / Title..." required>
                                <input type="hidden" id="positionId" value="<?php echo e($bnPosition->position_id); ?>">
                                <input type="hidden" name="videoId" id="videoId">
                            </div>
                            <div class="form-group">
                                <select name="position" id="position" class="form-control">
                                    <?php for($i=1; $i<=12; $i++): ?>;
                                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="positionSet" class="btn btn-primary">Set</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-1 text-right position-number">
                                <ul id="serial">
                                    <?php if(!empty($allVideos)): ?>
                                        <?php for($i=1; $i <= count($allVideos); $i++): ?>
                                            <li><?php echo e($i); ?></li>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul id="sortable" style="padding: 0">
                                    <?php if(!empty($allVideos)): ?>
                                        <?php $__currentLoopData = $allVideos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="item" id="item-<?php echo e($video->id); ?>">
                                                <?php echo e($video->title); ?>

                                                <span class="badge"><?php echo e($video->id); ?></span>
                                                <button id="removePosition" class="btn btn-xs btn-warning pull-right" onclick="removeLi(<?php echo e($video->id); ?>)">X</button>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                    <input type="hidden" value="<?php echo e($bnPosition->position_id); ?>" id="positionId">
                                    <button type="button" onclick="saveData(<?php echo e($bnPosition->position_id); ?>)" class="btn btn-primary">Save</button>
                                </ul>
                            </div>

                            <div class="col-sm-5 form-horizontal" id="show-live-tv" style="display: none;">
                                <div style="padding: 20px; border: 1px solid gray">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Show Live TV</label>
                                        <div class="col-sm-9">
                                            <label class="radio-inline">
                                                <input type="radio" name="show_live_tv" id="yes" value="1" <?php echo e(($bnPosition->position_id == 1 ? $bnPosition->show_live_tv : $bnPosition->show_video_live_tv) == 1 ? 'checked' : ''); ?>>Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="show_live_tv" id="no" value="2" <?php echo e(($bnPosition->position_id == 1 ? $bnPosition->show_live_tv : $bnPosition->show_video_live_tv) == 2 ? 'checked' : ''); ?>>No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>
    <script>
        $("#positionSet").click(function () {
            var content = $("#title").val().split(' - ');
            if (content.length != 3){
                alert("Please select the news properly from the dropdown!");
            }else {
                if ($('#serial li').length == 0) {
                    $('#serial').prepend('<li>' + 1 + '</li>');
                    $('#sortable').prepend('<li class="item" id="item-' + content[0] + '" style="background: #ED0000; color: #FFF;">' + content[1] + ' <span class="badge">' + content[0] + '</span><button id="removePosition" class="btn btn-xs btn-warning pull-right" onclick="removeLi(' + content[0] + ')">X</button></li>')
                } else {
                    var serial = $('#serial li').length - 1;
                    var svalue = serial + 2;
                    $('#serial li:eq(' + serial + ')').after('<li>' + svalue + '</li>');
                    var position = $("#position").val() - 1;

                    if ($("#position").val() > $('#sortable li').length) {
                        position = $("#position").val() - 2;
                        $('#sortable li:eq(' + position + ')').after('<li class="item" id="item-' + content[0] + '" style="background: #ED0000; color: #FFF;">' + content[1] + ' <span class="badge">' + content[0] + '</span><button id="removePosition" class="btn btn-xs btn-warning pull-right" onclick="removeLi(' + content[0] + ')">X</button></li>');
                    } else {
                        $('#sortable li:eq(' + position + ')').before('<li class="item" id="item-' + content[0] + '" style="background: #ED0000; color: #FFF;">' + content[1] + ' <span class="badge">' + content[0] + '</span><button id="removePosition" class="btn btn-xs btn-warning pull-right" onclick="removeLi(' + content[0] + ')">X</button></li>');
                    }
                }
            }

        });

        $("#sortable").sortable();
        function saveData(posId) {
            var data = $("#sortable").sortable('serialize');

            let params = {'_token': '<?php echo e(csrf_token()); ?>', data: data, id: posId};

            if (posId == 1) {
                params.settings = {
                    show_live_tv: $('input[name=show_live_tv]:checked', '#show-live-tv').val() == 1 ? 1 : 2,
                };
            } else if(posId == 3) {
                params.settings = {
                    show_video_live_tv: $('input[name=show_live_tv]:checked', '#show-live-tv').val() == 1 ? 1 : 2,
                };
            }

            if(data.length == 0){
                confirm("Please set at least a video!");
            }else{
                $.post('<?php echo e(url("backend/bn-video-position/change")); ?>', params, function(d){
                    console.log(d)
                    alert("The position has been changed!");
                    window.location.href = '<?php echo e(url("backend/bn-video-position/change")); ?>/'+d.position_id;
                });
            }
        }

        function removeLi(id) {
            $('#serial li:last-child').remove();
            $('#item-'+id).remove();
        }

        $(function() {
            $("#title").autocomplete({ // For news title autocomplete
                source: function(request, response) {
                    $.get("<?php echo e(url('backend/bn-video-position/keyword')); ?>", { posId: $('#positionId').val(), term: $('#title').val() }, response);
                },
                minLength: 1,
                select: function (event, ui) {
                    // console.log(ui.item);
                    $('#videoId').val(ui.item.id);
                }
            });
        });

        $(function() {
            var positionId = '<?php echo e($bnPosition->position_id); ?>';

            if (positionId == 1 || positionId == 3) {
                $("#show-live-tv").css('display', 'block');
            } else {
                $("#show-live-tv").css('display', 'none');
            }

            $('#positionName').change(function() {
                var position = $(this).val();

                if (position == 1 || position == 3) {
                    $("#show-live-tv").css('display', 'block');
                } else {
                    $("#show-live-tv").css('display', 'none');
                }

                $('#title').val('');
                $('#positionId').val(position);
                //alert(position);
                $.get('<?php echo e(url("backend/bn-populate-video-position")); ?>', {'position': position}, function (data) {
                    $('#serial').empty();
                    $('#sortable').empty();
                    var no = 1;
                    if(data.videos.length){
                        $.each(data.videos, function () {
                            //$('#sortable').append("<option value='"+ value.id +"'>" + value.name + "</option>");
                            $('#serial').append('<li>' + no + '</li>');
                            no++;
                        });

                        $.each(data.videos, function (key, value) {
                            //$('#sortable').append("<option value='"+ value.id +"'>" + value.name + "</option>");
                            $('#sortable').append('<li class="item ui-sortable-handle" id="item-' + value.id + '">' +
                                value.title +
                                '<span class="badge">' + value.id + '</span>' +
                                '<button id="removePosition" class="btn btn-xs btn-warning pull-right" onclick="removeLi(' + value.id + ')">X</button>' +
                                '</li>'
                            );
                        });
                    }

                    $('#sortable').append('' +
                            '<input type="hidden" value="'+data.position.position_id+'" id="positionId">'+
                            '<button type="button" onclick="saveData('+data.position.position_id+')" class="btn btn-primary">Save</button>'
                    );

                    // Set setting data
                    if (data.position.position_id == 1) {
                        if (data.position.show_live_tv == 1){
                            $("#yes").attr("checked", "checked")
                        } else {
                            $("#no").attr("checked", "checked")
                        }
                    } else if (data.position.position_id == 3) {
                        if (data.position.show_video_live_tv == 1){
                            $("#yes").attr("checked", "checked")
                        } else {
                            $("#no").attr("checked", "checked")
                        }
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/backend/bn/video_position/position_set.blade.php ENDPATH**/ ?>