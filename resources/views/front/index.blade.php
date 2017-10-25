@extends('front.layout')

@section('title',trans('front.home'))



@section('content')

    <!-- Banner Slider -->
    <div id="banner-slider" class="banner-slider curve-up"> <img class="sp-image" src="{{asset('front/assets/images/slider/bg.jpg')}}" alt="">
        <!-- Slides -->
        <div class="sp-slides">
            <!-- Slide 1 -->
            <div class="sp-slide">
                <!-- Caption -->

                <!-- Caption -->
                <!-- Banner Layers <img class="sp-layer layer-img-1" data-horizontal="750" data-vertical="-5" data-show-transition="right" data-hide-transition="up" data-show-delay="400" data-hide-delay="200" src="assets/images/slider/slider-layer-1.png" alt=""> -->

                <img class=" layer-img-2" style="width:100%" data-horizontal="670" data-vertical="50" data-show-transition="up" data-hide-transition="up" data-show-delay="800" data-hide-delay="500" src="{{asset('front/assets/images/header2.jpg')}}" alt="">
                <!-- Banner Layers -->
            </div>
            <!-- Slide 1 -->
            <!-- Slide 1 -->
            <div class="sp-slide">
                <!-- Caption -->

                <!-- Caption -->
                <!-- Banner Layers <img class="sp-layer layer-img-1" data-horizontal="750" data-vertical="-5" data-show-transition="right" data-hide-transition="up" data-show-delay="400" data-hide-delay="200" src="assets/images/slider/slider-layer-1.png" alt="">-->

                <img class=" layer-img-2" style="width:100%" data-horizontal="670" data-vertical="50" data-show-transition="up" data-hide-transition="up" data-show-delay="800" data-hide-delay="500" src="{{asset('front/assets/images/header2.jpg')}}" alt="">
                <!-- Banner Layers -->
            </div>
            <!-- Slide 1 -->
            <!-- Slide 1 -->
            <div class="sp-slide">
                <!-- Caption -->

                <!-- Caption -->
                <!-- Banner Layers <img class="sp-layer layer-img-1" data-horizontal="750" data-vertical="-5" data-show-transition="right" data-hide-transition="up" data-show-delay="400" data-hide-delay="200" src="assets/images/slider/slider-layer-1.png" alt=""> -->

                <img class="layer-img-2" style="width:100%" data-horizontal="670" data-vertical="50" data-show-transition="up" data-hide-transition="up" data-show-delay="800" data-hide-delay="500" src="{{asset('front/assets/images/header2.jpg')}}" alt="">
                <!-- Banner Layers -->
            </div>
            <!-- Slide 1 -->
        </div>
        <!-- Slides -->
        <!-- Paginaition dots -->
        <ul class="sp-thumbnails">
            <li class="sp-thumbnail"></li>
            <li class="sp-thumbnail"></li>
            <li class="sp-thumbnail"></li>
        </ul>
        <!-- Paginaition dots -->
    </div>
    <!-- Banner Slider -->
    <!-- Main -->
    <main id="main">
        <!-- Services -->
        <section class="services-holder">
            <div class="container">
                <div class="p-relative has-layout">
                    <!-- Alert -->
                    <div class="alert-1">
                        <p><i class="icon-star-full"></i>Welcome to KG daycare, preschool, and kindergarten How to Enroll Your Child to a Class?</p> <a class="tc-btn" href="#">Subscribe</a> </div>
                    <!-- Alert -->
                    <!-- Services Columns -->
                    <div class="services-columns white-bg">
                        <div id="services-slider" class="services-slider">
                            <!-- Service Figure -->
                            <div class="item">
                                <figure class="services-figure bg-1">
                                    <figcaption> <span>Basic Education</span>
                                        <h2>Educational Subjects</h2> <a class="tc-btn light shadow-0 sm" href="#">View</a> </figcaption> <img class="service-img" src="assets/images/services/img-01.png" alt=""> </figure>
                            </div>
                            <!-- Service Figure -->
                            <!-- Service Figure -->
                            <div class="item">
                                <figure class="services-figure bg-2">
                                    <figcaption> <span>Technology</span>
                                        <h2>Electronic System</h2> <a class="tc-btn light shadow-0 sm" href="#">View</a> </figcaption> <img class="service-img" src="assets/images/services/img-02.png" alt=""> </figure>
                            </div>
                            <!-- Service Figure -->
                            <!-- Service Figure -->
                            <div class="item">
                                <figure class="services-figure bg-3">
                                    <figcaption> <span>Academic</span>
                                        <h2>Academic Calendar</h2> <a class="tc-btn light shadow-0 sm" href="#">View</a> </figcaption> <img class="service-img" src="assets/images/services/img-03.png" alt=""> </figure>
                            </div>
                            <!-- Service Figure -->
                        </div>
                    </div>
                    <!-- Services Columns -->
                </div>
            </div>
        </section>
        <!-- Services -->
        <!-- Timeline
        <section class="timeline tc-padding-bottom">
            <div class="container">
                <div id="timeline-slider" class="timeline-slider">
                    <div class="timeline-figure"> <img src="assets/images/slime-icon.png" alt=""> <span>November, 2005</span>
                        <h4>Kindergarten Opening</h4> </div>
                    <div class="timeline-figure"> <img src="assets/images/slime-icon.png" alt=""> <span>December 23, 2005</span>
                        <h4>1st Kid Enrolled</h4> </div>
                    <div class="timeline-figure"> <img src="assets/images/slime-icon.png" alt=""> <span>January, 2006</span>
                        <h4>Daycare Center Launched</h4> </div>
                    <div class="timeline-figure"> <img src="assets/images/slime-icon.png" alt=""> <span>January 2008</span>
                        <h4>Preschool Launched</h4> </div>
                </div>
            </div>
        </section>
        <!-- Timeline -->
        <!-- School -->
        <section class="school-area curve-down" style="margin-top: 60px;"> <span class="scho-service-icon style-2"><img src="assets/images/school-services/img-1-1.png" alt=""></span>
            <!-- Main Heading -->
            <div class="school-area-heading">
                <h3>We are KG Child Care We have been educating children for over fifteen years.<br> Our goal is to create a place that engages each child.</h3>
                <p>Welcome to KG daycare, preschool, and kindergarten How to Enroll Your Child to a Class?</p>
            </div>
            <!-- Main Heading -->
            <!-- School Services -->
            <div style="background: url(assets/images/parallax-1.png) 50% 0% no-repeat;">
                <div class="container">
                    <div class="services-shadow radius-8 overflow-hidden">
                        <div class="row no-gutters">
                            <!-- School Services Figure -->
                            <div class="col-sm-4 col-xs-6 r-full-width">
                                <div class="scho-services-figure border-l-0"> <span class="scho-service-icon bg-1"><img src="assets/images/school-services/img-01.png" alt=""></span>
                                    <h4><a href="#">Learn With Best Teachers</a></h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremque lada tum, totam rem aperiam lada tum.</p>
                                </div>
                            </div>
                            <!-- School Services Figure -->
                            <!-- School Services Figure -->
                            <div class="col-sm-4 col-xs-6 r-full-width">
                                <div class="scho-services-figure"> <span class="scho-service-icon bg-2"><img src="assets/images/school-services/img-02.png" alt=""></span>
                                    <h4><a href="#">Happy Social Group</a></h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremque lada tum, totam rem aperiam lada tum.</p>
                                </div>
                            </div>
                            <!-- School Services Figure -->
                            <!-- School Services Figure -->
                            <div class="col-sm-4 col-xs-6 r-full-width">
                                <div class="scho-services-figure"> <span class="scho-service-icon bg-3"><img src="assets/images/school-services/img-03.png" alt=""></span>
                                    <h4><a href="#">We Love Math &amp; Drawing</a></h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremque lada tum, totam rem aperiam lada tum.</p>
                                </div>
                            </div>
                            <!-- School Services Figure -->
                            <!-- School Services Figure -->
                            <div class="col-sm-4 col-xs-6 r-full-width">
                                <div class="scho-services-figure border-l-0 border-b-0"> <span class="scho-service-icon bg-4"><img src="assets/images/school-services/img-04.png" alt=""></span>
                                    <h4><a href="#">Learn With Best Teachers</a></h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremque lada tum, totam rem aperiam lada tum.</p>
                                </div>
                            </div>
                            <!-- School Services Figure -->
                            <!-- School Services Figure -->
                            <div class="col-sm-4 col-xs-6 r-full-width">
                                <div class="scho-services-figure border-b-0"> <span class="scho-service-icon bg-5"><img src="assets/images/school-services/img-05.png" alt=""></span>
                                    <h4><a href="#">Happy Social Group</a></h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremque lada tum, totam rem aperiam lada tum.</p>
                                </div>
                            </div>
                            <!-- School Services Figure -->
                            <!-- School Services Figure -->
                            <div class="col-sm-4 col-xs-6 r-full-width">
                                <div class="scho-services-figure border-b-0"> <span class="scho-service-icon bg-6"><img src="assets/images/school-services/img-06.png" alt=""></span>
                                    <h4><a href="#">We Love Math &amp; Drawing</a></h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptat accusantium doloremque lada tum, totam rem aperiam lada tum.</p>
                                </div>
                            </div>
                            <!-- School Services Figure -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- School Services -->
            <!-- Nersery Statistics -->
            <div class="container">
                <div class="statistics">
                    <h3 class="curve-heading">Nersery Statistics</h3>
                    <div id="tc-counters" class="facts-lsit tc-padding-bottom has-layout">
                        <ul>
                            <li>
                                <h2 class="timer color-1" data-to="156" data-speed="3000">156</h2> <strong class="">Number of students</strong> </li>
                            <li>
                                <h2 class="timer color-2" data-to="24" data-speed="3000">24</h2>
                                <strong class="">Number of teachers</strong>
                            </li>
                            <li>
                                <h2 class="timer color-3" data-to="150" data-speed="3000">150</h2> <strong class="">Number of Classes</strong> </li>
                            <li> <span></span>
                                <h2 class="timer color-4" data-to="19" data-speed="3000">19</h2> <strong class="">Number of educational activities</strong> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Nersery Statistics -->
            <!-- Kids Img -->
            <div class="container">
                <div class="kids-img has-layout">
                    <ul>
                        <li class="animate swing" data-wow-delay="0.2s"><img src="assets/images/kids-imgs/img-01.png" alt=""></li>
                        <li class="animate lightSpeedIn" data-wow-delay="0.4s"><img src="assets/images/kids-imgs/img-02.png" alt=""></li>
                        <li class="animate swing" data-wow-delay="0.6s"><img src="assets/images/kids-imgs/img-03.png" alt=""></li>
                        <li class="animate lightSpeedIn" data-wow-delay="0.8s"><img src="assets/images/kids-imgs/img-04.png" alt=""></li>
                        <li class="animate fadeInRight" data-wow-delay="1s"><img src="assets/images/kids-imgs/img-05.png" alt=""></li>
                    </ul>
                </div>
            </div>
            <!-- Kids Img -->
        </section>
        <!-- School -->
        <!-- About Nersery -->
        <section class="tc-padding">
            <div class="container">
                <div class="row">
                    <!-- About Img -->
                    <div class="about-img"> <img src="assets/images/about-img-1.png" alt=""> </div>
                    <!-- About Img -->
                    <!-- About Text -->
                    <div class="col-lg-6 col-md-7 pull-right">
                        <div class="about-text">
                            <h3 class="curve-heading">Word of the principal</h3>
                            <h4>Steadfast vulgarly alas showed until caterpillar tiger did stopped alas visually aardvark dove dear this joyful egret inconsiderate crud.</h4>
                            <p>Until on ouch neat vindictively steadfast vulgarly alas showed until caterpillar tiger did stopped alas visually aardvark dove dear this joyful egret inconsiderate crud. Creepy one much mallard natural crucially dog tranquil meadowlark yikes that more across much</p>
                            <p>far aboard the futile ostrich and highhanded beyond imperative other classic while dull bearishly sulky near more while much wow.</p>
                            <ul class="check-list">
                                <li>Beautiful Class Rooms</li>
                                <li>Lush Play Ground</li>
                                <li>Secure Building</li>
                                <li>Gaming Room</li>
                                <li>Pick and Drop</li>
                                <li>Breakfast - Lunch</li>
                                <li>Sports Activities</li>
                            </ul>
                        </div>
                    </div>
                    <!-- About Text -->
                </div>
            </div>
        </section>
        <!-- About Nersery -->
        <!-- Weekly Classes
        <section class="weekly-classes tc-padding">
            <div class="container">

                <div class="main-heading-holder">
                    <div class="main-heading">
                        <h2>Weekly Classes</h2>
                        <p>Spluttered on that the legitimate dreadful much yikes less and roadrunner or cantankerously thus artful
                            <br>dramatically far against caribou opposite impala without rewoun.</p>
                    </div>
                </div>

                <div id="weekly-classes-slider" class="weekly-classes-slider">

                    <div class="item">
                        <div class="classes-column">
                            <figure class="curve-up-small bg-1"> <img src="assets/images/weekly-classes//img-01.jpg" alt="">
                                <div class="overlay-caption position-center-center">
                                    <h2>Learning ABC Classes</h2> <span>Mon-Tue-Fri , 8:00 am</span> </div> <span class="search-lable"><i class="icon-star-full"></i></span> </figure>
                            <div class="classes-detail after-clear"> <img class="teacher-img" src="assets/images/s-teacher-imgs/img-01.jpg" alt="">
                                <div class="aurthor-name">
                                    <h3>Shana Wilson</h3> <span>Class Trainer</span> </div>
                                <ul>
                                    <li> <i class="icon-boy-and-girl-students"></i> <span>1 - 2 </span> <strong>Years Old</strong> </li>
                                    <li> <i class="icon-open-book"></i> <span>12</span> <strong>Class size</strong> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="classes-btm"> <a class="tc-btn shadow-0" href="#">$29 Per Session</a> </div>
                    </div>

                    <div class="item">
                        <div class="classes-column">
                            <figure class="curve-up-small bg-2"> <img src="assets/images/weekly-classes//img-02.jpg" alt="">
                                <div class="overlay-caption position-center-center">
                                    <h2>Learning ABC Classes</h2> <span>Mon-Tue-Fri , 8:00 am</span> </div> <span class="search-lable"><i class="icon-star-full"></i></span> </figure>
                            <div class="classes-detail after-clear"> <img class="teacher-img" src="assets/images/s-teacher-imgs/img-02.jpg" alt="">
                                <div class="aurthor-name">
                                    <h3>Shana Wilson</h3> <span>Class Trainer</span> </div>
                                <ul>
                                    <li> <i class="icon-boy-and-girl-students"></i> <span>1 - 2 </span> <strong>Years Old</strong> </li>
                                    <li> <i class="icon-open-book"></i> <span>12</span> <strong>Class size</strong> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="classes-btm"> <a class="tc-btn shadow-0" href="#">$29 Per Session</a> </div>
                    </div>

                    <div class="item">
                        <div class="classes-column">
                            <figure class="curve-up-small bg-3"> <img src="assets/images/weekly-classes//img-03.jpg" alt="">
                                <div class="overlay-caption position-center-center">
                                    <h2>Learning ABC Classes</h2> <span>Mon-Tue-Fri , 8:00 am</span> </div> <span class="search-lable"><i class="icon-star-full"></i></span> </figure>
                            <div class="classes-detail after-clear"> <img class="teacher-img" src="assets/images/s-teacher-imgs/img-03.jpg" alt="">
                                <div class="aurthor-name">
                                    <h3>Shana Wilson</h3> <span>Class Trainer</span> </div>
                                <ul>
                                    <li> <i class="icon-boy-and-girl-students"></i> <span>1 - 2 </span> <strong>Years Old</strong> </li>
                                    <li> <i class="icon-open-book"></i> <span>12</span> <strong>Class size</strong> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="classes-btm"> <a class="tc-btn shadow-0" href="#">$29 Per Session</a> </div>
                    </div>

                </div>

            </div>
        </section>
        Weekly Classes -->
        <!-- Team -->
        <section class="tc-padding-bottom"> <img src="assets/images/light-bg.png" alt="">
            <div class="container">
                <!-- Main Heading -->
                <div class="main-heading-holder">
                    <div class="main-heading">
                        <h2>Teaching team</h2>
                        <p>Destructively after weasel reindeer because this wow through</p>
                    </div>
                </div>
                <!-- Main Heading -->
                <!-- Team List -->
                <div id="team-slider" class="team-slider">
                    <div class="item">
                        <div class="team-figure out-stock">
                            <div class="aurthor-name">
                                <h3>Shana Wilson</h3> <span>Kinder Garten</span> </div>
                            <figure> <img src="assets/images/team/img-01.jpg" alt=""> </figure>
                            <div class="on-hover">
                                <div class="tc-social-icons">
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a class="google-plus" href="#"><i class="icon-google-plus"></i></a></li>
                                    </ul>
                                </div> <a href="#" class="tc-btn" data-toggle="modal" data-target="#team-detail-modal">View Profile</a> </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-figure">
                            <div class="aurthor-name">
                                <h3>Tina Firgoson</h3> <span>Kinder Garten</span> </div>
                            <figure> <img src="assets/images/team/img-02.jpg" alt=""> </figure>
                            <div class="on-hover">
                                <div class="tc-social-icons">
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a class="google-plus" href="#"><i class="icon-google-plus"></i></a></li>
                                    </ul>
                                </div> <a href="#" class="tc-btn" data-toggle="modal" data-target="#team-detail-modal">View Profile</a> </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-figure">
                            <div class="aurthor-name">
                                <h3>Time Walters</h3> <span>Kinder Garten</span> </div>
                            <figure> <img src="assets/images/team/img-03.jpg" alt=""> </figure>
                            <div class="on-hover">
                                <div class="tc-social-icons">
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a class="google-plus" href="#"><i class="icon-google-plus"></i></a></li>
                                    </ul>
                                </div> <a href="#" class="tc-btn" data-toggle="modal" data-target="#team-detail-modal">View Profile</a> </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-figure">
                            <div class="aurthor-name">
                                <h3>Penny Brace</h3> <span>Kinder Garten</span> </div>
                            <figure> <img src="assets/images/team/img-04.jpg" alt=""> </figure>
                            <div class="on-hover">
                                <div class="tc-social-icons">
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a class="google-plus" href="#"><i class="icon-google-plus"></i></a></li>
                                    </ul>
                                </div> <a href="#" class="tc-btn" data-toggle="modal" data-target="#team-detail-modal">View Profile</a> </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-figure out-stock">
                            <div class="aurthor-name">
                                <h3>Shana Wilson</h3> <span>Class Trainer</span> </div>
                            <figure> <img src="assets/images/team/img-01.jpg" alt=""> </figure>
                            <div class="on-hover">
                                <div class="tc-social-icons">
                                    <ul>
                                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a class="google-plus" href="#"><i class="icon-google-plus"></i></a></li>
                                    </ul>
                                </div> <a href="#" class="tc-btn" data-toggle="modal" data-target="#team-detail-modal">View Profile</a> </div>
                        </div>
                    </div>
                </div>
                <!-- Team List -->
            </div>
        </section>
        <!-- Team -->
        <!-- Testimonial -->
        <section class="testimonial-holder" style="background: url(assets/images/testimonial-bg.jpg) no-repeat center bottom;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-1 col-lg-10">
                        <h3 class="curve-heading">Testimonials</h3> <span class="search-lable"><i class="icon-quotes-left"></i></span>
                        <ul id="testimonial-slider" class="testimonial-slider after-clear">
                            <li>
                                <div class="text">
                                    <p>Much flew yikes wholeheartedly goodness hey changed considering mongoose delinquent affectionately piranha flustered testy versus including darn and a much while outside alas a intricately due manatee kookaburra aardvark the llama jaded much far darn.</p>
                                    <div class="aurthor-name">
                                        <h3>Tim Bickson</h3> <span>Father of Oma Bickson (Kinder Garten)</span> </div>
                                    <div class="img"> <img src="assets/images/s-teacher-imgs/img-01.jpg" alt=""> </div>
                                </div>
                            </li>
                            <li>
                                <div class="text">
                                    <p>Much flew yikes wholeheartedly goodness hey changed considering mongoose delinquent affectionately piranha flustered testy versus including darn and a much while outside alas a intricately due manatee kookaburra aardvark the llama jaded much far darn.</p>
                                    <div class="aurthor-name">
                                        <h3>Tim Bickson</h3> <span>Father of Oma Bickson (Kinder Garten)</span> </div>
                                    <div class="img"> <img src="assets/images/s-teacher-imgs/img-01.jpg" alt=""> </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial -->
        <!-- News Letter Section -->
        <section class="news-letter overlay-dark" data-enllax-ratio="-.3" style="background: url(assets/images/parallax-2.jpg) 50% 0% no-repeat fixed;">
            <div class="container">
                <div id="news-letter-slider" class="news-letter-slider">
                    <!-- News Widget -->
                    <div class="item">
                        <div class="news-widget">
                            <h3>Facebook Box</h3>
                            <div class="featured-box widget after-clear"> <span><i class="icon-facebook"></i></span>
                                <p>Release Our New Jekyler - Multipurpose Responsive PrestaShop Themes 24webg <a href="#">roup.com/ps/jekyler/</a></p>

                            </div>
                        </div>
                    </div>
                    <!-- News Widget -->
                    <!-- News Widget -->
                    <div class="item">
                        <div class="news-widget">
                            <h3>Twitter Feeds</h3>
                            <div class="twitter-box widget after-clear"> <span><i class="icon-twitter"></i></span>
                                <p>Release Our New Jekyler - Multipurpose Responsive PrestaShop Themes 24webg <a href="#">roup.com/ps/jekyler/</a></p> </div>
                        </div>
                    </div>
                    <!-- News Widget -->
                    <!-- News Widget -->
                    <div class="item">
                        <div class="news-widget">
                            <h3>Weekly Newletter</h3>
                            <div class="submit-box widget after-clear"> <span><i class="icon-envelope-o"></i></span>
                                <form class="submit-letter">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Enter Full Name"> </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Enter Full Name"> </div>
                                    <button class="tc-btn light shadow-0">Submit</button>
                                </form> <i class="time">about 8 days ago</i> </div>
                        </div>
                    </div>
                    <!-- News Widget -->
                </div>
            </div>
        </section>
        <!-- News Letter Section -->
        <!-- Gallery -->
        <section class="tc-padding">
            <div class="container">
                <!-- Main Heading -->
                <div class="main-heading-holder">
                    <div class="main-heading">
                        <h2>Our Photo Gallery</h2>
                        <p>Destructively after weasel reindeer because this wow through</p>
                    </div>
                </div>
                <!-- Main Heading -->
                <!-- Gallery -->
                <div class="row">
                    <!-- gallery Figure -->
                    <div class="col-sm-3 col-sm-4 col-xs-6 r-full-width">
                        <a href="show-album.html">
                            <figure class="gallery-figure rotate-1">
                                <img src="assets/images/gallery/img-01.jpg" alt="">
                                <figcaption class="overlay">
                                    <h4 class="position-center-center">School Kids Playing in Classroom</h4> </figcaption>
                            </figure>
                        </a>
                    </div>
                    <!-- gallery Figure -->
                    <!-- gallery Figure -->
                    <div class="col-sm-3 col-sm-4 col-xs-6 r-full-width">
                        <a href="show-album.html">
                            <figure class="gallery-figure"> <img src="assets/images/gallery/img-02.jpg" alt="">
                                <figcaption class="overlay">
                                    <h4 class="position-center-center">School Kids Playing in Classroom</h4> </figcaption>
                            </figure>
                        </a>
                    </div>
                    <!-- gallery Figure -->
                    <!-- gallery Figure -->
                    <div class="col-sm-3 col-sm-4 col-xs-6 r-full-width">
                        <a href="show-album.html">
                            <figure class="gallery-figure rotate-1"> <img src="assets/images/gallery/img-03.jpg" alt="">
                                <figcaption class="overlay">
                                    <h4 class="position-center-center">School Kids Playing in Classroom</h4> </figcaption>
                            </figure>
                        </a>
                    </div>
                    <!-- gallery Figure -->
                    <!-- gallery Figure -->
                    <div class="col-sm-3 col-sm-4 col-xs-6 r-full-width">
                        <a href="show-album.html">
                            <figure class="gallery-figure"> <img src="assets/images/gallery/img-04.jpg" alt="">
                                <figcaption class="overlay">
                                    <h4 class="position-center-center">School Kids Playing in Classroom</h4> </figcaption>
                            </figure>
                        </a>
                    </div>
                    <!-- gallery Figure -->
                    <!-- gallery Figure -->
                    <div class="col-sm-3 col-sm-4 col-xs-6 r-full-width">
                        <a href="show-album.html">
                            <figure class="gallery-figure rotate-2"> <img src="assets/images/gallery/img-05.jpg" alt="">
                                <figcaption class="overlay">
                                    <h4 class="position-center-center">School Kids Playing in Classroom</h4> </figcaption>
                            </figure>
                        </a>
                    </div>
                    <!-- gallery Figure -->
                    <!-- gallery Figure -->
                    <div class="col-sm-3 col-sm-4 col-xs-6 r-full-width">
                        <a href="show-album.html">
                            <figure class="gallery-figure rotate-1"> <img src="assets/images/gallery/img-06.jpg" alt="">
                                <figcaption class="overlay">
                                    <h4 class="position-center-center">School Kids Playing in Classroom</h4> </figcaption>
                            </figure>
                        </a>
                    </div>
                    <!-- gallery Figure -->
                    <!-- gallery Figure -->
                    <div class="col-sm-3 col-sm-4 col-xs-6 r-full-width hidden-xs">
                        <a href="show-album.html">
                            <figure class="gallery-figure rotate-2"> <img src="assets/images/gallery/img-07.jpg" alt="">
                                <figcaption class="overlay">
                                    <h4 class="position-center-center">School Kids Playing in Classroom</h4> </figcaption>
                            </figure>
                        </a>
                    </div>
                    <!-- gallery Figure -->
                    <!-- gallery Figure -->
                    <div class="col-sm-3 col-sm-4 col-xs-6 r-full-width hidden-xs">
                        <a href="show-album.html">
                            <figure class="gallery-figure rotate-1"> <img src="assets/images/gallery/img-08.jpg" alt="">
                                <figcaption class="overlay">
                                    <h4 class="position-center-center">School Kids Playing in Classroom</h4> </figcaption>
                            </figure>
                        </a>
                    </div>
                    <!-- gallery Figure -->
                </div>
                <!-- Gallery -->
                <!-- Separater --><span class="seprate-petrn mt-80"></span>
                <!-- Separater -->
            </div>
        </section>
        <!-- Gallery -->
        <!-- Latest Blogs -->
        <section class="tc-padding-bottom">
            <div class="container">
                <!-- Main Heading -->
                <div class="main-heading-holder">
                    <div class="main-heading">
                        <h2>Latest Blogs</h2>
                        <p>Destructively after weasel reindeer because this wow through</p>
                    </div>
                </div>
                <!-- Main Heading -->
                <!-- Blogs -->
                <div id="blog-grid-slider" class="blog-grid-slider">
                    <!-- Blog Column -->
                    <div class="item">
                        <div class="blog-grid color-1">
                            <figure> <img src="assets/images/blogs-grid/img-01.jpg" alt=""> </figure>
                            <div class="blog-detail">
                                <div class="meta-post">
                                    <ul>
                                        <li><i class="icon-calendar"></i>JULY 24, 2015</li>
                                        <li><i class="icon-heart2"></i>25</li>
                                        <li><i class="icon-comments"></i>48</li>
                                    </ul>
                                </div>
                                <h4><a href="#">Hot Toys &amp; Sideshow New Arrivals</a></h4> <span class="seprate-petrn white mb-10"></span>
                                <p>Aliquet nec ut risus. Phasellus condimentum, lorem eget iaculis porta, tortor arcu lacinia.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Column -->
                    <!-- Blog Column -->
                    <div class="item">
                        <div class="blog-grid color-2">
                            <figure> <img src="assets/images/blogs-grid/img-02.jpg" alt=""> </figure>
                            <div class="blog-detail">
                                <div class="meta-post">
                                    <ul>
                                        <li><i class="icon-calendar"></i>JULY 24, 2015</li>
                                        <li><i class="icon-heart2"></i>25</li>
                                        <li><i class="icon-comments"></i>48</li>
                                    </ul>
                                </div>
                                <h4><a href="#">Hot Toys &amp; Sideshow New Arrivals</a></h4> <span class="seprate-petrn white mb-10"></span>
                                <p>Aliquet nec ut risus. Phasellus condimentum, lorem eget iaculis porta, tortor arcu lacinia.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Column -->
                    <!-- Blog Column -->
                    <div class="item">
                        <div class="blog-grid color-3">
                            <figure> <img src="assets/images/blogs-grid/img-03.jpg" alt=""> </figure>
                            <div class="blog-detail">
                                <div class="meta-post">
                                    <ul>
                                        <li><i class="icon-calendar"></i>JULY 24, 2015</li>
                                        <li><i class="icon-heart2"></i>25</li>
                                        <li><i class="icon-comments"></i>48</li>
                                    </ul>
                                </div>
                                <h4><a href="#">Hot Toys &amp; Sideshow New Arrivals</a></h4> <span class="seprate-petrn white mb-10"></span>
                                <p>Aliquet nec ut risus. Phasellus condimentum, lorem eget iaculis porta, tortor arcu lacinia.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Column -->
                    <!-- Blog Column -->
                    <div class="item">
                        <div class="blog-grid color-4">
                            <figure> <img src="assets/images/blogs-grid/img-04.jpg" alt=""> </figure>
                            <div class="blog-detail">
                                <div class="meta-post">
                                    <ul>
                                        <li><i class="icon-calendar"></i>JULY 24, 2015</li>
                                        <li><i class="icon-heart2"></i>25</li>
                                        <li><i class="icon-comments"></i>48</li>
                                    </ul>
                                </div>
                                <h4><a href="#">Hot Toys &amp; Sideshow New Arrivals</a></h4> <span class="seprate-petrn white mb-10"></span>
                                <p>Aliquet nec ut risus. Phasellus condimentum, lorem eget iaculis porta, tortor arcu lacinia.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Column -->
                </div>
                <!-- Blogs -->
            </div>
        </section>
        <!-- Latest Blogs -->
        <!-- Latest Blogs
        <div class="brands-icon mt-50">
            <div class="container">
                <h3><span>Affliations and Partners</span></h3>
                <ul id="brands-slide" class="brands-slide">
                    <li>
                        <a href="#"><img src="assets/images/brands-icons/img-01.jpg" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/brands-icons/img-02.jpg" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/brands-icons/img-03.jpg" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/brands-icons/img-04.jpg" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/brands-icons/img-05.jpg" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/brands-icons/img-06.jpg" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/brands-icons/img-01.jpg" alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Latest Blogs -->
    </main>
    <!-- Main -->

@endsection



