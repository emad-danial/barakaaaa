@extends('broker.layouts.app')
@section('page_title')
   Add a financial operation
@endsection
@section('small_title')
   
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add a financial operation</h3>

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
                                'action' => ['broker\MyPackagesOrdersController@update',$model->id],
                                'method' =>'put',
                                'files' =>true,
                            ]) !!}


                             <div class="form-group">
                                <label>Paid : $ {{$model->paid}}</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <label>Remaining : $  {{$model->remaining}}</label>
                               
                                
                            </div>
                             <div class="form-group">
                               
                                                <label for="check_number">
                                                 Check Number
                                                </label>
                                               <input name="check_number" type="text"  id="check_number" class="form-control" placeholder="Enter Check Number ">
                                           
                            </div>

                            <div class="form-group">
                                <label>Value</label>
                                <input type="number" name="value" class="form-control" placeholder="Enter Value">
                                
                            </div>
                            
                              <input type="hidden" name="typeupdate" value="financial_operation" >

                        </div>


                        <br>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Add</button>
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

