@extends('website.layouts.app')
@section('meta_description')
{{$meta_description}}
@endsection
@section('meta_title')
{{$meta_title}}
@endsection
@section('meta_keywords')
{{$meta_keywords}}
@endsection
@section('content')

<!--====== BANNER ==========-->
<style>
    .describtion,
    a,
    p,
    li,
    td,
    span: {

        color: white !important;

    }

</style>

<section>

    <div class="rows inner_banner inner_banner_4">
        <div class="container">
            <h2>
                <span>
                    @if($umarh['umar']['packageType'] == "umar") Umrah @else Hajj @endif Package -</span>
                {{$umarh['umar']['name']}}</h2>
            <ul>
                <li><a href="/">Home</a>
                </li>
                <li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                <li><a href="/umrah-package-details/{{$umarh['umar']['id']}}"
                        class="bread-acti">{{$umarh['umar']['name']}}</a>
                </li>
            </ul>

        </div>
    </div>
</section>
<!--====== TOUR DETAILS - BOOKING ==========-->


<!--====== TOUR DETAILS - BOOKING ==========-->
<section>
    <div class="rows banner_book" id="inner-page-title">
        <div class="">
            <div class="banner_book_1">
                <ul>
                    <li class="dl1">
                        {{$umarh['umar']['startDateInformat']}}
                        to
                        {{$umarh['umar']['endDateInformat']}}

                    </li>
                    <li class="dl2">Price : $ {{$umarh['umar']['minPrice']}}</li>
                    <li class="dl3">Duration : {{$umarh['umar']['duration']}} Days /{{$umarh['umar']['duration']-1}}
                        Nights </li>
                    <li class="dl4"><a href="#pricing">Book Now</a> </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--====== TOUR DETAILS ==========-->


<section>
    <div class="rows inn-page-bg com-colo">
        <div class="container inn-page-con-bg tb-space pd-sm">
            <div class="">

                <div class="row">
                    <div class="col-md-12">
                        @include('flash::message')


                    </div>
                </div>

                <!--====== TOUR TITLE ==========-->
                <div class="tour_head">
                    <h2>{{ $umarh['umar']['name'] }}
                        <span class="tour_star">


                            @for($i= 1;$i<=5;$i++) @if($i <=$umarh['umar']['calRate'] ) <i class="fa fa-star"></i>
                                @elseif(($i-$umarh['umar']['calRate'] > 0) && ($i-$umarh['umar']['calRate'] < 1)) <i
                                    class="fa fa-star-half-o"></i>
                                    @else <i class="fa fa-star-o"></i>
                                    @endif

                                    @endfor


                        </span>
                        <span class="tour_rat"> {{$umarh['umar']['calRate']}}</span></h2>
                </div>
                <!--====== TOUR DESCRIPTION ==========-->

                @if($umarh['umar']['stopOverType'] == "stop_over")
                <div class="tour_head1 mb-20">
                    <h2>StopOver</h2>
                    <div class="card">
                        <h3>City :{{$umarh['stopOver']->city}}</h3>

                        <div class="ticket">
                            <ul>
                                <li
                                    style="background:#3caedb; color:#fff; border-radius:5px;  display: inline-block ; margin-left: 3px;">
                                    Start Date : {{$umarh['stopOver']->start_date}}</li>
                                <li
                                    style="background:#ec511f; color:#fff; border-radius:5px; display: inline-block ; margin-left: 2px;">
                                    End Date : {{$umarh['stopOver']-> end_date}}</li>
                            </ul>
                        </div>
                        <ul class="pd-0">
                            <li class="list-group-item " style="background:#3caedb; color:#fff; border-radius:10px;">
                                <span class="describtion" style="color:white !important">{!!
                                    $umarh['stopOver']->description!!}</span>

                            </li>

                        </ul>
                    </div>
                </div>
                @endif


                <style>
                    .mb-60 {
                        margin-bottom: 60px !important
                    }

                    .makkahh {
                        background-color: #fff;
                        border: 4px solid #e9eced;
                        padding: 25px 10px 5px 15px;
                        height: Auto;
                        border-radius: 10px;
                    }

                    .hotel-gal-arr {
                        margin-top: 94% !important;
                    }


                    .test2 {
                        border: 1px solid#e9eced;
                        border-radius: 80px;
                        width: 100px;
                        height: 100px;
                        object-fit: cover;
                    }

                    .tour_head1 h3 {
                        margin-top: 0;
                    }

                    .tour_head1 .describtion strong {
                        font-weight: bold;
                        color: white;
                    }

                    @media only screen and (min-width: 1160px) {

                        .displayblock {
                            display: flex;
                        }

                        .hotel-gal-arr {

                            margin-top: 137%;

                        }
                    }

                    @media only screen and (max-width: 450px) {
                        h1 {
                            font-size: 20px;
                        }

                        .editeMedia {
                            margin-top: 0px !important;
                        }


                        .hotel-gal-arr {

                            margin-top: 282%;
                            margin-left: -44%;

                        }

                    }

                </style>

                <div class="tour_head1">
                    <h3 class="Description">Description</h3>
                    <div class="grid-div">
                            <div class="makkahh madina">
                                <div class="makkah-package-detail">
                                    <div class="makkah-detail-content-box">
                                        <div class="makkah-detail-box-img">
                                            <img class="test2" src="{{Request::root()}}/icons/Madina.png" alt="Madina">
                                        </div>
                                        <div class="makkah-detail-feature-icon textheightt "
                                            style="overflow: hidden; height:auto;">
                                            {!! $umarh['umar']['madinaDesciption'] !!}
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="makkahh makah">
                                <div class="makkah-package-detail">
                                    <div class="makkah-detail-content-box">
                                        <div class="makkah-detail-box-img">
                                            <img class="test2" src="{{Request::root()}}/icons/Makkah.png" width="108px"
                                                height="100px" alt="">
                                        </div>
                                        <div class="makkah-detail-feature-icon textheightt "
                                            style="overflow: hidden; height:auto;">
                                            {!! $umarh['umar']['makkahDesciption'] !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @if(isset($umarh['umar']['rituals']))
                            <div class="makkahh madina">
                            <div class="makkah-package-detail">
                                <div class="makkah-detail-content-box">
                                    <div class="makkah-detail-box-img">
                                        <img class="test2" src="{{Request::root()}}/uploads/223141-منى.jpg"
                                            alt="Madina">
                                    </div>
                                    <div class="makkah-detail-feature-icon textheightt "
                                        style="overflow: hidden; height:auto;">
                                        {!! $umarh['umar']['rituals'] !!}
                                    </div>
                                </div>

                            </div>
                            </div>
                        @endif

                        @if(isset($umarh['umar']['flighting']))
                            <div class="makkahh makah">
                            <div class="makkah-package-detail">
                                <div class="makkah-detail-content-box">
                                    <div class="makkah-detail-box-img">
                                        <img class="test2" src="{{Request::root()}}/uploads/hqdefault%20(2).jpg"
                                            width="108px" height="100px" alt="">
                                    </div>
                                    <div class="makkah-detail-feature-icon textheightt "
                                        style="overflow: hidden; height:auto;">
                                        {!! $umarh['umar']['flighting'] !!}
                                    </div>
                                </div>
                            </div>
                            </div>
                        @endif
                    </div>




                    <!--====== ROOMS: HOTEL BOOKING ==========-->
                    <div class="tour_head1 hotel-book-room">
                        <h3 class="editeMedia">Photo Gallery</h3>
                        <div id="myCarousel1" class="carousel carousel-fade" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators carousel-indicators-1">
                                @foreach($umarh['umarImages'] as $image)
                                <li data-target="#myCarousel1" data-slide-to="{{ $loop->index }}"><img src="{{$image}}"
                                        alt="KSA"></li>
                                @endforeach

                            </ol>
                            <!-- Wrapper for slides -->
                            <!--<div class="carousel-inner carousel-inner1" role="listbox">-->
                            <div class="carousel-inner carousel-inner1" role="listbox">

                                @foreach($umarh['umarImages'] as $image)
                                <div class="item @if($loop->index == 0) active @endif">
                                    <img src="{{$image}}" alt="Chania" class="img-slider">
                                </div>
                                @endforeach

                            </div>
                            <!-- Left and right controls -->
                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span
                                    class="icon-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span> </a>
                            <a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span
                                    class="icon-next"><i class="fa fa-angle-right" aria-hidden="true"></i></span> </a>
                        </div>
                    </div>

                    <!--====== TOUR LOCATION ==========-->
                    <div class="tour_head1 tout-map map-container">
                        <h3>Location</h3>

                        {!!html_entity_decode($umarh['umar']['location'])!!}
                    </div>


                    <!--====== package Days  ==========-->
                    <div class="tour_head1 l-info-pack-days days" style="margin-top: 30px;">
                        <h3>Day By Day Itinerary</h3>
                        <ul>


                            @foreach($umarh['umarhDays'] as $key)
                            <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <h4><span>Day : {{$loop->index+1}}</span> {{$key->name}}</h4>
                                <p>{{$key->desciption}}</p>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                    <style>
                        html {
                            scroll-behavior: smooth;
                        }

                        .include {

                            font-size: 30px;
                            min-width: 25%;
                            background: rgb(78, 183, 243) !important;
                            display: inline-block;
                            padding: 10px 40px;
                            color: white !important;
                            border-radius: 5px;
                        }

                        .include2 {

                            font-size: 30px;
                            min-width: 25%;
                            background: rgb(78, 183, 243) !important;
                            display: inline-block;
                            padding: 10px 40px;
                            color: white !important;
                            border-radius: 5px;
                            margin-left: 36.5%;
                        }

                        .backgroundImg {
                            border: 1px solid #e9eced;
                            padding: 15px;
                            background: linear-gradient(90deg, rgba(244, 244, 244, 1) 0%, rgba(255, 255, 255, 1) 50%, rgba(244, 244, 244, 1) 100%);
                            display: block;
                            border-radius: 15px;
                            margin-bottom: 5px !important;

                        }

                        .nav-tabs.nav-justified>.active>a,
                        .nav-tabs.nav-justified>.active>a:hover,
                        .nav-tabs.nav-justified>.active>a:focus {
                            background: rgb(78, 183, 243);
                            color: #fff;
                        }

                        .include3 {
                            font-size: 30px;
                            min-width: 25%;
                            background: rgb(78, 183, 243) !important;
                            display: inline-block;
                            padding: 10px 100px;
                            color: white !important;
                            border-radius: 5px;
                            margin-left: 39%;
                            padding-left: 100px !important;
                        }

                        .textincenter {
                            padding-top: 19px !important;
                        }

                        .desc-tab-body .desc-tab-tit {
                            border: 1px solid #dedede;
                            padding: 2.5%;
                        }

                        .nav-tabs.nav-justified>.active>a,
                        .nav-tabs.nav-justified>.active>a:hover,
                        .nav-tabs.nav-justified>.active>a:focus {

                            background: rgb(78, 183, 243) !important;
                            color: white !important;

                        }



                        .textincenter {
                            padding-top: 25px !important;
                        }

                        .pricee {
                            margin-top: -25px;
                        }

                        /*////////////////////mediaQuery//////////////////  */
                        @media only screen and (max-width: 450px) {

                            .include2 {
                                margin-left: 36px !important;
                            }

                            .include3 {
                                margin-left: 14.5% !important;
                            }

                        }

                        @media only screen and (max-width: 1160px) {
                            .include2 {
                                margin-left: 28%;
                            }

                            .include3 {
                                margin-left: 31%;
                            }




                        }

                    </style>


                    <div class="tour_head1 text-center">
                        <h2 class="title-custom">Packages Include</h2>
                        <div class="include-box">
                            <ul class="list-inline">

                                @if(count($umarh['packagesInclude']) == 0)
                                <p>no package include was added to this package</p>
                                @else
                                @foreach($umarh['packagesInclude'] as $package)
                                <li>
                                    <span class="include-icon backgroundImg">
                                        <img src="{{Request::root()}}/{{$package->icon}}"></span>
                                    <div><span class="include-text">{{$package->packageName}}</span></div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!--====== package  additional information ==========-->
                    <div class="tour_head1 tout-map map-container">
                        <h2 class="title-custom">Additional Information</h2>
                        <div class="desc-tab-inn">
                            <ul class="nav nav-tabs nav-justified backTab">

                                <li class="active"><a data-toggle="tab" class="tb-anchor" href="#Included">Included</a>
                                </li>

                                <li class=""><a data-toggle="tab" class="tb-anchor" href="#Not-Included">Not
                                        Included</a></li>

                                <li class=""><a data-toggle="tab" class="tb-anchor" href="#Important-Notes">Important
                                        Notes</a></li>

                                <li class=""><a data-toggle="tab" class="tb-anchor" href="#How-to-Book">How to Book</a>
                                </li>

                            </ul>
                            <div class="tab-content desc-tab-body">

                                <div id="Included" class="tab-pane fade active in">
                                    <div class="desc-tab-tit">
                                        {!!html_entity_decode($umarh['umarhDetails']->included)!!}

                                    </div>
                                </div>

                                <div id="Not-Included" class="tab-pane fade ">
                                    <div class="desc-tab-tit">
                                        {!!html_entity_decode($umarh['umarhDetails']->notSelected)!!}

                                    </div>
                                </div>

                                <div id="Important-Notes" class="tab-pane fade ">
                                    <div class="desc-tab-tit">
                                        {!!html_entity_decode($umarh['umarhDetails']->important_notes)!!}

                                    </div>
                                </div>

                                <div id="How-to-Book" class="tab-pane fade ">
                                    <div class="desc-tab-tit">
                                        {!!html_entity_decode($umarh['umarhDetails']->howToBook)!!}

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--====== DURATION ==========-->
                    <div class="tour_head1 l-info-pack-days days ">
                        <h2 class="title-custom" id="pricing">Pricing</h2>
                        <div>
                            @if(session()->has('success'))
                            <div class="alert alert-success contact__msg" role="alert">
                                Thank you for booking your package with Baraka Travel, Please wait our call within 24
                                hours to confirm your package.
                            </div>
                            @endif


                            @if(session()->has('error'))
                            <div class="alert alert-danger contact__msg" role="alert">
                                Please check in Insert All fields
                            </div>
                            @endif
                        </div>
                        <table class="table-custom mb-0">
                            <tbody class="list-group-item editesize">
                                @foreach($umarh['pricing'] as $key)
                                <tr>
                                    <td class="">
                                        <h2 class="mt-0">{{$key->name}}</h2>
                                        <p>{{$key->numberPerRoom}} people per room</p>
                                    </td>
                                    <td class="">
                                        @for($i=0; $i<$key->numberPerRoom ; $i++)
                                            <img src="{{Request::root()}}/icons/people-icon.png">
                                            @endfor
                                    </td>
                                    <td class="" style="color:white;">
                                        <h1 class="mg-0">$ {{$key->price}} </h1>
                                    </td>
                                    <td class="" style="color:white;">
                                        <span>per Person</span>
                                    </td>
                                    <td class="text-right">
                                        
                                         <!--<button type="button" class="send-inq" id="bookumraButton">Send Inquiry</button>-->
 <span class="send-inq" data-name="{{$key->name}}" data-id="{{$key->id}}"
                                        data-room="{{$key->numberPerRoom}}" data-price="{{$key->price}}">
                                        Send Inquiry
                                    </span>
                                    <!--<span class="send-inq" data-name="{{$key->name}}" data-id="{{$key->id}}"-->
                                    <!--    data-room="{{$key->numberPerRoom}}" data-price="{{$key->price}}"-->
                                    <!--    aria-hidden="true" data-toggle="modal" data-target="#test">-->
                                    <!--    Send Inquiry-->
                                    <!--</span>-->
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
                
                
                

                <div id="bookumra">


                    <div class="umrah-iquiry-main">
                        <div class="container-fluid">
                            <div class="row">



                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h2>
                                                {{$umarh['umar']['name']}} </h2>
                                            <p><b>Note:</b> Please be sure to converse with your family before you confirm
                                                the dates in which you will be staying in Makkah and Madinah. We will
                                                prepare the quote based on your requirements.</p>
                                        </div>
                                    </div>



                                    <div class="row editeblock">
                                        <div class="col-md-12">
                                            <div class="custom-room-book room-book-iquiry">
                                                <ul class="rooms-list">
                                                    <li>
                                                        <div class="rooms list">
                                                            <div class="rooms-title">
                                                                <h3 id="pricingName">

                                                                </h3>
                                                                <span id="pricingPeoplePerRoom">
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="prices list">
                                                            <div class="price" id="pricingPrice"></div>
                                                            <div class="tax">
                                                                <span>per person</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="POST" action="/bookIng" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="pricingId" name="pricingId" />
                                        <input type="hidden" id="myPrice" name="pricing">
                                        <div class="col-md-12">
                                            <div class="row " style="margin-top: 2%;margin-bottom: 2%;">
                                                <h4 class="form-check-label col-md-1" style="width: 150px;">
                                                    Gender*
                                                </h4>
                                                <div class="form-check col-md-1 editeradio"
                                                     style="width: 123px; padding-left: 0;margin-left: -25px;">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                           id="exampleRadios1" value="male" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check col-md-1 editeradio"
                                                     style="width: 123px; padding-left: 0;">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                           id="exampleRadios2" value="female">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>
                                                            Your Last Name*
                                                        </label>
                                                        <input name="txtLastName_umrah" type="text" maxlength="20"
                                                               id="txtLastName_umrah" class="form-control"
                                                               placeholder="As on Passport">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>
                                                            Your First Name*
                                                        </label>
                                                        <input name="txtFirstName_umrah" type="text" maxlength="20"
                                                               id="txtFirstName_umrah" class="form-control"
                                                               placeholder="As on Passport">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>
                                                            Address*
                                                        </label>
                                                        <input name="age" type="text" id="txtFirstName_umrah"
                                                               class="form-control" placeholder="Enter Your Address">
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>
                                                            Contact Number*
                                                        </label>
                                                        <span id="txtContactNo_umrah_wrapper"
                                                              class="RadInput RadInput_Default"
                                                              style="white-space:normal;"><input type="text" size="20"
                                                                                                 id="txtContactNo_umrah_text" name="txtContactNo_umrah_text"
                                                                                                 value="+1"
                                                                                                 class="riTextBox riEnabled form-control contct-no-input"
                                                                                                 selectionlength="0" placeholder="(xxx) xxx xxxx"
                                                                                                 style="width:100%!important;" required>
                                                        <input
                                                                style="visibility:hidden;margin:-18px 0 0 -1px;width:1px;height:1px;overflow:hidden;border:0;padding:0;"
                                                                id="txtContactNo_umrah" class="rdfd_" type="text" title="">
                                                    </span>


                                                    </div>
                                                </div>



                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">
                                                            Passports*
                                                        </label>
                                                        <select name="ddlPassport_Umrah" id="ddlPassport_Umrah"
                                                                class="form-control">
                                                            <option value="US/Canadian" selected>US/Canadian</option>
                                                            <option value="Indian/Pakistani">Indian/Pakistani</option>
                                                            <option value="Bangladeshi">Bangladeshi</option>
                                                            <option value="Other Nationality">Other Nationality</option>

                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>
                                                            E-mail Address*
                                                        </label>
                                                        <input name="txtExmailAddress_umrah" type="text" maxlength="100"
                                                               id="txtExmailAddress_umrah" class="form-control"
                                                               placeholder="example@yahoo.com">

                                                    </div>
                                                </div>


                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>
                                                            Where Are You Traveling From?*
                                                        </label>
                                                        <input name="txtTravlFrm_umrah" type="text" maxlength="15"
                                                               id="txtTravlFrm_umrah" class="form-control"
                                                               placeholder="Enter City or Airport code">
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">



                                                <div class="col-md-2 editedate">
                                                    <div class="form-group">
                                                        <label for="youremail">
                                                            Departure Date*
                                                        </label>
                                                        <div id="datepicker" class="date-pick input-group date"
                                                             data-date-format="mm/dd/yyyy">
                                                            <label style="font-size: 16px !important;">
                                                                {{$umarh['umar']['startDate']}} </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-2 editedate">
                                                    <div class="form-group">
                                                        <label for="youremail">
                                                            Return Date*
                                                        </label>
                                                        <div id="datepicker" class="date-pick input-group date">
                                                            <label style="font-size: 16px !important;">
                                                                {{$umarh['umar']['endDate']}} </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                @if(Auth::check() == true && Auth::user()->type = 'broker')

                                                    <div class="col-md-2 editedate">
                                                        <div class="form-group">
                                                            <label for="check_number">
                                                                Check Number
                                                            </label>
                                                            <input name="check_number" type="text" id="check_number"
                                                                   class="form-control" placeholder="Enter Check Number ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 editedate">
                                                        <div class="form-group">
                                                            <label for="Paid">
                                                                Paid
                                                            </label>
                                                            <input name="paid" type="number" id="paid" class="form-control"
                                                                   placeholder="Enter paid ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 editedate">
                                                        <div class="form-group">
                                                            <label for="remaining">
                                                                Outstanding
                                                            </label>
                                                            <input name="remaining" type="number" id="remaining"
                                                                   class="form-control" readonly>
                                                        </div>
                                                    </div>


                                                @else
                                                    <div class="col-md-6 editedate">
                                                        <div class="form-group">

                                                        </div>
                                                    </div>
                                                @endif


                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="labelselect">
                                                            Zip code*
                                                        </label>



                                                        <input style="margin-top: -30px;" name="ddlflexible" type="text"
                                                               maxlength="15" id="txtTravlFrm_umrah" class="form-control"
                                                               placeholder="Enter Zip code">

                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Please Write comment if you need*</label>
                                                        <textarea name="txtPlanTravelTrip" rows="2" cols="20"
                                                                  id="txtPlanTravelTrip"
                                                                  class="form-control txt-area-input"></textarea>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Passport Image*</label>
                                                        <input name="passport_image" class="form-control" type="file" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Personal Image*</label>
                                                        <input name="personal_image" class="form-control" type="file" />
                                                    </div>
                                                </div>














                                            </div>

                                            <div id="UpdatePanel1">


                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="">
                                                                Are you traveling alone?*
                                                            </label>
                                                            <select required name="ddltravelingalone" id="ddltravelingalone"
                                                                    class="form-control">

                                                                <option value="yes">Yes</option>
                                                                <option value="no">No</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>



                                            </div>

                                            <div class="row" style="margin-top: 4%;">
                                                <h4 class="form-check-label col-md-1" style="width: 170px; ">
                                                    Payment*
                                                </h4>
                                                <div class="form-check col-md-1 editeradio"
                                                     style="width: 230px;padding-left: 0;margin-left: -20px;">
                                                    <input required class="form-check-input" type="radio" name="payMentType"
                                                           id="exampleRadios4" value="Cashe" checked>
                                                    <label style="margin-left: -20px;" class="form-check-label"
                                                           for="exampleRadios4">
                                                        Deposit in Bank of America
                                                    </label>
                                                </div>


                                                <div class="form-check col-md-4 editeradio"
                                                     style="width: 270px;padding-left: 0;margin-top: 30px;margin-left: -230px;">
                                                    <input required class="form-check-input" type="radio" name="payMentType"
                                                           id="exampleRadios3" value="Visa">
                                                    <label style="margin-left: -20px;" class="form-check-label"
                                                           for="exampleRadios3">
                                                        Visa

                                                    </label>




                                                    <img width="30px;" height="20px;" style="margin-left:0px;"
                                                         src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/1000px-Visa_Inc._logo.svg.png" />
                                                    <img width="35px;" height="35px;"
                                                         src="https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/092011/mastercard.png?itok=umOYRlA4" />
                                                    <img width="40px;" height="25px;"
                                                         src="https://www.uscreditcardguide.com/wp-content/uploads/2015/09/Discover.jpg" />
                                                    <img width="50px;" height="25px;" style="margin-left:-4px;"
                                                         src="https://i.pinimg.com/280x280_RS/fc/35/3d/fc353dafe18f0f9559304e6ffc2ff938.jpg" />



                                                </div>





                                            </div>






                                            <div class="form-group">


                                                <input type="submit" name="btnUmrahSubmit" value="Submit"
                                                       id="btnUmrahSubmit" class=" btn-lg umrah-submit-btn">

                                                <!--<button type="button" class="btn-lg umrah-submit-btn" data-dismiss="modal">Close</button>-->
                                            </div>



                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>


                
                <div>

                    <div class="dir-rat">
                        <div class="dir-rat-inn dir-rat-title">
                            <h3>Write Your Rating Here</h3>
                            <p>Write your rating about this package please.</p>
                            <fieldset class="rating" id="getRate">
                                <input type="radio" id="star5" name="rating" value="5">
                                <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                <input type="radio" id="star4half" name="rating" value="4 and a half">
                                <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                <input type="radio" id="star4" name="rating" value="4">
                                <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                <input type="radio" id="star3half" name="rating" value="3 and a half">
                                <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                <input type="radio" id="star3" name="rating" value="3">
                                <label class="full" for="star3" title="Meh - 3 stars"></label>
                                <input type="radio" id="star2half" name="rating" value="2 and a half">
                                <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                <input type="radio" id="star2" name="rating" value="2">
                                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                <input type="radio" id="star1half" name="rating" value="1 and a half">
                                <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                <input type="radio" id="star1" name="rating" value="1">
                                <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                <input type="radio" id="starhalf" name="rating" value="half">
                                <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                            </fieldset>
                        </div>
                        <div class="dir-rat-inn row">
                            <form class="dir-rat-form" action="/submit/rate/package" method="post">
                                @csrf
                                <input type="hidden" name="rateValue" id="rateValue">
                                <input type="hidden" name="packageId" value="{{$umarh['umar']['id']}}">

                                <div class="form-group col-md-6">
                                    <label class="mb-0" for="">Name</label>
                                    <input type="text" class="form-control"
                                        value="@if(Auth::check() == true) {{Auth::user()->first_name}} @else @endif"
                                        id="name" name="name" placeholder="Enter Name"> </div>
                                <div class="form-group col-md-6">
                                    <label class="mb-0" for="">Mobile</label>
                                    <input type="text" class="form-control" id="mobile"
                                        value="@if(Auth::check() == true) {{Auth::user()->mobile}} @else @endif"
                                        name="mobile" placeholder="Enter Mobile"> </div>


                                <div class="form-group col-md-12">
                                    <label class="mb-0" for="">Message</label>
                                    <textarea name="ratemessage" placeholder="Write your message"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" value="SUBMIT" class="link-btn"> </div>
                            </form>
                        </div>
                        <!--COMMENT RATING-->
                        @foreach($umarh['rates']['rate'] as $key)
                        <div class="dir-rat-inn dir-rat-review">
                            <div class="row">
                                <div class="col-md-3 dir-rat-left"> <img width="50px;" height="50px;"
                                        src="{{Request::root()}}/{{\App\User::find($key->user_id)->image}}" alt="">
                                    <p>{{$key->name}} <span>{{$key->createAt}}</span> </p>
                                </div>
                                <div class="col-md-9 dir-rat-right">
                                    <div class="dir-rat-star">
                                        @for($i=0;$i<$key->rate ; $i++)
                                            <i class="fa fa-star" aria-hidden="true" style="color:#3caedb"></i>
                                            @endfor
                                    </div>
                                    <p style="word-wrap:break-word;"> {{$key->message}} </p>

                                </div>
                            </div>
                        </div>
                        <!--COMMENT RATING-->
                        @endforeach

                    </div>
                </div>
            </div>



        </div>
</section>
<!--/////////////////////////////model////////////////////////-->

<style>
    .rooms-list li {
        display: flex;
        margin-bottom: 1.5em;
        border-radius: 3px;
        height: 84px;
        font-size: 14.5px;
        line-height: 24px;
        font-family: 'open Sans', sans-serif;
        font-weight: 400;
        width: 103%;
        margin-left: -15px;
    }

    .rooms-list {
        padding: 0px;
    }

    .rooms-list .list.rooms {
        width: 100%;
    }

    .rooms-list .list {
        display: flex;
        align-items: center;
        padding: 1em 2em;
    }

    .rooms {
        background-color: #ffd1d0;
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }

    .rooms-title {
        width: 70%;
    }

    .rooms-list h3 {
        font-weight: 800;
        margin: 0;
        color: #fff;
        text-transform: uppercase;
        font-size: 1.875em;
        text-shadow: 1px 2px 3px #675400;
    }

    .rooms span {
        color: #17140b;
        display: block;
    }

    .custom-room-book .prices {
        background-color: #ffd1d0;
    }


    .custom-room-book .price i {
        font-size: .6em;
        font-style: normal;

    }

    .custom-room-book .price {
        text-shadow: 1px 2px 3px #675400;
        font-weight: 800;
        color: #fff;
        font-size: 3.437em;
        font-family: 'open Sans',
            sans-serif;
        display: flex;
        align-items: flex-start;
        width: 51%;

    }

    .custom-room-book .people-number {
        padding-left: 1em;
        display: flex;
    }

    .custom-room-book .tax {
        color: #fff;
        padding-left: 1em;
    }

    .custom-room-book .tax span {
        color: #17140b;
        font-weight: 800;
        display: block;
        text-transform: uppercase;
        font-family: 'open Sans',
            sans-serif;

    }

    .custom-room-book .tax em {
        font-weight: 800;
        font-style: normal;

    }

    .custom-room-book .rooms-title {
        width: 70%;

    }

    .custom-room-book .icon {
        width: 17px;
        height: 43px;
        background: url('../images/people-icon.png') no-repeat center center;
        display: inline-block;
        margin-left: .2em;
    }

    .custom-room-book .icon:first-of-type {
        margin-right: 0;
    }

    .room-book-iquiry .rooms-list {
        padding: 0px;

    }

    .room-book-iquiry .rooms-list .list.rooms {
        width: 100%;

    }

    .room-book-iquiry .rooms-list .list.prices {
        width: 70%;
    }

    .modal-dialog {
        width: 1100px;
    }

    .modal-content {
        text-align: initial;
        border-radius: 10px;
        border: 8px solid #fcfcfc94;
    }

    @media only screen and (max-width: 450px) {
        .modal-content {
            width: 100%;
            margin-left: 0%;
            height: auto;
            overflow: scroll;
            text-align: initial;
            border-radius: 10px;
            border: 8px solid #ff130d;
            margin-top: 13%;
        }

        .textincenterper {
            margin-top: -1px;
        }

        .modal-content span {
            font-size: 10.5px;
            width: 100px;
        }

        .custom-room-book .price {
            font-size: 1.5em;
        }

        .rooms-list h3 {
            font-size: 1.5em;
        }

        .editeblock {
            margin-right: 30px;
        }

        .room-book-iquiry .rooms-list .list.rooms {
            margin-left: -6px;
        }

        .editeradio {
            margin-left: 90px !important;
        }


        .editesize {
            width: 104% !important;
            margin-left: -12px !important;
            height: 164px !important;
        }

        .list-group-item-heading {
            margin-left: -65px !important;
            font-size: 25px !important;
        }

        .l-info-pack-days ul li p {
            margin-left: -63px !important;

        }

        .list-group {
            margin-left: 7px;
        }



    }



    }

    .custom-room-book .tax span {
        color: #17140b;
        font-weight: 800;
        display: block;
        text-transform: uppercase;
        font-family: 'open Sans', sans-serif;
    }

    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-size: 13px !important;
        color: #111111;
        font-weight: normal;

    }

    span.num-text-place-umrah {
        position: absolute;
        top: 34px;
        left: 22px;
        font-size: 16px !important;
        color: #555 !important;
        font-family: 'Avenir LT Std Black' !important;
    }

    .input-group-addon {

        padding: 6px 12px;
        font-size: 14px;
        font-weight: normal;
        line-height: 1;
        color: #555;
        text-align: center;
        background-color: #eee;
        border: 1px solid #ccc;
        border-radius: 0px 4px 4px 0px;

    }

    .fa {
        margin-top: 4px;
    }

    span.makkahtext,
    span.makkahtext {
        position: absolute;
        top: 35px;
        right: 18px;
        font-size: 14px;
    }

    ul.umrah-form-mini-ul li input.input-stay-1 {
        padding: 6px 12px !important;
    }

    .riTextBox {
        width: 170px !important;

    }

    .riTextBoxMakkah {
        margin-right: 6px;

    }

    .riTextBoxMadina {
        margin-left: -13px;
    }

    .makkahtexttt {
        right: 195px !important;
    }

    .makkahtext {
        color: #888;
    }

    .umrah-submit-btn {
        background: #f4364f;
        background: linear-gradient(to bottom, #f4364f, #dc2039);
        padding: 10px 30px;
        color: #fff;
        font-size: 20px !important;
        font-weight: 400;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        border: 1px solid transparent;
        display: block;
        margin: 0 auto;
        margin-top: 50px;

    }

    .paymentt {
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .visacashe {
        margin-top: -3px;
    }

    /* .Paymentlapel{font-size: 25px !important;} */
    input,
    textarea,
    button {
        /*-webkit-appearance: none;*/
        -webkit-font-smoothing: antialiased;
        resize: none;
    }


    .editeselect {
        position: absolute;
        margin-top: -31px;
        margin-left: -12px;

    }

    .labelselect {
        margin-bottom: 38px;
    }
    
     #bookumra{
        margin-top: 5px;
        border: 2px solid #dedede;
        border-radius: 7px;
        box-shadow: 2px 2px #bbb;
    }
    #ddltravelingalone{
        display:none;
    }
    
    #ddlPassport_Umrah{
          display:none;
    }

</style>
<div class="modal fade" id="test" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 45px;" aria-hidden="true">&times;</span>
                </button>
                <div class="umrah-iquiry-main">
                    <div class="container-fluid">
                        <div class="row">



                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <h2>
                                            {{$umarh['umar']['name']}} </h2>
                                        <p><b>Note:</b> Please be sure to converse with your family before you confirm
                                            the dates in which you will be staying in Makkah and Madinah. We will
                                            prepare the quote based on your requirements.</p>
                                    </div>
                                </div>



                                <div class="row editeblock">
                                    <div class="col-md-12">
                                        <div class="custom-room-book room-book-iquiry">
                                            <ul class="rooms-list">
                                                <li>
                                                    <div class="rooms list">
                                                        <div class="rooms-title">
                                                            <h3 id="pricingName">

                                                            </h3>
                                                            <span id="pricingPeoplePerRoom">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="prices list">
                                                        <div class="price" id="pricingPrice"></div>
                                                        <div class="tax">
                                                            <span>per person</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="/bookIng" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="pricingId" name="pricingId" />
                                    <input type="hidden" id="myPrice" name="pricing">
                                    <div class="col-md-12">
                                        <div class="row " style="margin-top: 2%;margin-bottom: 2%;">
                                            <h4 class="form-check-label col-md-1" style="width: 150px;">
                                                Gender*
                                            </h4>
                                            <div class="form-check col-md-1 editeradio"
                                                style="width: 123px; padding-left: 0;margin-left: -25px;">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="exampleRadios1" value="male" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check col-md-1 editeradio"
                                                style="width: 123px; padding-left: 0;">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="exampleRadios2" value="female">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Female
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>
                                                        Your Last Name*
                                                    </label>
                                                    <input name="txtLastName_umrah" type="text" maxlength="20"
                                                        id="txtLastName_umrah" class="form-control"
                                                        placeholder="As on Passport">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>
                                                        Your First Name*
                                                    </label>
                                                    <input name="txtFirstName_umrah" type="text" maxlength="20"
                                                        id="txtFirstName_umrah" class="form-control"
                                                        placeholder="As on Passport">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>
                                                        Address*
                                                    </label>
                                                    <input name="age" type="text" id="txtFirstName_umrah"
                                                        class="form-control" placeholder="Enter Your Address">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>
                                                        Contact Number*
                                                    </label>
                                                    <span id="txtContactNo_umrah_wrapper"
                                                        class="RadInput RadInput_Default"
                                                        style="white-space:normal;"><input type="text" size="20"
                                                            id="txtContactNo_umrah_text" name="txtContactNo_umrah_text"
                                                            value="+1"
                                                            class="riTextBox riEnabled form-control contct-no-input"
                                                            selectionlength="0" placeholder="(xxx) xxx xxxx"
                                                            style="width:100%!important;" required>
                                                        <input
                                                            style="visibility:hidden;margin:-18px 0 0 -1px;width:1px;height:1px;overflow:hidden;border:0;padding:0;"
                                                            id="txtContactNo_umrah" class="rdfd_" type="text" title="">
                                                    </span>


                                                </div>
                                            </div>



                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="">
                                                        Passports*
                                                    </label>
                                                    <select name="ddlPassport_Umrah" id="ddlPassport_Umrah"
                                                        class="form-control">
                                                        <option value="US/Canadian" selected>US/Canadian</option>
                                                        <option value="Indian/Pakistani">Indian/Pakistani</option>
                                                        <option value="Bangladeshi">Bangladeshi</option>
                                                        <option value="Other Nationality">Other Nationality</option>

                                                    </select>
                                                </div>
                                            </div>



                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>
                                                        E-mail Address*
                                                    </label>
                                                    <input name="txtExmailAddress_umrah" type="text" maxlength="100"
                                                        id="txtExmailAddress_umrah" class="form-control"
                                                        placeholder="example@yahoo.com">

                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>
                                                        Where Are You Traveling From?*
                                                    </label>
                                                    <input name="txtTravlFrm_umrah" type="text" maxlength="15"
                                                        id="txtTravlFrm_umrah" class="form-control"
                                                        placeholder="Enter City or Airport code">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">



                                            <div class="col-md-2 editedate">
                                                <div class="form-group">
                                                    <label for="youremail">
                                                        Departure Date*
                                                    </label>
                                                    <div id="datepicker" class="date-pick input-group date"
                                                        data-date-format="mm/dd/yyyy">
                                                        <label style="font-size: 16px !important;">
                                                            {{$umarh['umar']['startDate']}} </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-2 editedate">
                                                <div class="form-group">
                                                    <label for="youremail">
                                                        Return Date*
                                                    </label>
                                                    <div id="datepicker" class="date-pick input-group date">
                                                        <label style="font-size: 16px !important;">
                                                            {{$umarh['umar']['endDate']}} </label>
                                                    </div>
                                                </div>
                                            </div>


                                            @if(Auth::check() == true && Auth::user()->type = 'broker')

                                            <div class="col-md-2 editedate">
                                                <div class="form-group">
                                                    <label for="check_number">
                                                        Check Number
                                                    </label>
                                                    <input name="check_number" type="text" id="check_number"
                                                        class="form-control" placeholder="Enter Check Number ">
                                                </div>
                                            </div>
                                            <div class="col-md-2 editedate">
                                                <div class="form-group">
                                                    <label for="Paid">
                                                        Paid
                                                    </label>
                                                    <input name="paid" type="number" id="paid" class="form-control"
                                                        placeholder="Enter paid ">
                                                </div>
                                            </div>
                                            <div class="col-md-2 editedate">
                                                <div class="form-group">
                                                    <label for="remaining">
                                                        Outstanding
                                                    </label>
                                                    <input name="remaining" type="number" id="remaining"
                                                        class="form-control" readonly>
                                                </div>
                                            </div>


                                            @else
                                            <div class="col-md-6 editedate">
                                                <div class="form-group">

                                                </div>
                                            </div>
                                            @endif


                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="labelselect">
                                                        Zip code*
                                                    </label>



                                                    <input style="margin-top: -30px;" name="ddlflexible" type="text"
                                                        maxlength="15" id="txtTravlFrm_umrah" class="form-control"
                                                        placeholder="Enter Zip code">

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Please Write comment if you need*</label>
                                                    <textarea name="txtPlanTravelTrip" rows="2" cols="20"
                                                        id="txtPlanTravelTrip"
                                                        class="form-control txt-area-input"></textarea>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Passport Image*</label>
                                                    <input name="passport_image" class="form-control" type="file" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Personal Image*</label>
                                                    <input name="personal_image" class="form-control" type="file" />
                                                </div>
                                            </div>














                                        </div>

                                        <div id="UpdatePanel1">


                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="">
                                                            Are you traveling alone?*
                                                        </label>
                                                        <select required name="ddltravelingalone" id="ddltravelingalone"
                                                            class="form-control">

                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>

                                        <div class="row" style="margin-top: 4%;">
                                            <h4 class="form-check-label col-md-1" style="width: 170px; ">
                                                Payment*
                                            </h4>
                                            <div class="form-check col-md-1 editeradio"
                                                style="width: 230px;padding-left: 0;margin-left: -20px;">
                                                <input required class="form-check-input" type="radio" name="payMentType"
                                                    id="exampleRadios4" value="Cashe" checked>
                                                <label style="margin-left: -20px;" class="form-check-label"
                                                    for="exampleRadios4">
                                                    Deposit in Bank of America
                                                </label>
                                            </div>


                                            <div class="form-check col-md-4 editeradio"
                                                style="width: 270px;padding-left: 0;margin-top: 30px;margin-left: -230px;">
                                                <input required class="form-check-input" type="radio" name="payMentType"
                                                    id="exampleRadios3" value="Visa">
                                                <label style="margin-left: -20px;" class="form-check-label"
                                                    for="exampleRadios3">
                                                    Visa

                                                </label>




                                                <img width="30px;" height="20px;" style="margin-left:0px;"
                                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/1000px-Visa_Inc._logo.svg.png" />
                                                <img width="35px;" height="35px;"
                                                    src="https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/092011/mastercard.png?itok=umOYRlA4" />
                                                <img width="40px;" height="25px;"
                                                    src="https://www.uscreditcardguide.com/wp-content/uploads/2015/09/Discover.jpg" />
                                                <img width="50px;" height="50px;" style="margin-left:-4px;"
                                                    src="https://pngriver.com/wp-content/uploads/2018/04/Download-American-Express-PNG-Transparent-Image.png" />



                                            </div>





                                        </div>






                                        <div class="form-group">


                                            <input type="submit" name="btnUmrahSubmit" value="Submit"
                                                id="btnUmrahSubmit" class=" btn-lg umrah-submit-btn">

                                            <!--<button type="button" class="btn-lg umrah-submit-btn" data-dismiss="modal">Close</button>-->
                                        </div>



                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection
@section('footer')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

 $("#bookumra").hide();
        $("#paid").keyup(function () {
            var paidpaid = $('#paid').val();
            var remainingremaining = $('#pricingPrice').text();
            var remainingremainingvalue = remainingremaining.replace("$", "");
            var newremaining = (remainingremainingvalue - paidpaid);
            console.log(newremaining);
            $('#remaining').attr("value", newremaining);

        });


        $(document).on('click', '.pricing', function (event) {
            var id = $(this).data("id");
            var price = $(this).data("price");
            var name = $(this).data("name");
            var numerPerRoom = $(this).data("room");
            console.log($(this).data("room"));
            $('#pricingName').text(name);
            $('#pricingPeoplePerRoom').text(numerPerRoom + "  people per room");
            $('#pricingPrice').text('$' + price);
            $('#remaining').attr("value", price);
            $('#pricingId').val(id);
            console.log(price);
            $('#myPrice').val(price);

        });



        $("#bookNow").click(function () {
            var element = "pricing";

        });


      $(document).on('click', '.send-inq', function (event) {
            var id = $(this).data("id");
            var price = $(this).data("price");
            var name = $(this).data("name");
            var numerPerRoom = $(this).data("room");
            console.log($(this).data("room"));
            $('#pricingName').text(name);
            $('#pricingPeoplePerRoom').text(numerPerRoom + "  people per room");
            $('#pricingPrice').text('$' + price);
            $('#remaining').attr("value", price);
            $('#pricingId').val(id);
            console.log(price);
            $('#myPrice').val(price);


            $("#bookumra").toggle();

                const element = document.getElementById("bookumra");
                element.scrollIntoView();

        });


// $(".send-inq").click(function () {
//       $("#bookumra").toggle();
//  const element = document.getElementById("bookumra");
//       element.scrollIntoView();
//         });



    });

</script>
@endsection
