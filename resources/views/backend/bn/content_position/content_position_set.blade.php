@extends('backend.app')

@section('title', 'Bn Content Position List')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('backend/css/jquery-ui.css') }}">
    <style>
        .ui-widget.ui-widget-content{max-height: 500px; overflow-y: scroll; overflow-x: hidden;}
        .item{list-style: none; background: lightgray; padding: 5px; margin: 2px 0; width: 100%; cursor: move;}
    </style>
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb" style="display: inline-block; width: 500px">
            <li><a href="{{ route('bn-content-position.index') }}">Bn Content Position List</a></li>
            <li class="active">Set Position</li>
        </ol>
        @if(session()->has('successMsg'))
        <div class="alert alert-success alert-dismissable fade in custom-alert" style="display: inline-block">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ session('successMsg') }}
        </div>
        @endif
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-body">
                        <br>
                        <div class="form-inline">
                            {{ csrf_field() }}
                            <input type="hidden" name="position" value="{{ $news_position->position_id }}">
                            <div class="form-group">
                                @php
                                    $aid = explode('/', URL::current());
                                @endphp
                                <label for="newsHeading" class="control-label">Choose position </label>
                                <select id="positionName" name="positionName" class="form-control">
                                    @foreach($allpositions as $position)
                                        <option value="{{ $position->position_id }}" {{ $position->position_id == $aid[count($aid)-1]? 'selected' : '' }}>{{ $position->position_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="newsHeading" class="control-label">News Heading </label>
                                <input type="text" name="term" id="newsHeading" class="form-control" placeholder="News ID / Title..." required>
                                <input type="hidden" id="positionId" value="{{ $news_position->position_id }}">
                                <input type="hidden" name="newsId" id="newsId">
                            </div>
                            <div class="form-group">
                                <select name="position" id="position" class="form-control">
                                    @for($i=1; $i<=12; $i++);
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
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
                                    @if(!empty($allnews))
                                        @for($i=1; $i <= count($allnews); $i++)
                                            <li>{{ $i }}</li>
                                        @endfor
                                    @endif
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul id="sortable" style="padding: 0">
                                    @if(!empty($allnews))
                                        @foreach($allnews as $news)
                                            <li class="item" id="item-{{ $news->content_id }}">
                                                {{ $news->content_heading }}
                                                <span class="badge">{{ $news->content_id }}</span>
                                                <button id="removePosition" class="btn btn-xs btn-warning pull-right" onclick="removeLi({{ $news->content_id }})">X</button>
                                            </li>
                                        @endforeach
                                    @endif
                                    <input type="hidden" value="{{ $news_position->position_id }}" id="positionId">
                                    <button type="button" onclick="saveData({{ $news_position->position_id }})" class="btn btn-primary">Save</button>
                                </ul>
                            </div>

                            {{--<div class="col-sm-5 form-horizontal" id="special-top-setting" style="display: none;">
                                <div style="padding: 20px; border: 1px solid gray">
                                    <div class="form-group">
                                        <label for="special_top_video_type" class="col-sm-1 control-label">Type</label>

                                        <div class="col-sm-11">
                                            <select name="special_top_video_type" class="form-control" id="special_top_video_type">
                                                <option value="1" {{ $settings->special_top_video_type == 1? 'selected':'' }}>Youtube</option>
                                                <option value="2" {{ $settings->special_top_video_type == 2? 'selected':'' }}>Facebook</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="special_top_video_code" class="col-sm-1 control-label">Code</label>

                                        <div class="col-sm-11">
                                            <input type="text" name="special_top_video_code" id="special_top_video_code" class="form-control" value="{{ $settings->special_top_video_code ?? '' }}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Show</label>
                                        <div class="col-sm-11">
                                            <label class="radio-inline">
                                                <input type="radio" name="show_special_top_video" id="yes" value="1" {{ optional($settings)->show_special_top_video && optional($settings)->show_special_top_video == 1 ? 'checked' : '' }}>Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="show_special_top_video" id="no" value="2" {{ optional($settings)->show_special_top_video && optional($settings)->show_special_top_video == 2 ? 'checked' : '' }}>No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}

                            {{--<div class="col-sm-5 form-horizontal" id="special-section-setting" style="display: none;">
                                <div style="padding: 20px; border: 1px solid gray">
                                    <div class="form-group">
                                        <label for="special_title" class="col-sm-1 control-label">Title</label>

                                        <div class="col-sm-11">
                                            <input type="text" name="special_title" id="special_title" class="form-control" value="{{ $settings->special_title ?? '' }}"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="special_link" class="col-sm-1 control-label">Link</label>

                                        <div class="col-sm-11">
                                            <input type="text" name="special_link" id="special_link" class="form-control" value="{{ $settings->special_link ?? '' }}"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Show</label>
                                        <div class="col-sm-11">
                                            <label class="radio-inline">
                                                <input type="radio" name="show_special" id="yes" value="1" {{ optional($settings)->show_special && optional($settings)->show_special == 1 ? 'checked' : '' }}>Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="show_special" id="no" value="2" {{ optional($settings)->show_special && optional($settings)->show_special == 2 ? 'checked' : '' }}>No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection

@section('custom-js')
    <script>
        $("#positionSet").click(function () {
            var content = $("#newsHeading").val().split(' - ');
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
            var settings = {
                /*show_special_top_video: $('input[name=show_special_top_video]:checked', '#special-top-setting').val() == 1 ? 1 : 2,
                special_top_video_type: $("#special_top_video_type").val(),
                special_top_video_code: $("#special_top_video_code").val(),*/
                show_special: $('input[name=show_special]:checked', '#special-section-setting').val() == 1 ? 1 : 2,
                special_title: $("#special_title").val(),
                special_link: $("#special_link").val(),
            };

            // console.log('dd', $('input[name=show_special]:checked').val());

            if(data.length == 0){
                confirm("Please set at least a news!");
            }else{
                
                var id = posId;
                $.post('{{ url("admin/backend/bn-position/change") }}', {'_token': '{{ csrf_token() }}', "data": data, "settings": settings, 'id': id}, function(d){
                    alert("The position has been changed!");
                    window.location.href = '{{ url("admin/backend/bn-content-position/change") }}/'+d.position_id;
                });
            }

        }

        function removeLi(id) {
            $('#serial li:last-child').remove();
            $('#item-'+id).remove();
        }

        

        $(function() {
            $("#newsHeading").autocomplete({ // For news title autocomplete
                source: function(request, response) {
                    $.get("{{ url('admin/backend/bn-content-position/keyword') }}", { posId: $('#positionId').val(), term: $('#newsHeading').val() }, response);
                },
                minLength: 1,
                select: function (event, ui) {
                    $('#newsId').val(ui.item.id);
                }
            });
        });
     

        $(function() {
            // Show/hide right setting section
            var positionId = '{{ $news_position->position_id }}';

            /*if (positionId == 1) {
                $("#special-top-setting").css('display', 'block');
            } else {
                $("#special-top-setting").css('display', 'none');
            }*/

            if (positionId == 2) {
                $("#special-section-setting").css('display', 'block');
            } else {
                $("#special-section-setting").css('display', 'none');
            }

            $('#positionName').change(function() {
                var position = $(this).val();
                // Show/hide right setting section
                /*if (position == 1) {
                    $("#special-top-setting").css('display', 'block');
                    $("#special-section-setting").css('display', 'none');
                } else {
                    $("#special-top-setting").css('display', 'none');
                }*/

                if (position == 2) {
                    $("#special-section-setting").css('display', 'block');
                    $("#special-top-setting").css('display', 'none');
                } else {
                    $("#special-section-setting").css('display', 'none');
                }

                $('#newsHeading').val('');
                $('#positionId').val(position);
                //alert(position);
                $.get('{{ url("admin/backend/bn-populate-position") }}', {'position': position}, function (data) {
                    //console.log(data.news);
                    $('#serial').empty();
                    var no = 1;
                    $.each(data.news, function() {
                        //$('#sortable').append("<option value='"+ value.id +"'>" + value.name + "</option>");
                        $('#serial').append('<li>'+no+'</li>');
                        no++;
                    });

                    $('#sortable').empty();

                    $.each(data.news, function(key, value) {
                        //$('#sortable').append("<option value='"+ value.id +"'>" + value.name + "</option>");
                        $('#sortable').append('<li class="item ui-sortable-handle" id="item-'+value.content_id+'">'+
                                value.content_heading+
                                '<span class="badge">'+value.content_id +'</span>'+
                                '<button id="removePosition" class="btn btn-xs btn-warning pull-right" onclick="removeLi('+value.content_id+')">X</button>'+
                                '</li>'
                        );
                    });

                    $('#sortable').append('' +
                            '<input type="hidden" value="'+data.position.position_id+'" id="positionId">'+
                            '<button type="button" onclick="saveData('+data.position.position_id+')" class="btn btn-primary">Save</button>'
                    );

                    // Show setting data
                    if (data.position.position_id == 2) {
                        if (data.settings.show_special == 1){
                            $("#yes").attr("checked", "checked")
                        } else {
                            $("#no").attr("checked", "checked")
                        }

                        $("#special_title").val(data.settings.special_title);
                        $("#special_link").val(data.settings.special_link);
                    }
                });
            });
        });
    </script>
@endsection
