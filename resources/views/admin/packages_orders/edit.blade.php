@extends('admin.layouts.app')
@section('page_title')
    Edit Order
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
                <h3 class="box-title">Edit Order</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="box">
                    @include('flash::message')
                    @include('partials.validations_errors')
                    <div class="box-body">




                        <div class="box-body">
                            {!! Form::model($model, [
                                'action' => ['admin\PackagesOrdersController@update',$model->id],
                                'method' =>'put',
                                'files' =>true,
                            ]) !!}


                            <label for="sel1">Status</label>
                            <select name="status" class="form-control" id="sel1">
                                <option value="pending" @if($model->status == 'pending') selected @else @endif >Pending</option>
                                <option value="in_process" @if($model->status == 'in_process') selected @else @endif > In Process</option>
                                <option value="complete" @if($model->status == 'complete') selected @else @endif >  Complete</option>
                                 <option value="cancel" @if($model->status == 'cancel') selected @else @endif >  Cancel</option>
                            </select>

                        </div>


                        <br>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                        </div>




                    </div>





                    </div>
                    <!-- /.box-body -->
                </div>

            </div>

        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection

