@extends('front.layout')

@section('title',trans('front.activities'))




@section('css')
@endsection
@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x743">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28">{{trans('front.activities')}}</h3></h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">{{trans('front.home')}}</a></li>
                            <li><a href="{{route('activities')}}">{{trans('front.activities')}}</a></li>
                            <li class="active text-theme-colored">{{trans('front.activities')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach($activity->description as $description)
        @if($description->language->label == LaravelLocalization::getCurrentLocale())
            <section>
                <div class="container mt-30 mb-30 pt-30 pb-30">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="blog-posts single-post">
                                <article class="post clearfix mb-0">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb"> <img src="{{asset('uploads/activities/1920x1280/'.$activity->image_url)}}" alt="" class="img-responsive img-fullwidth"> </div>
                                    </div>
                                    <div class="entry-content">
                                        <div class="entry-meta media no-bg no-border mt-15 pb-20">
                                            <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">

                                                <ul>
                                                    <li class="font-16 text-white font-weight-600">{{ date('d' , strtotime($activity->created_at)) }}</li>
                                                    <li class="font-12 text-white text-uppercase">{{ date('F' , strtotime($activity->created_at)) }}</li>
                                                </ul>
                                            </div>
                                            <div class="media-body pl-15">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-white text-uppercase m-0"><a href="#">{{$description->title}}</a></h4>
                                                </div>
                                            </div>
                                        </div>


                                        {!! html_entity_decode($description->description) !!}
                                        {{--<p class="mb-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
                                        {{--<p class="mb-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
                                        {{--<blockquote class="theme-colored pt-20 pb-20">--}}
                                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>--}}
                                        {{--<footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>--}}
                                        {{--</blockquote>--}}
                                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>--}}

                                    </div>
                                </article>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach

@endsection


