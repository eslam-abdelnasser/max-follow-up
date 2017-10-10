@extends('admin.layout')

@section('title', trans('admin/languages/index.language'))

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/languages/index.home'))
@section('page_title',trans('admin/languages/index.show_language'))


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_head',trans('admin/languages/index.languages'))

@section('page_description',trans('admin/languages/index.show_all_website_language'))

{{-- end page title --}}

@section('content')

    <div class="row match-heigh">
        <div class="col-md-12 col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-icons">{{trans('admin/languages/create.add_new_language')}}</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block">

                        <div class="card-text">
                            <p>{{trans('admin/languages/create.here_you_can_add')}} <code>{{trans('admin/languages/index.name')}}</code> , <code>{{trans('admin/languages/index.label')}}</code> {{trans('admin/languages/index.and')}}  <code>{{trans('admin/languages/index.status')}}</code>. </p>
                        </div>

                        {!! Form::open(['route'=>['languages.update',$language->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1">{{trans('admin/languages/create.the_language')}}</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{$language->name}}" class="form-control" placeholder="{{trans('admin/languages/create.the_language')}}" name="language_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput2">{{trans('admin/languages/create.language_label')}}</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput2" value="{{$language->label}}"  class="form-control" placeholder="{{trans('admin/languages/create.language_label')}}" name="language_label">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="issueinput5">{{trans('admin/languages/create.status')}}</label>
                                <select id="issueinput5" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority">
                                    @if($language->status == '1')
                                        <option value="1" selected>{{trans('admin/languages/create.active')}}</option>
                                        <option value="0">{{trans('admin/languages/create.inactive')}}</option>
                                    @else
                                        <option value="1">{{trans('admin/languages/create.active')}}</option>
                                        <option value="0" selected>{{trans('admin/languages/create.inactive')}}</option>
                                    @endif
                                </select>
                            </div>

                        </div>

                        <div class="form-actions right">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="icon-cross2"></i> {{trans('admin/languages/create.cancel')}}
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> {{trans('admin/languages/create.save')}}
                            </button>
                        </div>
                        {!! Form::close() !!}

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