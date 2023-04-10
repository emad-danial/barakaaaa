@extends('website.layouts.app')
@section('content')


<!--====== BANNER ==========-->
<section>
    <div class="rows inner_banner inner_banner_3">
        <div class="container">
            <h2><span> @if($type == "umrah") Umrah @else Hajj @endif Package -</span> Top Umrah Packages In 2021</h2>
            <ul>
                <li><a href="/">Home</a>
                </li>
                <li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                <li><a href="/package/{{$type}}" class="bread-acti"> @if($type == "umrah") Umrah @else Hajj @endif
                        Package</a>
                </li>
            </ul>
            <p>Book travel packages and enjoy your holidays with distinctive experience</p>
        </div>
    </div>
</section>
<style>
    .band {

        width: 40px;
        height: 75px;
        position: absolute;
        z-index: 9;
        left: 33px;


        background: rgb(226, 73, 84);
        /*border-radius: 100%;*/

        /*opacity: 0.8;*/
    }

    .percentage {
        color: white;
        margin-top: 25%;
        font-size: 15px;
        margin-top: 50%;

    }

    /*.band:hover {*/
    /*    opacity: 1.5;*/
    /*transform: scale(1.1);*/
    /*      animation: rotation 2s infinite linear;*/

    /*}*/
    /*@keyframes rotation {*/
    /*  from {*/
    /*    transform: rotate(0deg);*/
    /*  }*/
    /*  to {*/
    /*    transform: rotate(359deg);*/
    /*  }*/
    /*}*/

    /*}*/
    .arrow-down {
        width: 0;
        height: 0;
        border-left: 19px solid transparent;
        border-right: 21px solid transparent;
        border-top: 21px solid rgb(226, 73, 84);
        ;
        margin-top: 25%;
        font-size: 15px;

    }

    .off {
        color: white;
        font-family: -apple-system-caption1;
    }

</style>

<style>
    .describtionEdite {
        flex: 1;
        margin: 10px;
        background-color: #fff;
        border: 5px solid #e9eced;
        padding: 0px 0px 0px 20px;
        width: 46%;
        height: 175px;



    }

    .describtionEditeP {
        /*white-space: nowrap;*/
        overflow: hidden;
        /*text-overflow: ellipsis;*/




        height: 90px;
    }

    .describtion {
        overflow-wrap: break-word;
        word-wrap: break-word;
    }

    .p2_2 {
        margin-left: 9px;
    }

    @media only screen and (max-width: 1160px) {
        .describtionEdite {
            width: 45%;

        }

        .lastlast {
            margin-left: 102px;
        }
    }

    @media only screen and (max-width: 500px) {
        .lastlast {
            margin-left: 1% !important;
        }

        .describtionEdite {
            width: 97% !important;
            margin-left: 0px !important;

        }

        .priceh {
            width: 41% !important;
        }

    }

    .featur {
        display: flex;
        gap: 15px;
    }

    .featur .li {
        width: 100%;
    }

    .featur .li h2 {
        font-size: 21px;
    }

    .p2_1 img {
    height: 300px;
}

</style>
<!--====== PLACES ==========-->
<section>
    <div class="rows inn-page-bg com-colo">
        <div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2>Top <span>@if($type == "umrah") Umrah @else Hajj @endif packages</span> in this Year</h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p>
                    @if($type == "umrah")
                    {{$appSetting->home_top_umarh}}
                    @else
                    {{$appSetting->home_top_hajj}}
                    @endif

                </p>
            </div>


            @foreach($packages as $key)
            <!--===== PLACES ======-->
            <div class="row mb-40">
                <div class="col-md-5 col-sm-4 col-xs-12 p2_1">
                    @if($key['umar']['is_offer'] !=NULL)
                    <div class="band text-center">

                        <div class="percentage wow rotateIn  " data-wow-duration="2s" data-wow-delay="1s">
                            {{$key['umar']['is_offer']}} %
                        </div>
                        <span class="off">OFF</span>
                        <div class="arrow-down">

                        </div>
                    </div>
                    @endif
                    <a href="/umrah-package-details/{{$key['umar']['id']}}/{{$key['umar']['name']}}">
                        <img src="{{$key['umarImages'][0]}}" alt="" style="border-radius:10px;" width="400px;"
                            height="333px;" />
                    </a>
                </div>
                <div class="col-md-7 col-sm-8 col-xs-12 p2">
                    <h3 style="width: 80%;float: left;">
                        {{$key['umar']['duration']-1}} Nights / {{$key['umar']['duration']}} Days
                        <span>
                            @for($i= 1;$i<=5;$i++) @if($i <=$key['umar']['calRate'] ) <i class="fa fa-star"></i>
                                @elseif(($i-$key['umar']['calRate'] > 0) && ($i-$key['umar']['calRate'] < 1) ) <i
                                    class="fa fa-star-half-o"></i>
                                    @else <i class="fa fa-star-o"></i>
                                    @endif

                                    @endfor
                        </span>
                    </h3>

                    <p style="float: left;">{{$key['umar']['desciption']}}</p>
                    <div class="ticket">
                        <ul>

                            <li style="background:#3caedb; color:#fff; border-radius:5px">Start Date :
                                {{$key['umar']['startDate']}}</li>
                            <li class="lastlast" style="background:#ec511f; color:#fff; border-radius:5px;">End Date :
                                {{$key['umar']['endDate']}}</li>
                        </ul>
                    </div>
                    </hr>

                    <div class="featur">
                        <div class="li">
                            {!! $key['umar']['fromCity'] !!}
                        </div>

                        <div class="li">
                            {!! $key['umar']['toCity'] !!}
                        </div>
                    </div>
                    <div class="p2_book" style="marign-top:0px;">
                        <ul style="width: 60%;">

                            <li><a href="/umrah-package-details/{{$key['umar']['id']}}/{{$key['umar']['name']}}"
                                    class="link-btn" style="border-radius:10px;margin-left: 2px;">View Package</a> </li>
                        </ul>
                        <h1 class="priceh">${{$key['umar']['minPrice']}} </h1>
                    </div>
                </div>
            </div>
            <!--===== PLACES END ======-->

            @endforeach

        </div>
    </div>
</section>

@endsection
