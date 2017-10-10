@extends('admin.layout')

@section('title', 'Services')

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

@section('home','Home')
@section('page_title','Services')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_head','Services')

@section('page_description','All your website Services')

{{-- end page title --}}


@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Socials Table</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button id="sample_editable_1_new" onclick="location.href ='{{route('services.create')}}'" class="btn sbold green"> Add New
                                        <i class="fa fa-plus"></i>
                                    </button>


                                </div>

                                <button id="sample_editable_1_new" class="btn sbold red delete_all"> Delete
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                    {!! Form::open(['route' => ['socials.destroy.all'] , 'method' => 'delete', 'id'=>'form-delete']) !!}
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
                            <th class="text-center"> social name</th>
                            <th class="text-center"> social url</th>
                            <th class="text-center"> social icon</th>
                            <th class="text-center"> Status </th>
                            <th class="text-center"> Actions </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($socials as $social)
                        <tr class="odd gradeX">
                            <td>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" name="checkbox[]" class="checkboxes sub_chk" value="{{$social->id}}" data-id="{{$social->id}}" />
                                    <span></span>
                                </label>
                            </td>
                            <td>{{$loop->iteration}}</td>
                            <td class="text-center">


                                    <div><a href="#"> {{$social->name}} </a></div>


                            </td>
                            <td class="text-center vcenter">
                                <a href="{{$social->url}}" target="_blanks"> Link</a>

                            </td>
                            <td class="text-center vcenter">
                                <i class="fa fa-{{$social->icon}}"></i>
                            </td>
                            <td class="text-center">
                                <span class="label label-sm label-{{$social->status == 0 ? 'danger' : 'success'}}"> {{$social->status == 0 ? 'inactive' : 'active'}} </span>
                            </td>
                            <td class="text-center vcenter">
                               <a href="{{route('socials.edit',$social->id)}}" title="edit"><i class="fa fa-edit"></i></a>
                                {!! Form::open(['route' => ['socials.destroy',$social->id] , 'method' => 'delete','style'=>'display: inline','id'=>'Form'.$social->id]) !!}
                               <a href="javascript:{}" onclick='document.getElementById("Form{{$social->id}}" ).submit();' title="delete"><i class="fa fa-trash"></i></a>
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