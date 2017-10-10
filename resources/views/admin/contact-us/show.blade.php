@extends('admin.layout')

@section('title', trans('admin/appointment.contact-us'))

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

@section('home','dashboard')
@section('page_title',trans('admin/appointment.contact-us'))


@section('content')

    <div class="portlet green-meadow box">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>{{trans('admin/appointment.contact-us-details')}} </div>
        </div>
        <div class="portlet-body">
            <div class="row static-info">
                <div class="col-md-12 value"> {{trans('admin/appointment.name')}} : {{$message->name}}
                    <br>{{trans('admin/appointment.phone')}} :  {{$message->phone_number}}
                    <br>{{trans('admin/appointment.email')}} : {{$message->email}}<br>
                    <br> {{trans('admin/appointment.message')}}
                    <br> <p>{{$message->message}}</p>
                    <br> {{trans('admin/appointment.seen_by')}} :<span class="label label-sm label-success">{{$name}}</span>
                    <br>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}