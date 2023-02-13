@extends('homeapp')

@push('title','Best Website to Sell Gift Cards In Nigeria – GC BUYING')

@push('meta','Want to sell Sephora, iTunes, Amazon or Apple gift cards in Nigeria? We’re one of the best websites to
sell gift cards instantly and convert them to cash.')

@section('content')
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/16d9d81471ead9981350e887c/e4e53507ff4c212ce01f05bdf.js");</script>

<!--body content wrap start-->
<div class="main">

    <!--hero background image with content slider start-->
    <section class="hero-section hero-bg-2 ptb-100">
        <div class="container">
            <div class="row align-items-center justify-content-between pt-5 pb-5">
                <div class="col-md-6 col-lg-7">
                    <div class="hero-content-left text-white">
                        <h2 class="text-white">Sell your Gift Cards For Instant Payment</h2>
                        <p class="lead">Wondering how to exchange your gift card for cash? We have made it super easy to sell gift cards for naira instantly. A simple sign up opens doors to a world-class exchange service, where you can simply sell your gift cards and get credited instantly. These services are brought to your fingertip courtesy of GCBUYING. </p>
                        <ul class="list-unstyled tech-feature-list text-white">
                            <li class="py-1"><span class="ti-control-forward mr-2"></span><strong>Log In</strong> If you already have an account</li>
                            <li class="py-1"><span class="ti-control-forward mr-2"></span><strong>Sign Up</strong> To connect with the best website to sell gift cards</li>
                            <li class="py-1"><span class="ti-control-forward mr-2"></span><strong>Or, Contact Us</strong> on whatsapp +234 704 816 1101</li>
                        </ul>

                        <div class="action-btns mt-4">
                            <a href="{{route('register')}}" class="btn secondary-solid-btn mr-3">Sign Up</a>
                            <a href="{{route('login')}}" class="btn secondary-outline-btn">Log In</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="sign-up-form-wrap position-relative rounded p-5 gray-light-bg shadow-lg">
                        <div class="sign-up-form-header text-center mb-4">
                            <h4 class="mb-0">Log In</h4>
                            <p>Login to Gc Buying if you already have an Account</p>
                        </div>
                        <div class="message-box d-none">
                            <div class="alert alert-danger"></div>
                        </div>
                        <form method="post" action="{{ route('login') }}" class="sign-up-form">
                            @csrf
                            <div class="form-group input-group">
                                <input type="text" name="email" class="form-control" placeholder="Email" required="required">
                            </div>
                            <div class="form-group input-group">
                                <input type="Password" name="password" class="form-control" placeholder="Password" required="required">
                            </div>
                            <div style="margin-bottom: 10px;" class="form-check d-flex align-items-center text-center">
                                <input type="checkbox" name="remember" class="form-check-input mt-0 mr-3" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn secondary-solid-btn btn-block" value="LOGIN">
                            </div>
                            <div class="form-check d-flex align-items-center text-center">
                                <p>Don't have an account? <a href="{{route('register')}}">Register Here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero background image with content slider end-->

    <!--promo section start-->
    <section class="promo-block ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="core-services-single rounded p-5 my-md-3 my-lg-3 my-sm-0 shadow-lg">
                        <span class="fas fa-ad icon-md mb-3 d-block color-primary"></span>
                        <h5>Services</h5>
                        <p class="mb-0">You can trade your gift cards at your convenience, simply sign up to access all of the cool amazing features. Users can now buy gift cards as well as sell gift cards on their user dashboard, other features include recharging their mobile networks amongst other features all available on each user's dashboard. Life has indeed be made easier with this advanced level of fintech</p>
                        <a href="#" class="icon-link secondary-bg"><span class="ti-angle-double-right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="core-services-single rounded p-5 my-md-3 my-lg-3 my-sm-0 shadow-lg">
                        <span class="fas fa-briefcase icon-md mb-3 d-block color-primary"></span>
                        <h5>Card Processing</h5>
                        <p class="mb-0">Our payout is within 3 - 5 minutes after confirmation of your transaction.</p>
                        <a href="#" class="icon-link secondary-bg"><span class="ti-angle-double-right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="core-services-single rounded p-5 my-md-3 my-lg-3 my-sm-0 shadow-lg">
                        <span class="fas fa-lightbulb icon-md mb-3 d-block color-primary"></span>
                        <h5>Quality</h5>
                        <p class="mb-0">We offer top notch quality services. We have taken this to a different level and as a result are placed on the highest pedestal.</p>
                        <a href="#" class="icon-link secondary-bg"><span class="ti-angle-double-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--promo section end-->



    <!--call to action section start-->
    <section class="call-to-action py-5 gray-light-bg">
        <div class="container">
            <div class="row justify-content-around align-items-center">
                <div class="col-md-6">
                    <img src="{{asset('homepage/gc-mockup.png')}}" style="transform: rotate(-10deg)" width="400px" alt="Gcbuying app">
                </div>

                <div class="col-md-5">
                    <div class="subscribe-content">
                        <h2 class="mb-3 pb-5">Download The Mobile App  for Whole New Experience</h2>
                        <div class="action-btn text-lg-center text-sm-left">
                            <a target="_blank" href="https://play.google.com/store/apps/details?id=com.gcbuying.app" class="btn primary-solid-btn mr-3"> <i class="fab fa-google-play mr-2"></i>Play Store</a>
                            <a target="_blank" href="#" class="btn secondary-solid-btn"><i class="fab fa-apple mr-2"> </i> App Store</a>
                        </div>
                        <div class="action-btn text-lg-right text-sm-left">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--call to action section end-->







    <!--about us section start-->
    <section class="about-us-section ptb-100">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-12 col-lg-6">
                    <div class="img-wrap">
                        <img src="homepage/img/about-img.svg" alt="about" class="img-fluid"/>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="about-content-right mb-md-4 mb-lg-0">
                        <h2>WHY CHOOSE US?? </h2>
                        <p>NO REASON TO DOUBT US, WANT TO KNOW WHY?</p>
                        <div class="feature-tabs-wrap">
                            <ul class="nav nav-tabs mb-4 border-bottom-0 feature-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" href="#feature-tab-1"
                                       data-toggle="tab">
                                        <h6 class="mb-0">About Us</h6>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" href="#feature-tab-2"
                                       data-toggle="tab">
                                        <h6 class="mb-0">How We Work</h6>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" href="#feature-tab-3"
                                       data-toggle="tab">
                                        <h6 class="mb-0">Gift Cards</h6>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content feature-tab-content">
                                <div class="tab-pane" id="feature-tab-1">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="single-promo-block rounded my-3">
                                                <div class="promo-block-icon mr-4">
                                                    <span class="fas fa-brain icon-sm color-primary mb-3"></span>
                                                </div>
                                                <div class="promo-block-content">
                                                    <h5>100% honesty</h5>
                                                    <p>Our agents are 100% honest, having an unparalleled level of transparency</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="single-promo-block rounded my-3">
                                                <div class="promo-block-icon mr-4">
                                                    <span class="fas fa-bezier-curve icon-sm color-primary mb-3"></span>
                                                </div>
                                                <div class="promo-block-content">
                                                    <h5>24/7 Support</h5>
                                                    <p>To give you best experience, we’ll stay with you every step of the way with our 24/7 available support</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="single-promo-block rounded my-3">
                                                <div class="promo-block-icon mr-4">
                                                    <span class="fas fa-headset icon-sm color-primary mb-3"></span>
                                                </div>
                                                <div class="promo-block-content">
                                                    <h5>Smooth Redeem </h5>
                                                    <p>We offer a smooth redeeming process for gift cards and allow quick access to the payment.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="single-promo-block rounded my-3">
                                                <div class="promo-block-icon mr-4">
                                                    <span class="fas fa-comments icon-sm color-primary mb-3"></span>
                                                </div>
                                                <div class="promo-block-content">
                                                    <h5>Communication</h5>
                                                    <p>You can always contact us if you have any query or complaints. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="feature-tab-2">
                                    <p>The process of trading gift cards is easy and straightforward. Simply sign up or send us a message on WhatsApp at — +234 704 816 1101</p>

                                    <ul class="list-unstyled tech-feature-list">
                                        <li class="py-1"><span class="ti-control-forward mr-2 color-secondary"></span><strong>Initiate</strong> To initiate a trade, simply sign up or contact us on whatsapp.</li> <br>
                                        <li class="py-1"><span class="ti-control-forward mr-2 color-secondary"></span><strong>Contact</strong> Once you contact us, wait for response. Our agent typically replies within a minute. Once you get a reply, tell us what you need, and you will be attended to shortly</li> <br>
                                        <li class="py-1"><span class="ti-control-forward mr-2 color-secondary"></span><strong>Rates</strong> Our good rates are rival to none</li>
                                    </ul>
                                </div>
                                <div class="tab-pane active" id="feature-tab-3">
                                    <p>Whether you’re looking to sell your Amazon gift cards, Google Play, iTunes gift cards, Sephora, etc for instant naira, we’ll stay with you every step of the way with our 24/7 available support</p>
                                    <ul class="list-unstyled tech-feature-list mb-4">
                                        <li class="py-1"><span class="fab fa-amazon mr-2 color-secondary"></span><strong>Amazon Gift Cards</strong></li>
                                        <li class="py-1"><span class="fab fa-google-play mr-2 color-secondary"></span><strong>Google Play Gift Cards</strong></li>
                                        <li class="py-1"><span class="fab fa-itunes mr-2 color-secondary"></span><strong>iTunes Gift Cards</strong></li>
                                        <li class="py-1"><span class="ti-control-forward mr-2 color-secondary"></span><strong>SELL GIFT CARDS FOR NAIRA:- </strong> We accept all gift cards at GC Buying. Our agents are well equipped to handle any gift card exchange at anytime of the day providing our customers with a round-the-clock service.</li>
                                    </ul>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about us section end-->

    <!--call to action section start-->
    <section class="call-to-action py-5 gray-light-bg">
        <div class="container">
            <div class="row justify-content-around align-items-center">
                <div class="col-md-7">
                    <div class="subscribe-content">
                        <h3 class="mb-1">OPEN AN ACCOUNT OR TRADE ON WHATSAPP</h3>
                        <p>The process of trading gift cards is easy and straightforward. Simply sign up or send us a message on WhatsApp at — +234 704 816 1101</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="action-btn text-lg-right text-sm-left">
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=2347048161101&text=Hello%20GC%20Buying,%20I%20want%20to%20trade%20my%20gift%20cards%20with%20you" class="btn secondary-solid-btn">TRADE ON WHATSAPP</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--call to action section end-->

    <!--video background section start-->
    <section class="background-video-section" style="background: url('homepage/img/hero-bg5.jpg')no-repeat center center / cover">
        <div class="video-section-wrap">
            <div class="gradient-overlay ptb-100">
                <div class="player"
                     data-property="{videoURL:'https://www.youtube.com/watch?v=v8FKl9du7Ks',containment:'.video-section-wrap', quality:'highres', autoPlay:true, showControls: false, startAt:0, mute:true, opacity: 1}"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-9 col-lg-8">
                            <div class="app-business-content text-center text-white">
                                <h2 class="text-white">We Have Been Featured On:</h2>
                                <!-- <p class="lead">Building your Apps busines helps attract more potential clients.
                                    Our integrated marketing team will work directly long-term high-impact convergence. </p> -->

                                <div class="action-btns mt-5">
                                    <ul class="list-inline app-download-list">
                                        <li class="list-inline-item">
                                            <a href="https://www.legit.ng/1314633-redeem-gift-cards-sell-bitcoins-fast-payments-naira.html" target="_blank" class="d-flex align-items-center border rounded">
                                                <img style="width: 150px; height: 50px;" src="homepage/img/legit.svg" alt="Legit">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://www.vanguardngr.com/2020/09/how-trading-your-gift-cards-for-naira-has-been-made-simpler-gcbuying/" target="_blank" class="d-flex align-items-center border rounded">
                                                <img style="width: 150px; height: 50px;" src="homepage/img/vanguard.png" alt="Vanguard">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://www.naijaloaded.com.ng/talk-zone/sell-your-gift-cards-and-your-bitcoins-for-fast-payments-in-naira-gcbuying" target="_blank" class="d-flex align-items-center border rounded">
                                                <img style="width: 150px; height: 50px;" src="homepage/img/naijaloaded.png" alt="Naijaloaded">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--video background section end-->


    <!--testimonial section start-->
    <section class="testimonial-section ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading mb-5 text-center">
                        <h2>What Clients Say About Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="owl-carousel owl-theme client-testimonial custom-arrow custom-arrow-bottom-center mb-5">
                        <div class="item">
                            <div class="testimonial-single shadow-sm gray-light-bg rounded p-4">
                                <blockquote>
                                    I had the best experience in trading my iTunes gift cards with these guys, I am surely going to turn them into my personal loader.
                                </blockquote>
                                <div class="client-img d-flex align-items-center justify-content-between pt-4">
                                    <div class="d-flex align-items-center">
                                        <img src="homepage/img/client-1.jpg" alt="client" width="50" class="img-fluid rounded-circle shadow-sm mr-3"/>
                                        <div class="client-info">
                                            <h5 class="mb-0">Bucheee</h5>
                                        </div>
                                    </div>
                                    <div class="client-ratting">
                                        <ul class="list-inline client-ratting-list">
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                        </ul>
                                        <span class="font-weight-bold">5.0 <small class="font-weight-lighter">Out of 5</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-single shadow-sm gray-light-bg rounded p-4">
                                <blockquote>
                                    This is the best exchangers ever, i have tried paxful several times but to no avail, You definitely deserve a thumbs up. Highly recommended.
                                </blockquote>
                                <div class="client-img d-flex align-items-center justify-content-between pt-4">
                                    <div class="d-flex align-items-center">
                                        <img src="homepage/img/client-2.jpg" alt="client" width="50" class="img-fluid rounded-circle shadow-sm mr-3"/>
                                        <div class="client-info">
                                            <h5 class="mb-0">Tomade</h5>
                                        </div>
                                    </div>
                                    <div class="client-ratting">
                                        <ul class="list-inline client-ratting-list">
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                        </ul>
                                        <span class="font-weight-bold">5.0 <small class="font-weight-lighter">Out of 5</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-single shadow-sm gray-light-bg rounded p-4">
                                <blockquote>

                                    What i love about you guys is the fact that you are quick to respond and pay attention to details, I will definitely keep more cards coming. Thanks for the effort you put in.

                                </blockquote>
                                <div class="client-img d-flex align-items-center justify-content-between pt-4">
                                    <div class="d-flex align-items-center">
                                        <img src="homepage/img/client-3.jpg" alt="client" width="50" class="img-fluid rounded-circle shadow-sm mr-3"/>
                                        <div class="client-info">
                                            <h5 class="mb-0">Adebayo Femi</h5>
                                        </div>
                                    </div>
                                    <div class="client-ratting">
                                        <ul class="list-inline client-ratting-list">
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                            <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                        </ul>
                                        <span class="font-weight-bold">5.0 <small class="font-weight-lighter">Out of 5</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--testimonial section end-->



    <!--FAQ section start-->
    <section class="promo-section ptb-100 gray-light-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-9">
                    <div class="section-heading mb-5">
                        <h2>Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
            <!--pricing faq start-->
            <div class="row">
                <div class="col-lg-6">
                    <div id="accordion-1" class="accordion accordion-faq">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-1" data-toggle="collapse" role="button"
                                 data-target="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1">
                                <h6 class="mb-0"><span class="ti-control-forward mr-3"></span> What gift cards do you buy?</h6>
                            </div>
                            <div id="collapse-1-1" class="collapse" aria-labelledby="heading-1-1"
                                 data-parent="#accordion-1">
                                <div class="card-body">
                                    <p>All gift cards including, itunes, sephora, jcpenny, ebay, nordstrom, amazon, apple store, steam wallet, google play, saks fifth, walmart gift card, vanilla gift card e.t.c</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 2 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-2" data-toggle="collapse" role="button"
                                 data-target="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                                <h6 class="mb-0"><span class="ti-control-forward mr-3"></span> How fast do I get my money after trading my gift card?</h6>
                            </div>
                            <div id="collapse-1-2" class="collapse" aria-labelledby="heading-1-2"
                                 data-parent="#accordion-1">
                                <div class="card-body">
                                    <p>Trades are completed as quickly as possible, however you should note some gift cards like apple store gift card, sephora, nordstrom and other store cards take a bit longer to use. However, note your payments will be sent directly to your naira bank account soon as it is successfully completed.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-3" data-toggle="collapse" role="button"
                                 data-target="#collapse-1-3" aria-expanded="false" aria-controls="collapse-1-3">
                                <h6 class="mb-0"><span class="ti-control-forward mr-3"></span> How Can I Trust This?
                                </h6>
                            </div>
                            <div id="collapse-1-3" class="collapse" aria-labelledby="heading-1-3"
                                 data-parent="#accordion-1">
                                <div class="card-body">
                                    <p>We are a team of highly skilled professionals as commendations of our expertise have been published in several newspapers and prominent social media accounts some of which you can find on our homepage.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="accordion-2" class="accordion accordion-faq">
                        <!-- Accordion card 1 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-2-1" data-toggle="collapse" role="button"
                                 data-target="#collapse-2-1" aria-expanded="false" aria-controls="collapse-2-1">
                                <h6 class="mb-0"><span class="ti-control-forward mr-3"></span> Can I sell my gift card on the website?</h6>
                            </div>
                            <div id="collapse-2-1" class="collapse" aria-labelledby="heading-2-1"
                                 data-parent="#accordion-2">
                                <div class="card-body">
                                    <p>Of course you can, there has been designed a solid and easy-to-use web interface where each and every user can easily sign up and trade their gift cards on the website, however if any difficulty is experienced, you can send a message on our whatsapp number where a staff member will attend to you.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 2 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-2-2" data-toggle="collapse" role="button"
                                 data-target="#collapse-2-2" aria-expanded="false" aria-controls="collapse-2-2">
                                <h6 class="mb-0"><span class="ti-control-forward mr-3"></span> Where is this company from?</h6>
                            </div>
                            <div id="collapse-2-2" class="collapse" aria-labelledby="heading-2-2"
                                 data-parent="#accordion-2">
                                <div class="card-body">
                                    <p>We are headquartered in Nigeria</p>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion card 3 -->
                        <div class="card">
                            <div class="card-header py-4" id="heading-2-3" data-toggle="collapse" role="button"
                                 data-target="#collapse-2-3" aria-expanded="false" aria-controls="collapse-2-3">
                                <h6 class="mb-0"><span class="ti-control-forward mr-3"></span> Are You A Registered Company?
                                </h6>
                            </div>
                            <div id="collapse-2-3" class="collapse" aria-labelledby="heading-2-3"
                                 data-parent="#accordion-2">
                                <div class="card-body">
                                    <p>Yes we are duly registered in accordance to the law. RC number: 3197743, BUSINESS NAME: GCBUYING TRADING SERVICES</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--pricing faq end-->
        </div>
    </section>
    <!--FAQ section end-->





</div>
<!--body content wrap end-->


@stop
