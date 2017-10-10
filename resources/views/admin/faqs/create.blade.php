@extends('admin.layout')

@section('title', trans('admin/faq.faq'))

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/faq.faq'))


{{-- End Breadcums--}}


@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{trans('admin\faq.add_new')}} </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <ul class="nav nav-tabs tabs-left">


                                @foreach($languages as $language)
                                    <li class="{{$loop->iteration == 1 ? 'active' : ''}}">
                                        <a href="#{{$language->name}}" data-toggle="tab">  {{trans('admin/services.'.$language->name )}} </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            {{Form::open(['route' => ['faqs.store'] , 'method' => 'post']) }}
                            <div class="tab-content">

                                @foreach($languages as $language)
                                    <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$language->name}}">
                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label> {{trans('admin\faq.question')}} {{trans('admin/services.'.$language->name )}} </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">

                                                        </span>
                                                        <input type="text" name="question_{{$language->label}}" id="question_{{$language->label}}" class="form-control input-circle-right" placeholder=" {{trans('admin\faq.question')}} "> </div>
                                                </div>
                                            </div>


                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label> {{trans('admin\faq.answer')}}  {{trans('admin/services.'.$language->name )}} </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                        </span>
                                                        <textarea class="my-editor" name="answer_{{$language->label}}" id="answer_{{$language->label}}" placeholder="">

                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn blue">{{trans('admin\faq.submit')}} </button>
                                <button type="button" class="btn default">{{trans('admin\faq.cancel')}} </button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection

{{--<script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>--}}

{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}