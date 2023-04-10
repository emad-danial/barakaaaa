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
			<h4> Package Booking</h4>
			<div class="db-2-main-com db-2-main-com-table">
				<table class="responsive-table">
					<thead>
						<tr>
							<th>No</th>
							<th>First Name</th>
							<th>Last Name</th>
							
							<th>Package Name</th>
							<th>departure date</th>
							<th>return date</th>
							<th>Status</th>
							<th>Complete Payment</th>
							<th>Total</th>
							<th>More</th>
						</tr>
					</thead>
					<tbody>
				@foreach($hajjBooking as $key)
						<tr>
							<td>{{$loop->index +1}}</td>
                            <td>{{ \App\models\PackagesOrdersPersons::where('order_package_id','=',$key['id'])->first()->first_name}}</td>
                            <td>{{ \App\models\PackagesOrdersPersons::where('order_package_id','=',$key['id'])->first()->last_name}}</td>
                            
							<td>{{  \Illuminate\Support\Str::limit($key['hajj']['name'],30,'...') }}</td>
							<td>{{$key['departure_date']}}</td>
							<td>{{$key['return_date']}}</td>
							<td><span style="font-size:12px;">{{$key['status']}}</span>
							<td>
							     @if($key['status'] == "pending" && $key["payment_type"] == "Visa")
							        <a class="btn btn-primary btn-sm" href="/getPaymentPackage/{{$key['id']}}/umarh/web" target="_blank">Complete Payment</a>  
							        @else <p class="alert alert-info"> Contact With  Mangement </p>   
							     @endif
							    
							</td>
							
							</td>
							<th>$ {{$key['price']}}</th>
							<td><a href="/umarahBooking/{{$key['id']}}" class="db-done">view more</a>
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