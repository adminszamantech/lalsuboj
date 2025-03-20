@extends('backend.app')

@section('title', 'Fix Bn Content Position')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('bn-content-position.index') }}">Special Position</a></li>
            <li class="active">Add Fixed Special Position </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(session()->has('successMsg'))
            <div class="alert alert-success alert-dismissable fade in custom-alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session('successMsg') }}
            </div>
        @endif
        <div class="row">
            <form action="{{ route('bnupdateContentPositionFixed') }}" method="post" class="form-horizontal" >
                {{ csrf_field() }}
                <div class="col-sm-6">
                    <div class="box box-solid">
                        <div class="box-group" id="accordion">
                            <div class="box box-default">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="position_number" class="col-sm-3 control-label">Special Position Number</label>
                                        <div class="col-sm-9">
                                            <select name="position_number" id="position_number" class="form-control">
                                                <option value="">--None--</option>
                                                @if(isset($position->position_number))
                                                    @for($i=1; $i<=11; $i++)
                                                        <option value="{{ $i }}" @if($position->position_number === $i) selected @endif>{{ $i }}</option>
                                                    @endfor
                                                @endif
                                            </select>
                                            @error('position_number')
                                            <small class="text-danger">{{ $message }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_id" class="col-sm-3 control-label">News ID</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="news_id" placeholder="Enter news id" value="{{ $position->news_id ?? null }}" class="form-control" name="news_id">
                                            @error('news_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-9">
                                            <label class="radio-inline">
                                                <input type="radio" name="is_fixed"  value="1" @if(isset($position->is_fixed)) @if($position->is_fixed === 1) checked @endif @endif>Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="is_fixed" value="0" @if(isset($position->is_fixed)) @if($position->is_fixed === 0) checked @endif @endif>Inactive
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3 control-label"></div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-info"> Fix Position</button>
                                            <a href="{{ route('bn-content-position.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
                                        </div>
                                    </div>
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
@endsection
