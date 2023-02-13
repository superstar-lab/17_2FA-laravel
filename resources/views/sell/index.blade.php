<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>User | Dashboard</title>
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

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/vuexy/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/vuexy/vendors/css/extensions/toastr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/vuexy/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/vuexy/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/vuexy/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/vuexy/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/vuexy/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/vuexy/css/themes/bordered-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/vuexy/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/vuexy/css/pages/app-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/vuexy/css/plugins/extensions/ext-component-toastr.css">
    <!-- END: Page CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

@include('layouts.partials.header')
@include('layouts.partials.menu')

<!-- BEGIN: Content-->
<div class="app-content content ecommerce-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Sell Gift Card</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Sell Gift Card
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <div>
                <div class="card">
                    <div class="card-body">
                        <form action="" class="d-flex justify-content-center">
                            <input name="search" class="form-control mx-2" type="search" value="{{request('search')}}" placeholder="Search a category">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Wishlist Starts -->
            <section id="wishlist" class="grid-view wishlist-items">

                @foreach($categories as $category)

                        <div class="card ecommerce-card cursor-pointer" onclick="location.href='{{route('sell',['category'=>$category->slug])}}'">
                            <div class="item-img text-center">
                                <a href="{{route('sell',['category'=>$category->slug])}}">
                                    <img src="{{url('/')}}/image/{{$category->image}}" class="img-fluid" alt="img-placeholder" />
                                </a>
                            </div>
                            <div class="card-body">

                                <div class="item-name">
                                    <a href="{{route('sell',['category'=>$category->slug])}}">{{ucfirst($category->name)}}</a>
                                </div>
                            </div>
                            <div class="item-options text-center">
                                <a href="{{route('sell',['category'=>$category->slug])}}" type="button" class="btn btn-primary btn-cart move-cart">
                                    <i data-feather="list"></i>
                                    <span class="add-to-cart">Click To Trade This Card</span>
                                </a>
                            </div>
                        </div>


                @endforeach


            </section>
            <!-- Wishlist Ends -->

        </div>
    </div>
</div>
<!-- END: Content-->


@include('layouts.partials.footer')


<!-- BEGIN: Vendor JS-->
<script src="{{url('/')}}/vuexy/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{url('/')}}/vuexy/vendors/js/ui/jquery.sticky.js"></script>
<script src="{{url('/')}}/vuexy/vendors/js/extensions/toastr.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{url('/')}}/vuexy/js/core/app-menu.js"></script>
<script src="{{url('/')}}/vuexy/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
{{--<script src="{{url('/')}}/vuexy/js/scripts/pages/app-ecommerce-wishlist.js"></script>--}}
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

