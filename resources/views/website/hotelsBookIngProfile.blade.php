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
						<a href="umarahBooking"><img src="{{Request::root()}}/website/images/icon/dbl3.png" alt="" />
						  Umrah Bookings</a>
					</li>
					<li>
						<a href="hajjBooking"><img src="{{Request::root()}}/website/images/icon/dbl3.png" alt="" />
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
				<h4>Hotel Details</h4>
				<div class="db-2-main-com db-2-main-com-table">
					<table class="table-responsive">
						<tbody>
						    
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
								<td>Hotel Name</td>
								<td>:</td>
								<td>{{$hotelsBookIng['hotel']['name']}}</td>
							</tr>
							
								<tr>
							    
							    <td>Type of Room</td>
								<td>:</td>
								<td>{{$hotelsBookIng['TypeofRoom']}}</td>
							    
							</tr>
							
						
							
						
							<tr>
								<td>Start Date</td>
								<td>:</td>
								<td>{{$hotelsBookIng['reservefrom']}}</td>
							</tr>
							<tr>
								<td>End Date</td>
								<td>:</td>
								<td>{{$hotelsBookIng['reserveto']}}</td>
							</tr>
							
							
							<tr>
								<td>Number Of Nights</td>
								<td>:</td>
								<td> {{ \Carbon\Carbon::parse($hotelsBookIng['reservefrom'])->diffInDays($hotelsBookIng['reserveto']) }}   </td>
							</tr>
							
							
							<tr>
								<td>Price</td>
								<td>:</td>
								<td>${{$hotelsBookIng['roomPrice']}}</td>
							</tr>
							
							
							<tr>
								<td>Total Price</td>
								<td>:</td>
								<td>$  {{    \Carbon\Carbon::parse($hotelsBookIng['reservefrom'])->diffInDays($hotelsBookIng['reserveto'])*$hotelsBookIng['roomPrice']   }}</td>
							</tr>
							
							
							
							

							<tr>
								<td> Status</td>
								<td>:</td>
								<td>
									{{$hotelsBookIng['status']}}
								</td>
							</tr>
							<tr>
								<td>description</td>
								<td>:</td>
								<td>
									{!! $hotelsBookIng['hotel']['description'] !!}
								</td>
							</tr>


							<tr>
								<td>address</td>
								<td>:</td>
								<td>
									{!! $hotelsBookIng['hotel']['address'] !!}
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