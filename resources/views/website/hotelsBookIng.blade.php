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
			<h4>Hotels Booking</h4>
			<div class="db-2-main-com db-2-main-com-table">
				<table class="responsive-table">
					<thead>
						<tr>
							<th>No</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Hotel Name</th>
								<th>Type of Room</th>
							<th>mobile </th>
							<th>Reserve From</th>
							<th>Reserve To</th>
						    <th>Number Of Nights</th>
							<th>Status</th>
							
							<th>Total</th>
							<th>More</th>
						</tr>
					</thead>
					<tbody>
				@foreach($hotelsBookIng as $key)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{Auth::user()->first_name}}</td>
							<td>{{Auth::user()->last_name}}</td>
							<td>{{$key['hotel']['name']}}</td>
							<td>{{$key['TypeofRoom']}}</td> 
							<td>{{$key['hotel']['mobile']}}</td>
							<td>{{$key['reservefrom']}}</td>
							<td>{{$key['reserveto']}}</td>
							<td> {{ \Carbon\Carbon::parse($key['reservefrom'])->diffInDays($key['reserveto']) }}   </td>
							
							
							
							
						
							<td><span style="font-size:12px;">{{$key['status']}}</span>
							</td>
							<th>$ {{\Carbon\Carbon::parse($key['reservefrom'])->diffInDays($key['reserveto'])*$key['roomPrice']}}</th>
							<td><a href="/hotelsBookIng/{{$key['orderHotelId']}}" class="db-done">view more</a>
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