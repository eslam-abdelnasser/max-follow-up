@extends('admin.layout')

@section('title',trans('admin/galleries.galleries'))

{{-- start css --}}
@section('css')


    @if(LaravelLocalization::getCurrentLocale() == 'ar')
        @php
            $direction = '-rtl';
        @endphp
    @else
        @php
            $direction = '';
        @endphp

    @endif


    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{--<link href="../assets/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />--}}
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/cubeportfolio/css/cubeportfolio.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/pages/css/portfolio'.$direction.'.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <style>
        table > tbody > tr > td{
            vertical-align: middle !important;
        }
    </style>
@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/galleries.galleries'))




@section('content')

    <!-- END PAGE HEADER-->
    <div class="portfolio-content portfolio-1">
        <div id="js-filters-juicy-projects" class="cbp-l-filters-button" style="display: none">
            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item btn dark btn-outline uppercase"> {{trans('admin/galleries.all')}}
                <div class="cbp-filter-counter"></div>
            </div>
            <div data-filter=".accreditation" class="cbp-filter-item btn dark btn-outline uppercase"> Accreditation
                <div class="cbp-filter-counter"></div>
            </div>
            <div data-filter=".small-images" class="cbp-filter-item btn dark btn-outline uppercase"> Small images
                <div class="cbp-filter-counter"></div>
            </div>

        </div>
        <div id="js-grid-juicy-projects" class="cbp">
            @foreach($images as $gallery)
                <div class="cbp-item">
                    <div class="cbp-caption">
                        <div class="cbp-caption-defaultWrap">

                            <img src="{{asset('uploads/education-level/'.$gallery->image_url)}}" alt="">

                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignCenter">
                                <div class="cbp-l-caption-body">
                                    <a href="{{route('education.level.images.delete',$gallery->id)}}" class="btn red uppercase btn red uppercase" rel="nofollow">{{trans('admin/services.delete')}}</a>

                                    <a href="{{asset('uploads/education-level/'.$gallery->image_url)}}" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">{{trans('admin/galleries.view_larger')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>


@endsection

{{--<script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>--}}

{{-- Start javascript --}}
@section('js')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{--<script src="../assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>--}}
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js')}}" type="text/javascript"></script>

    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{--<script src="../assets/pages/scripts/portfolio-1.min.js" type="text/javascript"></script>--}}
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/pages/scripts/portfolio-1.min.js')}}" type="text/javascript"></script>

    <!-- END PAGE LEVEL SCRIPTS -->

    <script type="text/javascript">


@endsection

{{-- end javascript --}}