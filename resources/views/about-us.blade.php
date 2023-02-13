@extends('homeapp')

@push('title','About Us – GC BUYING | Sell Gift Cards In Nigeria')

@push('meta','GC Buying is the best website to sell gift cards in Nigeria instantly and convert them to cash. So click on
the link and sell your Sephora, iTunes, Amazon or Apple gift cards easily and efficiently.')

@section('banner')
    <!-- banner -->
    <div id="home" class="hero-single grdnt-blue style-wave-2 bg-trans-1">
        <div class="container">
            <div class="row text-center">
                <div class="intro-text light">
                    <h3>About Us</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
@endsection

@section('content')

<div id="main">

    <!--==========================
      Features Section
    ============================-->
    <section id="features" style="padding-top: 100px;">
        <div class="container">
            <div class="row feature-item" style="margin-top: 50px;">
                <div class="col-lg-6 wow fadeInUp">
                    <img src="new-frontend/img/pexels-minervastudio-2897883.jpg" class="img-fluid" alt="sell gift cards in nigeria">
                </div>
                <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">

                    {!! \App\Models\About::where('id',1)->first()->body_html !!}
                </div>
            </div>

        </div>
    </section><!-- #about -->


</div>

@stop
