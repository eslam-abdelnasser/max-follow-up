@extends('admin.layout')

@section('title', trans('admin/admins/permission.permission'))

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/admins/permission.permission'))


{{-- End Breadcums--}}


@section('content')
    <h4 class="page-title">{{trans('admin/admins/permission.permission')}}</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{trans('admin/admins/permission.permission_table')}} </div>

                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th class="hidden-xs">
                                    <i class="fa fa-user"></i> {{trans('admin/admins/role.name')}}
                                </th>
                                <th>{{trans('admin/admins/role.display_name')}}</th>
                                <th>{{trans('admin/admins/role.description')}}</th>
                                <th>{{trans('admin/admins/role.action')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($role->permissions as $permission)
                                <tr>
                                    <td class="highlight">
                                        {{$permission->name}}
                                    </td>

                                    <td class="highlight">
                                        {{$permission->display_name}}
                                    </td>
                                    <td class="highlight">
                                        {{$permission->description}}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['permission.destroyRelation',$role->id, $permission->id  ], 'method' => 'POST','style'=>'display: inline;']) !!}
                                        <button class="btn btn-outline btn-circle dark btn-sm black">
                                            <i class="fa fa-trash-o"></i> {{trans('admin/admins/role.delete')}} </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}