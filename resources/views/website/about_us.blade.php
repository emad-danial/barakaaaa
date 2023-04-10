@extends('website.layouts.app')
@section('content')

<section>
	<div class="rows inner_banner inner_banner_2">
		<div class="container">
			<h2><span>About us -</span> BARAKA TRAVEL AGENCY</h2>
			<ul>
				<li><a href="/">Home</a>
				</li>
				<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
				<li><a href="/about-us" class="bread-acti">About Us</a>
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
			<h2>About <span>Baraka Travel Agency </span> in few words</h2>
			<div class="title-line">
				<div class="tl-1"></div>
				<div class="tl-2"></div>
				<div class="tl-3"></div>
			</div>
			<p>{{$appSetting->about_us}}</p>
		</div>
		<div class="row tourb2-ab-p1">
			<div class="col-md-12 col-sm-12">
				<div class="tourb2-ab-p1-left">
					
					        {!! $appSetting->about_us_description !!}
					
				
			</div>
		
		</div>
	</div>
</section>



<section class="tourb2-ab-p-3 com-colo-abou">
    
	<div class="container">
		<div class="row tourb2-ab-p3">
			<div class="col-md-3 col-sm-6">
				<div class="tourb2-ab-p3-1 tourb2-ab-p3-com"> <span>{{$umrahCount}}</span>
					<h4>
					    <a href="/package/umrah" style="font-size:24px; color:#fff;     font-weight: bold;" >Umrah</a>
					    </h4>
					<p>{{$appSetting->home_top_umarh}}</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="tourb2-ab-p3-1 tourb2-ab-p3-com"> <span>{{$hajjCount}}</span>
					<h4>
					     <a href="/package/hajj" style="font-size:24px; color:#fff;     font-weight: bold;" >Hajj </a></h4>
					<p>{{$appSetting->home_top_hajj}}</p>
				</div>
			</div>
		
			<div class="col-md-3 col-sm-6">
				<div class="tourb2-ab-p3-1 tourb2-ab-p3-com"> <span>{{$hotelsCount}}</span>
					<h4>
					     <a href="/hotels" style="font-size:24px; color:#fff;     font-weight: bold;" >Hotels</a></h4>
					<p>{{$appSetting->home_top_hotels}} </p>
				</div>
			</div>
				<div class="col-md-3 col-sm-6">
				<div class="tourb2-ab-p3-1 tourb2-ab-p3-com"> <span>{{$flight}}</span>
					<h4>
					     <a href="/flights" style="font-size:24px; color:#fff;     font-weight: bold;" >Flights </a></h4>
					
					<p>{{$appSetting->home_top_flights}} </p>
					
				</div>
			</div>
		</div>
	</div>
</section>

@endsection