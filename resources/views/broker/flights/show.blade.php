@extends('broker.layouts.app')

@section('page_title')
    Show Flight
@endsection
@section('small_title')
    Show Flight
@endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- small box -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Flight Name</th>
                            <td scope="col">{{$model->flight_name}}</td>
                            <th scope="col">Company Name</th>
                            <td scope="col">{{$model->flight_company}}</td>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="col">From City</th>
                            <td scope="col">{{$model->from_city}}</td>
                            <th scope="col">To City</th>
                            <td scope="col">{{$model->to_city}}</td>
                        </tr>
                        <tr>

                            <th scope="col">Reservation From Date</th>
                            <td scope="col">{{$model->reservation_from}}</td>
                            <th scope="col">Reservation End Date</th>
                            <td scope="col">{{$model->reservation_to}}</td>

                        </tr>


                        <tr>
                            <th scope="col">Price</th>
                            <td scope="col">

                                    {{$model->price}} $
                            </td>
                            <th scope="col">Offer</th>
                            <td scope="col">
                                @if($model->is_offer > 0)
                                    {{$model->is_offer}} %
                                @else
                                    0 %
                                @endif

                            </td>

                        </tr>
                        <tr>
                            <th scope="col">Description</th>
                            <td scope="col"> {!! $model->description !!}   </td>
                            <th scope="col">Image</th>
                            <td scope="col">
                                <img src="../../{{$model->image}}" alt="000000" class="img-thumbnail" width="50px" height="50px">


                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>


                <div class="row">
                    <div class="col-lg-10"></div>
                        <div class="col-lg-2">
                        <a  href="/flights/{{$model->id}}/{{$model->flight_name}}" class="btn btn-primary">Show More Details</a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
