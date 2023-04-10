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
	<div class="db-2" >
		<div class="db-2-com db-2-main">
			<h4>Flights Booking</h4>
			<div class="db-2-main-com db-2-main-com-table">
				<table class="responsive-table">
					<thead>
						<tr>
							<th>No</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Flight Name</th>
						
					
							<th>Start Date</th>
							<th>End Date</th>
							<th>Price</th>
							<th>Status</th>
							<th>More</th>
						</tr>
					</thead>
					<tbody>
						@foreach($flightBookIng as $key)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{Auth::user()->first_name}}</td>
 							<td>{{Auth::user()->last_name}}</td>
							<td>{{$key['flight']['flightName']}}</td>
						
							
							<td>{{$key['flight']['reservationFrom']}}</td>
							<td>{{$key['flight']['reservationTo']}}</td>
							<td>$ {{$key['price']}}</td>
							<td><span style="font-size:12px;">{{$key['status']}}</span>
							</td>
							<td><a href="/flightBookIng/{{$key['userflightId']}}" class="db-done">view more</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	</div>
</section>
<style>
.db-2{
    width:78% 
}
@media only screen and (max-width: 1280px) {
    .db-2{
        width:68%
    }
  
}
    
</style>



@endsection