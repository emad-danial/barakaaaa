@extends('website.layouts.app')
@section('content')

<section>
	<div class="db">
		<div class="db-l">
			<div class="db-l-1">
				<ul>
				<li>
					<img src="{{$user->image}}" alt="" />
				</li>
					
				</ul>
			</div>
			<div class="db-l-2">
				<ul>
				
					<li>
						<a href="/umarahBooking"><img src="{{Request::root()}}/website/images/icon/dbl3.png" alt="" />
						  Umrah Bookings</a>
					</li>
					<li>
						<a href="/hajjBooking"><img src="{{Request::root()}}/website/images/icon/dbl3.png" alt="" />
						 Hajj  Bookings</a>
					</li>

					<li>
						<a href="/hotelsBookIng"><img src="{{Request::root()}}/website/images/icon/dbl3.png" alt="" />
						 Hotels Bookings</a>
					</li>

					<li>
						<a href="/flightBookIng"><img src="{{Request::root()}}/website/images/icon/dbl3.png" alt="" />
						 Flights Bookings</a>
					</li>
					
						<li>
						<a href="/Evisa"><img src="{{Request::root()}}/website/images/icon/dbl3.png" alt="" />
						 Evisa
						 </a>
					</li>
					
					<li>
						<a href="/profile"><img src="{{Request::root()}}/website/images/icon/dbl6.png" alt="" /> My Profile</a>
					</li>
					
				
				</ul>
			</div>
		</div>
		<!--CENTER SECTION-->
		<!--CENTER SECTION-->
		<div class="db-2">
			<div class="db-2-com db-2-main">
				<h4>Flight Details</h4>
				<div class="db-2-main-com db-2-main-com-table">
					<table class="responsive-table">
						<tbody>
							<tr>
								<td>Flight Name</td>
								<td>:</td>
								<td>{{$flight['flight']['flightName']}}</td>
							</tr>
							
														<tr>
								<td>First Name</td>
								<td>:</td>
								<td>{{Auth::user()->first_name}}</td>
							</tr>
							
							
														<tr>
								<td>Last Name</td>
								<td>:</td>
								<td>{{Auth::user()->last_name}}</td>
							</tr>
							
							<tr>
								<td>Price</td>
								<td>:</td>
								<td>${{$flight['price']}}</td>
							</tr>
							<tr>
								<td>Start Date</td>
								<td>:</td>
								<td>{{$flight['flight']['reservationFrom']}}</td>
							</tr>
							<tr>
								<td>End Date</td>
								<td>:</td>
								<td>{{$flight['flight']['reservationTo']}}</td>
							</tr>
							<tr>
								<td>Total Members</td>
								<td>:</td>
								<td>{{$flight['numOfChild']+$flight['numOfAdults']}} (Adult:{{$flight['numOfAdults']}}, Children:{{$flight['numOfChild']}})</td>
							</tr>
							<tr>
								<td>Places Covered</td>
								<td>:</td>
								<td>{{$flight['flight']['from']}} To {{$flight['flight']['to']}}</td>
							</tr>
							<tr>
								<td>Payment Status</td>
								<td>:</td>
								<td>
									{{$flight['status']}}
								</td>
							</tr>
							<tr>
								<td>description</td>
								<td>:</td>
								<td>
									{!! $flight['flight']['description'] !!}
								</td>
							</tr>



						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</section>




@endsection