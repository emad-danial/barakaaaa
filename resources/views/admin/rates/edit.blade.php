@extends('admin.layouts.app')
@section('page_title')
Edit Rate
@endsection
@section('small_title')
Rate
@endsection
@section('content')

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Rate</h3>
        </div>
        <div class="box-body">
            @include('flash::message')
            @include('partials.validations_errors')
            <div>
                {!! Form::model($model, [
                'action' => ['admin\RatesController@update',$model->id],
                'method' =>'put',
                'files' =>true,
                ]) !!}


                <label for="sel1">Activating</label>
                <select name="is_approve" class="form-control" id="sel1">
                    <option value="active" @if($model->is_approve == 'active') selected @else @endif >Active</option>
                    <option value="disactive" @if($model->is_approve == 'disactive') selected @else @endif >Dis Active
                    </option>
                </select>

            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
        </div>
        <!-- /.box-body -->
    </div>
</section>
<!-- /.content -->
@endsection
