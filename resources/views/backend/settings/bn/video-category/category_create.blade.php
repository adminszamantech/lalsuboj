@extends('backend.app')

@section('title', 'Video Category Create')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="{{ route('bn-categories.index') }}">Category List</a></li>
      <li class="active">Add Video Category</li>
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
          <form action="{{ route('bn-video-categories.store') }}" method="post" class="form-horizontal col-sm-offset-1">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group">
                <label for="categoryName" class="col-sm-3 control-label">Category name <span class="required">*</span></label>

                <div class="col-sm-6">
                  <input type="text" name="categoryName" class="form-control" id="categoryName" placeholder="Category name">
                  @if($errors->has('categoryName')) <span class="text-danger">{{ $errors->first('categoryName') }}</span> @endif
                </div>
              </div>

                <div class="form-group">
                    <label for="categoryNameBn" class="col-sm-3 control-label">Category name (Bn) <span class="required">*</span></label>

                    <div class="col-sm-6">
                        <input type="text" name="categoryNameBn" class="form-control" id="categoryNameBn" placeholder="Category name bangla">
                        @if($errors->has('categoryNameBn')) <span class="text-danger">{{ $errors->first('categoryNameBn') }}</span> @endif
                    </div>
                </div>

              <div class="form-group">
                <label for="metaKeywords" class="col-sm-3 control-label">Meta Keywords</label>

                <div class="col-sm-6">
                  <input type="text" name="metaKeywords" class="form-control" id="metaKeywords" placeholder="Meta keywords">
                </div>
              </div>
              <div class="form-group">
                <label for="metaDescription" class="col-sm-3 control-label">Meta Description</label>

                <div class="col-sm-6">
                  <textarea name="metaDescription" id="metaDescription" class="form-control" placeholder="Meta description"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="categoryPosition" class="col-sm-3 control-label">Category Position</label>
                <div class="col-sm-6">
                  <select class="form-control col-sm-6" name="categoryPosition" id="categoryPosition">
                    <option value="0">None</option>
                    @for($i=1; $i <= 40; $i++)
                      <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Status</label>
                <div class="col-sm-6">
                  <label class="radio-inline">
                    <input type="radio" name="status" value="1" checked>Active
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="status" value="2">Inactive
                  </label>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                  <button type="submit" class="btn btn-info">Submit</button>
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
@endsection
