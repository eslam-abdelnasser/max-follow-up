@extends('admin.layout')

@section('title', trans('admin/general.general_setting'))

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title', trans('admin/general.general_setting'))


{{-- End Breadcums--}}



@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{trans('admin/general.add_new')}} </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">

                        <div class="col-md-8 col-sm-8 col-xs-8  col-md-offset-2">
                            {{Form::open(['route' => ['admin.general.setting.update' ,$general->id] , 'method' => 'put']) }}
                            <div class="tab-content">

                                <div class="portlet-body form">

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>{{trans('admin/general.web_url')}}</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="site_url" value="{{ $general->site_url }}" id="site_url" class="form-control input-circle-right" placeholder="{{trans('admin/general.web_url')}}"> </div>
                                        </div>


                                        <div class="form-group">
                                            <label>{{trans('admin/general.email')}}</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="email" name="email" value="{{ $general->email }}" id="email" class="form-control input-circle-right" placeholder="{{trans('admin/general.email')}}"> </div>
                                        </div>


                                        <div class="form-group">
                                            <label>{{trans('admin/general.phone')}}</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="phone" value="{{ $general->phone }}" id="phone" class="form-control input-circle-right" placeholder="{{trans('admin/general.phone')}}"> </div>
                                        </div>

                                        <div class="form-group">
                                            <label>{{trans('admin/general.arabic_address')}}</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="address_ar" value="{{ $general->address_ar }}" id="phone" class="form-control input-circle-right" placeholder="{{trans('admin/general.arabic_address')}}"> </div>
                                        </div>

                                        <div class="form-group">
                                            <label>{{trans('admin/general.english_address')}}</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="address_en" value="{{ $general->address_en }}" id="phone" class="form-control input-circle-right" placeholder="{{trans('admin/general.english_address')}}"> </div>
                                        </div>


                                        <div class="form-group">
                                            <label>{{trans('admin/general.description')}}</label>
                                            <div class="input-icon right">
                                                <i class="fa fa-tasks  font-green"></i>
                                                <textarea name="site_description" id="site_description" cols="30" rows="10" placeholder="{{trans('admin/general.description')}}" class="form-control {{ $errors->has('site_description') ? ' has-error' : '' }}"> {{ $general->site_description }} </textarea>
                                            </div>
                                            @if ($errors->has('site_description'))
                                                <span class="help-block">
                                                            <strong>{{ $errors->first('site_description') }}</strong>
                                                          </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin/general.keywords')}}</label>
                                            <div class="input-icon right">
                                                <i class="fa fa-tasks   font-green"></i>
                                                <textarea name="site_keywords" id="site_keywords" cols="30" rows="10" placeholder="{{trans('admin/general.keywords')}}" class="form-control">{{ $general->site_keywords }}</textarea>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label>{{trans('admin/general.google_id')}}</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="google_analytics_id" value="{{ $general->google_analytics_id }}" id="phone" class="form-control input-circle-right" placeholder="{{trans('admin/general.google_id')}}"> </div>
                                        </div>

                                        <div class="form-group">
                                            <label>{{trans('admin/general.google_script')}}</label>
                                            <div class="input-icon right">
                                                <i class="fa fa-code  font-green"></i>
                                                <textarea name="google_analytics_script" id="google_analytics_script" cols="30" rows="10" placeholder="{{trans('admin/general.google_script')}}" class="form-control"> {{ $general->google_analytics_script }} </textarea>
                                            </div>
                                        </div>






                                    </div>
                                </div>
                            </div>


                            <div class="form-actions">
                                <button type="submit" class="btn blue">Submit</button>
                                <button type="button" class="btn default">Cancel</button>
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


@endsection

{{-- end javascript --}}