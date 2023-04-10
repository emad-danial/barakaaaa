@extends('website.layouts.app')
@section('meta_description')
	{{$flight['meta_description']}}
@endsection
@section('meta_title')
	{{$flight['meta_title']}}
@endsection
@section('meta_keywords')
	{{$flight['meta_keywords']}}
@endsection
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

<section>
		<div class="v2-hom-search">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
					<div class="v2-ho-se-ri">
						<h5>World's leading tour and travels agency</h5>
						<h1>Book your flight to {{$flight['to']}} NOW</h1>
						<p>Experience the various exciting tour and travel packages and Make hotel reservations, find vacation packages, search cheap hotels and events</p>`
						
					</div>						
					</div>
					<div class="col-md-6">
					<div class="">
						<form class="contact__form v2-search-form" method="POST" action="/flights/getOffer">
									@csrf
							<input type="hidden" value="{{$flight['id']}}" name="flightId">
														<div class="row">
								<div class="input-field col s12">
									<input type="text"  class="validate" name="name" value="@if (Auth::check()) {{Auth::user()->first_name}} @endif"  >
									<label>Enter your name</label>
								</div>
							</div>
							
							
							<div class="row">
								<div class="input-field col s6">
									<input type="number"  class="validate" name="phone" value="@if (Auth::check()) {{Auth::user()->mobile}} @endif" >
									<label>Enter your phone</label>
								</div>
								<div class="input-field col s6">
									<input type="email"  class="validate" name="email"  value="@if (Auth::check()) {{Auth::user()->email}} @endif" >
									<label>Enter your email</label>
								</div>
							</div>
							
							<div class="row">
								<div class="input-field col s12">
								    <!--<label >Flight Form</label>-->
								    <span>Flight Form</span>
									<input type="text" id="select-city" class="autocomplete" name="flyingfrom"  value="{{$flight['from']}}" readonly>
								
								</div>
								<div class="input-field col s12">
								    <span>Flight To</span>
								    <input type="text" id="select-city" class="autocomplete" name="flyingto"  value="{{$flight['to']}}" readonly>
									<!--<input type="text" id="select-city" class="autocomplete" name="flyingto" value="@if (Auth::check()) {{$flight['to']}} @endif" readonly>-->
								
								</div>
							</div>
							
							<div class="row">
								<div class="input-field col s6">
									<input type="text" id="from" name="arrivaldate" value=" {{$flight['reservationFrom']}}" readonly>
									<label for="from">Choose number of Adults</label>
								</div>
								<div class="input-field col s6">
									<input type="text" id="to" name="departuredate" value="{{$flight['reservationTo']}}" readonly>
									<label for="to">Choose number of Childs</label>
								</div>
							</div>
							
							
							
							<div class="row">
								<div class="input-field col s6">
									<input type="radio" id="from" name="paymentType" value="Cashe">
									<label for="from">Choose number of Adults</label>
								</div>
								<div class="input-field col s6">
									<input type="radio" id="to" name="paymentType" value="Visa" >
									<label for="to">Choose number of Childs</label>
								</div>
							</div>
							
							
							
							
							
                            @if(session()->has('success'))
							<div class="alert alert-success contact__msg"  role="alert">
							Thank you for booking your package with Baraka Travel, Please wait our call within 24 hours to confirm your package.
							</div>
							@endif
							
							                            @if(session()->has('error'))
							<div class="alert alert-danger contact__msg"  role="alert">
								make sure that you insert All Required Data
							</div>
							@endif
								<div class="row">
								<div class="input-field col s6">
									<select name="numForAdult">
										<option value="" disabled selected>No of adults</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
									</select>
								</div>
								<div class="input-field col s6">
									<select name="numForChild">
										<option value="" disabled selected>No of childrens</option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>											
									</select>
								</div>
							</div>								

							
		
													
							<div class="row">
								<div class="input-field col s12">
									<input type="submit" value="Get Offer" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
								</div>
							</div>
						</form>
					</div>						
					</div>		
					
					
					
				</div>
			</div>
		</div>
	</section>
	<!--END HEADER SECTION-->	
	<section>
		<div class="tb-space tour-consul">
			<div class="container">
				<div class="col-md-6"> <span class="to-con-1">About this flight</span>
					<h2>{{$flight['from']}} To {{$flight['to']}}</h2>
					
					<h2> {!! $flight['description'] !!}</h2>
					
					<span class="to-con-2">Help line: +123 456 798</span>
					<div class="ho-con-cont">
					    
					 <a href="/contact_us" class="to-con-4 link-btn">Contact Now</a> </div>
				</div>
				<div class="col-md-6 ho-vid"> <img src="{{$flight['image']}}" alt=""> </div>
			</div>
		</div>
	</section>
	
<section>
		<div class="rows pad-bot-redu tb-space">
			<div class="container">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title">
					<h2>Top <span>Flight Offers</span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide.</p>
				</div>
				<div>
					@foreach($topFlight as $key)
					<!-- TOUR PLACE 1 -->
					<div class="col-md-4 col-sm-6 col-xs-12 b_packages">
						<!-- OFFER BRAND -->
					    @if($key['isOffer'] !=false)     
                           <div class="band text-center">
                               
                               <div class="percentage wow rotateIn  " data-wow-duration="2s" data-wow-delay="1s" >
                                  {{$key['isOffer']}} %
                               </div>
                               <span class="off">OFF</span>
                               <div class="arrow-down">
                                   
                               </div>
                            </div>
                        @endif   
						<!-- IMAGE -->
						<div class="v_place_img"> <img wigth="350px;" height="350px;" src="{{$key['image']}}" alt="Tour Booking" title="Tour Booking"> </div>
						<!-- TOUR TITLE & ICONS -->
						<div class="b_pack rows">
							<!-- TOUR TITLE -->
							<div class="col-md-8 col-sm-8">
								<h4><a href="/flights/{{$key['id']}}/{{$key['flightName']}}">{{$key['flightName']}}<span class="v_pl_name">{{$key['from']}}</span></a></h4> </div>
							<!-- TOUR ICONS -->
							<div class="col-md-4 col-sm-4 pack_icon">
								<ul>
									<li>
										price:${{$key['priceAdult']}}
									</li>
								</ul>
							</div>
						</div>
					</div>

					@endforeach
				</div>
			</div>
		</div>
	</section>


	@endsection