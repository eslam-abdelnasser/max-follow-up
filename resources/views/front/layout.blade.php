@include('front.partials.header')



<div class="wrapper push">
    <!-- Header -->
    <header id="header" class="header">
        <!-- Top Bar -->

        @if(LaravelLocalization::getCurrentLocale() == 'en')

        @include('front.top_bar.top_en')
         @else
            @include('front.top_bar.top_ar')

         @endif
        <!-- Top Bar -->
        <!-- Top Bar -->
        <!-- Nav Holder -->
        <div class="nav-holder">
            <div class="container">
                <div class="p-relative has-layout">
                    <!-- Logo -->
                    <div class="logo hidden-lg hidden-md">
                        <a href="index.html"><img src="assets/images/logo1.png" style="width: 150px" alt=""></a>
                    </div>
                    <!-- Logo -->
                    <!-- Navigation -->
                @if(LaravelLocalization::getCurrentLocale() == 'en')
                         @include('front.partials.nav')
                 @else
                    @include('front.nav_ar.nav')

                 @endif
                    <!-- Navigation -->
                    <!-- Search Bar
                    <div class="search-bar">
                        <div class="form-group">
                            <input type="search" class="form-control" name="search" placeholder="Enter any Keyword"> <i class="icon-search"></i> </div> <a class="tc-btn" href="#">Search</a> <span class="search-lable"><i class="icon-search"></i></span> </div>
                    <!-- Search Bar -->
                    <!-- Search Open Btn <span id="search-open-btn" class="search-btn"><i class="icon-search"></i></span>
                    <!-- Search Open Btn -->
                </div>
            </div>
        </div>
        <!-- Nav Holder -->
    </header>
    <!-- Header -->



    @yield('content')




{{--@include('front.partials.partners')--}}
@include('front.partials.footer')
</div>

@if(LaravelLocalization::getCurrentLocale() == 'en')
@include('front.partials.slide_menu')

@else

@include('front.nav_ar.menu_bar')
@endif


<span id="scrollup" class="scrollup"><img src="{{asset('front/assets/images/superman.png')}}" alt=""></span>

@include('front.partials.footer_scripts')