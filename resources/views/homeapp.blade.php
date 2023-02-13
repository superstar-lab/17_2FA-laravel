<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{url('/')}}/gcc/attach/favicon.ico" type="image/gif" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/gcc/css/vendor.bundle.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/gcc/css/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- SEO Meta description -->
    <meta name="description"
          content="@stack('meta')">
    <link rel="canonical" href="{{url()->current()}}">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="GCBuying"/> <!-- website name -->
    <meta property="og:site" content="https://gcbuying.com"/> <!-- website link -->
    <meta property="og:title" content="Best website to sell gift cards in Nigeria"/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="GCBuying is the best website in Nigeria to sell gift cards"/> <!-- description shown in the actual shared post -->
    <meta property="og:image" content=""/> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content=""/> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article"/>

    <!--title-->
    <title>@stack('title')</title>
    <!--google fonts-->

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180845096-1"></script>

<!-- Global site tag (gtag.js) - Google Ads: 630464494 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-630464494"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-630464494');
</script>

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

<body data-spy="scroll" data-target="#navbar" data-offset="70">



<!--loader start-->
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!--  -->
<!--loader end-->

<header>
    <!-- navbar -->
    <nav id="navbar" class="navbar navbar-custom navbar-fixed-top" data-spy="affix" data-offset-top="70">
        <div class="container">
            <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <i class="fa fa-bars"></i>
                    </button>

                    <a class="navbar-brand page-scroll logo-light" href="{{url('/')}}"><img alt="" style="height:40px" src="{{url('/')}}/gcc/attach/gt2.png"></a>
                   <a class="navbar-brand page-scroll logo-clr" href="{{url('/')}}"><img alt="" style="height:40px" src="{{url('/')}}/gcc/attach/gt2.png"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="right-nav text-right">
                        <ul class="nav navbar-nav menu">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{url('/about-us')}}">About Us</a>
                            </li>
                            <li>
                                <a href="{{url('/how-to-trade')}}">How To Trade</a>
                            </li>
                            <li>
                                <a href="{{url('/rate-calculator')}}">Rate Calculator</a>
                            </li>
                            <li>
                                <a href="{{url('/blogs')}}">Our Blogs</a>
                            </li>
                        </ul>
                        <div class="nav-btn">
                            <a href="{{route('login')}}" class="btn btn-border">Login</a>
                            <a href="{{route('register')}}" class="btn btn-border">Register</a>
                        </div>
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    @yield('banner')

</header>
<!-- End header -->

@yield('content')

<!-- download-section -->
<section>
    <div class="sec-pad-lg"  data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="row justify-content-around align-items-center">
                    <div class="col-md-7">
                        <div class="subscribe-content">
                            <h4 class="mb-1">Create an Account or Trade through WhatsApp</h4>
                            <p>Selling your gift cards with GCBUYING is easy. Simply download our app or shoot us a message on WhatsApp at +234 704 816 1101.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-lg-right text-sm-left">
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=2347048161101&text=Hello%20GC%20Buying,%20I%20want%20to%20trade%20my%20gift%20cards%20with%20you" class="btn grdnt-blue fill"><span class="clip-txt">TRADE ON WHATSAPP</span></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End download-section -->

<!-- faq -->
{{--<section class="sec-pad-lg grad-prple">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="section-text text-center wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">--}}
{{--                <p class="meta-head">Contact with us</p>--}}
{{--                <h3>Please contact with us</h3>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-10 col-md-offset-1  wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-5 col-sm-5 res-margin">--}}
{{--                            <ul class="grad-blue right-dir-col">--}}
{{--                                <li>--}}
{{--                                        <span class="icon-sm clip-txt">--}}
{{--                                            <i class="ti-map"></i>--}}
{{--                                        </span>--}}
{{--                                    <div class="text">--}}
{{--                                        <h6>Address</h6>--}}
{{--                                        131 Dartmouth Street <br> Boston, Massachusetts 02116 <br> United States--}}
{{--                                    </div>--}}
{{--                                    <div class="spce"></div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                        <span class="icon-sm clip-txt">--}}
{{--                                            <i class="ti-mobile"></i>--}}
{{--                                        </span>--}}
{{--                                    <div class="text"><h6>Phone</h6> +1 617 572 2000 <br> +1 17 7892 45454</div>--}}
{{--                                    <div class="spce"></div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                        <span class="icon-sm clip-txt">--}}
{{--                                            <i class="ti-email"></i>--}}
{{--                                        </span>--}}
{{--                                    <div class="text"><h6>Mail</h6>support_mail@mail.com <br> xappir_mail@mail.com</div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}

{{--                        </div>--}}
{{--                        <div class="col-md-7 col-sm-7">--}}
{{--                            <div class="bg-gray contact-form pd-30">--}}
{{--                                <h5>Request Contact</h5>--}}
{{--                                <div class="spce"></div>--}}
{{--                                <div id="form-messages"></div>--}}
{{--                                <form id="ajax-contact" method="post" action="assets/contact.php">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="text" class="form-control" placeholder="Enter your name *" id="name" name="name" required>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="email" class="form-control" placeholder="Enter your email *" id="email" name="email" required>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <textarea class="form-control" placeholder="Message*" rows="4" id="message" name="message" required></textarea>--}}
{{--                                    </div>--}}
{{--                                    <input type="submit" value="Submit Form" class="btn grdnt-purple">--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<!--  -->--}}

<!--Footer  -->
<footer class="footer-wrapper pb-0 grdnt-blue sec-pad light">
    <div class="container footer-content">
        <div class="row">
            <div class="row footer-widget">
                <div class="col-md-3 col-sm-6 res-margin">
                    <a class="navbar-brand" href="#"><span>GCBUYING</span></a>
                    <div class="spce"></div>
                    <p>Welcome to the best gift cards trading website. We buy various gift cards like iTunes Gift Card, Amazon Gift Cards, Steam Gift Cards, Google Play Gift Cards, Sephora Gift Cards and a lot more.</p>
                </div>
                <div class="col-md-3 col-sm-6 res-margin">
                    <h6>Our License</h6>
                    <div class="spce"></div>
                    <ul>
                        <li><a href="#">RECOGNIZED AND DULY REGISTERED UNDER THE NIGERIAN LAW
                            </a></li>
                        <li><a href="#">Registration info: GCBUYING TRADING SERVICES, RC NUMBER: 3197743</a></li>

                    </ul>

                </div>
                <div class="col-md-2 col-sm-6 col-md-offset-1 res-margin">
                    <h6>Useful Links</h6>
                    <div class="spce"></div>
                    <ul>
                        <li><a href="{{url('/about-us')}}">About Us</a></li>
                        <li><a href="{{url('/privacy')}}">Privacy Policy</a></li>
                        <li><a href="{{url('/how-to-trade')}}">How to Trade</a></li>
                        <li><a href="{{url('/rate-calculator')}}">Rate Calculator</a></li>
                        <li><a href="{{url('/blogs')}}">Our Blog</a></li>

                    </ul>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h6>Follow Us</h6>
                    <div class="spce"></div>
                    <ul class="social-holder light">
                        {{--                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
                        <li><a href="https://twitter.com/gcbuying"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://instagram.com/gcbuying"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        {{--                        <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="spce md"></div>
            <div class="spce"></div>
            <div class="copyright text-center light">
                2021 Copyright <strong>Gcbuying</strong> . ALL RIGHTS RESERVED
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- script -->
<script src="{{url('/')}}/gcc/js/vendor.bundle.js"></script>
<script src="{{url('/')}}/gcc/js/script.js"></script>
<script src="//code.jivosite.com/widget/8xvtKzogLq" async></script>

</body>
</html>
