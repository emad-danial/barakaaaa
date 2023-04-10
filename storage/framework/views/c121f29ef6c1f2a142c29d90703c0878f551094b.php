<!DOCTYPE html>
<html lang="en">


<head>




    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10783614323"></script>-->
    <!--<script>-->
    <!--  window.dataLayer = window.dataLayer || [];-->
    <!--  function gtag(){dataLayer.push(arguments);}-->
    <!--  gtag('js', new Date());-->

    <!--  gtag('config', 'AW-10783614323');-->
    <!--</script>-->


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179732132-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-179732132-1');

    </script>



    <!--<title>Baraka Travel Agency </title>-->
    <!--== META TAGS ==-->
    <!--<meta charset="utf-8">-->
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
    
        <!--== Start META TAGS  SEO==-->

    <meta charset="utf-8" />
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Baraka Travel Agency <?php echo $__env->yieldContent('meta_title'); ?> </title>
    <meta name="robots" content="noindex,nofollow" />
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords'); ?>">
    <meta name="author" content="Baraka Travel">

    <!--==End META TAGS  SEO==-->
    
    
    <!-- FAV ICON -->
    <link rel="shortcut icon" href="https://irp-cdn.multiscreensite.com/7f75a0c5/site_favicon_16_1526939915710.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">
    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="<?php echo e(Request::root()); ?>/website/css/font-awesome.min.css">
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="<?php echo e(Request::root()); ?>/website/css/style.css">
    <link rel="stylesheet" href="<?php echo e(Request::root()); ?>/website/css/materialize.css">
    <link rel="stylesheet" href="<?php echo e(Request::root()); ?>/website/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo e(Request::root()); ?>/website/css/mob.css">
    <link rel="stylesheet" href="<?php echo e(Request::root()); ?>/website/css/animate.css">
    <link rel="stylesheet" href="<?php echo e(Request::root()); ?>/website/js/carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo e(Request::root()); ?>/website/js/carousel/assets/owl.theme.default.css">
    <link rel="stylesheet" href="<?php echo e(Request::root()); ?>/website/css/custome_css.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/htmffssl5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

    <!-- Event snippet for Website traffic conversion page -->
    <!-- <script>gtag('event', 'conversion', {'send_to': 'AW-10783614323/dxpZCKqSzvgCEPPKg5Yo'});</script> -->

    <!-- Event snippet for Website traffic conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-10783614323/dxpZCKqSzvgCEPPKg5Yo'
        });

    </script>


</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>


    <!-- MOBILE MENU -->
    <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="/"><img src="<?php echo e(Request::root()); ?>/website/images/logo.png" alt="" />
                        </a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            <ul>
                                <li><a href="/">Home</a>
                                </li>

                                <li>
                                    <a href="/eVisa">E-Visa</a>
                                </li>
                                <li> <a href="/package/umrah">Umrah</a>
                                </li>
                                <li> <a href="/package/hajj">Hajj</a>
                                </li>
                                <li><a href="/hotels">Hotels</a></li>
                                <li> <a href="/flights">Flights</a>
                                </li>


                                <li><a href="/contact_us">Contact us</a> </li>
                                <?php if(Auth::check() == true): ?>
                                <li><a href="/profile">Profile</a> </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                </li>

                                <?php endif; ?>
                                <?php if(Auth::check() != true): ?>
                                <li> <a href="<?php echo e(route('login')); ?>">Login</a></li>
                                <li> <a href="<?php echo e(route('register')); ?>">Register</a></li>
                                <?php endif; ?>
                                <?php if(Auth::check() == true): ?>
                                <?php if(Auth::user()->type == 'broker'): ?>
                                <li><a href="/broker">System</a></li>
                                <?php endif; ?>
                                <?php endif; ?>





                            </ul>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--HEADER SECTION-->
    <section>
        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="wed-logo">
                                <a href="/"><img src="<?php echo e(Request::root()); ?>/website/images/logo.png" alt="" /></a>
                            </div>
                            <div class="main-menu">
                                <ul>
                                    <li><a href="/">Home</a>
                                    </li>
                                    <li><a href="/about-us">About</a>
                                    </li>
                                    <li>
                                        <a href="/eVisa">E-Visa</a>
                                    </li>
                                    <li> <a href="/package/umrah">Umrah</a>
                                    </li>
                                    <li> <a href="/package/hajj">Hajj</a>
                                    </li>
                                    <li><a href="/hotels">Hotels</a></li>
                                    <li> <a href="/flights">Flights</a>
                                    </li>

                                    <li><a href="/contact_us">Contact us</a></li>

                                    <?php if(Auth::check() == true): ?>
                                    <li><a href="/profile">Profile</a> </li>
                                    <?php endif; ?>
                                    <?php if(Auth::check() == true): ?>
                                    <?php if(Auth::user()->type == 'broker'): ?>
                                    <li><a href="/broker">System</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="ed-com-t1-right">
                            <ul>
                                <?php if(Route::has('login')): ?>
                                <?php if(auth()->guard()->check()): ?>
                                <li>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                        style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </li>
                                <?php if(Auth::user()->type == "brooker"): ?>
                                <li> <a href="/brooker">Brooker DashbaRd</a> </li>
                                <?php endif; ?>
                                <?php else: ?>
                                <li> <a href="<?php echo e(route('login')); ?>">Login</a></li>

                                <?php if(Route::has('register')): ?>
                                <li> <a href="<?php echo e(route('register')); ?>">Register</a></li>
                                <?php endif; ?>
                                <?php endif; ?>

                                <?php endif; ?>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--END HEADER SECTION-->




    <!--start main section content-->

    <?php echo $__env->yieldContent('content'); ?>


    <!--end main section content-->


















    <!--====== FOOTER  ==========-->
    <section>
        <div class="rows">
            <div class="footer">
                <div class="container">
                    <div class="foot-sec2">
                        <div>
                            <div class="row">
                                <div class="col-sm-3 foot-spec foot-com">
                                    <h4><span>Baraka</span> Travel Agency</h4>
                                    <p><?php echo $appSetting->description; ?></p>

                                </div>
                                <div class="col-sm-3 foot-spec foot-com">
                                    <h4><span>Address</span> & Contact Info</h4>
                                    <p><?php echo e($appSetting->address); ?></p>
                                    <p> <span class="strong"> <i class="fa fa-phone"></i> : </span> <span
                                            class="highlighted"><?php echo e($appSetting->phone); ?></span> </p>
                                    <p> <span class="strong"> <i class="fa fa-phone"></i> : </span> <span
                                            class="highlighted"><?php echo e($appSetting->phone1); ?></span> </p>
                                    <p> <span class="strong"> <i class="fa fa-phone"></i> : </span> <span
                                            class="highlighted"><?php echo e($appSetting->phone2); ?></span> </p>
                                    <p> <span class="strong"> <i class="fa fa-envelope"></i> : </span> <span
                                            class="highlighted"
                                            style="font-size:14px;"><?php echo e($appSetting->emailwebsite); ?></span> </p>
                                </div>
                                <div class="col-sm-3 col-md-3 foot-spec foot-com">
                                    <h4><span>SUPPORT</span> & HELP</h4>
                                    <ul class="two-columns">
                                        <li> <a href="/about-us">About Us</a> </li>
                                        <li> <a href="/faq">FAQ</a> </li>
                                        <li> <a href="/policyTerms">Policy Terms</a> </li>




                                        <li> <a href="/package/umrah">Umrah</a> </li>
                                        <li> <a href="/package/hajj">Hajj</a> </li>
                                        <li> <a href="#">Flights </a> </li>
                                        <li> <a href="/contact_us">Contact Us</a> </li>
                                    </ul>
                                </div>
                                <div class="col-sm-3 foot-social foot-spec foot-com">
                                    <h4><span>Follow</span> with us</h4>
                                    <p>Join the thousands of other There are many variations of packages with us</p>
                                    <ul>
                                        <li><a href="<?php echo e($appSetting->facebook_link); ?>"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a> </li>
                                        <li><a href="<?php echo e($appSetting->google_plus_link); ?>"><i class="fa fa-google-plus"
                                                    aria-hidden="true"></i></a> </li>
                                        <li><a href="<?php echo e($appSetting->twitter_link); ?>"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a> </li>
                                        <li><a href="<?php echo e($appSetting->linkedin_link); ?>"><i class="fa fa-linkedin"
                                                    aria-hidden="true"></i></a> </li>
                                        <li><a href="<?php echo e($appSetting->youtube_link); ?>"><i class="fa fa-youtube"
                                                    aria-hidden="true"></i></a> </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <center>
                    <table>
                        <td>

                            <tr><img
                                    src="https://lirp-cdn.multiscreensite.com/7f75a0c5/dms3rep/multi/opt/saudi-150w.png">
                            </tr>
                            <tr><img
                                    src="https://lirp-cdn.multiscreensite.com/7f75a0c5/dms3rep/multi/opt/hajj-150w.png">
                            </tr>
                            <tr><img
                                    src="https://lirp-cdn.multiscreensite.com/7f75a0c5/dms3rep/multi/opt/iata-150w.png">
                            </tr>
                            <tr><img
                                    src="https://lirp-cdn.multiscreensite.com/7f75a0c5/dms3rep/multi/opt/iatan-150w.png">
                            </tr>

                        </td>
                    </table>
                </center>
            </div>

        </div>
    </section>
    <!--====== FOOTER - COPYRIGHT ==========-->
    <section>
        <div class="rows copy">
            <div class="container">
                <p>Copyrights © 2022 Baraka Travel</p>
            </div>
        </div>
    </section>

    <!--<section>-->
    <!--    <div class="icon-float">-->
    <!--        <ul>-->
    <!--            <li><a href="#" class="sh">1k <br> Share</a> </li>-->
    <!--            <li><a href="#" class="fb1"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>-->
    <!--            <li><a href="#" class="gp1"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>-->
    <!--            <li><a href="#" class="tw1"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>-->
    <!--            <li><a href="#" class="li1"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>-->
    <!--            <li><a href="#" class="wa1"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>-->
    <!--            <li><a href="#" class="sh1"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </li>-->
    <!--        </ul>-->
    <!--    </div>-->

    <!--</section>-->
    <!--========= Scripts ===========-->
    <script src="<?php echo e(Request::root()); ?>/website/js/jquery-latest.min.js"></script>
    <script src="<?php echo e(Request::root()); ?>/website/js/bootstrap.js"></script>
    <script src="<?php echo e(Request::root()); ?>/website/js/wow.min.js"></script>
    <script src="<?php echo e(Request::root()); ?>/website/js/materialize.min.js"></script>
    <script src="<?php echo e(Request::root()); ?>/website/js/carousel/owl.carousel.js"></script>
    <script src="<?php echo e(Request::root()); ?>/website/js/custom.js"></script>
<script>
        $('.carousel-logo').owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    margin:10,
    nav:false,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        300:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
    $('.carousel-box').owlCarousel({
    margin:20,
    nav:true,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});

$('.popu-places-home').owlCarousel({
    margin:20,
    nav:true,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        }
    }
})
</script>

    <script type="text/javascript">
        console.log('ssssss');
        $('#getRate input:radio').on('change', function () {
            console.log($(this).val());
            $('#rateValue').val($(this).val());
        });

    </script>
    <?php echo $__env->yieldContent('footer'); ?>


    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f78c10775f2459a"></script>

</body>

</html>
<?php /**PATH G:\Baraka Project\last update abdo\new barakaa10_4_2023\resources\views/website/layouts/app.blade.php ENDPATH**/ ?>