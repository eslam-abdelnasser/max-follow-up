@extends('admin.layout')

@section('title', 'Services')

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Services')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_head','Services')

@section('page_description','Add Services that should be in your website')

{{-- end page title --}}


@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add Social </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">

                        <div class="col-md-8 col-sm-8 col-xs-8  col-md-offset-2">
                            {{Form::open(['route' => ['socials.update',$social->id] , 'method' => 'put']) }}
                            <div class="tab-content">

                                <div class="portlet-body form">

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>name</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="name" value="{{$social->name}}" id="site_url" class="form-control input-circle-right" placeholder="name"> </div>
                                        </div>


                                        <div class="form-group">
                                            <label>Url</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="url" value="{{$social->url}}" id="title" class="form-control input-circle-right" placeholder="Url"> </div>
                                        </div>


                                        <div class="form-group">
                                            <label>Icon</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                <input type="text" name="icon" value="{{$social->icon}}" id="title" class="form-control input-circle-right" placeholder="Icon"> </div>
                                        </div>



                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="input-group margin-top-10">
                                                <select class="form-control input-medium" name="status">

                                                    <option value="1" {{$social->status == 1 ? 'selected' : ''}} >Enable</option>
                                                    <option value="0" {{$social->status == 0 ? 'selected' : ''}} >Disable</option>
                                                </select>
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