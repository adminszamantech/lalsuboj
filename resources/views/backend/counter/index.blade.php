@extends('backend.app')

@section('title', 'Counter')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('elections.index') }}">Counter</a></li>
            <li class="active">Counter</li>
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
                        <h3 class="box-title">Counter</h3>
                    </div>
                    @if(session()->has('successMsg'))
                        <div class="alert alert-success alert-dismissable fade in custom-alert" style="display: inline-block">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('successMsg') }}
                        </div>
                    @endif
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.update') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="box-body">


                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Counter Name <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="counter_name" class="form-control" id="counter_name" placeholder="Title" value="{{ $counter->counter_name ?? '' }}" required />
                                    @if($errors->has('title')) <span class="text-danger">{{ $errors->first('title') }}</span> @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-sm-2 control-label">Counter Date</label>
                                <div class="col-sm-6">
                                    <input type="date" id="date" value="{{ date('Y-m-d', strtotime($counter->date ?? null)) }}" class="form-control" name="date">
                                    @if($errors->has('total_center')) <span class="text-danger">{{ $errors->first('total_center') }}</span> @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="time" class="col-sm-2 control-label">Counter Time</label>
                                <div class="col-sm-6">
                                    <input type="time" id="time" value="{{ $counter->time ?? null }}" name="time" class="form-control">
                                    @if($errors->has('total_center')) <span class="text-danger">{{ $errors->first('total_center') }}</span> @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="1" @if(isset($counter->status)) {{ $counter->status == 1 ? 'checked' : '' }} @endif>Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="2"  @if(isset($counter->status)) {{ $counter->status == 2 ? 'checked' : '' }} @endif>Inactive
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <button type="submit" class="btn btn-info">Update</button>
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
@endsection
