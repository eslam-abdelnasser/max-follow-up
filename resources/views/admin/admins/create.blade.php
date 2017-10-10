@extends('admin.layout')

@section('title', trans('admin/admins/index.admins'))

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/admins/index.admins'))


{{-- End Breadcums--}}



@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> {{trans('admin/admins/create.add_admin')}}</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Actions
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-pencil"></i> Edit </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-trash-o"></i> Delete </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-ban"></i> Ban </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;"> Make admin </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body form">
                    {{Form::open(['route' => ['admins.store'] , 'method' => 'post']) }}
                    <div class="form-body">
                            <div class="form-group">
                                <label>{{trans('admin/admins/create.name')}}</label>
                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                    <input type="text" name="name" id="name" class="form-control input-circle-right" placeholder="{{trans('admin/admins/create.name')}}"> </div>
                            </div>
                            <div class="form-group">
                                <label>{{trans('admin/admins/create.email')}}</label>
                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                    <input type="text" name="email" id="email" class="form-control input-circle-right" placeholder="{{trans('admin/admins/create.email')}}"> </div>
                            </div>
                            <div class="form-group">
                                <label>{{trans('admin/admins/create.password')}}</label>
                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-lock"></i>
                                                        </span>
                                    <input type="password" name="password" id="password" class="form-control input-circle-right" placeholder="{{trans('admin/admins/create.password')}}"> </div>
                            </div>
                            <div class="form-group">
                                <label>{{trans('admin/admins/create.confirm_password')}}</label>
                                <div class="input-group">
                                                            <span class="input-group-addon input-circle-left">
                                                                <i class="fa fa-lock"></i>
                                                            </span>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-circle-right" placeholder="{{trans('admin/admins/create.confirm_password')}}"> </div>
                            </div>
                            <div class="form-group">
                                <label>{{trans('admin/admins/create.phone')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <input type="text" name="phone" id="phone" class="form-control input-circle-right" placeholder="{{trans('admin/admins/create.phone')}}"> </div>
                            </div>
                            <div class="form-group">
                                <label>{{trans('admin/admins/create.job_title')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-briefcase"></i>
                                    </span>
                                    <input type="text" name="job_title" id="job_title" class="form-control input-circle-right" placeholder="{{trans('admin/admins/create.job_title')}}"> </div>
                            </div>


                            </div>
                    <div class="form-actions">
                        <button type="submit" class="btn blue">{{trans('admin/admins/create.save')}}</button>
                        <button type="button" class="btn default">{{trans('admin/admins/create.cancel')}}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}