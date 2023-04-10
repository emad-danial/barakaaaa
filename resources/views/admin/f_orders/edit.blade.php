@extends('admin.layouts.app')
@section('page_title')
Edit Order Flight
@endsection
@section('small_title')
Order
@endsection
@section('content')

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Order Flight</h3>
        </div>
        <div class="box-body">
                @include('flash::message')
                @include('partials.validations_errors')
                    <div>
                        {!! Form::model($model, [
                        'action' => ['admin\FlightsOrdersController@update',$model->id],
                        'method' =>'put',
                        'files' =>true,
                        ]) !!}

                        <label for="sel1">Status</label>
                        <select name="status" class="form-control" id="sel1">
                            <option value="pending" @if($model->status == 'pending') selected @else @endif >Pending
                            </option>
                            <option value="in_process" @if($model->status == 'in_process') selected @else @endif > In
                                Process</option>
                            <option value="complete" @if($model->status == 'complete') selected @else @endif > Complete
                            </option>
                            <option value="cancel" @if($model->status == 'cancel') selected @else @endif > Cancel
                            </option>
                        </select>

                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
            </div>
            <!-- /.box-body -->

    </div>

    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
