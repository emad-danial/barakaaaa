@extends('website.layouts.app')
@section('content')

<section>
	<div class="db">
		<div class="db-l">
			<div class="db-l-1">
				<ul>
				<li>
					<img src="{{Request::root()}}/{{$user->image}}" alt="" />
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
				<h4>Evisa Details</h4>
				<div class="db-2-main-com db-2-main-com-table">
					<table class="responsive-table">
					<thead>
						<tr>
							<th>No</th>
							<th>Passport Type</th>
							<th>Passport Photo</th>
							<th>Image Photo</th>
						</tr>
					</thead>
					<tbody>
				@foreach($evisaDetail as $key)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$key->passport_type}}</td>
							<td> <a target="_blank" href="{{Request::root()}}/{{$key->passport_photo}}" > <img src="{{Request::root()}}/{{$key->passport_photo}}" width="150px;" height="150px;" /> </a> </td>
								<td> <a target="_blank" href="{{Request::root()}}/{{$key->photo}}" > <img src="{{Request::root()}}/{{$key->photo}}" width="150px;" height="150px;" /> </a> </td>
					
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
			</div>
		</div>

	</div>
</section>




@endsection