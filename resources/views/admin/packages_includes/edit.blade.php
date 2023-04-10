@extends('admin.layouts.app')
@section('page_title')
Edit Packages Includes
@endsection
@section('small_title')
Package Include
@endsection
@section('content')

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Includes</h3>
        </div>
        <div class="box-body">
                @include('flash::message')
                <div>
                    <form method="post" action="{{ route('includes.update', $model->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')


                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $model->name }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Icon <span style="color: red"> Image Size (width 70 * height 70 )</span></label>
                            <input type="file" name="icon" class="form-control image">
                        </div>

                        @if($model->icon != null)
                        <img src="{{asset($model->icon)}}" alt="000000" class="img-thumbnail" width="50px"
                            height="50px">
                        @endif
                        <hr>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </form><!-- end of form -->

                </div>
                <!-- /.box-body -->

        </div>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
