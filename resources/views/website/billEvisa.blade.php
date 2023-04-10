<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>baraka</title>


	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	
     <div class="container">
     	<div class="row">
     		<div class="row" class="img-center"><img src="https://b1e87ed86e3071513.temporary.link/website/images/logo.png" alt=""></div>
		
			<p class="text-center alert alet-success">Thank you for trusting Baraka Travel in booking your package, Hope we can make your travel safe and make you satisfied.</p>


<div class="row" style="margin-top:40px; ">
	<h3>Evisa Detail</h3>
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
				<th>{{$evisa->first_name}}</th>
				<th>{{$evisa->last_name}}</th>
				<th>{{$evisa->contact_number}}</th>
				<th>{{$evisa->email}}</th>
			</tr>
		</tbody>
	</table>
</div>




             <h3 class="text-center">number of Persons:{{$numberOfPersons}}</h1>
             <h3 class="text-center">Total : $ {{$total}}</h1>
			 <h3 class="text-center">Fees : $ {{$fees}}</h1>
			 <h3 class="text-center">TotalPrice : $ {{$totlaPrice}}</h1>


     	</div>
     </div>


</body>
</html>