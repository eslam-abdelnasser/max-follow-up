<!DOCTYPE html>
<html dir="{{LaravelLocalization::getCurrentLocaleDirection()}}" lang="{{LaravelLocalization::getCurrentLocale()}}">
<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Medikal - Health & Medical HTML Template" />
    <meta name="keywords" content=" clinic, dental, doctor, health, hospital, medical, medical theme, medicine, therapy" />
    <meta name="author" content="ThemeMascot" />

    <!-- Page Title -->
    <title>@yield('title')</title>

    <!-- Favicon and Touch Icons -->
    <link href="images/favicon.png" rel="shortcut icon" type="image/png">
    <link href="images/apple-touch-icon.png" rel="icon">
    <link href="images/apple-touch-icon-72x72.png" rel="icon" sizes="72x72">
    <link href="images/apple-touch-icon-114x114.png" rel="icon" sizes="114x114">
    <link href="images/apple-touch-icon-144x144.png" rel="icon" sizes="144x144">

    <!-- Stylesheet -->
{{--<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">--}}
{{Html::style('front/css/bootstrap.min.css')}}
<!-- CSS | Main style file -->
{{--<link href="css/style-main.css" rel="stylesheet" type="text/css">--}}
{{--{{Html::style('front/css/style-main.css')}}--}}
{{--<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">--}}
{{Html::style('front/css/jquery-ui.min.css')}}
{{--<link href="css/animate.css" rel="stylesheet" type="text/css">--}}
{{Html::style('front/css/animate.css')}}
{{--<link href="css/css-plugin-collections.css" rel="stylesheet"/>--}}
{{Html::style('front/css/css-plugin-collections.css')}}
<!-- CSS | menuzord megamenu skins -->
{{--<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>--}}
{{Html::style('front/css/menuzord-skins/menuzord-boxed.css')}}

<!-- CSS | Main style file -->
{{--<link href="css/style-main.css" rel="stylesheet" type="text/css">--}}

{{Html::style('front/css/style-main.css')}}

<!-- CSS | Preloader Styles -->
{{-- <link href="css/preloader.css" rel="stylesheet" type="text/css"> --}}
{{Html::style('front/css/preloader.css')}}
<!-- CSS | Custom Margin Padding Collection -->
{{--<link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">--}}
{{Html::style('front/css/custom-bootstrap-margin-padding.css')}}
<!-- CSS | Responsive media queries -->
{{--<link href="css/responsive.css" rel="stylesheet" type="text/css">--}}
{{Html::style('front/css/responsive.css')}}
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
@php $direction = LaravelLocalization::getCurrentLocaleDirection()   @endphp
@if($direction === 'rtl')
    {{Html::style('front/css/bootstrap-rtl.min.css')}}
    {{Html::style('front/css/style-main-rtl.css')}}
    {{Html::style('front/css/style-main-rtl-extra.css')}}
@endif
<!-- Revolution Slider 5.x CSS settings -->
{{--<link  href="js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>--}}
{{Html::style('front/js/revolution-slider/css/settings.css')}}
{{--<link  href="js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>--}}
{{Html::style('front/js/revolution-slider/css/layers.css')}}
{{--<link  href="js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>--}}
{{Html::style('front/js/revolution-slider/css/navigation.css')}}

<!-- CSS | Theme Color -->
{{--<link href="css/colors/theme-skin-blue.css" rel="stylesheet" type="text/css">--}}
{{Html::style('front/css/colors/theme-skin-yellow.css')}}

    @yield('css')
<!-- external javascripts -->

{{--<script src="js/jquery-2.2.4.min.js"></script>--}}
{{ Html::script('front/js/jquery-2.2.4.min.js')}}
{{--<script src="js/jquery-ui.min.js"></script>--}}
{{ Html::script('front/js/jquery-ui.min.js')}}
{{--<script src="js/bootstrap.min.js"></script>--}}
{{ Html::script('front/js/bootstrap.min.js')}}
<!-- JS | jquery plugin collection for this theme -->
{{--<script src="js/jquery-plugin-collection.js"></script>--}}
{{ Html::script('front/js/jquery-plugin-collection.js')}}

<!-- Revolution Slider 5.x SCRIPTS -->
    {{--<script src="js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>--}}
    {{ Html::script('front/js/revolution-slider/js/jquery.themepunch.tools.min.js')}}
    {{--<script src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>--}}
    {{ Html::script('front/js/revolution-slider/js/jquery.themepunch.revolution.min.js')}}
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body class="{{LaravelLocalization::getCurrentLocaleDirection()}} has-side-panel side-panel-right fullwidth-page side-push-panel">
<div class="body-overlay"></div>
<div id="side-panel" class="dark" data-bg-img="http://placehold.it/1920x1280">
    <div class="side-panel-wrap">
        <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="pe-7s-close font-36"></i></a></div>
        <a href="javascript:void(0)"><img alt="logo" src="{{asset('front/images/logo-wide.png')}}"></a>
        <div class="side-panel-nav mt-30">
            <div class="widget no-border">
                <nav>
                    <ul class="nav nav-list">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a class="tree-toggler nav-header">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="nav nav-list tree">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="side-panel-widget mt-30">
            <div class="widget no-border">
                <ul>
                    <li class="font-14 mb-5"> <i class="fa fa-phone text-theme-colored"></i> <a href="#" class="text-gray">123-456-789</a> </li>
                    <li class="font-14 mb-5"> <i class="fa fa-clock-o text-theme-colored"></i> Mon-Fri 8:00 to 2:00 </li>
                    <li class="font-14 mb-5"> <i class="fa fa-envelope-o text-theme-colored"></i> <a href="#" class="text-gray">contact@yourdomain.com</a> </li>
                </ul>
            </div>
            <div class="widget">
                <ul class="styled-icons icon-dark icon-theme-colored icon-sm">
                    @foreach($socials as $social)
                        <li><a href="{{$social->url}}"><i class="fa fa-{{$social->icon}}"></i></a> </li>
                    @endforeach
                </ul>
            </div>
            <p>Copyright &copy;2016 ThemeMascot</p>
        </div>
    </div>
</div>
<div id="wrapper" class="clearfix">
    <!-- preloader -->
    <div id="preloader">
        <div id="spinner">
            <img src="{{asset('front/images/preloaders/1.gif')}}" alt="">
        </div>
        <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
    </div>
