@extends('admin.layout')

@section('title', trans('admin/slider/index.slider'))

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />


@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/slider/index.slider'))

@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{trans('admin/slider/index.edit_slider')}}  </div>
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
                                        <a href="#{{$language->name}}" data-toggle="tab"> {{$language->name}} </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            {{Form::open(['route' => ['slider.update',$slider->id] , 'method' => 'put','files'=>true]) }}
                            <div class="tab-content">
                                @foreach($slider->description as $description)

                                    <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$description->language->name}}">
                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>{{$description->language->name}} {{trans('admin/slider/index.first_title')}}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="title_first_{{$description->language->label}}" value="{{$description->title_first}}" id="first_title_{{$description->language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/slider/index.first_title')}}"> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>{{$description->language->name}} {{trans('admin/slider/index.second_title')}}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="title_second_{{$description->language->label}}" value="{{$description->title_second}}" id="title_second_{{$description->language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/slider/index.second_title')}}"> </div>
                                                </div>


                                                <div class="form-group">
                                                    <label>{{$description->language->name}} {{trans('admin/slider/index.description')}}</label>
                                                    <div class="input-group">

                                                <textarea class="my-editor" name="description_{{$description->language->label}}" id="description_{{$description->language->label}}" placeholder="Description">
                                                     {{$description->description}}
                                                </textarea>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>

                            <div class="portlet light ">
                                <div class="form-group">
                                    <label>{{trans('admin/slider/index.slider_url')}}</label>
                                    <div class="input-group margin-top-10">
                                <span class="input-group-addon">
                                        <i class="fa fa-image"></i>
                                  </span>
                                        <input type="text" class="form-control" name="slider_url" value="{{$slider->slider_url}}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>{{trans('admin/slider/index.slider_status')}}</label>
                                    <div class="input-group margin-top-10">
                                        <select class="form-control input-medium" name="status">

                                            <option value="1" {{$slider->status == 1 ? 'selected' : ''}} >{{trans('admin/slider/index.enable')}}</option>
                                            <option value="0" {{$slider->status == 0 ? 'selected' : ''}} >{{trans('admin/slider/index.disable')}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">{{trans('admin/slider/index.upload_image')}}</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="{{asset('uploads/slider/'.$slider->slider_image)}}" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> {{trans('admin/slider/index.select_image')}} </span>
                                                                    <span class="fileinput-exists"> {{trans('admin/slider/index.change')}} </span>
                                                                    <input type="file" name="image_url"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{trans('admin/slider/index.remove')}} </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn blue">{{trans('admin/slider/index.submit')}}</button>
                                <button type="button" class="btn default">{{trans('admin/slider/index.cancel')}}</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}