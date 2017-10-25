@extends('front.layout')

@section('title',trans('front.home'))



@section('content')



    <div class="container">
        <h1 class="text-center" style="margin: 106px 0;color: #ea6f83;font-weight: bold;font-size: 37px;"> Accreditation</h1>
        <div class="row">
            <div class='list-group gallery'>
                @foreach($images as $image)
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                    <a class="thumbnail " rel="prettyPhoto[gallery]" href="{{asset('uploads/galleries/types/320x320/'.$image->image_url)}}">
                        <img class="img-responsive" alt="" src="{{asset('uploads/galleries/types/320x320/'.$image->image_url)}}" />
                       <!-- text-right / end -->
                    </a>
                </div> <!-- col-6 / end -->
                @endforeach

            </div> <!-- list-group / end -->
        </div> <!-- row / end -->
    </div> <!-- container / end -->



@endsection