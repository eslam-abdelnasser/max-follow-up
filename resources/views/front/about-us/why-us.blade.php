@extends('front.layout')

@section('title',trans('front.home'))



@section('content')


    <section class="school-area curve-down" style="margin-top: 115px;"> <span class="scho-service-icon style-2"><img src="{{asset('front/assets/images/school-services/img-1-1.png')}}" alt=""></span>
        <!-- Main Heading -->
        <div class="school-area-heading">
            <h3>We are KG Child Care We have been educating children for over fifteen years.<br> Our goal is to create a place that engages each child.</h3>
            <p>Welcome to KG daycare, preschool, and kindergarten How to Enroll Your Child to a Class?</p>
        </div>
        <!-- Main Heading -->
        <!-- School Services -->
        <div style="background: url(assets/images/parallax-1.png) 50% 0% no-repeat;">
            <div class="container">
                <div class="services-shadow radius-8 overflow-hidden">
                    <div class="row no-gutters">
                        <!-- School Services Figure -->
                        @php
                                $x = 1 ;
                        @endphp
                        @foreach($why as $singleWhy)
                        @foreach($singleWhy->description  as $description)
                            @if(LaravelLocalization::getCurrentLocale() == $description->language->label)
                        <div class="col-sm-4 col-xs-6 r-full-width">
                            <div class="scho-services-figure border-l-0"> <span class="scho-service-icon bg-{{$x}}"><img src="{{asset('uploads/why-us/'.$singleWhy->image_url)}}" alt=""></span>
                                <h4><a href="#">{{$description->title}}</a></h4>
                               <p> {!! strip_tags(str_limit(html_entity_decode($description->description))) !!} </p>
                            </div>
                        </div>
                            @endif
                        @endforeach
                            @php
                            $x++
                            @endphp
                        @endforeach
                        <!-- School Services Figure -->

                    </div>
                </div>
            </div>
        </div>
        <!-- School Services -->
        <!-- Nersery Statistics -->
        <div class="container">
            <div class="statistics">
                <h3 class="curve-heading">Nersery Statistics</h3>
                <div id="tc-counters" class="facts-lsit tc-padding-bottom has-layout">
                    <ul>
                        <li>
                            <h2 class="timer color-1" data-to="156" data-speed="3000">156</h2> <strong class="">Number of students</strong> </li>
                        <li>
                            <h2 class="timer color-2" data-to="24" data-speed="3000">24</h2>
                            <strong class="">Number of teachers</strong>
                        </li>
                        <li>
                            <h2 class="timer color-3" data-to="150" data-speed="3000">150</h2> <strong class="">Number of Classes</strong> </li>
                        <li> <span></span>
                            <h2 class="timer color-4" data-to="19" data-speed="3000">19</h2> <strong class="">Number of educational activities</strong> </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Nersery Statistics -->
        <!-- Kids Img -->
        <div class="container">
            <div class="kids-img has-layout">
                <ul>
                    @foreach($mainImages as $singleImage)
{{--                        <li><img src="{{asset('uploads/galleries/types/108x122/'.$singleImage->image_url)}}" alt=""></li>--}}
                        <li class="animate swing" data-wow-delay="0.2s"><img src="{{asset('uploads/galleries/types/108x122/'.$singleImage->image_url)}}" alt=""></li>
                    @endforeach

                </ul>
            </div>
        </div>
        <!-- Kids Img -->
    </section>

@endsection