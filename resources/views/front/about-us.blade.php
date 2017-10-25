@extends('front.layout')

@section('title',trans('front.home'))



@section('content')
    <main id="main" class="about-bg" style="z-index: -1">

        <!-- About Holder -->
        <section class="about-holder tc-padding">
            <div class="container">
                <div class="about-content has-layout">

                    <!-- About Nersery -->
                    <div class="row">

                        <!-- About Img -->
                        <div class="col-sm-6">
                            <div class="about-img-2"><img src="{{asset('uploads/about-us/'.$about_us->image_url)}}" alt=""></div>
                        </div>
                        <!-- About Img -->

                        <!-- About Text -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="about-text style-2">
                                @foreach($about_us->description as $description)

                                    @if(LaravelLocalization::getCurrentLocale() == $description->language->label)
                                        <h5>{{$description->title}}</h5>
                                {{--<h3>Who We Are?</h3>--}}
                                {{--<h4>Steadfast vulgarly alas showed until caterpillar tiger did stopped alas visually aardvark dove dear this joyful egret inconsiderate crud.</h4>--}}
                                {{--<p>Until on ouch neat vindictively steadfast vulgarly alas showed until caterpillar tiger did stopped alas visually aardvark dove dear this joyful egret inconsiderate crud. Creepy one much mallard natural crucially dog tranquil meadowlark yikes that more across much.</p>--}}
                                {{--<p>Until on ouch neat vindictively steadfast vulgarly alas showed until caterpillar tiger did stopped alas visually aardvark dove dear this joyful egret.</p>--}}

                                                    {!! $description->description !!}
                                    @endif
                                @endforeach
                                <div class="kids-img has-layout">
                                    <ul>
                                        @foreach($mainImages as $singleImage)
                                        <li><img src="{{asset('uploads/galleries/types/108x122/'.$singleImage->image_url)}}" alt=""></li>
                                        @endforeach
                                        {{--<li><img src="assets/images/kids-imgs/img-02.png" alt=""></li>--}}
                                        {{--<li><img src="assets/images/kids-imgs/img-03.png" alt=""></li>--}}
                                        {{--<li><img src="assets/images/kids-imgs/img-04.png" alt=""></li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- About Text -->

                    </div>
                    <!-- Gallery Inner -->
                    <div class="gallery-inner">
                        <h3 class="text-center" style="margin: 100px 0 50px 0">Event Gallery</h3>
                        <div class="row">
                            <div class="col-sm-4 col-xs-6 r-full-width">
                                <figure class="gallery-figure">
                                    <img src="assets/images/gallery-inner/img-01.jpg" alt="">
                                    <figcaption class="overlay">
                                        <h4 class="position-center-center"><a href="#">School Kids Playing in Classroom</a></h4>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-sm-4 col-xs-6 r-full-width">
                                <figure class="gallery-figure">
                                    <img src="assets/images/gallery-inner/img-02.jpg" alt="">
                                    <figcaption class="overlay">
                                        <h4 class="position-center-center"><a href="#">School Kids Playing in Classroom</a></h4>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-sm-4 col-xs-6 r-full-width">
                                <figure class="gallery-figure">
                                    <img src="assets/images/gallery-inner/img-03.jpg" alt="">
                                    <figcaption class="overlay">
                                        <h4 class="position-center-center"><a href="#">School Kids Playing in Classroom</a></h4>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-sm-4 col-xs-6 r-full-width">
                                <figure class="gallery-figure">
                                    <img src="assets/images/gallery-inner/img-04.jpg" alt="">
                                    <figcaption class="overlay">
                                        <h4 class="position-center-center"><a href="#">School Kids Playing in Classroom</a></h4>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-sm-4 col-xs-6 r-full-width">
                                <figure class="gallery-figure">
                                    <img src="assets/images/gallery-inner/img-05.jpg" alt="">
                                    <figcaption class="overlay">
                                        <h4 class="position-center-center"><a href="#">School Kids Playing in Classroom</a></h4>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-sm-4 col-xs-6 r-full-width">
                                <figure class="gallery-figure">
                                    <img src="assets/images/gallery-inner/img-06.jpg" alt="">
                                    <figcaption class="overlay">
                                        <h4 class="position-center-center"><a href="#">School Kids Playing in Classroom</a></h4>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!-- Gallery Inner -->

                </div>

            </div>

        </section>
    </main>

@endsection



