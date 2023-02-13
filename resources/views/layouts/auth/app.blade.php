<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Gcbuying</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->
    
     <link rel="icon" href="{{url('/')}}/gcc/attach/favicon.ico" type="image/gif" sizes="32x32">

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('vuexy/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vuexy/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vuexy/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vuexy/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vuexy/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vuexy/css/themes/bordered-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('vuexy/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vuexy/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vuexy/css/pages/page-auth.css')}}">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    @stack('css')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">



    @yield('content')



<!-- BEGIN: Vendor JS-->
<script src="{{asset('vuexy/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('vuexy/vendors/js/ui/jquery.sticky.js')}}"></script>
<script src="{{asset('vuexy/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('vuexy/js/core/app-menu.js')}}"></script>
<script src="{{asset('vuexy/js/core/app.js')}}"></script>
{{--<script src="{{asset('js/iziToast.js')}}"></script>--}}

<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
    @stack('js')
<!-- END: Page JS-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
<!-- END: Body-->

</html>
