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

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bubble font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">{{trans('admin/languages/create.add_new_language')}}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    {!! Form::open(['route'=>['languages.store'],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-body">
                        <div class="form-group">
                            <label>{{trans('admin/languages/create.language')}}</label>
                            <input type="text" class="form-control" value="{{old('name')}}" placeholder="{{trans('admin/languages/create.the_language')}}" name="name">
                        </div>

                        <div class="form-group">
                            <label>{{trans('admin/languages/create.language_label')}}</label>
                            <div class="input-group margin-top-10">
                                <span class="input-group-addon">
                                        <i class="fa fa-language"></i>
                                  </span>
                                <input type="text" class="form-control" placeholder="{{trans('admin/languages/create.language_label')}}" value="{{old('label')}}" name="label">
                            </div>

                        </div>


                        <div class="form-group">
                            <label>{{trans('admin/languages/create.status')}}</label>
                            <select class="form-control input-medium" name="status">
                                <option disabled> </option>
                                <option value="0" {{old('status') == 0 ? 'selected' : ''}}>{{trans('admin/languages/create.active')}}</option>
                                <option value="1" {{old('status') == 1 ? 'selected' : ''}}>{{trans('admin/languages/create.inactive')}}</option>

                            </select>
                        </div>


                    </div>
                    <div class="form-actions right">
                        <button type="button" class="btn default">{{trans('admin/languages/create.cancel')}}</button>
                        <button type="submit" class="btn green">{{trans('admin/languages/create.save')}}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->


        </div>



    </div>

@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}