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
				<h4>Package Details</h4>
				<div class="db-2-main-com db-2-main-com-table">
					<table class="responsive-table">
						<tbody>
							<tr>
								<td>Package Name</td>
								<td>:</td>
								<td>{{$hajjBooking['hajj']['name']}}</td>
							</tr>
							
							<tr>
								<td>First Name </td>
								<td>:</td>
							 <td>{{ \App\models\PackagesOrdersPersons::where('order_package_id','=',$hajjBooking['id'])->first()->first_name}}</td>
							</tr>
							
							
							<tr>
								<td>Last Name</td>
								<td>:</td>
							   <td>{{ \App\models\PackagesOrdersPersons::where('order_package_id','=',$hajjBooking['id'])->first()->last_name}}</td>
							</tr>

							
							<tr>
								<td>Departure Date</td>
								<td>:</td>
								<td>{{$hajjBooking['departure_date']}}</td>
							</tr>
							<tr>
								<td>Return Date</td>
								<td>:</td>
								<td>{{$hajjBooking['return_date']}}</td>
							</tr>
							<tr>
								<td>Comment</td>
								<td>:</td>
								<td>{{$hajjBooking['prief_travel']}}</td>
							</tr>
							
							
							<tr>
								<td>Travel From</td>
								<td>:</td>
								<td>{{$hajjBooking['city_code']}}</td>
							</tr>
						

							
									<tr>
								<td>Room Price</td>
								<td>:</td>
								<td>
									$ {!! $hajjBooking['price'] !!}
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