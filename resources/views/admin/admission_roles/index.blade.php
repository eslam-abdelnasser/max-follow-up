@extends('admin.layout')

@section('title', trans('admin/school.admission_roles'))

{{-- start css --}}
@section('css')
    {{--<link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />--}}
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <style>
        table > tbody > tr > td{
            vertical-align: middle !important;
        }
    </style>
@endsection
{{-- end css --}}

{{-- Start Breadcums --}}
@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/school.admission_roles'))


{{-- End Breadcums--}}



@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> {{trans('admin/school.admission_role_table')}}</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button id="sample_editable_1_new" onclick="location.href ='{{route('admission-roles.create')}}'" class="btn sbold green"> {{trans('admin/school.add_new_admission_role')}}
                                        <i class="fa fa-plus"></i>
                                    </button>


                                </div>

                                <button id="sample_editable_1_new" class="btn sbold red delete_all"> {{trans('admin/services.delete')}}
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                    {!! Form::open(['route' => ['admission-roles.destroy.all'] , 'method' => 'delete', 'id'=>'form-delete']) !!}
                    <input type="hidden"  value="" name="items" id="items"/>
                    {!! Form::close() !!}
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                        <tr>
                            <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" />
                                    <span></span>
                                </label>
                            </th>
                            <th>#</th>
                            <th class="text-center"> {{trans('admin/school.title')}} </th>
                            <th class="text-center"> {{trans('admin/school.description')}} </th>

                                <th class="text-center"> {{trans('admin/services.action')}} </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($admissionroles as $admissionrole)
                            <tr class="odd gradeX">
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" name="checkbox[]" class="checkboxes sub_chk" value="{{$admissionrole->id}}" data-id="{{$admissionrole->id}}" />
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{$admissionrole->id}}</td>

                                <td class="text-center">
                                    {{$admissionrole->title}}
                                </td>
                                <td class="text-center">
                                    {{$admissionrole->description}}
                                </td>
                                <td class="text-center vcenter">
                                    <a href="{{route('admission-roles.edit',$admissionrole->id)}}" title="{{trans('admin/services.edit')}}"><i class="fa fa-edit"></i></a>
                                    {!! Form::open(['route' => ['admission-roles.destroy',$admissionrole->id] , 'method' => 'delete','style'=>'display: inline','id'=>'Form'.$admissionrole->id]) !!}
                                    <a href="javascript:{}" onclick='document.getElementById("Form{{$admissionrole->id}}" ).submit();' title="{{trans('admin/services.delete')}}"><i class="fa fa-trash"></i></a>
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

@endsection

{{--<script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>--}}

{{-- Start javascript --}}
@section('js')


    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{--<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>--}}
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    {{--<script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>--}}
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    {{--<script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>--}}
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{--<script src="../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>--}}
    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->


    <script type="text/javascript">

        $(document).ready(function () {

            $('.group-checkable').on('click', function (e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });

            /////


            $('.delete_all').on('click', function(e) {

                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if(allVals.length <=0)
                {
                    alert("Please select row.");
                }  else {

                    var check = confirm("Are you sure you want to delete those rows?");
                    if(check == true){
                        var join_selected_values = allVals.join(",");
//                        console.log(join_selected_values);
                        $('#items').val(join_selected_values);
                        $('#form-delete').submit();
                    }
                }
            });
///////////////////////////////////////////
        });

    </script>
@endsection

{{-- end javascript --}}