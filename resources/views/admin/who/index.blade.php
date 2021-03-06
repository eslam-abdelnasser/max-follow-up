@extends('admin.layout')

@section('title', trans('admin/about/index.about_us'))

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />


@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/about/index.about_us'))


@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i> {{trans('admin/about/index.add_about_us')}}   </div>
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
                            {{Form::open(['route' => ['admin.who.update',$who->id] , 'method' => 'put','files'=>true]) }}
                            <div class="tab-content">

                                @foreach($who->description as $description)
                                    <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$description->language->name}}">
                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label> {{trans('admin/services.title')}} {{trans('admin/services.'.$description->language->name )}} </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="title_{{$description->language->label}}" value="{{$description->title}}" id="title_{{$description->language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/services.title')}} "> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label> {{trans('admin/services.description')}} {{trans('admin/services.'.$description->language->name )}} </label>
                                                    <div class="input-group">

                                                <textarea class="my-editor" name="description_{{$description->language->label}}" id="description_{{$description->language->label}}" placeholder="Description">
                                                     {{$description->description}}
                                                </textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label> {{trans('admin/services.meta_title')}} {{trans('admin/services.'.$description->language->name )}} </label>
                                                    <div class="input-group">
  <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="meta_title_{{$description->language->label}}" value="{{$description->meta_title}}" id="meta_title_{{$description->language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/services.meta_title')}}"> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label> {{trans('admin/services.meta_description')}} {{trans('admin/services.'.$description->language->name )}}</label>

                                                    <div class="input-group">
<span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="meta_description_{{$description->language->label}}" value="{{$description->meta_description}}" id="meta_description_{{$description->language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/services.meta_description')}}"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                    <div class="form-group">
                                        <label class="control-label col-md-3">{{trans('admin/services.upload_image')}}</label>
                                        <div class="col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    @if(isset($who->image_url))
                                                        <img src="{{asset('uploads/who/'.$who->image_url)}}" alt="" />
                                                     @else
                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                    @endif
                                                </div>
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
                                <button type="submit" class="btn blue">{{trans('admin/about/index.submit')}}  </button>
                                <button type="button" class="btn default">{{trans('admin/about/index.cancel')}}  </button>
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
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

    <script>
        @foreach($languages as $language)
          $("#title_{{$language->label}}").on('change', function (e) {

            $("#slug_{{$language->label}}").val($("#title_{{$language->label}}").val());
        });

        @endforeach
    </script>
@endsection

{{-- end javascript --}}