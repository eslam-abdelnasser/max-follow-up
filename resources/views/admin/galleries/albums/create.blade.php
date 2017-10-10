@extends('admin.layout')

@section('title',trans('admin/galleries.galleries'))

{{-- start css --}}
@section('css')

    @if(LaravelLocalization::getCurrentLocale() == 'ar')
        @php
            $direction = '-rtl';
        @endphp
    @else
        @php
            $direction = '';
        @endphp

    @endif

    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    {{--<link href="admin-panel/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />--}}
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/dropzone/basic.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{--<link href="../assets/global/plugins/bootstrap-toastr/toastr-rtl.min.css" rel="stylesheet" type="text/css" />--}}
    <link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-toastr/toastr'.$direction.'.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/galleries.galleries'))



@section('content')
<div class="row">


    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="m-heading-1 border-green m-bordered">
                <h3>{{trans('admin/galleries.upload_image')}}</h3>
                </p>
                <p>
                    <span class="label label-danger">{{trans('admin/galleries.note')}}</span> &nbsp; {{trans('admin/galleries.message')}} </p>

            </div>
            <div class="portlet-body form">
                {!! Form::open([ 'route'=>['Album.store',$gallery_id] , 'method'=>'POST' , 'id'=>'add_files' , 'class'=>'dropzone dropzone-file-area' , 'files'=>true]) !!}
                <h3 class="sbold">{{trans('admin/galleries.drop')}}</h3>
                <input type="hidden" name="gallery_id" value="{{ $gallery_id}}">

                {!! Form::close() !!}
                <br>
                <div class="col-md-5  col-md-offset-5">
                    <button class="btn blue" id="act-on-upload">{{trans('admin/galleries.upload_image')}}</button>
                </div>

            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="m-heading-1 border-green m-bordered">
                <h3>{{trans('admin/galleries.video_link')}}</h3>
                </p>
                <p>
                    <span class="label label-danger">{{trans('admin/galleries.note')}}</span> &nbsp;{{trans('admin/galleries.message')}} </p>

            </div>
            <div class="portlet-body form">
                {!! Form::open([ 'route'=>['Album.store',$gallery_id] , 'method'=>'POST' , 'id'=>'video_form' ]) !!}
                <div class="form-body">
                    <div class="form-group">
                        <label>{{trans('admin/galleries.video_link')}}</label>
                        <div class="input-group">
                            <span class="input-group-addon input-circle-left">
                                <i class="fa fa-align-justify"></i>
                              </span>
                            <input type="text" name="video_url" value="{{old('video_url')}}" id="video_url" class="form-control input-circle-right" placeholder="{{trans('admin/galleries.video_url')}}"> </div>
                    </div>
                    <input type="hidden" name="gallery_id" value="{{ $gallery_id }}">
                    <button class="btn blue"> {{trans('admin/services.submit')}} </button>

                </div>

                {!! Form::close() !!}



            </div>
        </div>
    </div>



    {{--<input type="hidden" id="go_back" value="{{ route('admin.media') }}">--}}

</div>




@endsection


{{-- Start javascript --}}
@section('js')
{{--    <script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>--}}
    {{ Html::script('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/dropzone/dropzone.min.js')}}

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-toastr/toastr.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{--<script src="../assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>--}}
<script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/pages/scripts/ui-toastr.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>

    Dropzone.options.addFiles = {
        maxFileSize : 8,
        parallelUploads : 10,
        uploadMultiple: true,
        autoProcessQueue : false,
        addRemoveLinks : true,
        init: function() {
            var submitButton = document.querySelector("#act-on-upload")
            myDropzone = this;
            submitButton.addEventListener("click", function() {
                myDropzone.processQueue();
            });

            myDropzone.on("complete", function(file) {
                toastr.success('Have fun storming the castle!', 'Miracle Max Says')
            });


        },
    };


    $(function(){

        $('#video_form').on('submit',function(e){
//            $.ajaxSetup({
//                header:$('meta[name="_token"]').attr('content')
//            })
            e.preventDefault(e);

            $.ajax({

                type:"POST",
                url: $(this).attr('action'),
                data:$(this).serialize(),
                dataType: 'json',
                success: function(data){
                    if(data.success)
                        toastr.success('Have fun storming the castle!', 'Miracle Max Says')


                },
                error: function(data){

                }
            })
        });
    });
</script>
@endsection

{{-- end javascript --}}