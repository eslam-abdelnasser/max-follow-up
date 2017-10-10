@extends('admin.layout')

@section('title',trans('admin/galleries.galleries'))

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/galleries.galleries'))


{{-- End Breadcums--}}



@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{trans('admin/galleries.add_new')}} </div>
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
                            {{Form::open(['route' => ['galleries.store'] , 'method' => 'post','files'=>true]) }}
                            <div class="tab-content">

                                @foreach($languages as $language)
                                    <div class="tab-pane {{$loop->iteration == 1 ? 'active' : ''}}" id="{{$language->name}}">
                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label> {{trans('admin/galleries.gallery_title')}} {{trans('admin/services.'.$language->name )}} </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="name_{{$language->label}}" value="{{old('name_'.$language->label)}}" id="name_{{$language->label}}" class="form-control input-circle-right" placeholder="{{trans('admin/galleries.gallery_title')}}"> </div>
                                                </div>






                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="portlet light ">


                                <div class="form-group">
                                    <label>{{trans('admin/services.service_home_page_status')}}</label>
                                    <div class="input-group margin-top-10">
                                        <select class="form-control input-medium" name="homepage_status">

                                            <option value="1" {{old('homepage_status') == 1 ? 'selected' : ''}} >{{trans('admin/services.display')}}</option>
                                            <option value="0" {{old('homepage_status') == 0 ? 'selected' : ''}}>{{trans('admin/services.not_display')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('admin/services.service_status')}}</label>
                                    <div class="input-group margin-top-10">
                                        <select class="form-control input-medium" name="status">

                                            <option value="1" {{old('status') == 1 ? 'selected' : ''}} >{{trans('admin/services.enable')}}</option>
                                            <option value="0" {{old('status') == 0 ? 'selected' : ''}} >{{trans('admin/services.disable')}}</option>
                                        </select>
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


@endsection

{{-- end javascript --}}