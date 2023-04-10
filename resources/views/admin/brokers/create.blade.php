@extends('admin.layouts.app')
@inject('model', 'App\models\Umrah')
@section('page_title')
    Create Partner
@endsection
@section('small_title')
    Create Partner
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Partner </h3>
            </div>
            <div class="box-body">
                    @include('partials.validations_errors')
                    <div>
                        {!! Form::model($model, ['action' => 'admin\BrokersController@store', 'files' => true]) !!}
                        @include('admin.brokers.form')
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
