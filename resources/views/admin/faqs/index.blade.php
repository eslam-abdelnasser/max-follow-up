@extends('admin.layout')

@section('title', trans('admin/faq.faq'))

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/faq.faq'))


{{-- End Breadcums--}}



@section('content')
    <h4 class="page-title">{{trans('admin\faq.faqs')}}</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{trans('admin\faq.faq_table')}} </div>

                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th>{{trans('admin\faq.question')}}</th>

                                <th>{{trans('admin\faq.answer')}}</th>

                                <th>{{trans('admin\faq.language')}}</th>

                                <th>{{trans('admin\faq.action')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faqs as $faq)
                                <tr>
                                    <td class="highlight">
                                        {{$faq->question}}
                                    </td>

                                    <td class="highlight">
                                        {{$faq->answer}}
                                    </td>
                                    <td>
                                        {{$faq->language->name}}
                                    </td>
                                    <td>
                                        <a href="{{route ('faqs.edit',$faq->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> {{trans('admin\faq.edit')}} </a>

                                        {!! Form::open(['route' => ['faqs.destroy', $faq->id ], 'method' => 'DELETE','style'=>'display: inline;']) !!}
                                        <button class="btn btn-outline btn-circle dark btn-sm black">
                                            <i class="fa fa-trash-o"></i> {{trans('admin\faq.delete')}} </button>
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
            <div class="text-center">
                {!! $faqs->links() !!}
            </div>
            <div class="text-center">
                <strong>Page : {{ $faqs->currentPage() }} of {{ $faqs->lastPage() }}</strong>
            </div>
        </div>


@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}