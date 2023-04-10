@extends('admin.layouts.app')
@inject('model', 'App\models\Flight')
@section('page_title')
    Create Flight Package
@endsection
@section('small_title')
    Create Flight Package
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Flight Package </h3>
            </div>
            <div class="box-body">
                    @include('partials.validations_errors')
                    <div>
                        {!! Form::model($model, ['action' => 'admin\FlightsController@store', 'files' => true]) !!}
                        @include('admin.flights.form')
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
