@extends('homeapp')

@push('title','How To Trade – Sell Gift Cards In Nigeria | GC BUYING')

@push('meta','Selling gift cards in Nigeria is very easy now! Just open an account to start selling your cards and sell
your gift cards instantly at best rates. Click to learn more!')

@section('banner')
    <!-- banner -->
    <div id="home" class="hero-single grdnt-blue style-wave-2 bg-trans-1">
        <div class="container">
            <div class="row text-center">
                <div class="intro-text light">
                    <h3>How to Trade</h3>
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
            <div class="row feature-item mt-5 pt-5">
                <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
                    <img src="new-frontend/img/gift-cards-2.png" class="img-fluid" alt="sell gift cards in nigeria">
                </div>

                <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
                    {!! \App\Models\Trade::where('id',1)->first()->body_html !!}
                </div>

            </div>
        </div>



    </section><!-- #about -->





@stop
