	@extends('website.layouts.app')
	@section('content')

	<section class="breadcrumbs-banner slider-main">
    <div class="rows inner_banner inner-banner-default">
        <div class="container ">
            <h2><span>Umrah / Tourist E-Visa</span></h2>
        </div>
    </div>
</section>
<section>
        <div class="rows con-page">
            <div class="container">
                <div class="pg-contact">

                
                    <div id="ContentPlaceHolder1_Panel1" >
	


                    <div class="step2form">
               
                            <div class="Evisa">
                                <div class="row">
									
									<a href="/eVisa/eViseDetail/USACanadian/0"><div class="col-md-12 col-sm-12" >
										<div  style="cursor: pointer;" class="passport-custom-box row"> 
											<div class="col-md-1 flag-div">
												<img src='{{Request::root()}}/uploads/include/usa.jpg'>
												<img src='{{Request::root()}}/uploads/include/canada.jpg'>
											</div>
											
											<div class="col-md-11 passport-custom-box-text">
												<h4><span>USA / Canadian Passport : </span> $200/- Per Passport</h4>
												<p>1 Year Validity - Multiple Entry - Stay up-to 90 Days</p>
												<p>Visa processing time : 2 hrs. to 48 hrs.</p>
											</div>
										</div>
									</div></a>
									
								<a href="/eVisa/eViseDetail/IndianPakistani/0">	<div class="col-md-12 col-sm-12" >
										<div  style="cursor: pointer;" class="passport-custom-box row">
											<div class="col-md-1 flag-div">
												<img src="{{Request::root()}}/uploads/include/EGYPT.png">
												<img src='{{Request::root()}}/uploads/include/MOROCCAN.jpg'>
											</div>
											
											<div class="col-md-11 passport-custom-box-text">
											    <h4><span>Umrah E-Visa online  B2B and B2C</span></h4>
												<h4><span>EGYPT / MOROCCAN PASSPORT: </span> $400/- Per Passport</h4>
												<p>90 Days Validity – One Time Entry - Stay up to 30 Days.</p>
												<p>Visa processing time: 3 hrs. to 48 hrs.</p>
												<p>Please WhatsApp us .  (310) 310-4146</div>
										</div>
									</div> </a>
									
									<a href="/eVisa/eViseDetail/Bangladeshi/0"><div class="col-md-12 col-sm-12">
										<div  style="cursor: pointer;" class="passport-custom-box row">
											<div class="col-md-1 flag-div">
												<!--<img src='{{Request::root()}}/uploads/include/greenred.png'>												-->
											</div>
											<div class="col-md-11  passport-custom-box-text">
											    	<h4><span> Umrah E-Visa online  B2B and B2C Holding Green Card </span></h4>
												<h4><span>USA / CANDIAN/ UZBAKSTAIN/ PAKISTAN /INDIAN  PASSPORT:</span> $400/- Per Passport</h4>
												<p>90 Days Validity – One Time Entry - Stay up to 30 Days.</p>
												<p>Visa processing time: 3 hrs. to 48 hrs</p>
												<p>Please WhatsApp us  (310) 310-4146</p>
											</div>
										</div>
									</div></a>
									
							


									
                                </div>
                            </div>
                        
                    </div>

        </div>



                </div>
            </div>
        </div>
    </section>
<style>

    .inner-banner-default{
        background: url('{{Request::root()}}/uploads/include/cover.jpg') no-repeat center center ;
        background-size: cover;
    }


    .con-page {
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .step2form {
        background: white;
        border: 8px solid #efefef;
        border-radius: 4px;
    }
    .passport-custom-box {
        transition: all 0.5s ease;
    background: #fff;
    padding: 20px 0;
    position: relative;
    overflow: hidden;
    border-bottom: 1px solid #e0e0e0;
    margin-bottom: 10px;
    }
    .Evisa .row a:last-child .passport-custom-box{
    border-bottom: 0
}
    .passport-custom-box .flag-div img {
        border-radius: 4px;
        border: 2px #d6d6d6 solid;
        min-width: 55px;
        width: 55px;
        margin-bottom: 10px;
    }
    .passport-custom-box h4 {
        margin-top: 0px;
        font-size: 24px;
        font-weight: 600;
        text-transform: uppercase;
        color: #ff130d;
    }
    .passport-custom-box h4 span {
        font-size: 24px;
        font-weight: 600;
        text-transform: uppercase;
        color: #17140b;
    }
    .passport-custom-box-text p {
        margin: 0px 0px 5px 0px;
    }
    .col-md-11.passport-custom-box-text p a {
        color: #0000d2;
    }
    .passport-custom-box.last-pass-box p {
        font-weight: 600;
        color: #17140b;
        /* text-shadow: 1px 1px 1px #000; */
        font-size: 24px;
    }
    img.colorful-icon {
        width: 22px;
    }
    br.mob-visible-br {
        display: none;
    }
    .stepper-from-btn-1 {
        min-width: 28%;
        transition: all 0.5s ease;
        border-radius: 25px;
        border: 0;
        padding: 10px 30px;
        color: #fff;
        background: #ff130d;
        font-size: 20px !important;
        margin-bottom: 10px;
        margin-left: 37%;
        margin-top: 3%;
    }
    .FOPH{
        margin-left: 32% !important;
    }
    p.icon-text-para a {
        font-size: 20px;
        color: #0000d2;
    }
    .passport-custom-box:hover {
        box-shadow: 0px 0px 15px #ababab;
    }
    .stepper-from-btn-1:hover {
        background: #17140b;
    }
</style>
	@endsection