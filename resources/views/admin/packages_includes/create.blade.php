@extends('admin.layouts.app')
@section('page_title')
    Create Packages Includes
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
                <h3 class="box-title">Create Includes</h3>
            </div>
            <div class="box-body">
                    @include('partials.validations_errors')
                    @include('flash::message')
                    <div>
                        <form method="post" action="{{ route('includes.store') }}"   enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Icon   <span style="color: red"> Image Size (width 70 *  height 70 )</span></label>
                                <input type="file" name="icon" class="form-control image">
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

