@extends('admin.layouts.app')
@inject('model', 'App\models\Umrah')
@section('page_title')
    Create Hajj Package
@endsection
@section('small_title')
    Create Hajj Package
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Hajj Package </h3>
            </div>
            <div class="box-body">
                <div class="box">
                    @include('partials.validations_errors')
                    <div class="box-body">
                        {!! Form::model($model, ['action' => 'Admin\HajjsController@store', 'files' => true]) !!}
                        @include('admin.hajjs.form')
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
