@extends('admin.layouts.app')
@section('page_title')
Edit Faq
@endsection
@section('small_title')
Faq
@endsection
@section('content')

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Faq</h3>
        </div>
        <div class="box-body">
                @include('flash::message')
                @include('partials.validations_errors')
                <div>
                    <form method="post" action="{{ route('faqs.update', $model->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" name="question" value="{{ $model->question }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Answer</label>
                            <input type="text" name="answer" value="{{ $model->answer }}" class="form-control">
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
