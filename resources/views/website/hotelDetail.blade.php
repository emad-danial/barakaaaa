@extends('website.layouts.app')
@section('meta_description')
{{$hotel['meta_description']}}
@endsection
@section('meta_title')
{{$hotel['meta_title']}}
@endsection
@section('meta_keywords')
{{$hotel['meta_keywords']}}
@endsection
@section('content')
<style>
    html {
        scroll-behavior: smooth;
    }

</style>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=149303392434222&autoLogAppEvents=1"
    nonce="2JaehS0N"></script>

<section>
    <div class="rows inner_banner inner_banner_2">
        <div class="container">
            <h2><span>{{$hotel['name']}}</span></h2>
            <ul>
                <li><a href="/">Home</a>
                </li>
                <li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                <li><a href="/hotels" class="bread-acti">Hotels</a>
                </li>
            </ul>
            <p>{{$hotel['address']}},{{$hotel['city']}}.</p>
        </div>
    </div>
</section>
<!--====== TOUR DETAILS - BOOKING ==========-->
<section>
    <div class="rows banner_book" id="inner-page-title">
        <div class="">
            <div class="banner_book_1">
                <ul>
                    <li class="dl1">Availble Rooms : {{$hotel['availbleTickets']}}</li>
                    <li class="dl2">Price : ${{$hotel['minPrice']}}</li>
                    <li class="dl3">Duration : {{$hotel['duration']}}</li>
                    <li class="dl4"><a href="#pricingRooms">Book Now</a> </li>
                </ul>
            </div>
        </div>
    </div>
</section>



<!--   @if(session()->has('success'))-->
<!--Thank<div class="alert alert-success contact__msg"  role="alert">-->
<!--	 you for booking your package with Baraka Travel, Please wait our call within 24 hours to confirm your package.-->
<!--</div>-->
<!--@endif-->
<!--====== TOUR DETAILS ==========-->
<section>
    <div class="rows inn-page-bg com-colo">
        <div class="container inn-page-con-bg tb-space">
            <div class="row flex-row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            @include('flash::message')
                        </div>
                    </div>

                    <!--   @if(session()->has('success'))-->
                    <!--Thank<div class="alert alert-success contact__msg"  role="alert">-->
                    <!--	 you for booking your package with Baraka Travel, Please wait our call within 24 hours to confirm your package.-->
                    <!--</div>-->
                    <!--@endif-->
                    <!--====== TOUR TITLE ==========-->
                    <div class="tour_head">
                        <h2>{{$hotel['name']}}
                            <span class="tour_star">
                                @for($i= 1;$i<=5;$i++) @if($i <=$hotel['rate']) <i class="fa fa-star"></i>
                                    @elseif(($i-$hotel['rate'] > 0) && ($i-$hotel['rate'] < 1)) <i
                                        class="fa fa-star-half-o"></i>
                                        @else <i class="fa fa-star-o"></i>
                                        @endif

                                        @endfor
                            </span>
                            <span class="tour_rat"> {{$hotel['rate']}}</span>
                    </div>
                    <!--====== TOUR DESCRIPTION ==========-->
                    <div class="tour_head1 hotel-com-color" style="    word-break: break-all;">
                        <h3>About HOTEL</h3>
                        <p>{!! $hotel['description'] !!}</p>
                    </div>
                    <!--====== ROOMS: HOTEL BOOKING ==========-->
                    <!--====== ROOMS: HOTEL BOOKING ==========-->
                    <div class="tour_head1 hotel-book-room">
                        <h3 class="editeMedia">Photo Gallery</h3>
                        <div id="myCarousel1" class="carousel carousel-fade" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators carousel-indicators-1">
                                @foreach($hotel['hotelImages'] as $image)
                                <li data-target="#myCarousel1" data-slide-to="{{ $loop->index }}"><img
                                        src="{{Request::root()}}/{{$image}}" alt="KSA">
                                </li>
                                @endforeach

                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner carousel-inner1" role="listbox">
                                @foreach($hotel['hotelImages'] as $image)
                                <div class="item @if($loop->index == 0) active @endif"
                                    style="max-height: 345px!important; height: 345px!important;"> <img
                                        src="{{Request::root()}}/{{$image}}" alt="Chania" width="460" height="345"
                                        style="max-height: 345px!important; height: 345px!important;"> </div>
                                @endforeach

                            </div>
                            <!-- Left and right controls -->
                            <!-- Left and right controls -->
                            <a id="pricingRooms" class="left carousel-control" href="#myCarousel1" role="button"
                                data-slide="prev"> <span class="icon-prev"><i class="fa fa-angle-left"
                                        aria-hidden="true"></i></span> </a>
                            <a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span
                                    class="icon-next"><i class="fa fa-angle-right" aria-hidden="true"></i></span> </a>
                        </div>
                    </div>

                    <!--====== HOTEL ROOM TYPES ==========-->
                    <div class="tour_head1">
                        <h3>ROOMS & AVAILABILITIES</h3>
                        <div class="tr-room-type">
                            <ul>

                                @foreach($hotel['getRooms'] as $key)

                                <li>
                                    <div class="tr-room-type-list">
                                        <div class="col-md-3 tr-room-type-list-1"><img width="191px;" height="128px;"
                                                src="{{Request::root()}}/{{$key['room_image']}}" />
                                        </div>
                                        <div class="col-md-6 tr-room-type-list-2">
                                            <h4>{{$key['name']}}</h4>
                                            <span><b>Includes</b> {{$key['includes']}}</span>
                                            <span><b>Maxinum </b> : {{$key['maxinum']}} Persons</span>
                                        </div>
                                        <div class="col-md-3 tr-room-type-list-3"> <span class="hot-list-p3-1">Per Room
                                                /
                                                Per Nights</span>
                                            <span class="hot-list-p3-2">${{$key['price']}}</span>
                                            <a data-id="{{$key['id']}}" data-hotel="{{$hotel['id']}}"
                                                data-hotelname="{{$hotel['name']}}" data-toggle="modal"
                                                data-price="{{$key['price']}}" data-name="{{$key['name']}}"
                                                data-fromdate="{{$key['from_date']}}" data-todate="{{$key['to_date']}}"
                                                data-target="#exampleModal"
                                                class="hot-page2-alp-quot-btn spec-btn-text getRoom">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach



                            </ul>
                        </div>
                    </div>

                    <!--====== AMENITIES ==========-->
                    <div class="tour_head1 hot-ameni">
                        <h3>Hotel Amenities</h3>
                        <ul>
                            @foreach($hotel['getAmenities'] as $key)
                            <li><i class="fa fa-check" aria-hidden="true"></i>{{$key->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <!--====== TOUR LOCATION ==========-->
                    <div class="tour_head1 tout-map map-container">
                        <h3>Location</h3>
                        {!! $hotel['location'] !!}
                    </div>

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
                            <form class="dir-rat-form" action="/submit/rate/hotel" method="post">
                                @csrf
                                <input type="hidden" name="rateValue" id="rateValue">
                                <input type="hidden" name="hotelId" value="{{$hotel['id']}}">

                                <div class="form-group col-md-6">
                                    <label class="mb-0" for="">Name</label>
                                    <input type="text" class="form-control" id="name"
                                        value="@if(Auth::check() == true) {{Auth::user()->first_name}} @else @endif"
                                        name="name" placeholder="Enter Name"> </div>
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
                        @foreach($hotel['getRates'] as $key)
                        <div class="dir-rat-inn dir-rat-review">
                            <div class="row">
                                <div class="col-md-3 dir-rat-left"> <img
                                        src="{{Request::root()}}/{{\App\User::find($key->user_id)->image}}"
                                        width="50px;" height="50px;" alt="">
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

                <div class="col-md-3">
                    <div class="tour_r">
                        <div class="tour_right tour_offe">
                            <div class="band1"><img src="{{$hotel['bookNowImg']}}" alt=""> </div>
                            <p style="font-size: 25px !important;">Special Offer</p>
                            <h4 style="font-size: 32px !important;">${{$hotel['minPrice']}}<span class="">
                                </span>
                            </h4> <a href="#pricingRooms" class="link-btn">Book Now</a>
                        </div>

                        <div class="tour_right head_right tour_help tour-ri-com">
                            <h3>Help &amp; Support</h3>
                            <div class="tour_help_1">
                                <h4 class="tour_help_1_call">Call Us Now</h4>
                                <h4 style="font-size: 20px; "><i class="fa fa-phone" aria-hidden="true"></i> +1 (310)
                                    310-4146</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .tour_offe {
                    background: #253d52 url(http://localhost:8000//uploads/hotelgallary/1603532854ac902e04_z.webp) no-repeat center center ! important;
                    padding: 20px;
                    background-size: cover;
                    margin-bottom: 30px;
                    color: white;
                    font-size: 25px;
                    text-align: center;
                    border-radius: 10px;
                }

            </style>
        </div>
    </div>
</section>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: red; font-size: 20px;">Reserve A Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <h4>You are now booking room <span id="roomName"></span> in hotel <span id="hotel_name_model"></span>
                </h4>
                <h4> please choose your checkin and checkout dates bellow </h4>
                <h4>Availble dates range from <span id="model_from_date"></span> to <span id="model_to_date"></span>
                </h4>
                <br>
                <input type="hidden" id="roomId" />
                  <input type="hidden" id="fromdateserver" />
                    <input type="hidden" id="todateserver" />
                <input type="hidden" id="hotelId" />
                <input type="hidden" id="pricing" />
                <div class="row">
                    <p style="font-size:18px; display:none" class="alert alert-danger" id="error">please make sure that
                        you insert all Required data</p>
                    <p style="font-size:18px; display:none" class="alert alert-danger" id="errordate">Must be Check out
                        date more than Check in date </p>
                    <p style="font-size:18px; display:none" class="alert alert-danger" id="errornotavilible">Sorry there
                        is no room left</p>
                    <p style="font-size:18px; display:none" class="alert alert-success" id="success">Thank you for
                        booking your package with Baraka Travel, Please wait our call within 24 hours to confirm your
                        package.</p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label style="    font-size: 18px !important; margin-bottom: 15px; color:black;">Check in
                            date*</label>
                        <input type="date" id="reserveFrom" class="validate form-control" name="name" required>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label
                            style="    font-size: 18px !important; margin-bottom: 15px;margin-top: 20px;color:black;">Check
                            out date*</label>
                        <input type="date" id="reserveTo" class="validate form-control " name="name" required>

                    </div>
                </div>
                <style>
                    .editeselect {
                        position: absolute;
                        margin-top: -31px;
                        margin-left: -13px;

                    }

                    .labelselect {
                        margin-bottom: 38px;
                    }

                </style>

                <style>
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
                        margin: 30px 0px;
                        background: #ff130d;
                        padding: 16px 30px !important;
                        color: #fff;
                        font-size: 28px !important;
                        margin-left: 6%;
                        margin-top: 7%;
                        font-weight: 400;
                        text-align: center;
                        vertical-align: middle;
                        -webkit-user-select: none;
                        border: 1px solid transparent;
                        height: 86px;
                        /* border-radius: 7%; */
                        display: inline-block;

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

                </style>

                <!--<div class="row" style="margin-top: 4%;">-->
                <!--                                   <label class="form-check-label col-md-1" style="width: 123px; ">-->
                <!--                                     Payment*-->
                <!--                                   </label>-->
                <!--                                         <div class="form-check col-md-1" style="width: 230px;padding-left: 0;">-->
                <!--                                 <input required class="form-check-input" type="radio" name="payMentType" id="exampleRadios4" value="Cashe" checked >-->
                <!--                                 <label class="form-check-label" for="exampleRadios4">-->
                <!--                                 Deposit in chase Bank-->
                <!--                               </label>-->
                <!--                               </div>-->


                <!--                               <div class="form-check col-md-4" style="width: 270px;padding-left: 0;margin-top: 30px;margin-left: -230px;">-->
                <!--                                 <input required class="form-check-input"  type="radio" name="payMentType" id="exampleRadios3" value="Visa" >-->
                <!--                                 <label class="form-check-label" for="exampleRadios3">-->
                <!--                                   Visa  -->

                <!--                                 </label>-->




                <!--                                   <img width="30px;" height="20px;" style="margin-left:0px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/1000px-Visa_Inc._logo.svg.png" />-->
                <!--                                   <img width="35px;" height="35px;" src="https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/092011/mastercard.png?itok=umOYRlA4" />-->
                <!--                                   <img width="40px;" height="25px;" src="https://www.uscreditcardguide.com/wp-content/uploads/2015/09/Discover.jpg" />-->
                <!--                                   <img width="50px;" height="50px;" style="margin-left:-4px;" src="https://pngriver.com/wp-content/uploads/2018/04/Download-American-Express-PNG-Transparent-Image.png" />                                           -->



                <!--                             </div>-->





                <!--                             </div>-->


            </div>


            <div class="modal-footer">

                <button type="button" style="background:red; border:red; font-weight: bold; width : 100% ;"
                    class="btn btn-primary" id="getRoom">Book Now</button>
                <p id="noRoomLetf" class="text-center mb-1 text-info btn btn-info btn-block" style="font-size:18px;">No
                    Room Left</p>

            </div>
        </div>

    </div>
</div>
</div>
<style>
    .form-control:focus {
        border-color: red;
        outline: 0;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(228, 134, 134, 0.6);
    }

</style>

{{csrf_field()}}

<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
    crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {


        $('.getRoom').on('click', function () {
            var roomId = $(this).data("id");
            var hotelId = $(this).data("hotel");
            var fromdateee = $(this).data("fromdate");
             var todateee = $(this).data("todate");
            $('#pricing').val($(this).data("price"));

            $('#roomName').text($(this).data("name"));
            $('#hotel_name_model').text($(this).data("hotelname"));
            $('#model_from_date').text($(this).data("fromdate"));
            $('#model_to_date').text($(this).data("todate"));
            
            $('#reserveFrom').attr("min", $(this).data("fromdate"));
            $('#reserveFrom').attr("max", $(this).data("todate"));
            $('#reserveTo').attr("min", $(this).data("fromdate"));
            $('#reserveTo').attr("max", $(this).data("todate"));

            $('#reserveTo').val('');
            $('#reserveFrom').val('');


            $('#roomId').val(roomId);
            $('#hotelId').val(hotelId);
            $('#fromdateserver').val(fromdateee);
            $('#todateserver').val(todateee);
            $('#error').hide(300);
            $('#success').hide(300);
            $('#errordate').hide(300);
            $('#errornotavilible').hide(300);

            // let startDate = Date.parse($(this).data('fromdate'));
            // let todate = Date.parse($(this).data('todate'));

            // let now = getTime();

            // if ((startDate <= now) && (todate >= now)) {
            //     $('#getRoom').show();
            //     $('#noRoomLetf').hide();
            // } else {
            //     $('#getRoom').hide();
            //     $('#noRoomLetf').show();
            // }

               $('#getRoom').show();
                $('#noRoomLetf').hide();

        });

        $('#getRoom').on('click', function () {
                $('#getRoom').hide();
                $('#noRoomLetf').hide();
            var roomId = $('#roomId').val();
            var hotelId = $('#hotelId').val();
            var reserveFrom = $('#reserveFrom').val();
            var reserveTo = $('#reserveTo').val();
            var payemntType = $("input[name='payMentType']:checked").val();
            var pricing = $('#pricing').val();
            var number_persons = $('#number_persons').val();

          var fromdateserv = $('#fromdateserver').val();
           var todateserv = $('#todateserver').val();

            if ((reserveFrom>= fromdateserv) && (reserveTo <=todateserv) &&(reserveTo > reserveFrom)) {
                var data = new FormData();
                data.append('roomId', roomId);
                data.append('hotelId', hotelId);
                data.append('reserveFrom', reserveFrom);
                data.append('reserveTo', reserveTo);
                data.append("payment_type", payemntType);
                data.append('pricing', pricing);
                data.append('_token', $('input[name=_token]').val());
                data.append('number_persons', number_persons);



                $.ajax({
                    url: '/bookHotel',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {
                        
                        $('#getRoom').show();
                        if (data['data'] == "login")
                            window.location.href = "/login";

                        $('#error').hide(300);
                        $('#error').hide(300);
                        $('#errornotavilible').hide(300);
                        if (data['data'] == "error") {
                            $('#error').show(300);
                        }
                        if (data['data'] == "errornotavilible") {
                            $('#errornotavilible').show(300);
                        }
                        if (data['data'] == "success") {
                            // $('#success').show(300);
                            $('#error').hide(300);
                            window.location.href = "/confirmation";

                        }

                    }
                });
            } else {
                $('#getRoom').hide();
                $('#noRoomLetf').show();
                $('#errordate').show(300);
            }



        });
    });

</script>

@endsection
