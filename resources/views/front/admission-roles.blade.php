@extends('front.layout')

@section('title',trans('front.admission_role'))




@section('css')
@endsection
@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x743">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-28">{{trans('front.admission_role')}}</h3></h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">{{trans('front.home')}}</a></li>
                            <li><a href="{{route('admission-roles')}}">{{trans('front.admission_role')}}</a></li>
                            <li class="active text-theme-colored">{{trans('front.admission_role')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="position-inherit">
        <div class="container">
            <div class="row">

                <div class="col-md-3 scrolltofixed-container">
                    <div class="list-group scrolltofixed z-index-0">
                        @foreach($roles as $role)
                            @if($role->language->label == LaravelLocalization::getCurrentLocale())
                                <a href="{{$role->id}}" class="list-group-item smooth-scroll-to-target">{{$role->title}}</a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="col-md-9">
                    @foreach($roles as $role)
                        @if($role->language->label == LaravelLocalization::getCurrentLocale())
                            <div id="{{$role->id}}" class="mb-50">
                                <h3>{{$role->title}}</h3>
                                <hr>
                                <p class="mb-20">{{$role->description}}</p>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </section>


@endsection


