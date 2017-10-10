@extends('admin.layout')

@section('title', trans('admin/school.admission_roles'))

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/school.admission_roles'))


{{-- End Breadcums--}}



@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{trans('admin/school.edit_admission_role')}} </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <ul class="nav nav-tabs tabs-left">

                                <li class="active">
                                    <a href="#{{$admissionrole->language->name}}" data-toggle="tab"> {{trans('admin/services.'.$supervisor->language->name )}} </a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            {{Form::open(['route' => ['admission-roles.update',$admissionrole->id] , 'method' => 'put']) }}
                            <div class="tab-content">

                                <div class="tab-pane active" id="{{$admissionrole->language->name}}">
                                    <div class="portlet-body form">

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label> title {{trans('admin/services.'.$admissionrole->language->name )}}</label>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">

                                                        </span>
                                                    <input type="text" value="{{$admissionrole->title}}" name="title_{{$admissionrole->language->label}}" id="title_{{$admissionrole->language->label}}" class="form-control input-circle-right" placeholder="title"> </div>
                                            </div>
                                        </div>


                                        <div class="form-body">
                                            <div class="form-group">
                                                <label> Description {{trans('admin/services.'.$admissionrole->language->name )}}</label>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                        </span>
                                                    <textarea class="my-editor" value="{{$admissionrole->description}}" name="description_{{$admissionrole->language->label}}" id="description_{{$admissionrole->language->label}}" placeholder="">

                                                        </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn blue">{{trans('admin\faq.submit')}}</button>
                                <button type="button" class="btn default">{{trans('admin\faq.cancel')}}</button>
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