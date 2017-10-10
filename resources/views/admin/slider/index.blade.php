@extends('admin.layout')

@section('title', trans('admin/slider/index.slider'))

{{-- start css --}}
@section('css')
	<style>
		.has-error{
			border: 2px solid red;
		}

		.help-block{
			color:red;
		}
	</style>


@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('admin/admins/index.home'))
@section('page_title',trans('admin/slider/index.slider'))


{{-- End Breadcums--}}



@section('content')


	<div class="row">
		<div class="col-md-12">
			<div class="portlet light portlet-fit bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class=" icon-layers font-green"></i>
						<button class="btn sbold green" onclick="javascript:location.href= '{{route('slider.create')}}' ">{{trans('admin/slider/index.add_new_slider')}}</button>
					</div>
				</div>
				<div class="portlet-body">

					<div class="mt-element-card mt-element-overlay">
						<div class="row">



							@if($sliders->count())

								@foreach($sliders as $slider)
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<div class="mt-card-item">
											<div class="mt-card-avatar mt-overlay-4">
												<img src='{{ asset("uploads/slider/$slider->slider_image") }}' />
												<div class="mt-overlay">
													<h2>{{trans('admin/slider/index.slider_operation')}} </h2>

													<div class="mt-info font-white">
														<div class="mt-card-content">

															<div class="mt-card-social">
																<ul>



																	<li>
																		<button class="btn btn-warning" onclick="javascript:location.href= '{{route('slider.edit' , $slider->id )}}' ">
																			{{trans('admin/slider/index.edit')}}
																		</button>
																	</li>
																	<li>
																		{!! Form::open(['route'=>['slider.destroy' , $slider->id] , 'method'=>'POST' , 'id'=>'delete_image']) !!}
																		{{ method_field('delete') }}
																		<button type="submit"  class="btn btn-danger" rel="nofollow">{{trans('admin/slider/index.delete')}}</button>

																		{!! Form::close() !!}


																	</li>


																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								@endforeach
							@else

								<div class="note note-danger text-center">
									<h4>{{trans('admin/slider/index.message')}}</h4>
								</div>
							@endif


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END : USER CARDS -->

@endsection

{{--<script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>--}}

{{-- Start javascript --}}
@section('js')


@endsection

{{-- end javascript --}}