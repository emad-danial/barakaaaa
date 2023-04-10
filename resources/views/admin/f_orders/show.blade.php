@extends('admin.layouts.app')

@section('page_title')
    Show Order
@endsection
@section('small_title')
    Show Order
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
                            <td scope="col">{{$model->first_name}}  {{$model->last_name}}</td>
                            <th scope="col">User Mobile</th>
                            <td scope="col">{{$model->mobile}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="col">User Email</th>
                            <td scope="col">{{$model->email}}</td>
                            <th scope="col">Flight Name</th>
                            <td scope="col"><a  href="/flights/ {{$model->flight_id}}/{{$model->flight_name}}" target="_blank" > {{$model->flight_name}}</a></td>
                        </tr>
                        <tr>

                            <th scope="col">Num Of Adults </th>
                            <td scope="col">{{$model->num_of_adults}} </td>
                            <th scope="col"> Num Of Child </th>
                            <td scope="col">{{$model->num_of_child}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Status</th>
                            <td scope="col">{{$model->status}}</td>
                            <th scope="col">Price Per Adult</th>
                            <td scope="col"> $ {{$model->price}}</td>
                        </tr>
                        @if($model->num_of_child > 0)
                        <tr>
                            
                            <th scope="col">Price Per Child </th>
                            <td scope="col">$ {{$model->price_ch}}</td>
                            <th scope="col"> Total Child Price </th>
                            <td scope="col">$ {{$model->child_price}}</td>
                        </tr>
                        @endif
                        <tr>
                            <th scope="col">Total Price Adults</th>
                            <td scope="col">$ {{$model->adults_price}}</td>
                            
                            <th scope="col">Total Price</th>
                            <td scope="col">$ {{$model->total_price}}</td>
                            
                        </tr>
                       

                        </tbody>
                    </table>
                </div>
               
                <!-- ./col -->
            </div>
            </div>
        </div>

    </section>

@endsection
