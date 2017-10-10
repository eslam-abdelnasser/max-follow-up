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
    <h4 class="page-title">{{trans('admin/admins/role.admin_role')}}</h4>

    {{Form::open(['route' => ['admin_role.store',$admin_id] , 'method' => 'post']) }}
    <div class="form-group">
        <div class="col-md-12">
            @foreach($roles as $role)
            <div class="mt-checkbox-inline col-md-3">


                    <label class="mt-checkbox">
                        <input type="checkbox" id={{$role->id}} name="roles[]" value="{{$role->id}}"> {{$role->display_name}}
                        <span></span>
                    </label>


            </div>
            @endforeach
            <div class="form-actions col-md-12">
                <button type="submit" class="btn blue">{{trans('admin/admins/role.save')}}</button>
                <button type="button" class="btn default">{{trans('admin/admins/role.cancel')}}</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}