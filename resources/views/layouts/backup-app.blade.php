<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Material Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/material-dashboard.css?v=2.1.2') }}">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>



<div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="{{asset('backend/img/sidebar-1.jpg')}}">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
            <a href="#" class="simple-text logo-mini">

            </a>
            <a href="{{route('welcome')}}" class="simple-text logo-normal">
                GCBUYING
            </a>
        </div>
        <div class="sidebar-wrapper">





            <ul class="nav">

                <li class="nav-item {{(\Route::currentRouteName() == 'about.index' or \Route::currentRouteName() == 'trade.index') ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#formsExamples3">
                        <i class="material-icons">account_circle</i>
                        <p> {{ Auth::user()->name }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="formsExamples3">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="material-icons">logout</i>
                                    <p>Logout</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('password.change')}}">
                                    <i class="material-icons">lock_open</i>
                                    <p>Change Password</p>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <hr>
                </li>






                <li class="nav-item {{(\Route::currentRouteName() == 'home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('home')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>


                <!-- your sidebar here -->

                <li class="nav-item {{(\Route::currentRouteName() == 'balance') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('balance')}}">
                        <i class="material-icons">account_balance_wallet</i>
                        <p> Account Balance </p>
                    </a>
                </li>

                <hr>

                <li class="nav-item {{(\Route::currentRouteName() == 'sell') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('sell')}}">
                        <i class="material-icons">card_giftcard</i>
                        <p> Sell Card </p>
                    </a>
                </li>
                <li class="nav-item {{(\Route::currentRouteName() == 'sell.bitcoin') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('sell.bitcoin')}}">
                        <i class="material-icons">monetization_on</i>
                        <p>Sell Bitcoin</p>
                    </a>
                </li>
                <li class="nav-item {{(\Route::currentRouteName() == 'withdraw') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('withdraw')}}">
                        <i class="material-icons">account_balance</i>
                        <p>Withdraw Now</p>
                    </a>
                </li>
                <hr>

                <li class="nav-item {{(\Route::currentRouteName() == 'orders') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('orders')}}">
                        <i class="material-icons">receipt</i>
                        <p>Recent Trades</p>
                    </a>
                </li>
                <li class="nav-item {{(\Route::currentRouteName() == 'withdraws') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('withdraws')}}">
                        <i class="material-icons">receipt</i>
                        <p>Recent Withdraws</p>
                    </a>
                </li>
                <li class="nav-item {{(\Route::currentRouteName() == 'bank') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('bank')}}">
                        <i class="material-icons">account_balance</i>
                        <p>Bank Account</p>
                    </a>
                </li>

                <hr>
                <li class="nav-item {{(\Route::currentRouteName() == 'card.rate') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('card.rate')}}">
                        <i class="material-icons">trending_up</i>
                        <p>Card Rate</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-primary navbar-absolute fixed-top">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{route('password.change')}}">Change Password</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    @endguest
                        <!-- your navbar here -->
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

    </div>
</div>


    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="//code.jivosite.com/widget/8xvtKzogLq" async></script>

    <!-- Plugin for the Perfect Scrollbar -->
    <script src="{{ asset('backend/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- Forms Validations Plugin -->
    <script src="{{ asset('backend/js/plugins/jquery.validate.min.js') }}"></script>

    <!-- Plugin for the momentJs  -->
{{--    <script src="{{ asset('backend/js/plugins/moment.min.js') }}"></script>--}}

    <!--  Plugin for Sweet Alert -->
{{--    <script src="{{ asset('backend/js/plugins/sweetalert2.js') }}"></script>--}}



    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
{{--    <!--<script src="{{ asset('backend/js/plugins/jquery.bootstrap-wizard.js') }}"></script>-->--}}

    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ asset('backend/js/plugins/bootstrap-selectpicker.js') }}" ></script>

{{--    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->--}}
{{--    <!--<script src="{{ asset('backend/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>-->--}}

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>

{{--    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->--}}
{{--    <!--<script src="{{ asset('backend/js/plugins/bootstrap-tagsinput.js') }}"></script>-->--}}

    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset('backend/js/plugins/jasny-bootstrap.min.js') }}"></script>

{{--    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->--}}
{{--    <!--<script src="{{ asset('backend/js/plugins/fullcalendar.min.js') }}"></script>-->--}}

{{--    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->--}}
{{--    <!--<script src="{{ asset('backend/js/plugins/jquery-jvectormap.js') }}"></script>-->--}}

{{--    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->--}}
{{--    <!--<script src="{{ asset('backend/js/plugins/nouislider.min.js') }}" ></script>-->--}}

{{--    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->--}}
{{--    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>-->--}}

{{--    <!-- Library for adding dinamically elements -->--}}
{{--    <!--<script src="{{ asset('backend/js/plugins/arrive.min.js') }}"></script>-->--}}



    <!-- Chartist JS -->
    <script src="{{ asset('backend/js/plugins/chartist.min.js') }}"></script>

{{--    <!--  Notifications Plugin    -->--}}
{{--    <script src="{{ asset('backend/js/plugins/bootstrap-notify.js') }}"></script>--}}

    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('backend/js/material-dashboard.min.js?v=2.1.2') }}" type="text/javascript"></script
    
    


</body>
</html>
