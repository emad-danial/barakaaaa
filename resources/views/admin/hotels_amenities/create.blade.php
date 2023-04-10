@extends('admin.layouts.app')
@section('page_title')
Create Hotels Amenities
@endsection
@section('small_title')
Hotels Amenities
@endsection
@section('content')

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Amenities</h3>
        </div>
        <div class="box-body">
            @include('flash::message')
            @include('partials.validations_errors')
            <div>
                <form method="post" action="{{ route('amenities.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Create</button>
                </form><!-- end of form -->
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
