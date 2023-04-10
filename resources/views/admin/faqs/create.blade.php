@extends('admin.layouts.app')
@section('page_title')
Create Faqs
@endsection
@section('small_title')
Faqs
@endsection
@section('content')

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Faqs</h3>
        </div>
        <div class="box-body">
            @include('flash::message')
            @include('partials.validations_errors')
            <div>

                <form method="post" action="{{ route('faqs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Question*</label>
                        <input type="text" name="question" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Answer*</label>
                        <input type="text" name="answer" class="form-control" required>
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
