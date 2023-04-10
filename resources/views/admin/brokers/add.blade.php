@extends('admin.layouts.app')
@section('page_title')
    Add Financial Operation
@endsection
@section('small_title')
    Add Financial Operation
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border row">

                                    <h3 class="box-title">Add Financial Operation</h3>

                       <a href="{{ url('admin/brokers/'. $id .'/show' ) }}" class="btn btn-info"><i class="fa fa-undo"></i>  Back To Partner</a>
            </div>
            <div class="box-body">
                    @include('flash::message')
                    @include('partials.validations_errors')
                    <div>
                        {!! Form::model($model, [
                            'action' => ['admin\BrokersController@update',$model->id],
                            'method' =>'put',
                            'files' =>true,
                        ]) !!}

                            <div class="form-group">
                                <label>Paid : $ {{$total_paid}}</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <label>Outstanding  : $  {{$remaining}}</label>
                               
                                
                            </div>


                            <div class="form-group">
                                <label>Check Number</label>
                                <input type="number" name="check_number" class="form-control" placeholder="Enter Check Number">
                                
                            </div>



                            <div class="form-group">
                                <label>Value</label>
                                <input type="number" name="value" class="form-control" placeholder="Enter Value">
                                
                            </div>



                       <input type="hidden" name="typeupdate" value="financial_operation" >
                        <input type="hidden" name="remaining" value="{{$remaining}}" >
                        </div>
 
  
                       <hr>
                            <button class="btn btn-primary" type="submit">Add</button>

                    </div>

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
