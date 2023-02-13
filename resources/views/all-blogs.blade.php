@extends('homeapp')

@push('title','Blog – Sell Gift Cards In Nigeria | GC BUYING')

@push('meta','Welcome to our Blog! Our goal is to provide you with helpful tips, information to educate you about gift
cards rate, prices and answers to your questions. Learn more!')

@section('banner')
    <!-- banner -->
    <div id="home" class="hero-single grdnt-blue style-wave-2 bg-trans-1">
        <div class="container">
            <div class="row text-center">
                <div class="intro-text light">
                    <h3>Blogs</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
@endsection

@section('content')


    <!--Blog  -->
    <section id="blog" class="sec-pad blog">
        <div class="container">
            <div class="row">
                <div class="post row grad-blue">
                    <div class="col-md-12 col-sm-12 res-margin">
                        @foreach($blogs as $blog)
                        <div class="post-col">
                            @if($blog->image)
                            <a  href="{{asset('image/'.$blog->image)}}"><img alt="" src="{{asset('image/'.$blog->image)}}"></a>
                            @else
                            <a  href="http://placehold.it/700x300"><img alt="" src="http://placehold.it/700x300"></a>
                            @endif
                            <div class="post-content">
                                <div class="spce md"></div>
                                <ul class="post-meta clearfix">
                                    <li>{{\Carbon\Carbon::parse($blog->created_at)->diffForHumans()}}</li>

                                </ul>
                                <div class="post-text">
                                    <a href="{{route('single.blog',$blog->slug)}}">
                                        <h4>{{$blog->title}}</h4>
                                        <div class="spce sm"></div>
                                        <p>{!! $blog->summary_html !!}</p></a>
                                    <div class="spce sm"></div>
                                    <a class="btn grdnt-blue fill" href="{{route('single.blog',$blog->slug)}}"><span class="clip-txt">Read More</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="spce lg"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog -->


@stop
