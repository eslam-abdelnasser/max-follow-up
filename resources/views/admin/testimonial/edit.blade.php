@extends('admin.layout')

@section('title', trans('admin/blog.blog'))

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/blog.blog'))


{{-- End Breadcums--}}



@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{trans('admin/blog.edit_blog')}} </div>
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
                            {{Form::open(['route' => ['testimonial.update',$testimonial->id] , 'method' => 'put','files'=>true]) }}
                            <div class="tab-content">
                                @foreach($testimonial->description as $description)

                                    <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$description->language->name}}">
                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>  {{trans('admin/blog.auther_name')}} {{trans('admin/services.'.$description->language->name )}}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="name_{{$description->language->label}}" value="{{$description->name}}" id="name_{{$description->language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/blog.auther_name')}}"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label> {{trans('admin/services.title')}} {{trans('admin/services.'.$description->language->name )}} </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="title_{{$description->language->label}}" value="{{$description->title}}" id="title_{{$description->language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/services.title')}}"> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label> {{trans('admin/services.description')}} {{trans('admin/services.'.$description->language->name )}} </label>
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
                                    <label>Testimonial Status</label>
                                    <div class="input-group margin-top-10">
                                        <select class="form-control input-medium" name="status">

                                            <option value="1" {{$testimonial->status == 1 ? 'selected' : ''}} >{{trans('admin/services.enable')}}</option>
                                            <option value="0" {{$testimonial->status == 0 ? 'selected' : ''}} >{{trans('admin/services.disable')}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">{{trans('admin/services.upload_image')}}</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="{{asset('uploads/testimonial/'.$testimonial->image_url)}}" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> {{trans('admin/services.select_image')}} </span>
                                                                    <span class="fileinput-exists"> {{trans('admin/services.change')}} </span>
                                                                    <input type="file" name="image_url"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{trans('admin/services.remove')}} </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn blue">{{trans('admin/services.submit')}}</button>
                                <button type="button" class="btn default">{{trans('admin/services.cancel')}}</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection


