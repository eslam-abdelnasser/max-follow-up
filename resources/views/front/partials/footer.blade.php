<!-- Footer -->
<footer id="footer" class="footer pb-0" data-bg-img="images/footer-bg.png" data-bg-color="#25272e">
    <div class="container pt-90 pb-60">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="widget dark"> <img alt="" src="{{asset('front/images/logo-wide-white.png')}}">
                    <a class="btn btn-default btn-transparent btn-xs btn-flat mt-5" href="#">{{trans('label.read')}}</a>
                    <ul class="styled-icons icon-dark icon-theme-colored icon-circled icon-sm mt-20">
                        @foreach($socials as $social)
                            <li><a href="{{$social->url}}"><i class="fa fa-{{$social->icon}}"></i></a> </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom-theme-colored-2">{{trans('front.latest_news')}}</h5>
                    <div class="latest-posts">
                        @foreach($blogheader as $singleBlog)
                            @foreach($singleBlog->description  as $description)
                                @if(LaravelLocalization::getCurrentLocale() == $description->language->label )
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <a class="post-thumb" href="{{route('blog.details',$singleBlog->id)}}"><img src="{{asset('uploads/blogs/80x55/'.$singleBlog->image_url)}}" alt=""></a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0 mb-5"><a href="{{route('blog.details',$singleBlog->id)}}">{{$description->title}}</a></h5>
                                            <p class="post-date mb-0 font-12">{{date("F j, Y",strtotime($singleBlog->created_at))}}</p>
                                        </div>
                                    </article>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom-theme-colored-2">{{trans('front.contact-us')}}</h5>
                    <form id="footer_quick_contact_form" name="footer_quick_contact_form" class="quick-contact-form" action="includes/quickcontact.php" method="post">
                        <div class="form-group">
                            <input name="form_email" class="form-control" type="text" required="" placeholder="{{trans('label.email')}}">
                        </div>
                        <div class="form-group">
                            <textarea name="form_message" class="form-control" required="" placeholder="{{trans('label.message')}}" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <input name="form_botcheck" class="form-control" type="hidden" value="" />
                            <button type="submit" class="btn btn-default btn-transparent btn-xs btn-flat mt-0" data-loading-text="Please wait...">{{trans('label.send')}}</button>
                        </div>
                    </form>

                    <!-- Quick Contact Form Validation-->
                    <script type="text/javascript">
                        $("#footer_quick_contact_form").validate({
                            submitHandler: function(form) {
                                var form_btn = $(form).find('button[type="submit"]');
                                var form_result_div = '#form-result';
                                $(form_result_div).remove();
                                form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                                var form_btn_old_msg = form_btn.html();
                                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                                $(form).ajaxSubmit({
                                    dataType:  'json',
                                    success: function(data) {
                                        if( data.status == 'true' ) {
                                            $(form).find('.form-control').val('');
                                        }
                                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                                        $(form_result_div).html(data.message).fadeIn('slow');
                                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                                    }
                                });
                            }
                        });
                    </script>
                </div>
            </div>
            {!! trans('front.text') !!}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="horizontal-contact-widget mt-30 pt-30 text-center">
                    <div class="col-sm-12 col-sm-4">
                        <div class="each-widget"> <i class="pe-7s-phone font-36 mb-10"></i>
                            <h5 class="text-white">{{trans('front.call_us')}}</h5>
                            <p>Phone: <a href="#">{{$setting->phone}}</a></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-sm-4 mt-sm-50">
                        <div class="each-widget"> <i class="pe-7s-map font-36 mb-10"></i>
                            <h5 class="text-white">{{trans('front.address')}}</h5>
                            @if(LaravelLocalization::getCurrentLocale() == 'ar' )
                                <p>{{$setting->address_ar}}</p>
                            @else
                                <p>{{$setting->address_en}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-sm-4 mt-sm-50">
                        <div class="each-widget"> <i class="pe-7s-mail font-36 mb-10"></i>
                            <h5 class="text-white">{{trans('front.email')}}</h5>
                            <p><a href="#">{{$setting->email}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline styled-icons icon-hover-theme-colored icon-gray icon-circled text-center mt-30 mb-10">
                    @foreach($socials as $social)
                        <li><a href="{{$social->url}}"><i class="fa fa-{{$social->icon}}"></i></a> </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-theme-colored p-20">
        <div class="row text-center">
            <div class="col-md-12">
                <p class="text-white font-11 m-0">Copyright &copy;2016 Startpointit. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
{{--<script src="js/custom.js"></script>--}}
{{ Html::script('front/js/custom.js')}}
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
      (Load Extensions only on Local File Systems !
       The following part can be removed on Server for On Demand Loading) -->
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.actions.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.migration.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js')}}
{{--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>--}}
{{ Html::script('front/js/revolution-slider/js/extensions/revolution.extension.video.min.js')}}

@yield('js')
</body>
</html>