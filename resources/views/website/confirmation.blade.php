@extends('website.layouts.app')
@section('content')
<style>
          .center {

  margin: auto;

  width: 60%;

  /*border: 5px solid #FF130d;*/
  padding: 10px;
  
  /*border: 1px solid;*/
  /*padding: 10px;*/
  /*box-shadow: 5px 10px red;*/

}

</style>
<section>
    
	<div class="rows inner_banner inner_banner_2">
		<div class="container">
			<h2><span>Confirmation</span> BARAKA TRAVEL AGENCY</h2>
			<ul>
				<li><a href="/">Home</a>
				</li>
				<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
				<li><a href="/faq" class="bread-acti">Confirmation</a>
				</li>
			</ul>
			<p>Book travel packages and enjoy your holidays with distinctive experience</p>
		</div>
	</div>
</section>

<section>


<div class="row" style="margin: 0px;">
    <div class="col-md-12">
        <br>
        <br>
        <br>
        
        @if($user !=null )
        <div style = "font-size: 30px;color : #21B9F7;  " class="text-center jumbotron" role="alert">
            <h1 class="display-3">Thank You {{$user->first_name}} {{$user->last_name}} ! </h1>
  
    <p class="lead">for booking with Baraka Travel, we will contact you within 48 hours max to confirm your booking.</p>
</div>
@endif

<br>
<br>
<br>
    </div>
    </div>

</section>



<section style="margin:25px; " class="accordion-section clearfix mt-3" aria-label="Question Accordions">
  <div class="container">
  

	  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		



		

		

	  </div>
  </div>
</section>






@endsection