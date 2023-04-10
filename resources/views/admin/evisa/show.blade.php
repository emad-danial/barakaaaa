@extends('admin.layouts.app')

@section('page_title')
Show E-Visa
@endsection
@section('small_title')
Show E-Visa
@endsection
@section('content')

<section class="content">
    <div class="box">
        <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                <!-- small box -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">User Name</th>
                            <td scope="col">{{$model->first_name}} {{$model->last_name}}</td>
                            <th scope="col">User Contact</th>
                            <td scope="col">{{$model->contact_number}}</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col">User Email</th>
                            <td scope="col">{{$model->email}}</td>
                            <th scope="col">Total</th>
                            <td scope="col">{{$total}} &nbsp; &dollar;</td>
                        </tr>
                        <tr>
                            <th scope="col">Total Amount</th>
                            <td scope="col">{{$totalAmount}} &nbsp; &dollar;</td>
                            <th scope="col">Fees</th>
                            <td scope="col">{{$fees}} &nbsp; &dollar;</td>
                        </tr>
                        <tr>
                            <th scope="col">Order Status</th>
                            <td scope="col">{{$model->status}} </td>

                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h3>E-Visa Persons</h3>
                    <br>
                </div>
                <div class="col-lg-4 ">
                    @if($model->status == 'pending')
                    <a href="{{ route('evisa.edit',$model->id)}}">
                        <h2 class="btn btn-primary">
                            Change Status To Delivered</h2>
                    </a>
                    @endif
                    <br>
                </div>
            </div>
            @foreach($persons as $person)
            <be>
                <h2> person {{$loop->iteration}} </h2>
                <br>
                <div
                    style="border: solid #999;padding: 10px;align-items: center;margin: auto; border-radius: 10px;padding-left: 22px;    padding-bottom: 20px;">
                    <div class="row">
                        <div class="col-lg-2" style=" margin: auto;padding: 10px;">
                            <div class="card">
                                <a href="../../{{$person->photo}}" target="_blank">
                                    <img class="card-img-top " style="border-radius: 50%;width: 200px;height: 200px;"
                                        src="../../{{$person->photo}}" alt="Card image cap">
                                </a>

                                {{--src="../../{{$person->photo}}" alt="Card image cap">--}}
                            </div>
                        </div>
                        <div class="col-lg-10" style="padding-left: 60px;padding-top: 26px">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">Passport Type &nbsp; :
                                        &nbsp; {{$person->passport_type}}</h2>
                                    <br>

                                    <h2 class="card-title">Passport Image &nbsp; : &nbsp;
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display: flex;align-items: center;">
                        <div class="col-lg-2">

                        </div>

                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-body">
                                    <a href="../../{{$person->passport_photo}}" target="_blank">
                                        <img style="border-radius: 10px;padding-left: 30px;" class="card-img-top" src="../../{{$person->passport_photo}}" alt="Card image cap" width="400px" height="300px">
                                    </a>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                @endforeach
                <!-- ./col -->
        </div>
        </div>
    </div>
</section>

@endsection
