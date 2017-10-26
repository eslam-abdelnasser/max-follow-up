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
                        <i class="fa fa-gift"></i>{{trans('admin/blog.add_new')}} </div>
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
                            {{Form::open(['route' => ['teaching-stuff.store'] , 'method' => 'post','files'=>true]) }}
                            <div class="tab-content">

                                @foreach($languages as $language)
                                    <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$language->name}}">
                                        <div class="portlet-body form">


                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>  {{trans('admin/blog.auther_name')}} {{trans('admin/services.'.$language->name )}} </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="teacher_name_{{$language->label}}" value="{{old('teacher_name_'.$language->label)}}" id="teacher_name_{{$language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/blog.auther_name')}}">
                                                    </div>
                                                </div>

                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label> {{trans('admin/services.title')}} {{trans('admin/services.'.$language->name )}} </label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                            <input type="text" name="job_title_{{$language->label}}" value="{{old('job_title_'.$language->label)}}" id="job_title_{{$language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/services.title')}} "> </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label> {{trans('admin/services.description')}} {{trans('admin/services.'.$language->name )}} </label>
                                                        <div class="input-group">

                                                <textarea class="my-editor" name="description_{{$language->label}}" id="description_{{$language->label}}" placeholder="Description">
                                                     {{old('description_'.$language->label)}}
                                                </textarea>
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label> Degree {{trans('admin/services.'.$language->name )}} </label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                            <input type="text" name="degree_{{$language->label}}" value="{{old('degree_'.$language->label)}}" id="degree_{{$language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/services.slug')}} "> </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label> University {{trans('admin/services.'.$language->name )}} </label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                            <input type="text" name="university_{{$language->label}}" value="{{old('university_'.$language->label)}}" id="university_{{$language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/services.slug')}} "> </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label> Work as  {{trans('admin/services.'.$language->name )}} </label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                            <input type="text" name="work_as_{{$language->label}}" value="{{old('work_as_'.$language->label)}}" id="work_as_{{$language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/services.slug')}} "> </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label> Email Address </label>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-align-justify"></i>
                                    </span>
                                    <input type="email" name="email" value="{{old('email')}}" id="email" class="form-control input-circle-right" placeholder="Email address"> </div>
                            </div>


                            <div class="form-group">
                                <label> years of exerience  {{trans('admin/services.'.$language->name )}} </label>
                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                    <input type="number" name="years" value="{{old('years')}}" id="years" class="form-control input-circle-right" placeholder="{{trans('admin/services.slug')}} "> </div>
                            </div>

                            <div class="form-group">
                                <label> Facebook LInk </label>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-align-justify"></i>
                                    </span>
                                 <input type="text" name="facebook_url" value="{{old('facebook_url')}}" id="facebook_url" class="form-control input-circle-right" placeholder="Facebook Link"> </div>
                            </div>
                            <div class="form-group">
                                <label> Tweeter LInk </label>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-align-justify"></i>
                                    </span>
                                    <input type="text" name="tweeter_url" value="{{old('tweeter_url')}}" id="tweeter_url" class="form-control input-circle-right" placeholder="Tweeter Link"> </div>
                            </div>

                            <div class="form-group">
                                <label> Google plus LInk </label>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-align-justify"></i>
                                    </span>
                                    <input type="text" name="google_url" value="{{old('google_url')}}" id="tweeter_url" class="form-control input-circle-right" placeholder="Google plus Link"> </div>
                            </div>
                            <div class="portlet light ">


                                <div class="form-group">
                                    <label>{{trans('admin/services.service_status')}}</label>
                                    <div class="input-group margin-top-10">
                                        <select class="form-control input-medium" name="status">

                                            <option value="1" {{old('status') == 1 ? 'selected' : ''}} >{{trans('admin/services.enable')}}</option>
                                            <option value="0" {{old('status') == 0 ? 'selected' : ''}} >{{trans('admin/services.disable')}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">{{trans('admin/services.upload_image')}}</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
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