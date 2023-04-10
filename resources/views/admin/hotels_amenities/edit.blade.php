@extends('admin.layouts.app')
@section('page_title')
Edit Amenities
@endsection
@section('small_title')
Amenities
@endsection
@section('content')

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Amenitie</h3>
        </div>
        <div class="box-body">
            @include('flash::message')
            @include('partials.validations_errors')
            <div>
                <form method="post" action="{{ route('amenities.update', $model->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $model->name }}" class="form-control">
                    </div>

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
