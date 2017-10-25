<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Demo</title>
    <!-- StyleSheets -->
    <link href="{{asset('front/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/icomoon.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/animate.css')}}" rel="stylesheet">
    @if(LaravelLocalization::getCurrentLocale() == 'en')
    <link href="{{asset('front/style_en.css')}}" rel="stylesheet">
    @else
        <link href="{{asset('front/style_ar.css')}}" rel="stylesheet">
        <link href="{{asset('front/assets/css/rtl.css')}}" rel="stylesheet">

     @endif
    <link href="{{asset('front/assets/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/transition.css')}}" rel="stylesheet">
    <!-- FontsOnline -->
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link rel="icon" href="{{asset('front/assets/images/marker.png')}}">


    @yield('css')
    <!-- JavaScripts -->
    <script src="{{asset('front/assets/scripts/modernizr.js')}}"></script>
</head>

<body>
<!-- Start Section Loading -->
<div class="loading-overlay">
    <div class="spinner"></div>
</div>
<!-- End Section Loading -->
<!-- Wrapper -->
