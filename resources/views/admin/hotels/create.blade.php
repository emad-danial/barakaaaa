@extends('admin.layouts.app')
@inject('model', 'App\models\Hotel')
@section('page_title')
    Create Hotel 
@endsection
@section('small_title')
    Create Hotel 
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Hotel  </h3>
            </div>
            <div class="box-body">
                    @include('partials.validations_errors')
                    <div>
                        {!! Form::model($model, ['action' => 'admin\HotelsController@store', 'files' => true]) !!}
                        @include('admin.hotels.form')
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
