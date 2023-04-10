@extends('broker.layouts.app')

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
                        <a href="{{ url('broker/broker_umrahs') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-o-right"></i></a>

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
                        <a href="{{ url('broker/broker_hajjs') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-o-right"></i></a>

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
                        <a href="{{ url('broker/broker_flights') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-o-right"></i></a>
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
                        <a href="{{ url('broker/broker_hotels') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-o-right"></i></a>

                    </div>
                </div>
                
                
                <div class="col-lg-12 col-12">
                <div class="info-box mb-3" style="display: flex">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-first-order"></i></span>
                    
                    <div class="info-box-content" style="margin-left: 70px;">
                        <span class="info-box-text">Total Umrahs</span>
                        <span class="info-box-number">{{$ordersUmrh}}</span>
                        <a href="{{ url('broker/my_package_orders') }}">
                            <i class="fa fa-angle-double-right"></i> Go Details
                        </a>
                    </div>
                    <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">+</div>
                    <div class="info-box-content" style="margin-left: 70px;">
                        <span class="info-box-text">Total Hajjs</span>
                        <span class="info-box-number">{{$ordersHajj}}</span>
                        <a href="{{ url('broker/my_hajj_orders') }}">
                            <i class="fa fa-angle-double-right"></i>Go Details
                        </a>
                    </div>
                    <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">+</div>
                    <div class="info-box-content" style="margin-left: 70px;">
                        <span class="info-box-text">Total Hotels</span>
                        <span class="info-box-number">{{$hotelOrders}}</span>
                        <a href="{{ url('broker/my_order_hotel') }}">
                            <i class="fa fa-angle-double-right"></i>Go Details
                        </a>
                    </div>
                    <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">+</div>
                    <div class="info-box-content" style="margin-left: 70px;">
                        <span class="info-box-text">Total Flights</span>
                        <span class="info-box-number"> {{$flightsOrders}}</span>
                        <a href="{{ url('broker/my_flight_orders') }}">
                            <i class="fa fa-angle-double-right"></i>Go Details
                        </a>
                    </div>
                    <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">=</div>
                    <div class="info-box-content" style="margin-left: 70px;">
                        <span class="info-box-text">Total Orders</span>
                        <span class="info-box-number"> {{$totalOrders}} &nbsp; Order(s)</span>
                    </div>

                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            
            
            
              <div class="col-lg-12 col-12">
                <div class="info-box mb-3" style="display: flex">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>


                    <div class="info-box-content" style="margin-left: 60px;">
                        <span class="info-box-text">Umrah Commission</span>
                        <span class="info-box-number">&dollar;{{$umrahprice}} </span>
                        <a href="{{ url('broker/my_package_orders') }}">
                            <i class="fa fa-angle-double-right"></i> Go Details
                        </a>
                    </div>
                    <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">+</div>
                    <div class="info-box-content" style="margin-left: 60px;">
                        <span class="info-box-text">Hajj Commission</span>
                        <span class="info-box-number">&dollar;{{$hajjprice}}</span>
                        <a href="{{ url('broker/my_hajj_orders') }}">
                            <i class="fa fa-angle-double-right"></i>Go Details
                        </a>
                    </div>
                    
                    <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">=</div>
                    <div class="info-box-content" style="margin-left: 60px;">
                        <span class="info-box-text">Total Commission</span>
                        <span class="info-box-number">&dollar;{{$total_commission}}</span>
                    </div>

                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
              <!--<div class="col-lg-3 col-6">-->
              <!--      <div class="info-box mb-3">-->
              <!--          <span class="info-box-icon  bg-success elevation-1"><i class="fa fa-money"></i></span>-->

              <!--          <div class="info-box-content">-->
              <!--              <span class="info-box-text">Wallet</span>-->
              <!--              <span class="info-box-number">Total Balance</span>-->
              <!--              <span class="info-box-number">$  {{$totalbalance}}</span>-->
                           
              <!--          </div>-->
                      
              <!--      </div>-->
                  
              <!--  </div>-->
                
                
                <!--    <div class="col-lg-3 col-6">-->
                <!--    <div class="info-box mb-3">-->
                <!--        <span class="info-box-icon  bg-success elevation-1"><i class="fa fa-money"></i></span>-->

                <!--        <div class="info-box-content">-->
                <!--            <span class="info-box-text">withdrawal</span>-->
                <!--            <span class="info-box-number">Total Withdrawal</span>-->
                <!--            <span class="info-box-number">$  {{$totalwithdrow}}</span>-->
                           
                <!--        </div>-->
                    
                <!--    </div>-->
                    
                <!--</div>-->

            
            
            </div>




        </div><!-- /.container-fluid -->
        
        
        
        
        
    </section>

@endsection
