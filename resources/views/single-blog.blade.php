@extends('homeapp')

@push('title',$blog->title)

@push('meta', $blog->meta_description ?? '')

@section('banner')
    <!-- banner -->
    <div id="home" class="hero-single grdnt-blue style-wave-1 bg-trans-1">
        <div class="container">
            <div class="row text-center">
                <div class="intro-text light">
                    <h3>{{$blog->title}}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
@endsection
@section('content')
<div id="main">
    <section id="features" style="padding-top: 100px;">
        <div class="container">
            <header class="section-header mb-5">
                <h3><ABBR>{{$blog->title}}</ABBR></h3>
            </header>
            <!-- Project One -->

            <div class="row mt-5">
                <div class="col-md-12" style="position: relative">
                    @if($blog->image)
                        <a href="{{asset('image/'.$blog->image)}}">
                            <img class="img-fluid w-90 h-90 rounded mb-3 mb-md-0 " style="height: 400px;overflow:hidden;width: 100%;object-fit: cover;position: relative;top: 0;left: 0" src="{{asset('image/'.$blog->image)}}" alt="">
                        </a>

                    @else
                    <a href="http://placehold.it/700x300">
                        <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
                    </a>
                    @endif
                </div>
            </div>
            <div class="row mt-5 justify-content-center">
                <div class="col-md-10">

                    <p>{!! $blog->body_html !!}</p>

                </div>
            </div>

            <!-- /.row -->
        </div>
    </section>
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

</div>


@endsection
