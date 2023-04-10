@extends('broker.layouts.app')

@section('page_title')
    Show Order
@endsection
@section('small_title')
    Show Order
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
                            <th scope="col">Room Name</th>
                            <td scope="col">{{$model->name}} </td>
                            <th scope="col">Room Includes</th>
                            <td scope="col">{{$model->includes}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="col">Reserve From Date</th>
                            <td scope="col">{{$model->reserve_from}}</td>
                            <th scope="col">Reserve From Date</th>
                            <td scope="col">{{$model->reserve_to}}</td>
                        </tr>
                        <tr>

                            <th scope="col">Maxinum Person Per Room </th>
                            <td scope="col">{{$model->maxinum}} </td>
                            <th scope="col"> Status </th>
                            <td scope="col">{{$model->status}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Hotel Name</th>
                            <td scope="col">{{$model->hotelsname}}</td>
                            <th scope="col">Show Hotel</th>
                            <td scope="col"><a href="/hotels/{{$model->hotel_id}}/{{$model->hotelsname}}">Show Hotel</a></td>
                        </tr>
                        <tr>
                            <th scope="col">Room Price Per Night </th>
                            <td scope="col">$ {{$model->price}}</td>
                            <th scope="col">Number Of Nights</th>
                            <td scope="col">{{$model->number_days}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Total Price</th>
                            <td scope="col">$ {{$model->total_price}}</td>
                            
                        </tr>
                       

                        </tbody>
                    </table>
                </div>
               
                <!-- ./col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
