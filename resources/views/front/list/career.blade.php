@extends('front.layout')

@section('title',trans('front.careers'))




@section('css')
@endsection
@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x743">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28">{{trans('front.careers')}}</h3></h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">{{trans('front.home')}}</a></li>
                            <li><a href="{{route('careers')}}">{{trans('front.careers')}}</a></li>
                            <li class="active text-theme-colored">{{trans('front.careers')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container pb-0">
            <div class="row text-center">
                @foreach($careers as $career)
                    @foreach($career->description as $description)
                        @if(LaravelLocalization::getCurrentLocale() == $description->language->label)
                            <div class="col-sm-4">
                                <div class="icon-box iconbox-border iconbox-theme-colored p-40">
                                    <a href="#" class="icon icon-gray icon-bordered icon-border-effect effect-flat">
                                        <i class="pe-7s-users"></i>
                                    </a>
                                    <h5 class="icon-box-title">{{$description->titel}}</h5>
                                    <p class="text-gray">{!! strip_tags(str_limit(html_entity_decode($description->description,100))) !!}</p>
                                    <a class="btn btn-dark btn-sm mt-15" href="#">{{trans('front.apply_now')}}</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

@endsection


