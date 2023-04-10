@extends('website.layouts.app')
@section('content')
	<!--DASHBOARD-->
	<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">
				<div class="db-l-1">
					<ul>
						<li>
							<img src="{{$user->image}}"  /> 
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
											 Hotel Bookings</a>
										</li>

										<li>
											<a href="/flightBookIng"><img src="{{Request::root()}}/website/images/icon/dbl3.png" alt="" />
											 Flight Bookings</a>
										</li>
										
                                        <li>
											<a href="/Evisa"><img src="{{Request::root()}}/website/images/icon/dbl3.png" alt="" />Evisa</a>
										</li>
                                        
										<li>
											<a href="/profile"><img src="{{Request::root()}}/website/images/icon/dbl6.png" alt="" /> My Profile</a>
										</li>
										

										
									
									</ul>
				</div>
			</div>
			<!--CENTER SECTION-->
<div class="db-2" >
	<div class="db-2-com db-2-main" >
		<h4>Edit My Profile </h4>
		@if(session()->has('message') == true)
			<div class="alert alert-danger"> please Make sure that You insert All required inputs with suitable data
			</div>
		@endif


		@if(session()->has('success') == true)
			<div class="alert alert-success">You information Has Been updated Successfully
			</div>
		@endif

		<div class="db-2-main-com db2-form-pay db2-form-com">
			<form class="col s12" method="POST" action="/updateProfile" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="userId" value="{{$user->id}}">
					<div class="input-field col s12">
						<input name="first_name" type="text" value="{{$user->first_name}}" class="validate">
						<label>First Name</label>
					</div>
					<div class="input-field col s12">
						<input name="last_name" type="text" value="{{$user->last_name}}" class="validate">
						<label>last Name</label>
					</div>

					<div class="input-field col s12 m6">
						<input type="password" name="password" class="validate">
						<label>Enter Password</label>
					</div>
					<div class="input-field col s12 m6">
						<input type="password" class="validate" name="password_confirmation" class="validate">
						<label>Confirm Password</label>
					</div>

					<div class="input-field col s12 m6">
						<input type="email" class="validate" name="email" value="{{$user->email}}">
						<label>Email</label>
					</div>
					<div class="input-field col s12 m6">
						<input type="number" class="validate" name="mobile" value="{{$user->mobile}}">
						<label>Phone</label>
					</div>

				<div class=" db-file-upload">
					<div class="file-field input-field">
						<div class="db-up-btn"> <span>Upload Image</span>
							<input type="file" name="image"> </div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text"> </div>
					</div>
				</div>
					<div class="input-field col s12">
						<input type="submit" value="SUBMIT" class="waves-effect waves-light full-btn"> 
					</div>
			</form>
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