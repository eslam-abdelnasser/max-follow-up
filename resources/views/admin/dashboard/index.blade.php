@extends('admin.layout')

@section('title', 'Dashboard')

    {{-- start css --}}
@section('css')

@endsection
    {{-- end css --}}

    {{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Dashboard')


  {{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_title','Dashboard')

@section('description','Statistics, chart , and all users activities on your website')

{{-- end page title --}}


@section('content')

    <div class="row">

        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="5">0</span>
                    </div>
                    <div class="desc"> {{trans('front.teachers')}} </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="{{route('contact-us.index')}}">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="5"></span> </div>
                    <div class="desc"> {{trans('front.message')}} </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="5">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="5">0</span>
                    </div>
                    <div class="desc"> {{trans('front.activities')}} </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="5">0</span> </div>
                    <div class="desc"> {{trans('front.news')}} </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 yellow" href="">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="5"></span> </div>
                    <div class="desc"> {{trans('front.admission_role')}} </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="5"></span> </div>
                    <div class="desc"> {{trans('front.laboratory')}} </div>
                </div>
            </a>
        </div>

    </div>


@endsection


{{-- Start javascript --}}
@section('js')

 @endsection

{{-- end javascript --}}