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
    <h4 class="page-title">{{trans('admin/admins/index.admins')}}</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{trans('admin/admins/index.admin_table')}} </div>
                    <div class="tools">
                        <a href="{{route('admins.create')}}">
                            <button type="button" class="btn btn-primary">{{trans('admin/admins/index.add_admin')}}</button>

                        </a>
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th>

                                    </th>
                                    <th class="hidden-xs">
                                        <i class="fa fa-user"></i> {{trans('admin/admins/index.name')}}
                                    </th>
                                    <th>
                                        <i class="fa fa-briefcase"></i> {{trans('admin/admins/index.job_title')}}
                                    </th>
                                    <th>
                                        <i class="fa fa-phone"></i> {{trans('admin/admins/index.phone')}}
                                    </th>
                                    <th>
                                        <i class="fa fa-mail"></i> {{trans('admin/admins/index.mail')}}
                                    </th>
                                    <th>{{trans('admin/admins/index.social')}}</th>
                                    <th>{{trans('admin/admins/index.roles')}}</th>
                                    <th>{{trans('admin/admins/index.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td class="highlight">
                                        <div class="success"></div>

                                    </td>
                                    <td>
                                        <img src="{{$admin->image_url}}" alt="contact-img" title="contact-img" class="img-circle thumb-sm" />
                                    </td>
                                    <td >
                                        <a href="{{route('admins.show',$admin->id)}}"> {{$admin->name}}  </a>
                                    </td>
                                    <td>
                                        {{$admin->job_title}}
                                    </td>
                                    <td>
                                        {{$admin->phone}}
                                    </td>
                                    <td>
                                        {{$admin->email}}
                                    </td>
                                    <td>
                                        <a href="javascript:;" data-original-title="facebook" class="facebook"> </a>
                                        <a href="javascript:;" data-original-title="Goole Plus" class="googleplus"> </a>
                                        <a href="javascript:;" data-original-title="linkedin" class="linkedin"> </a>
                                        <a href="javascript:;" data-original-title="twitter" class="twitter"> </a>

                                    </td>

                                    <td class="text-center">
                                        <a href="{{route('admin.role',$admin->id)}}" title="{{trans('admin/admins/index.add_new_role')}}" class=><i class="fa fa-plus"></i></a>
                                        <a href="{{route('admin.view.role',$admin->id)}}" title="{{trans('admin/admins/index.view_role')}}" class=><i class="fa fa-list"></i></a>
                                    </td>

                                    <td>
                                        <a href="{{route ('admins.edit',$admin->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> {{trans('admin/admins/index.edit')}} </a>

                                        {!! Form::open(['route' => ['admins.destroy', $admin->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
                                        <button class="btn btn-outline btn-circle dark btn-sm black">
                                            <i class="fa fa-trash-o"></i> {{trans('admin/admins/index.delete')}} </button>
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
        <div class="text-center">
            {!! $admins->links() !!}
        </div>
        <div class="text-center">
            <strong>{{trans('admin/admins/index.page')}} : {{ $admins->currentPage() }} {{trans('admin/admins/index.of')}}{{ $admins->lastPage() }}</strong>
        </div>

    </div>
@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}