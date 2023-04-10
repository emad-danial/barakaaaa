@extends('admin.layouts.app')
@section('page_title')
Edit
@endsection
@section('small_title')
Edit
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit</h3>
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

                    <div class="form-group col-lg-6">
                        <label for="first_name">First Name</label>
                        {!! Form::text('first_name', null , ['class' => 'form-control','placeholder'=>'Enter First
                        Name']) !!}
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="last_name">Last Name</label>
                        {!! Form::text('last_name', null , ['class' => 'form-control','placeholder'=>'Enter Last Name'])
                        !!}
                    </div>


                    <div class="form-group col-lg-6">
                        <label for="mobile">Mobile</label>
                        {!! Form::text('mobile', null , ['class' => 'form-control','placeholder'=>'Enter Mobile']) !!}
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="email">Email</label>
                        {!! Form::text('email', null , ['class' => 'form-control','placeholder'=>'Enter Email']) !!}
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">

                    </div>

                    <div class="form-group col-lg-6">

                        <label for="commission">Commission Percentage (%) (optional)</label>
                        <input type="number" value="{{$commission->commission}}" name="commission" min="0" max="100"
                            class="form-control" placeholder="Enter Partner Commission">

                    </div>

                    <div class="form-group col-lg-12">
                        <label for="company_name">Company Name </label>
                        <input type="text" value="{{$commission->company_name}}" name="company_name"
                            class="form-control" placeholder="Enter Company Name">
                    </div>

                    <div class="form-group col-lg-12">
                        <div class="form-group">
                            <label>Imaeg &nbsp; &nbsp;</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        @if($model->image != null)
                        <img src="{{asset($model->image)}}" alt="000000" class="img-thumbnail" width="50px"
                            height="50px">
                        @endif
                        <br>
                        <br>
                    </div>
                    <input type="hidden" name="typeupdate" value="broker_update">

                    <hr>
                    <button class="btn btn-primary" type="submit">Update</button>

                </div>

        </div>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
