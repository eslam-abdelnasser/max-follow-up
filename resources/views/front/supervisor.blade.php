@extends('front.layout')

@section('title',trans('front.supervisor'))




@section('css')
@endsection
@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x743">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28">{{trans('front.supervisor')}}</h3></h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">{{trans('front.home')}}</a></li>
                            <li><a href="{{route('supervisor')}}">{{trans('front.supervisor')}}</a></li>
                            <li class="active text-theme-colored">{{trans('front.supervisor')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="section-content">


                <div class="row">
                    <div class="col-md-12 text-center">
                        @foreach($supervisors as $description )
                            @if($description->language->label == LaravelLocalization::getCurrentLocale())
                                <h2 class="title font-42 text-theme-colored mt-30 mb-20">{{$description->title}}</h2>
                                <p class="mb-20">{!! html_entity_decode($description->description) !!}.</p>

                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection


