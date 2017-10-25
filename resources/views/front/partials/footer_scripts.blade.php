<!-- Java Script -->
<script src="{{asset('front/assets/scripts/jquery.js')}}"></script>
<script src="{{asset('front/assets/scripts/bootstrap.js')}}"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="{{asset('front/assets/scripts/gmap3.min.js')}}"></script>
<script src="{{asset('front/assets/scripts/sliderPro.js')}}"></script>
<script src="{{asset('front/assets/scripts/bigSlide.js')}}"></script>
<script src="{{asset('front/assets/scripts/slick.js')}}"></script>
<script src="{{asset('front/assets/scripts/parallax.js')}}"></script>
<script src="{{asset('front/assets/scripts/countdown.js')}}"></script>
<script src="{{asset('front/assets/scripts/countTo.js')}}"></script>
<script src="{{asset('front/assets/scripts/spinner.js')}}"></script>
<script src="{{asset('front/assets/scripts/bootstrap-select.js')}}"></script>
<script src="{{asset('front/assets/scripts/star-rating.js')}}"></script>
<script src="{{asset('front/assets/scripts/appear.js')}}"></script>
<script src="{{asset('front/assets/scripts/prettyPhoto.js')}}"></script>
<script src="{{asset('front/assets/scripts/isotope.pkgd.js')}}"></script>
<script src="{{asset('front/assets/scripts/wow-min.js')}}"></script>
<!-- Put all Functions in functions.js -->
<script src="{{asset('front/assets/scripts/functions.js')}}"></script>

@yield('js')
<script>
    $(window).load(function () {
        "use strict";
        // Loading Elements
        $(".loading-overlay .spinner").fadeOut(2000, function () {
            // Show The Scroll
            $("body").css("overflow", "auto");
            $(this).parent().fadeOut(2000, function () {
                $(this).remove();
            });
        });
    });
</script>
</body>

</html>