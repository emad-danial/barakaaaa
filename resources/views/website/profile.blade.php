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
	<div class="db-2" >
		<div class="db-2-com db-2-main">
			<h4>My Profile</h4>
			<div class="db-2-main-com db-2-main-com-table">
				<table class="responsive-table">
					<tbody>
						<tr>
							<td>first Name</td>
							<td>:</td>
							<td>{{$user->first_name}}</td>
						</tr>
						<tr>
							<td>last Name</td>
							<td>:</td>
							<td>{{$user->last_name}}</td>
						</tr>
						<tr>
							<td>Eamil</td>
							<td>:</td>
							<td>{{$user->email}}</td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>:</td>
							<td>{{$user->mobile}}</td>
						</tr>
					</tbody>
				</table>
				<div class="db-mak-pay-bot">
					 <a href="/editProfile" class="waves-effect waves-light btn-large">Edit my profile</a> </div>
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