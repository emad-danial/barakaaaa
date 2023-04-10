<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>bill</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	

	<div class="container" style="margin-top:40px;">
		<div class="row" class="img-center"><img src="https://b1e87ed86e3071513.temporary.link/website/images/logo.png" alt=""></div>
		
			<p class="text-center alert alet-success">Thank you for trusting Baraka Travel in booking your package, Hope we can make your travel safe and make you satisfied.</p>



		<div class="row" style="margin-top:40px; ">
			<h3>Client Information</h3>
			<table class="table">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Phone</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>{{$user->first_name}}</th>
						<th>{{$user->last_name}}</th>
						<th>{{$user->mobile}}</th>
						<th>{{$user->email}}</th>
					</tr>
				</tbody>
			</table>
		</div>


		<div class="row" style="margin-top:40px; ">
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
										<td>{!! $hajjBooking['travelFrom'] !!}</td>
									</tr>
									
									
									
									
									<tr>
										<td>Paid</td>
										<td>:</td>
										<td> $ {{$hajjBooking['paid']}}</td>
									</tr>
									
									<tr>
										<td>outstanding</td>
										<td>:</td>
										<td> $ {{$hajjBooking['remaining']}}</td>
									</tr>
									
									
									@if($hajjBooking['check_number'] !='')
									<tr>
										<td>Check NR</td>
										<td>:</td>
										<td>{{$hajjBooking['check_number']}}</td>
									</tr>
									
									@endif
									
									
								
								
								
								
								
									
									
											<tr>
										<td><b> Total Price  </b></td>
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









<script
	  src="https://code.jquery.com/jquery-3.5.1.js"
	  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
	  crossorigin="anonymous"></script>
<script type="text/javascript"
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>