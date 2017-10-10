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
    <h4 class="page-title">{{trans('admin/admins/permission.role_permission')}}</h4>
<div class="row">
    {{Form::open(['route' => ['role_permission.store',$role_id] , 'method' => 'post']) }}
        <div class="form-group">
            <div class="col-md-12">
                @foreach($permissions as $permission)
                <div class="mt-checkbox-inline col-md-3" >


                    <label class="mt-checkbox">
                        <input type="checkbox" id={{$permission->id}} name="permissions[]" value="{{$permission->id}}"> {{$permission->display_name}}
                        <span></span>
                    </label>


                </div>
                @endforeach
                <div class="form-actions col-md-12">
                    <button type="submit" class="btn blue">{{trans('admin/admins/permission.save')}}</button>
                    <button type="button" class="btn default">{{trans('admin/admins/permission.cancel')}}</button>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}