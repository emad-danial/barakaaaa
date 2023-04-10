@extends('website.layouts.app')
@section('content')
    <!--====== BANNER ==========-->
    <section>
        <div class="rows inner_banner inner_banner_3">
            <div class="container">
                <h2><span>Gallery </span></h2>
                <ul>
                    <li><a href="/">Home</a>
                    </li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                    <li><a href="/event_gallery" class="bread-acti">
                            Gallery</a>
                    </li>
                </ul>
                <p>More Event Gallery</p>
            </div>
        </div>
    </section>
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
            overflow: hidden;
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



        .p2_1 img {
            height: 300px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Raleway;
            background-color: #202125;
        }

        .heading {
            text-align: center;
            font-size: 2.0em;
            letter-spacing: 1px;
            padding: 40px;
            color: white;
        }

        .gallery-image {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .gallery-image img {
            height: 250px;
            width: 340px;
            transform: scale(1.0);
            transition: transform 0.4s ease;
        }

        .img-box {
            box-sizing: content-box;
            margin: 10px;
            height: 250px;
            width: 340px;
            overflow: hidden;
            display: inline-block;
            color: white;
            position: relative;
            background-color: white;
        }

        .caption {
            position: absolute;
            bottom: 5px;
            left: 20px;
            opacity: 0.0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .transparent-box {
            height: 250px;
            width: 340px;
            background-color: rgba(0, 0, 0, 0);
            position: absolute;
            top: 0;
            left: 0;
            transition: background-color 0.3s ease;
        }

        .img-box:hover img {
            transform: scale(1.1);
        }

        .img-box:hover .transparent-box {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .img-box:hover .caption {
            transform: translateY(-20px);
            opacity: 1.0;
        }

        .img-box:hover {
            cursor: pointer;
        }

        .caption > p:nth-child(2) {
            font-size: 0.8em;
        }

        .opacity-low {
            opacity: 0.5;
        }
    </style>
    <!--====== PLACES ==========-->
    <section>
        <div class="rows inn-page-bg com-colo">
            <div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2>Latest Gallery this Month</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                </div>
            @if($events)
                <!--===== PLACES ======-->
                    <div class="row mb-40">
                        <div class="col-md-12 col-sm-12 col-xs-12 p2_1">

                            <div class="gallery-image">
                                @if(!empty($events))
                                    @foreach($events as $event)
                                        @if(!empty($event['gallery'])&& count($event['gallery'])> 0)
                                            <a href="{{url('event_gallery').'/'.$event['id'] .'/'.$event['title']}}">
                                            <div class="img-box">
                                                    <img src="{{url('/').'/'.$event['gallery'][0]['file']}}" alt=""/>
                                                <div class="transparent-box">
                                                    <div class="caption">
                                                        <p>{{$event['title']}}</p>
                                                        <p class="opacity-low">{!! $event['description'] !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--===== PLACES END ======-->
                @endif
            </div>
        </div>
    </section>
@endsection
