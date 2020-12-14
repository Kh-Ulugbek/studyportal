<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Панель Администратора - {{$company->name}}</title>
    <link rel="apple-touch-icon" href="{{asset('afiles')}}/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('afiles')}}/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/app-assets/css/pages/card-analytics.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('afiles')}}/assets/css/style.css">
    <!-- END: Custom CSS-->
    <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>

</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto ml-auto"><a class="navbar-brand" target="_blank" href="{{route('index')}}">
                    <div class="brand-logo">
                        <img class="logo" src="{{asset('images')}}/logo.png">
                    </div>
                    <!--<h2 class="brand-text mb-0">{{$company->name}}</h2>-->
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>

@yield('menu_content')
</div>
<!-- END: Main Menu-->

<div class="app-content content">
    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>

                        <ul class="nav navbar-nav">
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Найти..." tabindex="0" data-search="template-list" />
                                    <ul class="search-list"></ul>
                                </div>
                                <!-- select.bookmark-select-->
                                <!--   option Chat-->
                                <!--   option email-->
                                <!--   option todo-->
                                <!--   option Calendar-->

                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li title="Уведомления" class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                <i class="ficon feather icon-bell"></i>
                                <span id="alerts-total" class="badge badge-pill badge-primary badge-up">{{$new_subscribers+$new_callback+$new_messages}}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white"><span id="alerts-new">{{$new_subscribers+$new_callback+$new_messages}}</span> Новых</h3><span class="notification-title">Уведомлений</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list">
                                    <a class="d-flex justify-content-between" href="{{route('admin.callbacks.index')}}">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-phone-incoming font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="warning media-heading">Новые заявки на обратный звонок</h6>
                                                <small class="notification-text"></small>
                                            </div>
                                            <small class="badge badge-pill badge-primary badge-left">{{$new_callback}}</small>
                                        </div>
                                    </a>
                                    <a class="d-flex justify-content-between" href="{{route('admin.subscribe.index')}}">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-at-sign font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">Новые подписки</h6>
                                            </div>
                                            <small id="alerts-subscribe" class="badge badge-pill badge-primary badge-left">{{$new_subscribers}}</small>
                                        </div>
                                    </a>
                                    <a class="d-flex justify-content-between" href="{{route('admin.message.index')}}">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-message-circle font-medium-5 info"></i></div>
                                            <div class="media-body">
                                                <h6 class="info media-heading">Новые сообщения</h6>
                                                <small class="notification-text"></small>
                                            </div>
                                            <small class="badge badge-pill badge-primary badge-left">{{$new_messages}}</small>
                                        </div>
                                    </a>
                            </li>

                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{Auth::user()->name}}</span>
                                    @if (session('status'))
                                        <span class="user-status"> {{ session('status') }}</span>
                                    @endif

                                </div><span>
                                    <img class="round" src="{{route('get.avatar')}}" alt="avatar" height="40" width="40" />
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('admin.user.edit')}}"><i class="feather icon-user"></i> Редактировать профиль</a>

                                <div class="dropdown-divider"></div><a class="dropdown-item"  href="{{ route('logout') }}"
                                                                     onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();"><i class="feather icon-power"></i> Выйти</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>

</div>




<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">created by<a class="text-bold-800 grey darken-2" href="https://vendy.agency/" target="_blank"> Vendy agency</a></span>

        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('afiles')}}/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('afiles')}}/app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="{{asset('afiles')}}/app-assets/vendors/js/extensions/tether.min.js"></script>
<script src="{{asset('afiles')}}/app-assets/vendors/js/extensions/shepherd.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('afiles')}}/app-assets/js/core/app-menu.js"></script>
<script src="{{asset('afiles')}}/app-assets/js/core/app.js"></script>
<script src="{{asset('afiles')}}/app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('afiles')}}/app-assets/js/scripts/cards/card-statistics.js"></script>
<!-- END: Page JS-->

<script src="{{asset('afiles')}}/ascript.js"></script>
</body>
<!-- END: Body-->

</html>