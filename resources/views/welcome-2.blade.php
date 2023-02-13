
@include('header')

<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/16d9d81471ead9981350e887c/e4e53507ff4c212ce01f05bdf.js");</script>
<!--==========================
  Intro Section
============================-->
<section id="intro" class="clearfix">
    <div class="container d-flex h-100">
        <div class="row justify-content-center align-self-center">
            <div class="col-md-6 intro-info order-md-first order-last">
                <h2>{{config('settings.heading')}}</h2>
                <p>{{config('settings.heading_text')}}</p>
                <div>
                    <a href="{{route('login')}}" class="btn-get-started scrollto">Log In</a>
                    <a href="{{route('register')}}" class="btn-get-started scrollto">Sign Up</a>
                </div>
            </div>

            <div class="col-md-6 intro-img order-md-last order-first">
                <img src="new-frontend/img/intro-img.svg" alt="" class="img-fluid">
            </div>
        </div>

    </div>
</section><!-- #intro -->

<main id="main">

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
        <div class="container">

            <header class="section-header">
                <h3>{{config('settings.about_title')}}</h3>
                <p>{{config('settings.about_subtitle')}}</p>
            </header>

            <div class="row">

                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #fceef3;"><i class="{{config('settings.about_1_icon')}}" style="color: #ff689b;"></i></div>
                        <h4 class="title"><a href="">{{config('settings.about_1_title')}}</a></h4>
                        <p class="description">{{config('settings.about_1_text')}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #fff0da;"><i class="{{config('settings.about_2_icon')}}" style="color: #e98e06;"></i></div>
                        <h4 class="title"><a href="">{{config('settings.about_2_title')}}</a></h4>
                        <p class="description">{{config('settings.about_2_text')}}</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #e6fdfc;"><i class="{{config('settings.about_3_icon')}}" style="color: #3fcdc7;"></i></div>
                        <h4 class="title"><a href="">{{config('settings.about_3_title')}}</a></h4>
                        <p class="description">{{config('settings.about_3_text')}}</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- #services -->

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
        <div class="container-fluid">

            <header class="section-header">
                <h3>WHY CHOOSE US??</h3>
                <p>NO REASON TO DOUBT US, WANT TO KNOW WHY?</p>
            </header>

            <div class="row">

                <div class="col-lg-6">
                    <div class="why-us-img">
                        <img style="max-width: 90% !important;" src="new-frontend/img/gift-cards-1.png" alt="" class="img-fluid">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="why-us-content">
                        <p>{{config('settings.why_text')}}</p>

                        <div class="features wow bounceInUp clearfix">
                            <i class="fa fa-amazon" style="color: #f058dc;"></i>
                            <h4>Amazon Gift Cards</h4>
                        </div>

                        <div class="features wow bounceInUp clearfix">
                            <i class="fa fa-google" style="color: #ffb774;"></i>
                            <h4>Google Play Gift Cards</h4>
                        </div>

                        <div class="features wow bounceInUp clearfix">
                            <i class="fa fa-apple" style="color: #589af1;"></i>
                            <h4>iTunes Gift Cards</h4>
                        </div>

                        <div class="features wow bounceInUp clearfix">
                            <i class="fa fa-universal-access" style="color: #589af1;"></i>
                            <h4>Quick Access</h4>
                        </div>

                        <div class="features wow bounceInUp clearfix">
                            <i class="fa fa-clock-o" style="color: #589af1;"></i>
                            <h4>24/7 Support</h4>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center text-lg-left">
                    <h3 class="cta-title">{{config('settings.banner_heading')}}</h3>
                    <p class="cta-text">{{config('settings.banner_text')}}</p>
                </div>
                <div class="col-lg-5 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="{{route('login')}}">Login</a>
                    <a class="cta-btn align-middle" href="https://api.whatsapp.com/send?phone=2347048161101&text=Hello%20GC%20Buying,%20I%20want%20to%20trade%20my%20gift%20cards%20with%20you" target="_blank">Trade On Whatsapp</a>
                </div>
            </div>

        </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Features Section
    ============================-->
    <section id="features">
        <div class="container">

            <div class="row feature-item">
                <div class="col-lg-6 wow fadeInUp">
                    <img src="new-frontend/img/pexels-minervastudio-2897883.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
                    <h4>HOW IT WORK?</h4>

                    <h5 style="color: #1400c6;">{{config('settings.work_1_title')}}</h5>
                    <p style="font-size: 15px;">{{config('settings.work_1_text')}}</p>
                    <h5 style="color: #1400c6;">{{config('settings.work_2_title')}}</h5>
                    <p style="font-size: 15px;">{{config('settings.work_2_text')}}</p>
                    <h5 style="color: #1400c6;">{{config('settings.work_3_title')}}</h5>
                    <p style="font-size: 15px;">{{config('settings.work_3_text')}}</p>
                </div>
            </div>

            <div class="row feature-item mt-5 pt-5">
                <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
                    <img src="new-frontend/img/gift.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
                    <h4>{{config('settings.sell_heading')}}</h4>
                    <p>
                        {{config('settings.sell_text')}}
                    </p>
                </div>

            </div>

        </div>
    </section><!-- #about -->
    
    
    
    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
	          <div style="display: block;" class="col-lg-6 cta-btn-container text-center">
	          	<h3 class="cta-title">We Have Been Featured On:</h3>
	          	<div>
	          		<a href="https://www.vanguardngr.com/2020/09/how-trading-your-gift-cards-for-naira-has-been-made-simpler-gcbuying/" target="_blank"><img style="max-width: 150px; padding: 5px;" src="new-frontend/img/vanguard.png"></a>
	          		<a href="https://www.naijaloaded.com.ng/talk-zone/sell-your-gift-cards-and-your-bitcoins-for-fast-payments-in-naira-gcbuying" target="_blank"><img style="max-width: 150px; padding: 5px;" src="new-frontend/img/naijaloaded.png"></a>
	          		<a href="https://www.legit.ng/1314633-redeem-gift-cards-sell-bitcoins-fast-payments-naira.html" target="_blank"><img style="max-width: 150px; padding: 5px;" src="new-frontend/img/legit.svg"></a>
	          	</div>
	          </div>
	          <div class="col-lg-6 text-center text-lg-left">
	            <h3 class="cta-title">Our License to Operate</h3>
	            <p class="cta-text" style="font-family: Poppins">RECOGNIZED AND DULY REGISTERED UNDER THE NIGERIAN LAW</p>
	            <p class="cta-text" style="font-family: Poppins">Registration info: GCBUYING TRADING SERVICES, RC NUMBER: 3197743</p>
	          </div>
          
        </div>

      </div>
    </section><!-- #call-to-action -->


    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials">
        <div class="container">

            <header class="section-header">
                <h3>REVIEWS OF CUSTOMERS</h3>
            </header>

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="owl-carousel testimonials-carousel wow fadeInUp">
                        @php
                            $testimonials = \App\Models\Testimonial::all();
                            $faqs = \App\Models\Faq::all();
                        @endphp
                        @foreach($testimonials as $testimonial)
                        <div class="testimonial-item">
                            <h3>{{$testimonial->name}}</h3>
                            <p>
                                {{$testimonial->text}}
                            </p>
                        </div>
                        @endforeach

                    </div>

                </div>
            </div>


        </div>
    </section><!-- #testimonials -->


    <!--==========================
      Frequently Asked Questions Section
    ============================-->
    <section id="faq">
        <div class="container">
            <header class="section-header">
                <h3>FREQUENTLY ASKED QUESTIONS (FAQ)</h3>
            </header>

            <ul id="faq-list" class="wow fadeInUp">
                @foreach($faqs as $faq)
                <li>
                    <a data-toggle="collapse" class="collapsed" href="#faq{{$faq->id}}">{{$faq->question}}<i class="ion-android-remove"></i></a>
                    <div id="faq{{$faq->id}}" class="collapse" data-parent="#faq-list">
                        <p>{{$faq->answer}}</p>
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
    </section><!-- #faq -->

</main>

@include('footer')
