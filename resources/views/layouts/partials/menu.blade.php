<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('home')}}"><span class="brand-logo">
                                <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                    <defs>
                                        <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                            <stop stop-color="#000000" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                        <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                    </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                            <g id="Group" transform="translate(400.000000, 178.000000)">
                                                <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                                <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg></span>
                        <h2 class="brand-text mb-0">Gcbuying</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item {{(\Route::currentRouteName() == 'home') ? 'active' : '' }}"><a class="nav-link d-flex align-items-center" href="{{route('home')}}"><i data-feather="home"></i><span data-i18n="Home">Home</span></a></li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i data-feather="refresh-ccw"></i><span data-i18n="History">History</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu="" class="{{(\Route::currentRouteName() == 'withdraws') ? 'active' : '' }}"><a class="dropdown-item d-flex align-items-center" href="{{route('withdraws')}}" data-toggle="dropdown" data-i18n="Layout Boxed"><i data-feather="send"></i><span data-i18n="Layout Boxed">Recent Withdraws</span></a>
                        </li>
                        <li data-menu="" class="{{(\Route::currentRouteName() == 'orders') ? 'active' : '' }}"><a class="dropdown-item d-flex align-items-center" href="{{route('orders')}}" data-toggle="dropdown" data-i18n="Without Menu"><i data-feather="list"></i><span data-i18n="Without Menu">Recent Trades</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{(\Route::currentRouteName() == 'wallet.index') ? 'active' : '' }}"><a class="nav-link d-flex align-items-center" href="{{route('wallet.index')}}"><i class="fab fa-bitcoin"></i><span data-i18n="BTC Wallet">BTC Wallet</span></a></li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i data-feather="gift"></i><span data-i18n="History">Giftcard</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu="" class="{{(\Route::currentRouteName() == 'sell.index') ? 'active' : '' }}"><a class="dropdown-item d-flex align-items-center" href="{{route('sell.index')}}" data-toggle="dropdown" data-i18n="Sell Gift Card"><i data-feather="send"></i><span data-i18n="Sell Gift Card">Sell</span></a>
                        </li>
                        <li data-menu="" class="{{(\Route::currentRouteName() == 'giftcard.index') ? 'active' : '' }}"><a class="dropdown-item d-flex align-items-center" href="{{route('giftcard.index')}}" data-toggle="dropdown" data-i18n="Buy Gift Card"><i data-feather="list"></i><span data-i18n="Buy Gift Card">Buy</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{(\Route::currentRouteName() == 'recharge.index') ? 'active' : '' }}"><a class="nav-link d-flex align-items-center" href="{{route('recharge.index')}}"><i class="fa fa-mobile"></i><span data-i18n="Mobile Recharge">Mobile Recharge</span></a></li>
                <li class="nav-item {{(\Route::currentRouteName() == 'sell.bitcoin') ? 'active' : '' }}"><a class="nav-link d-flex align-items-center" href="{{route('sell.bitcoin')}}"><i class="fab fa-bitcoin"></i><span data-i18n="Trade Bitcoin">Sell Bitcoin</span></a></li>
                <li class="nav-item {{(\Route::currentRouteName() == 'sell.usdt') ? 'active' : '' }}"><a class="nav-link d-flex align-items-center" href="{{route('sell.usdt')}}"><i class="fa fa-dollar-sign"></i><span data-i18n="Trade Bitcoin">Sell USDT</span></a></li>
                <li class="nav-item {{(\Route::currentRouteName() == 'withdraw') ? 'active' : '' }}"><a class="nav-link d-flex align-items-center" href="{{route('withdraw')}}"><i class="fa fa-dollar-sign"></i><span data-i18n="Withdraw Now">Withdraw Now</span></a></li>
                <li class="nav-item {{(\Route::currentRouteName() == 'bank') ? 'active' : '' }}"><a class="nav-link d-flex align-items-center" href="{{route('bank')}}"><i class="fas fa-university"></i><span data-i18n="Bank Account">Payment details</span></a></li>
                <li class="nav-item {{(\Route::currentRouteName() == 'card.rate') ? 'active' : '' }}"><a class="nav-link d-flex align-items-center" href="{{route('card.rate')}}"><i data-feather="credit-card"></i><span data-i18n="Card Rate">Card Rate</span></a></li>
                <li class="nav-item {{(\Route::currentRouteName() == 'chat.index') ? 'active' : '' }}"><a class="nav-link d-flex align-items-center" href="{{route('chat.index')}}"> <i data-feather="message-circle"></i>  <span data-i18n="Chat">Chat</span></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->
