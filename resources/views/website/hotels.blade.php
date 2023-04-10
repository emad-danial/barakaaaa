@extends('website.layouts.app')
@section('content')

<section class="hot-page2-alp hot-page2-pa-sp-top all-hot-bg">
	<div class="container">
		<div class="row inner_banner inner_banner_3 bg-none">
			<div class="hot-page2-alp-tit">
				<h1> Book your Hotel Now ! </h1>
				<ul>
					<li><a href="/">Home</a> </li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="/hotels" class="bread-acti">Hotels Booking</a> </li>
				</ul>
				<p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide. </p>
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
							<form method="get" action="/hotels">
								<ul>
									<li>
										<label class="active">Enter City</label>
										<input type="text" placeholder="Enter City" name="cityName"> </li>
										
									<li>
										<label class="active">Enter Hotel Name</label>
										<input type="text" placeholder="Enter Hotel Name" name="hotelName"> </li>	
									
									<li>
										<input type="submit" value="SUBMIT"> </li>
								</ul>
							</form>
						</div>
					</div>
					
					<!--///////////////////////////////sliderstyle//////////////////////////////-->
					<style>
                    .slidecontainer {
                  width: 100%; 
                }
                .slider-color {
                -webkit-appearance: none;
                width: 100%;
                height: 15px;
                border-radius: 5px;
                background: #d3d3d3;
                outline: none;
                opacity: 0.7;
                -webkit-transition: opacity .15s ease-in-out;
                transition: opacity .15s ease-in-out;
                }
                .slider-color:hover {
                opacity: 1;
                }
                .slider-color::-webkit-slider-thumb {
                  -webkit-appearance: none;
                  appearance: none;
                  width: 25px; 
                  height: 25px;
                  background: #ff130d;
                  cursor: pointer;
                  border-radius: 50%;
                }
                .slider::-moz-range-thumb {
                  width: 25px; 
                  height: 25px; 
                  background: #ff130d; 
                  cursor: pointer;
                }

</style>


					<!--END PART 4 : LEFT LISTINGS-->
					<!--PART 5 : LEFT LISTINGS-->

					<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
						<h4><i class="fa fa-dollar" aria-hidden="true"></i> Select Price Range</h4>
						<div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
							<form method="get" action="/hotels">
								<ul>
									<li>
										<div style="" class="radio radio-info radio-circle">
											<input id="chp51" name="price" class="form-check-input" type="radio" value="4">
											<label style="font-size: 15px; " for="chp51"> $500 - Above </label>
										</div>
									</li>
									<li>
										<div class="checkbox checkbox-info checkbox-circle">
											<input id="chp52" name="price" class="form-check-input" type="radio" value="3">
											<label style="font-size: 15px;" for="chp52"> $400 - $500 </label>
										</div>
									</li>
									<li>
										<div class="checkbox checkbox-info checkbox-circle">
											<input id="chp53" name="price" class="form-check-input" type="radio" value="2">
											<label style="font-size: 15px;" class="labelradio" for="chp53"> $300 - $400 </label>
										</div>
									</li>
									<li>
										<div class="checkbox checkbox-info checkbox-circle">
											<input id="chp54" name="price" class="form-check-input" type="radio" value="1">
											<label style="font-size: 15px;" for="chp54"> $200 - $300 </label>
										</div>
									</li>
									<li>
										<div class="checkbox checkbox-info checkbox-circle">
											<input id="chp55" name="price" class="form-check-input" type="radio" value="0">
											<label style="font-size: 15px;" for="chp55"> $200 - Below </label>
										</div>
									</li>
								</ul>
								
								<!--///////////////////////////////////////slider///////////////////////////////-->
								<!--<div class="slidecontainer">-->
        <!--                          <input type="range" min="100" max="1000" value="500" class="slider-color" id="myRange">-->
        <!--                      </div>-->

								<input type="submit" style="    background-color: #304a60;color: #fff;" class="form-control" value="Filter Results" >
								
							</form>  </div>
					</div>
					<!--END PART 5 : LEFT LISTINGS-->
					
					<!--END PART 5 : LEFT LISTINGS-->
					<!--PART 6 : LEFT LISTINGS-->
					<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
						<h4><i class="fa fa-heart-o" aria-hidden="true"></i> Hotel Amenities</h4>
						<div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
							<form method="Get" action="/hotels">
								<ul>
									@foreach($amentities as $key)
									<li>
										<div class="checkbox checkbox-info checkbox-circle">
					<input id="chk{{$loop->index}}" value="{{$key->id}}" class="styled" type="checkbox" name="amentities[]">
											<label for="chk{{$loop->index}}"> {{$key->name}} </label>
										</div>
									</li>
									@endforeach
				<input type="submit"   type="submit" style="    background-color: #304a60;color: #fff;" class="form-control" value="Filter Results">
								</ul>
								
							</form>  </div>
					</div>
					<!--END PART 7 : LEFT LISTINGS-->
				</div>
				<!--END LEFT LISTINGS-->
				<!--RIGHT LISTINGS-->
				<div class="col-md-9 hot-page2-alp-con-right">
					<div class="hot-page2-alp-con-right-1">
						<!--LISTINGS-->
						<div class="row">

							@foreach($hotels as $key)
							<!--LISTINGS START-->
							<div class="hot-page2-alp-r-list">
								<div class="col-md-3 hot-page2-alp-r-list-re-sp">
									<a href="hotels/{{$key['id']}}/{{$key['name']}}">
										<div class="hotel-list-score">{{$key['rate']}}</div>
										<div class="hot-page2-hli-1">
									       @if(count($key['hotelImages']) >0)
										     <img src="{{$key['hotelImages'][0]}}" alt="" width="210px" height="140px;">
										    @endif
										 </div>
										<div class="hom-hot-av-tic hom-hot-av-tic-list"> Available Rooms: {{$key['availbleTickets']}} </div>
									</a>
								</div>
								<div class="col-md-6">
									<div class="hot-page2-alp-ri-p2"> <a href="hotels/{{$key['id']}}/{{$key['name']}}"><h3>{{$key['name']}}</h3></a>
										<ul style="display: grid;">
											<li>{{$key['address']}},{{$key['city']}}</li>

											<li>{{$key['mobile']}}</li>
										</ul>
									</div>
								</div>
								<div class="col-md-3">
									<div class="hot-page2-alp-ri-p3">
										 <span class="hot-list-p3-1">Price Per Night</span> <span class="hot-list-p3-2">$ {{$key['minPrice']}}</span><span class="hot-list-p3-4">
											<a href="hotels/{{$key['id']}}/{{$key['name']}}" class="hot-page2-alp-quot-btn">Book Now</a>
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