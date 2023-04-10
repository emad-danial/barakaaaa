@extends('website.layouts.app')
@section('content')

<section>
	<div class="rows inner_banner inner_banner_2">
		<div class="container">
			<h2><span>FAQ -</span> BARAKA TRAVEL AGENCY</h2>
			<ul>
				<li><a href="/">Home</a>
				</li>
				<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
				<li><a href="/faq" class="bread-acti">FAQ</a>
				</li>
			</ul>
			<p>Book travel packages and enjoy your holidays with distinctive experience</p>
		</div>
	</div>
</section>






<section style="margin:25px; " class="accordion-section clearfix mt-3" aria-label="Question Accordions">
  <div class="container">
  

	  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		

		@foreach($faqs as $key)
		<div class="panel panel-default">
	
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading{{$loop->index}}">
			<h3 class="panel-title">
			    	   
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$loop->index}}">
					<h3 style = "font-size:15px;"><span style="color:red; "> Q{{$loop->index+1}} :</span>{{$key->question}}   <i style = "color:red;"; class="fa fa-arrow-right pull-right"></i>  </h3>
					
			  </a>
			  
			</h3>
		  </div>
		  <div id="collapse{{$loop->index}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$loop->index}}">
			<div class="panel-body px-3 mb-4">
			  <p>{{$key->answer}}</p>

			</div>
		  </div>
		</div>
		@endforeach

		

		

	  </div>
  </div>
</section>






@endsection