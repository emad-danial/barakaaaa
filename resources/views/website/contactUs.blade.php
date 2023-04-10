@extends('website.layouts.app')
@section('content')

<section>
	<div class="rows inner_banner inner_banner_2">
		<div class="container">
			<h2><span>Contact us -</span> BARAKA TRAVEL AGENCY</h2>
			<ul>
				<li><a href="/">Home</a>
				</li>
				<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
				<li><a href="/contact_us" class="bread-acti">Contact Us</a>
				</li>
			</ul>
		</div>
	</div>
</section>

    <!--END HEADER SECTION-->
	
	<!--====== LOCATON ==========-->
	<section>
		<div class="rows contact-map map-container">
				{!! $appSetting->location_google_map !!}
		</div>
	</section>
	<!--====== QUICK ENQUIRY FORM ==========-->
	<section>
		<div class="form con-page">
			<div class="container">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					<h2><span>Contact us</span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>{{$appSetting->contact_us_description}}</p>
				</div>

		<div class="pg-contact">
                        <div class="col-md-6 col-sm-6 col-xs-12 new-con new-con1">
                            <h2>The <span>Travel</span></h2>
                            <p>{!! $appSetting->description !!}</p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con1">
                            <h4>Address</h4>
                            <p>{{$appSetting->address}}</p>
                          
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con3">
                            <h4>Contact Info</h4>
                            <p> <a href="tel://{{$appSetting->phone}}" class="contact-icon">Phone:{{$appSetting->phone}}</a>
                                <br> <a href="mailto:{{$appSetting->email}}" class="contact-icon">Email:{{$appSetting->emailwebsite}}</a> </p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con4">
                            <h4>Website</h4>
                            <p> <a href="#">Website: www.barakatravel.net</a>
                                <br> <a href="{{$appSetting->facebookfacebook_link}}">Facebook:{{$appSetting->facebookfacebook_link}}</a>
                                <br> <a href="www.barakatravel.net/blog">Blog: www.barakatravel.net/blog</a> </p>
                        </div>
                    </div>				
			</div>
		</div>
	</section>
	<section>
	    <div class="tr-register">
	        <div class="tr-regi-form">
	            <h4>Contact Us</h4>
	            <p>It's free and always will be.</p>
	            @if (session()->has('success'))
	                {{ session('success') }}
	            @endif    
	            
	               @if(session()->has('notvertfied') )


                            <p class="alert alert-danger"> {{session('notvertfied')}} </p>
                        @endif
        
                        @if(session()->has('completeverfied') )
        
        
                            <p class="alert alert-success"> Please activate your account from your email </p>
                        @endif

	            <form class="col s12" method="POST" action="/contact_us/contact">
	                @csrf
	                    <div class="input-field col m12 s12">
	                        <input type="text" class="validate" required name="name">
	                        <label> Name*</label>
	                      
	                    </div>
	                    <div class="input-field col s12">
	                        <input type="number" class="validate" required name="mobile">
	                        <label>Mobile*</label>
	                   
	                    </div>

	                    <div class="input-field col s12">
	                        <input type="email" class="validate" required name="email">
	                        <label>Email*</label>
	                   
	                    </div>

	                    <div class="input-field col s12">
	                    	<textarea class="validate" required name="message"></textarea>
	                        <label>Message*</label>
	                 
	                    </div>

	                    <div class="input-field col s12">
	                        <div class="g-recaptcha" data-sitekey="{{env('recaptchSiteKey')}}"></div>
	                    </div>

	                    <div class="input-field col s12">
	                        <input type="submit" value="Send Message" class="waves-effect waves-light btn-large full-btn"> 
	                    </div>
	            </form>
	            </p>
	        </div>
	    </div>
	</section>

@endsection