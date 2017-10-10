@extends('front.layout')

@section('title',trans('front.home'))


@if(LaravelLocalization::getCurrentLocale() == 'ar')
    @php
        $direction = '-rtl';
    @endphp
@else
    @php
        $direction = '';
    @endphp

@endif
@section('css')
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/cubeportfolio/css/cubeportfolio.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/pages/css/portfolio'.$direction.'.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    {{-- Start slider--}}
    <section id="home" class="divider">
        <div class="container-fluid p-0">

            <!-- Slider Revolution Start -->
            <div class="rev_slider_wrapper">
                <div class="rev_slider" data-version="5.0">
                    <ul>
                    @if(isset($slider[0]))
                        @foreach($slider[0]->description as $singleSlider )
                            @if($singleSlider->language->label == LaravelLocalization::getCurrentLocale())
                                <!-- LAYER NR. 1 -->
                                    <!-- SLIDE 1 -->
                                    <li data-index="rs-1" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="http://placehold.it/1920x743"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('uploads/slider/1920x743/'.$slider[0]->slider_image)}}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                                        <!-- LAYERS -->

                                        <div class="tp-caption tp-resizeme text-uppercase text-white bg-dark-transparent-5 pl-30 pr-30"
                                             id="rs-1-layer-1"

                                             data-x="['center']"
                                             data-hoffset="['0']"
                                             data-y="['middle']"
                                             data-voffset="['-90']"
                                             data-fontsize="['28']"
                                             data-lineheight="['54']"
                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"
                                             data-transform_idle="o:1;s:500"
                                             data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                             data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                             data-start="1000"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-responsive_offset="on"
                                             style="z-index: 7; white-space: nowrap; font-weight:600; border-radius:45px;">{{$singleSlider->title_first}}
                                        </div>

                                        <!-- LAYER NR. 2 -->
                                        <div class="tp-caption tp-resizeme text-uppercase text-white bg-theme-colored-transparent pl-40 pr-40"
                                             id="rs-1-layer-2"

                                             data-x="['center']"
                                             data-hoffset="['0']"
                                             data-y="['middle']"
                                             data-voffset="['-20']"
                                             data-fontsize="['48']"
                                             data-lineheight="['70']"
                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"
                                             data-transform_idle="o:1;s:500"
                                             data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                             data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                             data-start="1000"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-responsive_offset="on"
                                             style="z-index: 7; white-space: nowrap; font-weight:600; border-radius:45px;">{{$singleSlider->title_second}}
                                        </div>

                                        <!-- LAYER NR. 3 -->
                                        <div class="tp-caption tp-resizeme text-center text-black"
                                             id="rs-1-layer-3"

                                             data-x="['center']"
                                             data-hoffset="['0']"
                                             data-y="['middle']"
                                             data-voffset="['50','60','70']"
                                             data-fontsize="['16','18','24']"
                                             data-lineheight="['28']"
                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"
                                             data-transform_idle="o:1;s:500"
                                             data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                             data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                             data-start="1400"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-responsive_offset="on"
                                             style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;">{!! $singleSlider->description !!}
                                        </div>

                                        <!-- LAYER NR. 4 -->
                                        <div class="tp-caption tp-resizeme"
                                             id="rs-1-layer-4"

                                             data-x="['center']"
                                             data-hoffset="['0']"
                                             data-y="['middle']"
                                             data-voffset="['135','145','155']"
                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"
                                             data-transform_idle="o:1;"
                                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                             data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                             data-start="1400"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-responsive_offset="on"
                                             style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a class="btn btn-colored btn-lg btn-theme-colored pl-20 pr-20" href="{{$slider[0]->slider_url}}">View Details</a>
                                        </div>
                                    </li>
                            @endif
                        @endforeach
                    @endif

                    @if(isset($slider[1]))
                        @foreach($slider[1]->description as $singleSlider )
                            @if($singleSlider->language->label == LaravelLocalization::getCurrentLocale())
                                <!-- SLIDE 2 -->
                                    <li data-index="rs-2" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="http://placehold.it/1920x743"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="http://placehold.it/1920x743"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                                        <!-- LAYERS -->

                                        <!-- LAYER NR. 1 -->
                                        <div class="tp-caption tp-resizeme text-uppercase text-white bg-dark-transparent-5 pl-15 pr-15"
                                             id="rs-2-layer-1"

                                             data-x="['left']"
                                             data-hoffset="['30']"
                                             data-y="['middle']"
                                             data-voffset="['-110']"
                                             data-fontsize="['30']"
                                             data-lineheight="['50']"

                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"
                                             data-transform_idle="o:1;s:500"
                                             data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                             data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                             data-start="1000"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-responsive_offset="on"
                                             style="z-index: 7; white-space: nowrap; font-weight:600;">{{$singleSlider->title_first}}
                                        </div>

                                        <!-- LAYER NR. 2 -->
                                        <div class="tp-caption tp-resizeme text-uppercase text-white bg-theme-colored-transparent pl-15 pr-15"
                                             id="rs-2-layer-2"

                                             data-x="['left']"
                                             data-hoffset="['30']"
                                             data-y="['middle']"
                                             data-voffset="['-45']"
                                             data-fontsize="['48']"
                                             data-lineheight="['70']"

                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"
                                             data-transform_idle="o:1;s:500"
                                             data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                             data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                             data-start="1000"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-responsive_offset="on"
                                             style="z-index: 7; white-space: nowrap; font-weight:600;">{{$singleSlider->title_second}}
                                        </div>

                                        <!-- LAYER NR. 3 -->
                                        <div class="tp-caption tp-resizeme text-black"
                                             id="rs-2-layer-3"

                                             data-x="['left']"
                                             data-hoffset="['35']"
                                             data-y="['middle']"
                                             data-voffset="['35','45','55']"
                                             data-fontsize="['16','18','24']"
                                             data-lineheight="['28']"
                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"
                                             data-transform_idle="o:1;s:500"
                                             data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                             data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                             data-start="1400"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-responsive_offset="on"
                                             style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;">{{$singleSlider->description}}
                                        </div>

                                        <!-- LAYER NR. 4 -->
                                        <div class="tp-caption tp-resizeme"
                                             id="rs-2-layer-4"

                                             data-x="['left']"
                                             data-hoffset="['35']"
                                             data-y="['middle']"
                                             data-voffset="['110','120','140']"
                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"
                                             data-transform_idle="o:1;"
                                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                             data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                             data-start="1400"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-responsive_offset="on"
                                             style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a class="btn btn-colored btn-lg btn-theme-colored pl-20 pr-20" href="{{$slider[1]->slider_url}}">View Details</a>
                                        </div>
                                    </li>
                            @endif
                        @endforeach
                    @endif

                    @if(isset($slider[2]))
                        @foreach($slider[2]->description as $singleSlider )
                            @if($singleSlider->language->label == LaravelLocalization::getCurrentLocale())
                                <!-- SLIDE 3 -->
                                    <li data-index="rs-3" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="http://placehold.it/1920x743"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="http://placehold.it/1920x743"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                                        <!-- LAYERS -->

                                        <!-- LAYER NR. 1 -->
                                        <div class="tp-caption tp-resizeme text-uppercase text-white bg-dark-transparent-5 pl-15 pr-15"
                                             id="rs-3-layer-1"

                                             data-x="['right']"
                                             data-hoffset="['30']"
                                             data-y="['middle']"
                                             data-voffset="['-110']"
                                             data-fontsize="['30']"
                                             data-lineheight="['50']"

                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"
                                             data-transform_idle="o:1;s:500"
                                             data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                             data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                             data-start="1000"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-responsive_offset="on"
                                             style="z-index: 7; white-space: nowrap; font-weight:600;">{{$singleSlider->title_first}}
                                        </div>

                                        <!-- LAYER NR. 2 -->
                                        <div class="tp-caption tp-resizeme text-uppercase text-white bg-theme-colored-transparent pl-15 pr-15"
                                             id="rs-3-layer-2"

                                             data-x="['right']"
                                             data-hoffset="['30']"
                                             data-y="['middle']"
                                             data-voffset="['-45']"
                                             data-fontsize="['48']"
                                             data-lineheight="['70']"

                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"
                                             data-transform_idle="o:1;s:500"
                                             data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                             data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                             data-start="1000"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-responsive_offset="on"
                                             style="z-index: 7; white-space: nowrap; font-weight:600;">{{$singleSlider->title_second}}
                                        </div>

                                        <!-- LAYER NR. 3 -->
                                        <div class="tp-caption tp-resizeme text-right text-black"
                                             id="rs-3-layer-3"

                                             data-x="['right']"
                                             data-hoffset="['35']"
                                             data-y="['middle']"
                                             data-voffset="['30','40','50']"
                                             data-fontsize="['16','18','24']"
                                             data-lineheight="['28']"
                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"
                                             data-transform_idle="o:1;s:500"
                                             data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                             data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                             data-start="1400"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-responsive_offset="on"
                                             style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;">{{$singleSlider->description}}
                                        </div>

                                        <!-- LAYER NR. 4 -->
                                        <div class="tp-caption tp-resizeme"
                                             id="rs-3-layer-4"

                                             data-x="['right']"
                                             data-hoffset="['35']"
                                             data-y="['middle']"
                                             data-voffset="['110','120','140']"
                                             data-width="none"
                                             data-height="none"
                                             data-whitespace="nowrap"
                                             data-transform_idle="o:1;"
                                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                             data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                             data-start="1400"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-responsive_offset="on"
                                             style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a class="btn btn-colored btn-lg btn-theme-colored pl-20 pr-20" href="{{$slider[2]->slider_url}}">View Details</a>
                                        </div>


                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div><!-- end .rev_slider -->
            </div>
            <!-- end .rev_slider_wrapper -->
            <script>
                $(document).ready(function(e) {
                    var revapi = $(".rev_slider").revolution({
                        sliderType:"standard",
                        sliderLayout: "auto",
                        dottedOverlay: "none",
                        delay: 5000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            arrows: {
                                style: "zeus",
                                enable: true,
                                hide_onmobile: true,
                                hide_under:600,
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 30,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 30,
                                    v_offset: 0
                                }
                            },
                            bullets: {
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 600,
                                style: "hebe",
                                hide_onleave: false,
                                direction: "horizontal",
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: 0,
                                v_offset: 30,
                                space: 5,
                                tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title"></span>'
                            }
                        },
                        responsiveLevels: [1240, 1024, 778],
                        visibilityLevels: [1240, 1024, 778],
                        gridwidth: [1170, 1024, 778, 480],
                        gridheight: [680, 500, 400, 400],
                        lazyType: "none",
                        parallax: {
                            origo: "slidercenter",
                            speed: 1000,
                            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
                            type: "scroll"
                        },
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "on",
                        stopAfterLoops: 0,
                        stopAtSlide: -1,
                        shuffle: "off",
                        autoHeight: "off",
                        fullScreenAutoWidth: "off",
                        fullScreenAlignForce: "off",
                        fullScreenOffsetContainer: "",
                        fullScreenOffset: "0",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                });
            </script>
            <!-- Slider Revolution Ends -->

        </div>
    </section>
    {{-- end slider--}}

    <section class="bg-theme-colored">
        <div class="container pt-0 pb-20">
            <div class="row">
                <div class="call-to-action pt-20 pb-20">
                    <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30">
                        <i class="fa fa-certificate text-white font-36 pull-left flip mt-15 mr-20"></i>
                        <h4 class="font-16 font-weight-600 text-white">Worldclass Service Provider</h4>
                        <h6 class="text-white">Your Trust is our achievement</h6>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30">
                        <i class="fa fa-map-marker text-white font-36 pull-left flip mt-15 mr-20"></i>
                        <h4 class="font-16 font-weight-600 text-white">You can Find Us Our Location</h4>
                        <h6 class="text-white">121 king street west toronto</h6>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <i class="fa fa-phone text-white font-36 pull-left flip mt-15 mr-20"></i>
                        <h4 class="font-16 font-weight-600 text-white">Contact Us : +262 695 2601</h4>
                        <h6 class="text-white">You Can Contact Us Anytime</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- start about us--}}

    <!-- Section: About -->
    <section>
        <div class="container">
            <div class="section-content">

                <div class="row">
                    <div class="col-md-12 text-center">
                        @foreach($about_us->description  as $description)
                            @if($description->language->label == LaravelLocalization::getCurrentLocale())
                                <h2 class="title font-42 text-theme-colored mt-30 mb-20">{{$description->title}}</h2>
                                {!! str_limit(html_entity_decode($description->description),200) !!}
                                <a class="btn btn-colored btn-theme-colored btn-lg text-uppercase font-13 mt-30" href="{{route('about-us')}}">{{trans('front.read_more')}}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- end about us--}}


    {{-- start services --}}

    <!-- Section: Services -->
    <section class=" bg-lighter">
        <div class="container pb-20">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-uppercase mt-0 line-height-1">{{trans('front.services')}}</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="images/title-icon.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    @foreach($services as $service)
                        @foreach($service->description as $description)
                            @if($description->language->label == LaravelLocalization::getCurrentLocale())
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="icon-box left media p-0"> <a href="{{route('services.details',$description->slug)}}" class="media-left pull-left"><i class="{{$service->icon}} text-theme-colored"></i></a>
                                        <div class="media-body">
                                            <h5 class="media-heading heading"><a href="{{route('services.details',$description->slug)}}">{{$description->title}}</a></h5>
                                            {!! str_limit(html_entity_decode($description->description),100) !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    {{-- end services--}}


    {{-- Our teachers--}}
    <!-- Section: Teachers -->
    <section id="doctors">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-uppercase mt-0 line-height-1">{{trans('front.teachers')}}</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="images/title-icon.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mtli-row-clearfix">
                <div class="col-md-12">
                    <div class="owl-carousel-4col">
                        @foreach($teachers as $teacher)
                            @foreach($teacher->description as $description)
                                @if($description->language->label == LaravelLocalization::getCurrentLocale())
                                    <div class="item">
                                        <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                            <div class="team-thumb">
                                                <img class="img-fullwidth" alt="" src="{{asset('uploads/teachers/275x370/'.$teacher->image_url)}}">
                                                <div class="team-overlay"></div>
                                            </div>
                                            <div class="team-details bg-silver-light pt-10 pb-10">
                                                <h4 class="text-uppercase font-weight-600 m-5">{{$description->name}}</h4>
                                                <h6 class="text-theme-colored font-15 font-weight-400 mt-0">{{$description->job_title}}</h6>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Our doctors--}}






    {{-- gallery --}}
    <div class="container">
        <div class="section-content">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-uppercase mt-0 line-height-1">{{trans('front.gallery')}}</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="images/title-icon.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="portfolio-content portfolio-1">
                    <div id="js-filters-juicy-projects" class="cbp-l-filters-button">
                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item btn dark btn-outline uppercase"> All
                            <div class="cbp-filter-counter"></div>
                        </div>
                        @foreach($galleries as $gallery)
                            @foreach($gallery->description as $description)
                                @if($description->language->label == LaravelLocalization::getCurrentLocale())
                                    <div data-filter=".gallery{{$gallery->id}}" class="cbp-filter-item btn dark btn-outline uppercase"> {{$description->title}}
                                        <div class="cbp-filter-counter"></div>
                                    </div>

                                @endif
                            @endforeach
                        @endforeach

                    </div>
                    <div id="js-grid-juicy-projects" class="cbp">
                        @foreach($galleries as $gallery)
                            @foreach($gallery->media->take(8) as $media)
                                <div class="cbp-item gallery{{$gallery->id}}">
                                    <div class="cbp-caption">
                                        <div class="cbp-caption-defaultWrap">

                                            @if($media->type == '1')
                                                <img src="{{asset('uploads/galleries/admin/1.png')}}" alt="">
                                            @else
                                                <img src="{{asset('uploads/galleries/admin/600x600/'.$media->image_url)}}" alt="">
                                            @endif

                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    @if($media->type == '1')
                                                        <a href="https://www.youtube.com/watch?v={{$media->video_url}}" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">{{trans('admin/galleries.view_larger')}}</a>
                                                    @else
                                                        <a href="{{asset('uploads/galleries/admin/1200x900/'.$media->image_url)}}" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">{{trans('admin/galleries.view_larger')}}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        @endforeach
                    </div>

                </div>



            </div></div></div>
    {{-- gallery --}}


    {{-- start blog --}}

    <!-- Section: blog -->
    <section id="blog" class="">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-uppercase mt-0 line-height-1">{{trans('front.blog')}}</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="images/title-icon.png" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel-3col">
                            @foreach($blog as $singleBlog)
                                @foreach($singleBlog->description as $description)
                                    @if($description->language->label == LaravelLocalization::getCurrentLocale())
                                        <div class="item">
                                            <article class="post clearfix bg-white">
                                                <div class="entry-header">
                                                    <div class="post-thumb thumb">
                                                        <img src="{{asset('uploads/blogs/540x370/'.$singleBlog->image_url)}}" alt="" class="img-responsive img-fullwidth">
                                                    </div>
                                                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                                        <ul>
                                                            <li class="font-16 text-white font-weight-600">{{ date('d' , strtotime($singleBlog->created_at)) }}</li>
                                                            <li class="font-12 text-white text-uppercase">{{ date('F' , strtotime($singleBlog->created_at)) }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="entry-content p-15 pt-10 pb-10">
                                                    <div class="entry-meta media no-bg no-border mt-0 mb-10">
                                                        <div class="media-body pl-0">
                                                            <div class="event-content pull-left flip">
                                                                <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="{{route('blog.details',$singleBlog->id)}}">{{$description->title}}</a></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mt-5">{!!  str_limit(strip_tags(html_entity_decode($description->description)),100)!!} <a class="text-theme-color-2 font-12 ml-5" href="{{route('blog.details',$singleBlog->id)}}"> View Details</a></p>
                                                </div>
                                            </article>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- start blog --}}



@endsection

@section('js')
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js')}}" type="text/javascript"></script>

    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{--<script src="../assets/pages/scripts/portfolio-1.min.js" type="text/javascript"></script>--}}
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/pages/scripts/portfolio-1.min.js')}}" type="text/javascript"></script>

@endsection

