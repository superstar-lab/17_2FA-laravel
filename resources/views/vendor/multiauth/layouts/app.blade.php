<!DOCTYPE html>
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

    <!--     Title and favicon     -->
    <title>{{ config('app.name', 'Laravel') }} {{ ucfirst(config('multiauth.prefix')) }}</title>

    <!-- Material Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/material-dashboard.css?v=2.1.2') }}">



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
                <a href="{{route('admin.home')}}" class="simple-text logo-normal">
                    GCBUYING
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('admin.home')}}">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.stats') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('admin.stats')}}">
                            <i class="material-icons">dashboard</i>
                            <p>Statistics</p>
                        </a>
                    </li>

                    @admin('moderator,admin2')
                    <!-- your sidebar here -->
                    <li class="nav-item {{(\Route::currentRouteName() == 'card-category.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('card-category.index')}}">
                            <i class="material-icons">redeem</i>
                            <p> Card Categories </p>
                        </a>
                    </li>

                    <li class="nav-item {{(\Route::currentRouteName() == 'cards.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('cards.index')}}">
                            <i class="material-icons">redeem</i>
                            <p> Cards </p>
                        </a>
                    </li>
                    @endadmin
                    @admin('super')
                    <li class="nav-item {{(\Route::currentRouteName() == 'selling-cards.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('selling-cards.index')}}">
                            <i class="material-icons">redeem</i>
                            <p> Cards for Sell </p>
                        </a>
                    </li>

                    @endadmin
                    @admin('super')
                    <li class="nav-item {{(\Route::currentRouteName() == 'operators.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('operators.index')}}">
                            <i class="material-icons">phone_iphone</i>
                            <p> Mobile Operators </p>
                        </a>
                    </li>
                    @endadmin

                    @admin('moderator')

                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.users.index' && !request()->has('sort')) && !request()->has('valuable') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('admin.users.index')}}">
                            <i class="material-icons">people</i>
                            <p> Users </p>
                        </a>
                    </li>

                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.users.index' && request()->has('valuable')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('admin.users.index',['valuable'=> 'true'])}}">
                            <i class="material-icons">people</i>
                            <p> Valuable Users </p>
                        </a>
                    </li>

                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.users.index' && request()->has('sort')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('admin.users.index',['sort'=> 'today'])}}">
                            <i class="material-icons">people</i>
                            <p>Today's Registered Users </p>
                        </a>
                    </li>

                    @endadmin

                    @admin('super')
                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.bitcoin.show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('admin.bitcoin.show')}}">
                            <i class="material-icons">monetization_on</i>
                            <p> Bitcoin Settings </p>
                        </a>
                    </li>
                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.usdt.show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('admin.usdt.show')}}">
                            <i class="material-icons">monetization_on</i>
                            <p> USDT Settings </p>
                        </a>
                    </li>
                    @endadmin

                    @admin('moderator,admin2')

                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.withdraws.index') ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#formsExamples1">
                            <i class="material-icons">content_paste</i>
                            <p> Withdraw Request
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples1">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.withdraws.index', 'all')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>All Withdraw Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.withdraws.index', 'Pending')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Pending Withdraw Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.withdraws.index', 'Processing')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Processing Withdraw Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.withdraws.index', 'Completed')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Completed Withdraw Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.withdraws.index', 'Cancelled')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Cancelled Withdraw Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.withdraws.index', 'Suspended')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Suspended Withdraw Request </p>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @endadmin
                    @admin('super')
                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.rechargeorders.index') ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#formsExamples6">
                            <i class="material-icons">content_paste</i>
                            <p> Recharge Request
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples6">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.rechargeorders.index', 'all')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>All Recharge Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.rechargeorders.index', 'Pending')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Pending Recharge Request </p>rechargeorders
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.rechargeorders.index', 'Processing')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Processing Recharge Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.rechargeorders.index', 'Completed')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Completed Recharge Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.rechargeorders.index', 'Cancelled')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Cancelled Recharge Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.rechargeorders.index', 'Suspended')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Suspended Recharge Request </p>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>



                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.cardorder.index') ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#formsExamples7">
                            <i class="material-icons">content_paste</i>
                            <p> Giftcard Request
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples7">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.cardorder.index', 'all')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>All Gift Card Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.cardorder.index', 'Pending')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Pending Gift Card Request </p>rechargeorders
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.cardorder.index', 'Processing')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Processing Gift Card Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.cardorder.index', 'Completed')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Completed Gift Card Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.cardorder.index', 'Cancelled')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Cancelled Gift Card Request </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.cardorder.index', 'Suspended')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Suspended Gift Card Request </p>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    @endadmin

                    @admin('moderator')

                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.orders.index') ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#formsExamples2">
                            <i class="material-icons">content_paste</i>
                            <p> Trade Request
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples2">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.orders.index', 'all')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>All Trade Orders </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.orders.index', 'Pending')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Pending Trade Orders </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.orders.index', 'Processing')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Processing Trade Orders </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.orders.index', 'Completed')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Completed Trade Orders </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.orders.index', 'Cancelled')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Cancelled Trade Orders </p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin.orders.index', 'Suspended')}}">
                                        <i class="material-icons">account_balance</i>
                                        <p>Suspended Trade Orders </p>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.btcsell') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('admin.btcsell')}}">
                            <i class="material-icons">monetization_on</i>
                            <p> BTC Sell History </p>
                        </a>
                    </li>
                    @endadmin
                    @admin('editor,admin2,seo')
                    <hr>
                    <li class="nav-item {{(\Route::currentRouteName() == 'blogs.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('blogs.index')}}">
                            <i class="material-icons">
                                local_post_office</i>
                            <p> Blogs </p>
                        </a>
                    </li>
                    @endadmin
                    @admin('editor')
                    <li class="nav-item {{(\Route::currentRouteName() == 'announcement.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('announcement.index')}}">
                            <i class="material-icons">announcement</i>
                            <p> Announcement </p>
                        </a>
                    </li>
                    <li class="nav-item {{(\Route::currentRouteName() == 'notification.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('notification.index')}}">
                            <i class="material-icons">announcement</i>
                            <p> App Notification </p>
                        </a>
                    </li>
                    @endadmin

                    @admin('editor,seo')
                    <li class="nav-item {{(\Route::currentRouteName() == 'terms.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('terms.index')}}">
                            <i class="material-icons">gavel</i>
                            <p> Terms and Conditions </p>
                        </a>
                    </li>
                    <li class="nav-item {{(\Route::currentRouteName() == 'testimonial.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('testimonial.index')}}">
                            <i class="material-icons">pages</i>
                            <p> Testimonials </p>
                        </a>
                    </li>
                    <li class="nav-item {{(\Route::currentRouteName() == 'faq.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('faq.index')}}">
                            <i class="material-icons">pages</i>
                            <p> Faqs </p>
                        </a>
                    </li>
                    <li class="nav-item {{(\Route::currentRouteName() == 'admin.settings') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('admin.settings')}}">
                            <i class="material-icons">pages</i>
                            <p> Homepage Settings </p>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{route('emailview.index')}}">
                            <i class="material-icons">pages</i>
                            <p> Send Emails </p>
                        </a>
                    </li>
                    <li class="nav-item {{(\Route::currentRouteName() == 'about.index' or \Route::currentRouteName() == 'trade.index') ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#formsExamples3">
                            <i class="material-icons">content_paste</i>
                            <p> Pages
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples3">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('about.index')}}">
                                        <i class="material-icons">pages</i>
                                        <p>About Page</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('trade.index')}}">
                                        <i class="material-icons">pages</i>
                                        <p>How to Trade Page</p>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>


                    @endadmin

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
                            @guest('admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.login')}}">{{ ucfirst(config('multiauth.prefix'))
                                }} Login</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ auth('admin')->user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="{{ route('admin.password.change') }}">Change Password</a>
                                        <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                              style="display: none;">
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

    <!-- Plugin for the Perfect Scrollbar -->
    <script src="{{ asset('backend/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

    <!-- Plugin for the momentJs  -->
    <script src="{{ asset('backend/js/plugins/moment.min.js') }}"></script>

    <!--  Plugin for Sweet Alert -->
    <script src="{{ asset('backend/js/plugins/sweetalert2.js') }}"></script>

    <!-- Forms Validations Plugin -->
    <script src="{{ asset('backend/js/plugins/jquery.validate.min.js') }}"></script>

    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{ asset('backend/js/plugins/jquery.bootstrap-wizard.js') }}"></script>

    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ asset('backend/js/plugins/bootstrap-selectpicker.js') }}" ></script>

    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{ asset('backend/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>



    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>





    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{ asset('backend/js/plugins/bootstrap-tagsinput.js') }}"></script>

    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset('backend/js/plugins/jasny-bootstrap.min.js') }}"></script>



    <!-- Library for adding dinamically elements -->
    <script src="{{ asset('backend/js/plugins/arrive.min.js') }}"></script>



    <!-- Chartist JS -->
    <script src="{{ asset('backend/js/plugins/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('backend/js/plugins/bootstrap-notify.js') }}"></script>

    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('backend/js/material-dashboard.min.js?v=2.1.2') }}" type="text/javascript"></script>



</body>

</html>
