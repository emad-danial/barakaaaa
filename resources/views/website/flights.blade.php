@extends('website.layouts.app')
@section('content')
<style>
.band{
    
    width: 40px; 
    height: 75px;
    position: absolute;
    z-index: 9;
    left: 33px;
    
    
    background: rgb(226, 73, 84);
    /*border-radius: 100%;*/
    
    /*opacity: 0.8;*/
}
.percentage{
    color: white;
    margin-top: 25%;
    font-size: 15px;
    margin-top: 50%;
    
}
/*.band:hover {*/
/*    opacity: 1.5;*/
    /*transform: scale(1.1);*/
/*      animation: rotation 2s infinite linear;*/

/*}*/
/*@keyframes rotation {*/
/*  from {*/
/*    transform: rotate(0deg);*/
/*  }*/
/*  to {*/
/*    transform: rotate(359deg);*/
/*  }*/
/*}*/
    
/*}*/
.arrow-down {
    width: 0; 
    height: 0; 
    border-left: 19px solid transparent;
    border-right: 21px solid transparent;
    border-top: 21px solid rgb(226, 73, 84);;
    margin-top: 25%;
    font-size: 15px;
    
}
.off{
    color:white;
    font-family: -apple-system-caption1;
}

    
</style>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<section class="hot-page2-alp hot-page2-pa-sp-top all-hot-bg">
	<div class="container">
		<div class="row inner_banner inner_banner_3 bg-none">
			<div class="hot-page2-alp-tit">
				<h1> Book your flight Now ! </h1>
				<ul>
					<li><a href="/">Home</a> </li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="/flights" class="bread-acti">flights Booking</a> </li>
				</ul>
				<p>World's leading flights Booking website,Over 30,000  flight worldwide. </p>
			</div>
		</div>
		<div class="row">
			<div class="hot-page2-alp-con">
				<!--LEFT LISTINGS-->
				<div class="col-md-3 hot-page2-alp-con-left">
					<!--PART 1 : LEFT LISTINGS-->
					<div class="hot-page2-alp-con-left-1">
						<h3>Check Availability</h3> </div>
					
					<!--PART 7 : LEFT LISTINGS-->
					<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
						
						<div class="hot-page2-alp-l-com1 hot-room-ava-check">
							<form method="get" action="/flights">
								<ul>
									<li>
										<label class="active">Enter City</label>
										<input type="text" placeholder="Enter City" name="cityName"> </li>
										
								
										<input type="submit" value="SUBMIT" style="    background-color: #304a60;color: #fff;" class="form-control"> </li>
								</ul>
							</form>
						</div>
					</div>
			

					<!--END PART 4 : LEFT LISTINGS-->
					<!--PART 5 : LEFT LISTINGS-->
					<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
						<h4><i class="fa fa-dollar" aria-hidden="true"></i> Select Price Range</h4>
						<div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
							<form method="get" action="/flights">
						
								<ul>
									<li>
										<div class="radio radio-info radio-circle">
											<input id="chp51" name="price" class="form-check-input" type="radio" value="4">
											<label style="font-size: 15px; " for="chp51"> $500 - Above </label>
										</div>
									</li>
									<li>
										<div class="checkbox checkbox-info checkbox-circle">
											<input id="chp52" name="price" class="form-check-input" type="radio" value="3">
											<label style="font-size: 15px; " for="chp52"> $400 - $500 </label>
										</div>
									</li>
									<li>
										<div class="checkbox checkbox-info checkbox-circle">
											<input id="chp53" name="price" class="form-check-input" type="radio" value="2">
											<label style="font-size: 15px; " for="chp53"> $300 - $400 </label>
										</div>
									</li>
									<li>
										<div class="checkbox checkbox-info checkbox-circle">
											<input  id="chp54" name="price" class="form-check-input" type="radio" value="1">
											<label style="font-size: 15px; " for="chp54"> $200 - $300 </label>
										</div>
									</li>
									<li>
										<div class="checkbox checkbox-info checkbox-circle">
											<input id="chp55" name="price" class="form-check-input" type="radio" value="0">
											<label style="font-size: 15px; " for="chp55"> $200 - Below </label>
										</div>
									</li>
								</ul>
								<input type="submit" style="    background-color: #304a60;color: #fff;" class="form-control" value="Filter Results" >
							</form>  </div>
					</div>
					<!--END PART 5 : LEFT LISTINGS-->
					
					<!--END PART 5 : LEFT LISTINGS-->
					<!--PART 6 : LEFT LISTINGS-->
					<!--END PART 7 : LEFT LISTINGS-->
				</div>
				<!--END LEFT LISTINGS-->
				<!--RIGHT LISTINGS-->
				<div class="col-md-9 hot-page2-alp-con-right">
					<div class="hot-page2-alp-con-right-1">
						<!--LISTINGS-->
						<div class="row">

							@foreach($flights as $key)
							<!--LISTINGS START-->
							<div class="hot-page2-alp-r-list">
						@if($key['isOffer'] !=NULL)     
                           <div class="band text-center">
                               
                               <div class="percentage wow rotateIn  " data-wow-duration="2s" data-wow-delay="1s" >
                                  {{$key['isOffer']}} %
                               </div>
                               <span class="off">OFF</span>
                               <div class="arrow-down">
                                   
                               </div>
                            </div>
                        @endif       
								<div class="col-md-3 hot-page2-alp-r-list-re-sp">
									<a href="flights/{{$key['id']}}/{{$key['flightName']}}">
										<div class="hot-page2-hli-1"> <img width="170px;" height="170px;" src="{{$key['image']}}" alt=""> </div>

									</a>
								</div>
								<div class="col-md-6">
									<div class="hot-page2-alp-ri-p2"> <a href="flights/{{$key['id']}}/{{$key['flightName']}}"><h3>{{$key['flightName']}}</h3></a>
										<ul>
											<li>Location: {{$key['from']}} To {{$key['to']}}</li>

											<li style="background:url("");" >
												Reservation Date:
												{{$key['reservationFrom']}}  To {{$key['reservationTo']}} </li>
										</ul>
									</div>
								</div>
								<div class="col-md-3">
									<div class="hot-page2-alp-ri-p3">
										 <span class="hot-list-p3-1">Price Per Adult</span>
										  <span class="hot-list-p3-2">$ {{$key['priceAdult']}}</span><span class="hot-list-p3-4">
											<a href="flights/{{$key['id']}}/{{$key['flightName']}}" class="hot-page2-alp-quot-btn">Book Now</a>
										</span> </div>
								</div>
							</div>
							<!--END LISTINGS-->
							@endforeach
						</div>
					</div>
				</div>
				<!--END RIGHT LISTINGS-->
			</div>
		</div>
	</div>
</section>



@endsection