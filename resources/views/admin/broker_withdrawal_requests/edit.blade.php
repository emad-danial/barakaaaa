@extends('admin.layouts.app')
@section('page_title')
Edit Withdraw Request
@endsection
@section('small_title')
Withdraw Request
@endsection
@section('content')

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Withdraw Request</h3>
        </div>
        <div class="box-body">
                @include('flash::message')
                @include('partials.validations_errors')
                    <div>
                        {!! Form::model($model, [
                        'action' => ['admin\BrokersWithdrawRequestesController@update',$model->id],
                        'method' =>'put',
                        'files' =>true,
                        ]) !!}

                        <label for="sel1">Status</label>
                        <select name="status" class="form-control" id="sel1">
                            <option value="completed" @if($model->status == 'pending') selected @else @endif >Pending
                            </option>

                            <option value="completed" @if($model->status == 'completed') selected @else @endif >
                                Completed</option>
                            <option value="cancelled" @if($model->status == 'cancelled') selected @else @endif
                                >Cancelled</option>
                        </select>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>

            <!-- /.box-body -->
        </div>

    </div>

    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
