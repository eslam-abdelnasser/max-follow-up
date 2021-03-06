@extends('front.layout')

@section('title',trans('front.services'))




@section('css')
@endsection
@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x743">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28">{{trans('front.services')}}</h3></h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">{{trans('front.home')}}</a></li>
                            <li><a href="{{route('services')}}">{{trans('front.services')}}</a></li>
                            <li class="active text-theme-colored">{{trans('front.services')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach($service->description as $description)
        @if($description->language->label == LaravelLocalization::getCurrentLocale())
            <section>
                <div class="container mt-30 mb-30 pt-30 pb-30">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="blog-posts single-post">
                                <article class="post clearfix mb-0">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb"> <img src="{{asset('uploads/services/1920x1280/'.$service->image_url)}}" alt="" class="img-responsive img-fullwidth"> </div>
                                    </div>
                                    <div class="entry-content">
                                        <div class="entry-meta media no-bg no-border mt-15 pb-20">
                                            <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                                <ul>
                                                    <li class="font-16 text-white font-weight-600">{{ date('d' , strtotime($service->created_at)) }}</li>
                                                    <li class="font-12 text-white text-uppercase">{{ date('F' , strtotime($service->created_at)) }}</li>
                                                </ul>
                                            </div>
                                            <div class="media-body pl-15">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-white text-uppercase m-0"><a href="#">{{$description->title}}</a></h4>
                                                </div>
                                            </div>
                                        </div>


                                        {!! html_entity_decode($description->description) !!}
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


