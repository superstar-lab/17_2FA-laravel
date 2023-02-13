<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta description -->
    <meta name="description"
          content="@yield('meta','Best Website to sell Gift Cards in nigeria, best website to buy gift cards in nigeria.')">
    <link rel="canonical" href="{{url()->current()}}">
    <meta name="author" content="ThemeTags">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="GCBuying"/> <!-- website name -->
    <meta property="og:site" content="https://gcbuying.com"/> <!-- website link -->
    <meta property="og:title" content="Best website to sell gift cards in Nigeria"/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="GCBuying is the best website in Nigeria to sell gift cards"/> <!-- description shown in the actual shared post -->
    <meta property="og:image" content=""/> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content=""/> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article"/>

    <!--title-->
    <title>@yield('title','Best Website in Nigeria to sell gift cards: GC Buying')</title>

    <!--favicon icon-->
    <link rel="icon" href="img/favicon.png" type="image/png" sizes="16x16">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans:400,600&display=swap" rel="stylesheet">

    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{asset('homepage/css/bootstrap.min.css')}}">
    <!--Magnific popup css-->
    <link rel="stylesheet" href="{{asset('homepage/css/magnific-popup.css')}}">
    <!--Themify icon css-->
    <link rel="stylesheet" href="{{asset('homepage/css/themify-icons.css')}}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Fontawesome icon css-->
    <link rel="stylesheet" href="{{asset('homepage/css/all.min.css')}}">
    <!--animated css-->
    <link rel="stylesheet" href="{{asset('homepage/css/animate.min.css')}}">
    <!--ytplayer css-->
    <link rel="stylesheet" href="{{asset('homepage/css/jquery.mb.YTPlayer.min.css')}}">
    <!--Owl carousel css-->
    <link rel="stylesheet" href="{{asset('homepage/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('homepage/css/owl.theme.default.min.css')}}">
    <!--custom css-->
    <link rel="stylesheet" href="{{asset('homepage/css/style.css')}}">
    <!--responsive css-->
    <link rel="stylesheet" href="{{asset('homepage/css/responsive.css')}}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180845096-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-180845096-1');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180845096-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-180845096-1');
    </script>

</head>

<body>



<!--loader start-->
<div id="preloader">
    <div class="loader1">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!--loader end-->

<!--header section start-->
<header class="header">
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="{{route('welcome')}}">
                <!-- <img src="img/logo-white.png" alt="logo" class="img-fluid"/> -->
                <h2 style="color: white; margin-top: 5px;">GC BUYING</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse h-auto" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about-us')}}">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('how-to-trade')}}">HOW TO TRADE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('rate-calculator')}}">RATE CALCULATOR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('all.blogs')}}">OUR BLOG</a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">REGISTER</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">Dashboard</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--header section end-->





@yield('content')


<!--footer section start-->
<footer class="footer-section">
    <!--footer top start-->
    <div class="footer-top gradient-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row footer-top-wrap">
                        <div class="col-md-4 col-sm-6">
                            <div class="footer-nav-wrap text-white">
                                <h4 class="text-white">GC BUYING</h4>
                                <p> Welcome to the best gift cards trading website. We buy various gift cards like iTunes Gift Card, Amazon Gift Cards, Steam Gift Cards, Google Play Gift Cards, Sephora Gift Cards and a lot more.</p>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="footer-nav-wrap text-white">
                                <h4 class="text-white">OUR LISCNSE</h4>
                                <p>RECOGNIZED AND DULY REGISTERED UNDER THE NIGERIAN LAW</p>
                                <p>Registration info: GCBUYING TRADING SERVICES, RC NUMBER: 3197743</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="footer-nav-wrap text-white">
                                <h4 class="text-white">USEFUL LINKS</h4>
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('about-us')}}">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('how-to-trade')}}">How to Trade</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('rate-calculator')}}">Rate Calculator</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('all.blogs')}}">Our Blog</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row footer-top-wrap">
                        <div class="col-12">
                            <div class="footer-nav-wrap text-white">
                                <h4 class="text-white">TRADE NOW</h4>
                                <ul class="nav flex-column">
                                    <div class="action-btns mt-4">
                                        <a style="padding: 10px;" target="_blank" href="https://api.whatsapp.com/send?phone=2347048161101&text=Hello%20GC%20Buying,%20I%20want%20to%20trade%20my%20gift%20cards%20with%20you" class="btn primary-solid-btn">Trade On Whatsapp</a>
                                        <br>
                                        <a style="padding: 10px; margin-top: 10px;" href="{{route('home')}}" class="btn primary-solid-btn">Your Dashboard</a>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer top end-->

    <!--footer copyright start-->
    <div class="footer-bottom gray-light-bg py-2">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-5 col-lg-5">
                    <p class="copyright-text pb-0 mb-0">Copyrights © 2020. All
                        rights reserved by
                        <a href="https://gcbuying.com" target="_blank">GC Buying</a></p>
                </div>
                <div class="col-md-7 col-lg-6 d-none d-md-block d-lg-block">
                    <div class="social-nav text-right">
                        <ul class="list-unstyled social-list mb-0">
                            <li class="list-inline-item tooltip-hover">
                                <a href="https://www.instagram.com/gcbuying/" class="rounded"><span class="ti-instagram"></span></a>
                                <div class="tooltip-item">Instagram</div>
                            </li>
                            <li class="list-inline-item tooltip-hover"><a href="https://twitter.com/gcbuying" class="rounded"><span class="ti-twitter"></span></a>
                                <div class="tooltip-item">Twitter</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer copyright end-->
</footer>
<!--footer section end-->

<!--bottom to top button start-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="ti-angle-up"></span>
</button>
<!--bottom to top button end-->

<!--jQuery-->
<script src="{{asset('homepage/js/jquery-3.4.1.min.js')}}"></script>
<!--Popper js-->
<script src="{{asset('homepage/js/popper.min.js')}}"></script>
<!--Bootstrap js-->
<script src="{{asset('homepage/js/bootstrap.min.js')}}"></script>
<!--Magnific popup js-->
<script src="{{asset('homepage/js/jquery.magnific-popup.min.js')}}"></script>
<!--jquery easing js-->
<script src="{{asset('homepage/js/jquery.easing.min.js')}}"></script>
<!--jquery ytplayer js-->
<script src="{{asset('homepage/js/jquery.mb.YTPlayer.min.js')}}"></script>
<!--Isotope filter js-->
<script src="{{asset('homepage/js/mixitup.min.js')}}"></script>
<!--wow js-->
<script src="{{asset('homepage/js/wow.min.js')}}"></script>
<!--owl carousel js-->
<script src="{{asset('homepage/js/owl.carousel.min.js')}}"></script>
<!--countdown js-->
<script src="{{asset('homepage/js/jquery.countdown.min.js')}}"></script>
<!--validator js-->
<script src="{{asset('homepage/js/validator.min.js')}}"></script>
<!--custom js-->
<script src="{{asset('homepage/js/scripts.js')}}"></script>

<script src="//code.jivosite.com/widget/8xvtKzogLq" async></script>
</body>
</html>



