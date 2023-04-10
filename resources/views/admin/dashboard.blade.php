@extends('admin.layouts.app')

@section('page_title')
    Dashboard
@endsection
@section('small_title')
    Dashboard
@endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-1">
                        <div class="inner">
                            <h3>{{$umrahPackages}}</h3>

                            <p>Umrah Packages</p>
                        </div>
                        <div class="icon" style="width: 55px">
                            <i class="ion ion-ios-moon-outline" style="font-size: 110px"></i>
                        </div>
                        <a href="{{ url('admin/umrahs') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-o-right"></i></a>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-2">
                        <div class="inner">
                            <h3>{{$hajjPackages}}</h3>

                            <p>Hajj Packages</p>
                        </div>
                        <div class="icon">
                            <i class="ion-ios-albums-outline"></i>
                        </div>
                        <a href="{{ url('admin/hajjs') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-o-right"></i></a>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-3">
                        <div class="inner">
                            <h3>{{$flights}}</h3>

                            <p>Flights</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-paper-airplane"></i>
                        </div>
                        <a href="{{ url('admin/flights') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-o-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-4">
                        <div class="inner">
                            <h3>{{$hotels}}</h3>

                            <p>Hotels</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-home"></i>
                        </div>
                        <a href="{{ url('admin/hotels') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-o-right"></i></a>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-1 elevation-1"><i class="fa fa-moon-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">New Umrah Orders</span>

                            <span class="info-box-number">{{$ordersUmrh}}</span>
                            <!-- <span class="info-box-number">
                                <a href="{{ url('admin/packages_orders/pendingOrderUmrah') }}">
                                <i class="fa fa-angle-double-right"></i>
                                </a>
                            </span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-2 elevation-1"><i class="fa fa-first-order"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">New Hajj Orders</span>

                            <span class="info-box-number">{{$ordersHajj}}</span>
                            <!-- <span class="info-box-number">
                                <a href="{{ url('admin/hajj_orders/pendingOrderHajj') }}">
                                <i class="fa fa-angle-double-right"></i>
                                </a>
                            </span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-3 elevation-1"><i class="fa fa-plane"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Flights Orders</span>
                            <span class="info-box-number">{{$flightsOrders}}</span>
                            <!-- <a href="{{ url('admin/f_orders') }}">
                                <i class="fa fa-angle-double-right"></i>
                            </a> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>


                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-4 elevation-1"><i class="fa fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Hotel Orders</span>

                            <span class="info-box-number">{{$hotelOrders}}</span>
                            <!-- <span class="info-box-number">
                                 <a href="{{ url('admin/order_h') }}">
                                <i class="fa fa-angle-double-right"></i>
                                </a>
                            </span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- /.col -->


                  <div class="col-lg-3 col-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-5 elevation-1"><i class="fa fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Users</span>
                            <span class="info-box-number">{{$users}}</span>
                            <!-- <a href="{{ url('admin/users') }}">
                                <i class="fa fa-angle-double-right"></i>
                            </a> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
               
                <!-- /.col -->
                <div class="col-lg-3 col-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-6 elevation-1"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Brokers</span>
                            <span class="info-box-number">{{$brokers}}</span>
                            <!-- <a href="{{ url('admin/brokers') }}">
                                <i class="fa fa-angle-double-right"></i>
                            </a> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-7 elevation-1"><i class="fa fa-money"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">E_Visa</span>
                            <span class="info-box-number">{{$evisa}}</span>
                            <!-- <a href="{{ url('admin/evisa') }}">
                                <i class="fa fa-angle-double-right"></i>
                            </a> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-lg-3 col-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-8 elevation-1"><i class="fa fa-percent"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Rating</span>
                            <span class="info-box-number">{{$rates}}</span>
                            <!-- <a href="{{ url('admin/rates') }}">
                                <i class="fa fa-angle-double-right"></i>
                            </a> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

               
                
                  <div class="col-lg-12 col-12">
                    <div class="info-box mb-3" style="display: flex">
                        <span class="info-box-icon bg-1 elevation-1"><i class="fa fa-shopping-cart"></i></span>


                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Total Umrahs</span>
                            <span class="info-box-number">&dollar; {{$umrahprice}} </span>
                            <!-- <a href="{{ url('admin/packages_orders/completeOrderUmrah') }}">
                                <i class="fa fa-angle-double-right"></i> Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">+</div>
                       <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Total Hajjs</span>
                            <span class="info-box-number">&dollar; {{$hajjprice}} </span>
                            <!-- <a href="{{ url('admin/hajj_orders/completeOrderHajj') }}">
                                <i class="fa fa-angle-double-right"></i>Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">+</div>
                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Total Hotels</span>
                            <span class="info-box-number">&dollar; {{$hotelsprice}} </span>
                            <!-- <a href="{{ url('admin/order_h/complete') }}">
                                <i class="fa fa-angle-double-right"></i>Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">+</div>
                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Total Flights</span>
                            <span class="info-box-number">&dollar; {{$flightssprice}} </span>
                            <!-- <a href="{{ url('admin/f_orders/complete') }}">
                                <i class="fa fa-angle-double-right"></i>Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">=</div>
                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Total Sales</span>
                            <span class="info-box-number">&dollar; {{$total_sales}} </span>
                        </div>

                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
<div class="col-lg-12 col-12">
                    <div class="info-box" style="display: flex">
                        <span class="info-box-icon bg-2 elevation-1"><i class="fa fa-eye"></i></span>


                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Umrah Views</span>
                            <span class="info-box-number">{{$umrahviews}} </span>
                            <!-- <a href="{{ url('admin/packages_views/umrah') }}">
                                <i class="fa fa-angle-double-right"></i> Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 25px;">+</div>
                       <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Hajj Views</span>
                            <span class="info-box-number">{{$hajjviews}} </span>
                            <!-- <a href="{{ url('admin/packages_views/hajj') }}">
                                <i class="fa fa-angle-double-right"></i>Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 25px;">+</div>
                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Hotel Views</span>
                            <span class="info-box-number">{{$hotelsprice}} </span>
                            <!-- <a href="{{ url('admin/packages_views/hotel') }}">
                                <i class="fa fa-angle-double-right"></i>Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 25px;">+</div>
                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Flight Views</span>
                            <span class="info-box-number">{{$flightviews}} </span>
                            <!-- <a href="{{ url('admin/packages_views/flight') }}">
                                <i class="fa fa-angle-double-right"></i>Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 25px;">=</div>
                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Total Views</span>
                            <span class="info-box-number">{{$total_views}} </span>
                        </div>

                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>


            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
