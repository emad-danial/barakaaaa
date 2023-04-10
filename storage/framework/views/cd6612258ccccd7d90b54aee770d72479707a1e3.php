<?php $__env->startSection('content'); ?>

<!--HEADER SECTION-->
<!--<section>-->
<!--    <div class="tourz-search">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="tourz-search-1">-->
<!--                    <h1>Plan Your Travel Now!</h1>-->
<!--                    <p>Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text </p>-->

<!--                    <center><img src= "<?php echo e(Request::root()); ?>/website/images/partner.png" />-->
<!--                    <img src= "<?php echo e(Request::root()); ?>/website/images/partner.png" />-->
<!--                    <img src= "<?php echo e(Request::root()); ?>/website/images/partner.png" />-->
<!--                    <img src= "<?php echo e(Request::root()); ?>/website/images/partner.png" />-->
<!--                    <img src= "<?php echo e(Request::root()); ?>/website/images/partner.png" /></center>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->




<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f78c10775f2459a"></script>


<!------ Include the above in your HEAD tag ---------->


<script>
    $(document).ready(function () {
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function () {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });

        ResCarouselSize();




        $(window).resize(function () {
            ResCarouselSize();
        });

        //this function define the size of the items
        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function () {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);


                if (bodyWidth >= 1200) {
                    incno = itemsSplit[3];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                } else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({
                    'transform': 'translateX(0px)',
                    'width': itemWidth * itemNumbers
                });
                $(this).find(itemClass).each(function () {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });
        }


        //this function used to move the items
        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            } else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

        //It is used to get some elements from btn
        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }

    });

</script>






<div id="myCarousel1" class="carousel carousel-fade" data-ride="carousel" data-interval="2000">
    <!-- Wrapper for slides -->
    <div class="carousel-inner carousel-inner1" role="listbox">
        <?php $__currentLoopData = $getBackground; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item <?php if($loop->index ==1): ?> active <?php endif; ?>">
            <img src="<?php echo e(Request::root()); ?>/<?php echo e($key->image); ?>" alt="Chania" class="slider-img">
            <!--<div class="CoverPhoto">-->
            <!--    <h1 class="block-title block-title-bold"><?php echo e($appSetting->cover_title); ?></h1>-->
            <!--    <div class="PositionCaption">-->
            <!--        <p class="editepc"><?php echo e($appSetting->cover_description); ?></p>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span class="icon-prev"><i
                class="fa fa-angle-left" aria-hidden="true"></i></span></a>
    <a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span class="icon-next"><i
                class="fa fa-angle-right" aria-hidden="true"></i></span> </a>
</div>


<div class="container partners">
    <div class="carousel-logo owl-carousel owl-theme">
<?php $__currentLoopData = $getLogo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class=" item imgedite text-center">
                <img src="<?php echo e(Request::root()); ?>/<?php echo e($key->image); ?>" alt="img">
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

</div>

<style>
  

    .block-title-bold {
        width: 100%;
    }

    }




    .MultiCarousel {
        float: left;
        overflow: hidden;
        padding: 15px;
        width: 100%;
    }

    .MultiCarousel .MultiCarousel-inner {
        transition: 1s ease all;
        float: left;
    }

    .MultiCarousel .MultiCarousel-inner .item {
        float: left;
    }

    .MultiCarousel .MultiCarousel-inner .item>div {
        text-align: center;
        padding: 10px;
        margin: 10px;
        background: #f1f1f1;
        color: #666;
    }

    .MultiCarousel .leftLst,
    .MultiCarousel .rightLst {
        position: absolute;
        border-radius: 50%;
        box-shadow: none;
    }

    .MultiCarousel .leftLst {
        left: 0;
    }

    .MultiCarousel .rightLst {
        right: 0;
    }

    .MultiCarousel .leftLst.over,
    .MultiCarousel .rightLst.over {
        pointer-events: none;
        background: #ccc;
    }





    .hotel-gal-arr {
        margin-top: 0% !important;
        background: none;
        margin-top: -77% !important;
        margin-right: -87%;
    }

    .carousel-item {
        position: relative !important;
        display: none !important;
        float: left !important;
        width: 100% !important;
        margin-right: -100% !important;
        -webkit-backface-visibility: hidden !important;
        backface-visibility: hidden !important;
        transition: transform .6s ease-in-out !important;
    }

    .carousel-item {
        margin-right: 0 !important;
    }

    .col-lg-3 {
        flex: 0 0 25% !important;
        max-width: 25% !important;
    }

    .carousel-item-next,
    .carousel-item-prev,
    .carousel-item.active {
        display: block important;
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .carousel-inner .active.col-md-4.carousel-item+.carousel-item+.carousel-item+.carousel-item {
            position: absolute;
            top: 0;
            right: -33.3333%;
            z-index: -1;
            display: block;
            visibility: visible;
        }
    }

    @media (min-width: 576px) and (max-width: 768px) {
        Show 3rd slide on sm if col-sm-6 .carousel-inner .active.col-sm-6.carousel-item+.carousel-item+.carousel-item {
            position: absolute;
            top: 0;
            right: -50%;
            z-index: -1;
            display: block;
            visibility: visible;
        }
    }

    @media (min-width: 576px) {
        .carousel-item {
            margin-right: 0;
        }

        show 2 items .carousel-inner .active+.carousel-item {
            display: block;
        }

        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item {
            transition: none;
        }

        .carousel-inner .carousel-item-next {
            position: relative;
            transform: translate3d(0, 0, 0);
        }

        .active.carousel-item-left+.carousel-item-next.carousel-item-left,
        .carousel-item-next.carousel-item-left+.carousel-item,
        .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item {
            position: relative;
            transform: translate3d(-100%, 0, 0);
            visibility: visible;
        }

        .carousel-inner .carousel-item-prev.carousel-item-right {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            display: block;
            visibility: visible;
        }

        .active.carousel-item-right+.carousel-item-prev.carousel-item-right,
        .carousel-item-prev.carousel-item-right+.carousel-item,
        .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item {
            position: relative;
            transform: translate3d(100%, 0, 0);
            visibility: visible;
            display: block;
            visibility: visible;
        }
    }

    MD @media (min-width: 768px) {
        .carousel-inner .active+.carousel-item+.carousel-item {
            display: block;
        }

        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item+.carousel-item {
            transition: none;
        }

        .carousel-inner .carousel-item-next {
            position: relative;
            transform: translate3d(0, 0, 0);
        }

        .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item+.carousel-item {
            position: relative;
            transform: translate3d(-100%, 0, 0);
            visibility: visible;
        }

        .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item+.carousel-item {
            position: relative;
            transform: translate3d(100%, 0, 0);
            visibility: visible;
            display: block;
            visibility: visible;
        }
    }

    LG @media (min-width: 991px) {
        show 4th item .carousel-inner .active+.carousel-item+.carousel-item+.carousel-item {
            display: block !important;
        }

        .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item+.carousel-item+.carousel-item {
            transition: none !important;
        }

        .carousel-inner .active.col-lg-3.carousel-item+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
            position: absolute !important;
            top: 0 !important;
            right: -25% !important;
            z-index: -1 !important;
            display: block !important;
            visibility: visible !important;
        }

        .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
            position: relative !important;
            transform: translate3d(-100%, 0, 0) !important;
            visibility: visible !important;
        }

        .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item+.carousel-item+.carousel-item {
            position: relative !important;
            transform: translate3d(100%, 0, 0) !important;
            visibility: visible !important;
            display: block !important;
            visibility: visible !important;
        }
    }

</style>




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

    .events table tr td a:hover {
        background-color: none;
    }

    .disableHover:hover {
        background: none !important;
    }

    /*.band:hover {*/
    /*    opacity: 1.5;*/
    /*transform: scale(1.1);*/
    /*      animation: rotation 2s infinite linear;*/

    /*}*/
    /*@keyframes  rotation {*/
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


<!--start of umar package -->
<section>
    <div class="rows pad-bot-redu tb-space pb-0">
        <div class="container">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2>Top <span>UMRAH Packages</span></h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p><?php echo e($appSetting->home_top_umarh); ?></p>
            </div>
            <div class="carousel-box owl-carousel owl-theme">
                <?php $__currentLoopData = $getTopUmar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $umarh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- TOUR PLACE 1 -->
                <div class="b_packages wow fadeInUp">
                    <!-- OFFER BRAND -->
                    <?php if($umarh['umar']['is_offer'] !=NULL): ?>
                    <div class="band text-center">

                        <div class="percentage wow rotateIn  " data-wow-duration="2s" data-wow-delay="1s">
                            <?php echo e($umarh['umar']['is_offer']); ?> %
                        </div>
                        <span class="off">OFF</span>
                        <div class="arrow-down">

                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- IMAGE -->
                    <div class="v_place_img">
                        <?php if($umarh['umarImages'] != null && count($umarh['umarImages'])>0): ?>       
                        <a href="/umrah-package-details/<?php echo e($umarh['umar']['id']); ?>/<?php echo e($umarh['umar']['name']); ?>">
                            <img width="350" height="223" src="<?php echo e($umarh['umarImages'][0]); ?>" alt="Tour Booking"
                                title="Tour Booking" /> </a>
                                <?php endif; ?>
                                </div>
                    <!-- TOUR TITLE & ICONS -->
                    <div class="b_pack rows">
                        <!-- TOUR TITLE -->
                        <div class="to-ho-hotel-con-23">
                            <div class="to-ho-hotel-con-2">
                                <a href="/umrah-package-details/<?php echo e($umarh['umar']['id']); ?>/<?php echo e($umarh['umar']['name']); ?>">
                                    <h4><?php echo e($umarh["umar"]['name']); ?></h4>
                                </a>
                            </div>
                            <div class="to-ho-hotel-con-3">
                                <ul class="hotels-list">
                                    <li style="width: 70%;">
                                        <?php echo e($umarh['umar']['startDateInformat']); ?>

                                        to
                                        <?php echo e($umarh['umar']['endDateInformat']); ?>


                                    </li>
                                    <li style="width: 30%;"> <span class="ho-hot-pri"
                                            style="font-size:20px;">$<?php echo e($umarh["umar"]['minPrice']); ?> </span> </li>
                                    <!--<li style="width: 100%; padding-top: 0px;">                                          -->
                                    <!--     <?php echo e($umarh['umar']['toCity']); ?>  from <?php echo e($umarh['umar']['fromCity']); ?>-->


                                    <!--</li>-->
                                </ul>
                            </div>
                        </div>
                        <!-- TOUR ICONS -->

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="rows pad-bot-redu tb-space pb-0">
        <div class="container">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2>Top <span>HAJJ Packages</span></h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p><?php echo e($appSetting->home_top_hajj); ?></p>
            </div>
            <div class="carousel-box owl-carousel owl-theme">
                <!-- TOUR PLACE 1 -->
                <?php $__currentLoopData = $getTophajj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="b_packages wow fadeInUp" data-wow-duration="0.7s">
                    <!-- OFFER BRAND -->
                    <?php if($key['umar']['is_offer'] !=NULL): ?>
                    <div class="band text-center">
                        <div class="percentage wow rotateIn  " data-wow-duration="2s" data-wow-delay="1s">
                            <?php echo e($key['umar']['is_offer']); ?> %
                        </div>
                        <span class="off">OFF</span>
                        <div class="arrow-down">

                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- IMAGE -->
                    <div class="v_place_img">
                         <?php if($key['umarImages'] != null && count($key['umarImages'])>0): ?>     
                        <a href="/umrah-package-details/<?php echo e($key['umar']['id']); ?>/<?php echo e($umarh['umar']['name']); ?>">
                            <img src="<?php echo e($key['umarImages'][0]); ?>" alt="Tour Booking" title="Tour Booking" width="350"
                                height="223" /> </a> 
                                 <?php endif; ?> 
                                </div>
                    <!-- TOUR TITLE & ICONS -->
                    <div class="b_pack rows">
                        <!-- TOUR TITLE -->
                        <div class="to-ho-hotel-con-23">
                            <div class="to-ho-hotel-con-2">
                                <a href="/umrah-package-details/<?php echo e($key['umar']['id']); ?>/<?php echo e($umarh['umar']['name']); ?>">
                                    <h4><?php echo e($key['umar']['name']); ?></h4>
                                </a>
                            </div>
                            <div class="to-ho-hotel-con-3">
                                <ul class="hotels-list">
                                    <li style="width: 70%;">
                                        <?php echo e($key['umar']['startDateInformat']); ?>

                                        to
                                        <?php echo e($key['umar']['endDateInformat']); ?>


                                    </li>
                                    <li style="width: 30%;"> <span class="ho-hot-pri"
                                            style="font-size:20px;">$<?php echo e($key['umar']['minPrice']); ?> </span> </li>
                                    <!--<li style="width: 100%; padding-top: 0px;">      -->

                                    <!--<?php echo e($key['umar']['toCity']); ?>  from <?php echo e($key['umar']['fromCity']); ?>-->


                                    <!--</li>-->
                                </ul>
                            </div>
                        </div>
                        <!-- TOUR ICONS -->

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
    </div>
</section>

<!--====== HOME HOTELS ==========-->
<section>
    <div class="rows tb-space pad-bot-redu">
        <div class="container">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2>Hotels <span>booking open now! </span> </h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p><?php echo e($appSetting->home_top_hotels); ?> </p>
            </div>
            <!-- HOTEL GRID -->        
            <div class="carousel-box owl-carousel owl-theme">
            <?php $__currentLoopData = $getTopHotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- HOTEL GRID -->
                    <div class="to-ho-hotel-con">
                        <a href="/hotels/<?php echo e($key['id']); ?>/<?php echo e($key['name']); ?>">
                            <div class="to-ho-hotel-con-1">
                                <div class="hot-page2-hli-3"></div>
                                <div class="hom-hot-av-tic"> Available Rooms: <?php echo e($key['availbleTickets']); ?> </div>
   <?php if($key['hotelImages'] != null && count($key['hotelImages'])>0): ?>  
                                <img width="350" height="223" src="<?php echo e($key['hotelImages'][0]); ?>" alt="">
                                <?php endif; ?>
                            </div>
                        </a>
                        <div class="to-ho-hotel-con-23">
                            <div class="to-ho-hotel-con-2">
                                <a href="/hotels/<?php echo e($key['id']); ?>/<?php echo e($key['name']); ?>">
                                    <h4><?php echo e($key['name']); ?></h4>
                                </a>
                            </div>
                            <div class="to-ho-hotel-con-3">
                                <ul class="hotels-list">
                                    <li>
                                        <p class="details-desc">
                                            City: <?php echo e($key['address']); ?>,<?php echo e($key['city']); ?>

                                        </p>
                                        <div class="dir-rat-star ho-hot-rat-star"> Rating:
                                            <?php for($i= 1;$i<=5;$i++): ?> <?php if($i <=$key['rate']): ?> <i class="fa fa-star"></i>
                                                <?php elseif(($i-$key['rate'] > 0) && ($i-$key['rate'] < 1)): ?> <i
                                                    class="fa fa-star-half-o"></i>
                                                    <?php else: ?> <i class="fa fa-star-o"></i>
                                                    <?php endif; ?>

                                                    <?php endfor; ?>
                                        </div>
                                    </li>
                                    <li><span class="ho-hot-pri">$<?php echo e($key['minPrice']); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>
    </div>
</section>


<section>
    <div class="rows pla pad-bot-redu tb-space">
        <div class="container">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title spe-title-1">
                <h2>Top <span>Stop Over</span> in this month</h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p><?php echo e($appSetting->home_top_stopOver); ?></p>
            </div>
            <div class="popu-places-home owl-carousel owl-theme" >
                <!-- POPULAR PLACES 1 -->
                <?php $__currentLoopData = $getStopOver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="">
                    <div class="place">
                        <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                             <?php if($key['umarImages'] != null && count($key['umarImages'])>0): ?>  
                        <a href="/umrah-package-details/<?php echo e($key['umar']['id']); ?>/<?php echo e($umarh['umar']['name']); ?>">
                            <img src="<?php echo e($key['umarImages'][0]); ?>" alt="" width="248px;" height="222px;" /> </a>
                            <?php endif; ?>
                            </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <h3><span><?php echo e($key['umar']['name']); ?></span> Duration : <?php echo e($key['umar']['duration']); ?> Days</h3>
                        <p></p> <a href="/umrah-package-details/<?php echo e($key['umar']['id']); ?>/<?php echo e($umarh['umar']['name']); ?>"
                            class="link-btn">more info</a>
                    </div>
                        </div>
                    </div>
                    <!--<?php echo e($key['umar']['toCity']); ?>  from <?php echo e($key['umar']['fromCity']); ?>-->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>



<!--====== EVENTS ==========-->
<section>
    <div class="rows tb-space">
        <div class="container events events-1" id="inner-page-title">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2>Top <span>Packages Visits</span> in this month</h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p><?php echo e($appSetting->home_top_visit); ?></p>
            </div>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Package Name.."
                title="Type in a name">
            <table id="myTable">
                <thead>
                <tr>
                        <th>#</th>
                        <th colspan="2">Package Name</th>
                        <th class="e_h1">Date</th>
                        <!--<th class="e_h1">Departure From</th>-->
                        <th>Book</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $getTopVisit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->index+1); ?></td>
                        <td class="">
                            <a class="disableHover"
                                href="/umrah-package-details/<?php echo e($key['umar']['id']); ?>/<?php echo e($umarh['umar']['name']); ?>">
                                 <?php if($key['umarImages'] != null && count($key['umarImages'])>0): ?>  
                                <img src="<?php echo e($key['umarImages'][0]); ?>" alt="" width="90" height="60" />
                                <?php endif; ?>
                            </a>
                        </td>
                        <td class="title">
                            <a href="/umrah-package-details/<?php echo e($key['umar']['id']); ?>/<?php echo e($umarh['umar']['name']); ?>"
                                class="events-title"><?php echo e($key['umar']['name']); ?></a>
                        </td>
                        <td class="e_h1"><?php echo e($key['umar']['startDate']); ?></td>
                        <!--<td class="e_h1"><?php echo $key['umar']['fromCity']; ?></td>-->
                        <td><a href="/umrah-package-details/<?php echo e($key['umar']['id']); ?>/<?php echo e($umarh['umar']['name']); ?>"
                                class="link-btn book">Book Now</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<section>
    <div class="foot-mob-sec tb-space">
        <div class="rows container">
            <!-- FAMILY IMAGE(YOU CAN USE ANY PNG IMAGE) -->
            <div class="col-md-6 col-sm-6 col-xs-12 family"><img src="<?php echo e(Request::root()); ?>/website/images/mobile.png"
                    alt="" /></div>
            <!-- REQUEST A QUOTE -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <!-- THANK YOU MESSAGE -->
                <div class="foot-mob-app">
                    <h2>Have you tried our mobile app?</h2>
                    <p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel
                        packages and enjoy your holidays with distinctive experience</p>
                    <ul>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Easy Hotel Booking</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Tour and Travel Packages</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Package Reviews and Ratings</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Manage your Bookings, Enquiry and Reviews
                        </li>
                    </ul>
                    <a href="https://play.google.com/store/apps/details?id=com.barkatravel.usbarakatravelapp"><img
                            src="<?php echo e(Request::root()); ?>/website/images/android.png" alt="Android" class="android" /></a>
                    <a href="https://apps.apple.com/eg/app/baraka-travel-app/id1557149169"><img
                            src="<?php echo e(Request::root()); ?>/website/images/apple.png" alt="IOS" class="ios" /></a>
                </div>
            </div>
        </div>
    </div>
</section>




<!--====== TIPS BEFORE TRAVEL ==========-->
<section>
    <div class="rows tips tips-home tb-space home_title">
        <div class="container tips_1">
            <!-- TIPS BEFORE TRAVEL -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <h3><?php echo e($appSetting->UMARH_UPDATE_INFORMATION_TITLE); ?></h3>
                    <h3>Customer Testimonials</h3>
                </div>


                <div class="tips_left tips_left_1">
                    <?php echo $appSetting->UMARH_UPDATE_INFORMATION_DESCRIPTION; ?>

                </div>

                <!--<div class="tips_left tips_left_2">-->
                <!--    <h5>Register with your embassy</h5>-->
                <!--    <p>Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text .</p>-->
                <!--</div>-->

                <!--<div class="tips_left tips_left_3">-->
                <!--    <h5>Always have local cash</h5>-->
                <!--    <p>Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text . </p>-->
                <!--</div>-->

            </div>
            <!-- CUSTOMER TESTIMONIALS -->



            <?php $__currentLoopData = $getTopRate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-8 col-sm-6 col-xs-12 testi-2">
                <div class="testi" style="background:url( <?php echo e(Request::root()); ?>/<?php echo e(\App\User::find($key->user_id)->image); ?> )
                         no-repeat left top; background-size: 80px;">
                    <h4><?php echo e($key->name); ?></h4>
                    <p><?php echo e($key->message); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Baraka Project\last update abdo\new barakaa10_4_2023\resources\views/website/index.blade.php ENDPATH**/ ?>