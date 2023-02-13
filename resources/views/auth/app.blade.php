<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{url()->current()}}">
    
     <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{asset('new-frontend/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset('new-frontend/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('new-frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('new-frontend/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('new-frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('new-frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Main Stylesheet File -->
    <link href="{{asset('new-frontend/css/style.css')}}" rel="stylesheet">

   



    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Material Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/material-dashboard.css?v=2.1.2') }}">
    <link type="text/css" rel="stylesheet" href="{{asset('alogin/fonts/flaticon/font/flaticon.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('alogin/css/style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('alogin/css/skins/default.css')}}">

</head>

<body>
    
    <header id="header">

    <div class="container">

        <div class="logo float-left">
            <!-- Uncomment below if you prefer to use an image logo -->
            <h1 class="text-light"><a href="{{route('welcome')}}" class="scrollto"><span>GC Buying</span></a></h1>
            <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li><a href="{{route('about-us')}}">About Us</a></li>
                <li><a href="{{route('how-to-trade')}}">How to Trade</a></li>
                <li><a href="{{route('rate-calculator')}}">Rate Calculator</a></li>
                <li><a href="{{route('all.blogs')}}">Our Blog</a></li>

                @guest
                <li><a href="{{route('login')}}">Login</a></li>
                <li><a href="{{route('register')}}">Register</a></li>
                @else
                <li><a href="{{route('home')}}">Dashboard</a></li>
                @endguest
            </ul>
        </nav><!-- .main-nav -->

    </div>
</header><!-- #header -->
    
    
    
<main id="main">
   

    
    <section id="features">
        <div class="container">
            
        @yield('content')
        
        </div>
    </section>

</main>



<!--==========================
  Footer
============================-->
<footer id="footer" class="section-bg">
    <div class="footer-top">
        <div class="container">

            <div class="row">

                <div style="text-align: center;" class="footer-info col-lg-4">
                    <h3>GC Buying</h3>
                    <p>Welcome to the best gift cards trading website. We buy various gift cards like iTunes Gift Card, Amazon Gift Cards, Steam Gift Cards, Google Play Gift Cards, Sephora Gift Cards and a lot more.</p>
                </div>

                <div style="text-align: center;" class="footer-links col-lg-4">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{route('about-us')}}">About Us</a></li>
                        <li><a href="{{route('how-to-trade')}}">How To Trade</a></li>
                        <li><a href="{{route('rate-calculator')}}">Rate Calculator</a></li>
                        <li><a href="{{route('all.blogs')}}">Our Blog</a></li>
                    </ul>
                </div>

                <div style="text-align: center;" class="footer-links col-lg-4">
                    <h4>Trade Now</h4>
                    <div style="padding: 10px;">
                        <a href="https://api.whatsapp.com/send?phone=2347048161101&text=Hello%20GC%20Buying,%20I%20want%20to%20trade%20my%20gift%20cards%20with%20you" class="mybtn" target="_blank">Trade On Whatsapp</a>
                    </div>
                    <div style="padding: 10px;">
                        <a href="{{route('login')}}" class="mybtn">Your Dashboard</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>GC Buying</strong>. All Rights Reserved
        </div>
    </div>
</footer><!-- #footer -->

<!--   Core JS Files   -->
<script src="{{ asset('backend/js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>

<!-- Plugin for the Perfect Scrollbar -->
<script src="{{ asset('backend/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

<!-- Plugin for the momentJs  -->
<!--<script src="{{ asset('backend/js/plugins/moment.min.js') }}"></script>-->

<!--  Plugin for Sweet Alert -->
<!--<script src="{{ asset('backend/js/plugins/sweetalert2.js') }}"></script>-->

<!-- Forms Validations Plugin -->
<!--<script src="{{ asset('backend/js/plugins/jquery.validate.min.js') }}"></script>-->

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<!--<script src="{{ asset('backend/js/plugins/jquery.bootstrap-wizard.js') }}"></script>-->

<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<!--<script src="{{ asset('backend/js/plugins/bootstrap-selectpicker.js') }}" ></script>-->

<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<!--<script src="{{ asset('backend/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>-->

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<!--<script src="{{ asset('backend/js/plugins/jquery.datatables.min.js') }}"></script>-->

<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<!--<script src="{{ asset('backend/js/plugins/bootstrap-tagsinput.js') }}"></script>-->

<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<!--<script src="{{ asset('backend/js/plugins/jasny-bootstrap.min.js') }}"></script>-->

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<!--<script src="{{ asset('backend/js/plugins/fullcalendar.min.js') }}"></script>-->

<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<!--<script src="{{ asset('backend/js/plugins/jquery-jvectormap.js') }}"></script>-->

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<!--<script src="{{ asset('backend/js/plugins/nouislider.min.js') }}" ></script>-->

<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>-->

<!-- Library for adding dinamically elements -->
<!--<script src="{{ asset('backend/js/plugins/arrive.min.js') }}"></script>-->

<!--  Google Maps Plugin    -->
<!--<script  src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->

<!-- Chartist JS -->
<!--<script src="{{ asset('backend/js/plugins/chartist.min.js') }}"></script>-->

<!--  Notifications Plugin    -->
<!--<script src="{{ asset('backend/js/plugins/bootstrap-notify.js') }}"></script>-->

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<!--{{--<script src="{{ asset('backend/js/material-dashboard.min.js?v=2.1.2') }}" type="text/javascript"></script>--}}-->
<!--<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>-->

<!-- JavaScript Libraries -->
<script src="{{asset('new-frontend/lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('new-frontend/lib/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{asset('new-frontend/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('new-frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('new-frontend/lib/mobile-nav/mobile-nav.js')}}"></script>
<script src="{{asset('new-frontend/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('new-frontend/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('new-frontend/lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('new-frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('new-frontend/lib/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('new-frontend/lib/lightbox/js/lightbox.min.js')}}"></script>
<!-- Contact Form JavaScript File -->
<!--<script src="{{asset('new-frontend/contactform/contactform.js')}}"></script>-->

<!-- Template Main Javascript File -->
<script src="{{asset('new-frontend/js/main.js')}}"></script>
</body>
