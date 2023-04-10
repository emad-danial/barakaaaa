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
                    'action' => ['admin\UsersController@update',$model->id],
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

                    <div class="form-group col-lg-12">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">

                    </div>

                    <hr>
                    <button class="btn btn-primary" type="submit">Update</button>

                </div>

        </div>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
