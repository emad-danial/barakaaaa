@extends('admin.layouts.app')
@inject('model', 'App\models\Umrah')
@section('page_title')
    Create Admin
@endsection
@section('small_title')
    Create Admin
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Admin </h3>
            </div>
            <div class="box-body">
                    @include('partials.validations_errors')
                    <div>
                        {!! Form::model($model, ['action' => 'admin\AdminsController@store', 'files' => true]) !!}
                        @include('admin.admins.form')
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
