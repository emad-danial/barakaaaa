@extends('admin.layouts.app')
@section('page_title')
    Create Slider & Logos 
@endsection
@section('small_title')
    Slider & Logos 
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Slider & Logos </h3>
            </div>
            <div class="box-body">
                    @include('partials.validations_errors')
                    @include('flash::message')
                    <div>
                        <form method="post" action="{{ route('app_gallery.store') }}"   enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" class="form-control" id="sel1">
                                    <option selected value="logo">Logo</option>
                                    <option value="background"> Background</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Image*  &nbsp; &nbsp;</label>   &nbsp; &nbsp;<span style="color: red"> Background Size (width 1275 *  height 675 )</span> &nbsp; &nbsp;  &nbsp; &nbsp;<span style="color: red"> Logo Size (width auto *  height 69 )</span>
                                <input type="file" name="image" class="form-control image" required>
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

