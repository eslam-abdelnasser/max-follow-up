<!-- Header -->
<header id="header" class="header">
    <div class="header-top bg-theme-colored sm-text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget no-border m-0">
                        <ul class="styled-icons icon-dark icon-theme-colored icon-sm sm-text-center">
                            @foreach($socials as $social)
                                <li><a href="{{$social->url}}"><i class="fa fa-{{$social->icon}}"></i></a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="widget no-border m-0">
                        <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="text-white" href="#">{{$setting->phone}}</a> </li>
                            <li class="text-white m-0 pl-10 pr-10"> <i class="fa fa-clock-o text-white"></i> Mon-Fri 8:00 to 2:00 </li>
                            <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="#">{{$setting->email}}</a> </li>
                            {{--  <li class="sm-display-block mt-sm-10 mb-sm-10">
                                 <!-- Modal: Appointment Starts -->
                                 <a class="bg-light p-5 text-theme-colored font-11 ajaxload-popup" href="{{asset('front/ajax-load/form-appointment.html')}}">Make an Appointment</a>
                                 <!-- Modal: Appointment End -->
                             </li> --}}



                            @if(LaravelLocalization::getCurrentLocale() == 'en')
                                <li class="sm-display-block mt-sm-10 mb-sm-10">
                                    <a  class="bg-light p-5 text-theme-colored font-11"  href="{{LaravelLocalization::getLocalizedURL('ar') }}">عربي</a>
                                </li>
                            @else
                                <li class="sm-display-block mt-sm-10 mb-sm-10"><a  class="bg-light p-5 text-theme-colored font-11" href="{{LaravelLocalization::getLocalizedURL('en') }}">English</a></li>
                            @endif



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest">
            <div class="container">
                <nav id="menuzord-right" class="menuzord blue bg-lightest">
                    <a class="menuzord-brand pull-left flip" href="javascript:void(0)">
                        <img src="{{asset('front/images/logo-wide.png')}}" alt="">
                    </a>
                    {{--<div id="side-panel-trigger" class="side-panel-trigger"><a href="#"><i class="fa fa-bars font-24 text-gray"></i></a></div>--}}
                    <ul class="menuzord-menu">

                        <li class="  "><a href='{{ url("/" , LaravelLocalization::setLocale()) }}'>{{trans('front.home')}}</a>

                        </li>

                        <li><a href='#'>{{trans('front.about_us')}}</a>

                            <ul class="dropdown">
                                <li><a href='{{route("about-us")}}'>{{trans('front.about_us')}}</a></li>
                                <li><a href='{{route('services')}}'>{{trans('front.services')}}</a></li>
                                <li><a href="{{route('education-level')}}">{{trans('front.education_level')}}</a></li>
                                <li><a href="{{route('supervisor')}}">{{trans('front.supervisor')}}</a></li>
                                <li><a href="{{route('admission-roles')}}">{{trans('front.admission_role')}}</a></li>
                            </ul>

                        </li>

                        <li><a href='{{route('blog')}}'>{{trans('front.blog')}}</a></li>

                        <li><a href='{{route('laboratories')}}'>{{trans('front.laboratory')}}</a></li>

                        <li><a href='{{route('teachers')}}'>{{trans('front.teachers')}}</a></li>

                        <li><a href='{{route('news')}}'>{{trans('front.news')}}</a></li>
                        <li><a href='{{route('activities')}}'>{{trans('front.activities')}}</a></li>
                        <li><a href='{{route('media')}}'>{{trans('front.media')}}</a></li>


                        <li><a href='{{route('careers')}}'>{{trans('front.careers')}}</a></li>
                        <li><a href='{{route('contact-us')}}'>{{trans('front.contact_us')}}</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- end header -->