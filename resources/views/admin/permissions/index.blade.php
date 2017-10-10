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
                        <i class="fa fa-bell-o"></i>{{trans('admin/admins/permission.permission_table')}}</div>

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
                            @foreach($permissions as $permission)
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
                                        <a href="{{route ('permission.edit',$permission->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> {{trans('admin/admins/role.edit')}} </a>
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

        <div class="text-center">
            {!! $permissions->links() !!}
        </div>
        <div class="text-center">
            <strong>Page : {{ $permissions->currentPage() }} of {{ $permissions->lastPage() }}</strong>
        </div>
    </div>
@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}