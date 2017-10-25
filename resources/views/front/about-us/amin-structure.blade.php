@extends('front.layout')

@section('title',trans('front.home'))



@section('content')

<!-- Team View 2 -->
<section class="tc-padding-bottom gray-bg">
    <div class="container">
        <h1 class="text-center" style="margin: 106px 0;color: #ea6f83;font-weight: bold;font-size: 37px;"> The Administrative Structure</h1>
        <!-- Team List -->
        <div id="team-slider-2" class="team-slider style-2">
            @foreach($admin_structure as $singleAdmin)
                @foreach($singleAdmin->description as $description)
                    @if(LaravelLocalization::getCurrentLocale() == $description->language->label)
            <div class="item">
                <div class="team-figure style-2">
                    <figure>
                        <img src="{{asset('uploads/admin-structure/337x335/'.$singleAdmin->image_url)}}" alt="">
                        <div class="on-hover">
                            <div class="tc-social-icons">
                                <ul>
                                    @if(isset($singleAdmin->facebook_url))
                                    <li><a class="facebook" href="{{$singleAdmin->facebook_url}}"><i class="icon-facebook"></i></a></li>
                                    @endif
                                    @if(isset($singleAdmin->tweeter))
                                    <li><a class="twitter" href="{{$singleAdmin->tweeter}}"><i class="icon-twitter"></i></a></li>
                                    @endif
                                    @if(isset($singleAdmin->google_plus_url))
                                    <li><a class="google-plus" href="{{$singleAdmin->google_plus_url}}"><i class="icon-google-plus"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            <a href="#" class="tc-btn" data-toggle="modal" data-target="#team-detail-modal{{$singleAdmin->id}}">View Profile</a>
                        </div>
                    </figure>
                    <div class="aurthor-name bg-1">
                        <h3>{{$description->name}}</h3>
                        <span>{{$description->job_title}}</span>
                    </div>
                </div>
            </div>
                    @endif
                    @endforeach
            @endforeach

        </div>
        <!-- Team List -->

    </div>
</section>
<!-- Team View 2 -->
<!-- Team Detail Modal -->
@foreach($admin_structure as $singleAdmin)
    @foreach($singleAdmin->description as $description)
        @if(LaravelLocalization::getCurrentLocale() == $description->language->label)
<div class="team-detail-modal">
    <div class="modal fade" id="team-detail-modal{{$singleAdmin->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content position-center-center">
            <div class="single-team-detail">
                <figure><img src="{{asset('uploads/admin-structure/263x349/'.$singleAdmin->image_url)}}" alt=""></figure>
                <div class="team-detail">
                    <div class="text-center">
                        <div class="row">
                            <center>
                                <div class="discription" style="width: 100%;">
                                    <h3>{{$description->name}}</h3> <span>{{$description->job_title}}</span>
                                    {!! str_limit(html_entity_decode($description->$description,100)) !!}
                                </div>
                            </center>
                            <div class="tc-social-icons col-md-12 text-center">
                                <ul>
                                    @if(isset($singleAdmin->facebook_url))
                                        <li><a class="facebook" href="{{$singleAdmin->facebook_url}}"><i class="icon-facebook"></i></a></li>
                                    @endif
                                    @if(isset($singleAdmin->tweeter))
                                        <li><a class="twitter" href="{{$singleAdmin->tweeter}}"><i class="icon-twitter"></i></a></li>
                                    @endif
                                    @if(isset($singleAdmin->google_plus_url))
                                        <li><a class="google-plus" href="{{$singleAdmin->google_plus_url}}"><i class="icon-google-plus"></i></a></li>
                                    @endif
                                    <li class="email">{{$singleAdmin->email}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="experties">
                <li>
                    <i class="icon-boy-and-girl-students"></i>
                    <span>{{$description->degree}}</span>
                    <strong>{{$description->university}}</strong>
                </li>
                <li>
                    <i class="icon-open-book"></i>
                    <span>{{$singleAdmin->years}} Years of experience</span>
                    <strong>{{$description->work_as}}</strong>
                </li>
            </ul>
        </div>
    </div>
</div>

        @endif
    @endforeach
@endforeach

<!-- Team Detail Modal -->


@endsection