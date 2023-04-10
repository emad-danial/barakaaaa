@extends('website.layouts.app')
@section('content')

<section>
	<div class="rows inner_banner inner_banner_2">
		<div class="container">
			<h2><span>Policy Terms -</span> BARAKA TRAVEL AGENCY</h2>
			<ul>
				<li><a href="/">Home</a>
				</li>
				<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
				<li><a href="/policy-terms" class="bread-acti">Policy Terms </a>
				</li>
			</ul>
			<p>Book travel packages and enjoy your holidays with distinctive experience</p>
		</div>
	</div>
</section>



<section class="tourb2-ab-p-2 com-colo-abou">
	<div class="container">
		<!-- TITLE & DESCRIPTION -->
		<div class="spe-title">
			<h2>Terms and condition & Privacy policy <span>Baraka Travel Agency </span></h2>
			<div class="title-line">
				<div class="tl-1"></div>
				<div class="tl-2"></div>
				<div class="tl-3"></div>
			</div>
			
		</div>
		<div class="row tourb2-ab-p1">
	
			<div class="col-md-12 col-sm-12">
				<div class="tourb2-ab-p1-left">
		
					{!! $appSetting->policy_terms !!}

			</div>
		</div>
	
	</div>
</section>





@endsection