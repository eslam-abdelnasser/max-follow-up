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


{{-- End Breadcums--}}

@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{trans('admin/slider/index.add_new_slider')}} </div>
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
                            {{Form::open(['route' => ['slider.store'] , 'method' => 'post','files'=>true]) }}
                            <div class="tab-content">

                                @foreach($languages as $language)
                                    <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$language->name}}">
                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>{{$language->name}} {{trans('admin/slider/index.first_title')}}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="title_first_{{$language->label}}" value="{{old('title_first_'.$language->label)}}" id="title_first_{{$language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/slider/index.first_title')}}"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{$language->name}} {{trans('admin/slider/index.second_title')}}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="title_second_{{$language->label}}" value="{{old('title_second_'.$language->label)}}" id="title_second_{{$language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/slider/index.second_title')}}"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{$language->name}} {{trans('admin/slider/index.description')}}</label>
                                                    <div class="input-group">

                                                <textarea class="my-editor" name="description_{{$language->label}}" id="description_{{$language->label}}" placeholder="{{trans('admin/slider/index.description')}}">
                                                     {{old('description_'.$language->label)}}
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
                                        <input type="text" class="form-control" name="slider_url">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>{{trans('admin/slider/index.slider_status')}}</label>
                                    <div class="input-group margin-top-10">
                                        <select class="form-control input-medium" name="status">

                                            <option value="1" {{old('status') == 1 ? 'selected' : ''}} >{{trans('admin/slider/index.enable')}}</option>
                                            <option value="0" {{old('status') == 0 ? 'selected' : ''}} >{{trans('admin/slider/index.disable')}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">{{trans('admin/slider/index.upload_image')}}</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                            <span class="btn default btn-file">
                                            <span class="fileinput-new"> {{trans('admin/slider/index.select_image')}} </span>
                                            <span class="fileinput-exists"> {{trans('admin/slider/index.change')}} </span>
                                            <input type="file" name="slider_image"> </span>
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