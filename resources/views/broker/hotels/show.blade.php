@extends('broker.layouts.app')

@section('page_title')
    Show Hotel
@endsection
@section('small_title')
    Show Hotel
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
                            <th scope="col">Hotel Name</th>
                            <td scope="col">{{$model->name}}</td>
                            <th scope="col">Hotel Duration</th>
                            <td scope="col">{{$model->duration}}</td>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="col"> City</th>
                            <td scope="col">{{$model->city}}</td>
                            <th scope="col">Mobile</th>
                            <td scope="col">{{$model->mobile}}</td>
                        </tr>
                        <tr>
                            <th scope="col" >Address</th>
                            <td scope="col">{{$model->address}}</td>
                            <th scope="col" >Available Tickets</th>
                            <td scope="col">{{$model->availble_tickets}}</td>

                        </tr>
                        <tr>
                            <th scope="col">Description</th>
                            <td scope="col"> {!! $model->description !!}   </td>
                            <th scope="col">Image</th>
                            <td scope="col">
                                <img src="../../{{$model->book_now_img}}" alt="000000" class="img-thumbnail" width="50px" height="50px">


                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Hotel Rooms</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">


                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Room Image</th>
                                <th scope="col">Room Name</th>
                                <th scope="col">Room Includes</th>
                                <th scope="col">Room Maximum Persons</th>
                                <th scope="col">Room Price</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotelRooms as $room)

                                <tr>
                                    <td>

                                        <img src="../../{{$room->room_image}}" alt="000000" class="img-thumbnail" width="50px" height="50px">

                                       </td>
                                    <td>{{$room->name}}</td>
                                    <td>{{$room->includes}}</td>
                                    <td>{{$room->maxinum}}</td>
                                    <td>{{$room->price}} $</td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10">
                        <h3>Hotel Amenities</h3>
                    </div>
                    <div class="col-lg-12">

                        <div class="row">
                            @foreach($amenitie as $includes)
                                                   @foreach($hotelamenate as $hotelamenates)
                                                       @if($hotelamenates->amenities_id == $includes->id)
                                        <div class="col-sm-3">
                                            <div class="checkbox">
                                                <label>
                                                        {{$includes->name}}
                                                </label>
                                            </div>
                                                        @endif
                                                    @endforeach


                                            @endforeach
                                </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-10"></div>
                        <div class="col-lg-2">
                        <a  href="/hotels/{{$model->id}}/{{$model->name}}" class="btn btn-primary">Show More Details</a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
