<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>User | Dashboard</title>
     <link rel="icon" href="{{url('/')}}/gcc/attach/favicon.ico" type="image/gif" sizes="32x32">
    <meta name="description" content="User Dashboard" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="canonical" href="{{url()->current()}}">


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Ads: 630464494 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-630464494"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-630464494');
    </script>


   @include('layouts.partials.css')

    @stack('css')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">
    @include('layouts.partials.header')
    @include('layouts.partials.menu')

{{--    @yield('content')--}}

    <!-- BEGIN: Content-->
    <div class="app-content content " >
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper" style="margin-top: 80px">
            <div class="content-header row">
                @yield('breadcamp')
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @include('layouts.partials.footer')


    @include('layouts.partials.javascript')

    @stack('js')
    <script src="//code.jivosite.com/widget/8xvtKzogLq" async></script>

</body>
<!-- END: Body-->

</html>
