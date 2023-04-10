@extends('website.layouts.app')

@section('meta_description')
    {{$meta_description}}
@endsection
@section('meta_title')
    {{$meta_title}}
@endsection

@section('content')

    <!--====== BANNER ==========-->
    <style>

        .product {
            display: flex;
            column-gap: 1.2rem;
            padding: 20px 20px;
            border: solid 1px #7F7F7F;
            max-width: 100%;
            height: 644px;
            width: 100% !important;
            border-radius: 5px;
        }

        .product-small-image {
            display: flex;
            flex-direction: column;
            width: 30%;
            height: 600px;
            justify-content: space-evenly;

        }

        .product-small-image img {
            width: 100%;
            height: 70px;
            cursor: pointer;
            object-fit: cover;
            filter: brightness(50%);
            transition: all .5s ease-out;

        }

        .product-small-image img:hover {
            cursor: pointer;

        }

        .product-small-image img.active {
            transform: scale(0.9);
            filter: none;
            border: solid 4px #118ab2;
        }

        /* Shrink */
        .hvr-shrink {
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: perspective(1px) translateZ(0);
            transform: perspective(1px) translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.7s;
            -webkit-transition-property: transform;
            transition-property: transform;
        }

        .product-big-image {

            width: 100%;
            height: 600px;
            min-width: 600px;

        }

        .product-big-image img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        .product-big-image img.fade-out {
            opacity: 0;
        }

        .gallery {
            display: flex;
            width: 100%;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

    </style>

    <section>

        <div class="rows inner_banner inner_banner_4">
            <div class="container">
                <h2>
                    {{$event['title']}}
                </h2>
                <ul>
                    <li><a href="/">Home</a>
                    </li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                    <li><a href="/event_gallery" class="bread-acti">
                            Gallery</a>
                    </li>
                </ul>

            </div>
        </div>
    </section>
    <!--====== TOUR DETAILS - BOOKING ==========-->

    <section class="gallery">
        <div class="row mb-40">
            <div class="col-md-12 col-sm-12 col-xs-12 p2_1">
                <div class="product">
                    <div class="product-small-image">
                        @foreach($event['gallery'] as $image)
                            @if($image->type == 'image')
                                <img class="hvr-shrink" src="{{url('/').'/'.$image['file']}}" alt=""
                                     onclick="toggleImage(this)"/>
                            @else
                                <video width="230" height="150" controls="">
                                    <source src="{{url('/').'/'.$image['file']}}" type="video/mp4"
                                            onclick="toggleImage(this)">
                                    <source src="{{url('/').'/'.$image['file']}}" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>

                            @endif
                        @endforeach
                    </div>

                    <div class="product-big-image">
                        @if(!empty($event['gallery'])&& count($event['gallery'])> 0)
                            @if($event['gallery'][0]['type'] == 'image')
                                <img src="{{url('/').'/'.$event['gallery'][0]['file']}}" alt="" id="big-image"/>
                            @else
                                <video width="230" height="150" controls="">
                                    <source src="{{url('/').'/'.$event['gallery'][0]['file']}}" type="video/mp4">
                                    <source src="{{url('/').'/'.$event['gallery'][0]['file']}}" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>

                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('footer')

    <script type="text/javascript">
        function toggleImage(smallImage) {
            const bigImage = document.getElementById('big-image');
            const smallImages = document.querySelectorAll('.product-small-image img');
            bigImage.classList.add('fade-out');
            setTimeout(() => {
                bigImage.src = smallImage.src;
                bigImage.classList.remove('fade-out');
            }, 500);
            smallImages.forEach((image) => {
                if (image !== smallImage) {
                    image.classList.remove('active');
                }
            });
            smallImage.classList.add('active');
        }
    </script>
@endsection
