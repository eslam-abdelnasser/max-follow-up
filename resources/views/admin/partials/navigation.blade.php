<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="{{trans('admin/partials/navigation.search')}}">
                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item start active open">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.dashboard')}}</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start active open">
                        <a href="index.html" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.dashboard1')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="dashboard_2.html" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">{{trans('admin/partials/navigation.dashboard2')}}</span>
                            <span class="badge badge-success">1</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="dashboard_3.html" class="nav-link ">
                            <i class="icon-graph"></i>
                            <span class="title">{{trans('admin/partials/navigation.dashboard3')}}</span>
                            <span class="badge badge-danger">5</span>
                        </a>
                    </li>
                </ul>
            </li>


            {{--<li class="heading">--}}
                {{--<h3 class="uppercase">Add languages</h3>--}}
            {{--</li>--}}
            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.languages')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('language.index'))
                        <li class="nav-item start">
                            <a href="{{route('languages.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.show_all_languages')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('language.create'))
                        <li class="nav-item start">
                            <a href="{{route('languages.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.add_new_language')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">{{trans('admin/partials/navigation.admins')}}</h3>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.admin_user')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('admins.index'))
                        <li class="nav-item start">
                            <a href="{{route('admins.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.admins')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('roles.index'))
                        <li class="nav-item start">
                            <a href="{{route('roles.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.roles')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('permission.index'))
                        <li class="nav-item start">
                            <a href="{{route('permission.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.permission')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="heading">
                <h3 class="uppercase">{{trans('admin/partials/navigation.pages')}}</h3>
            </li>


            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.slider_show')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('slider.index'))
                        <li class="nav-item start">
                            <a href="{{route('slider.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Sliders</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('slider.create'))
                            <li class="nav-item start">
                            <a href="{{route('slider.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Create slider</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            @if(Auth::guard('admin')->user()->can('admin.about.index'))
                <li class="nav-item start">
                    <a href="{{route('admin.about.index')}}" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title">{{trans('admin/partials/navigation.about_us')}}</span>
                    </a>
                </li>
            @endif


            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.services')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('services.index'))
                        <li class="nav-item start">
                            <a href="{{route('services.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.services')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('services.create'))
                        <li class="nav-item start">
                            <a href="{{route('services.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.create_new_service')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>


            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.faqs')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('faq.index'))
                        <li class="nav-item start">
                            <a href="{{route('faqs.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.faqs')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('faq.create'))
                        <li class="nav-item start">
                            <a href="{{route('faqs.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.create_new_faq')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>


            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.blogs')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('blogs.index'))
                        <li class="nav-item start">
                            <a href="{{route('blogs.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.blogs')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('blogs.create'))
                        <li class="nav-item start">
                            <a href="{{route('blogs.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.create_new_blog')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>


            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.careers')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('careers.index'))
                        <li class="nav-item start">
                            <a href="{{route('careers.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.careers')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('services.create'))
                        <li class="nav-item start">
                            <a href="{{route('careers.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.create_new_career')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>



            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.galleries')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('galleries.index'))
                        <li class="nav-item start">
                            <a href="{{route('galleries.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.galleries')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('galleries.create'))
                        <li class="nav-item start">
                            <a href="{{route('galleries.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.create_new_gallery')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>



            <li class="heading">
                <h3 class="uppercase">{{trans('admin/partials/navigation.my_school')}}</h3>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.teacher')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('teachers.index'))
                        <li class="nav-item start">
                            <a href="{{route('teachers.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.teacher')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('teachers.create'))
                        <li class="nav-item start">
                            <a href="{{route('teachers.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.add_new_teacher')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>


            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.laboratory')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('laboratories.index'))
                        <li class="nav-item start">
                            <a href="{{route('laboratories.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.laboratory')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('laboratories.create'))
                        <li class="nav-item start">
                            <a href="{{route('laboratories.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.add_new_laboratory')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.news')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                   @if(Auth::guard('admin')->user()->can('news.index'))
                        <li class="nav-item start">
                            <a href="{{route('news.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.news')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('news.create'))
                        <li class="nav-item start">
                            <a href="{{route('news.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.add_new_news')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>



            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.activity')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('activities.index'))
                        <li class="nav-item start">
                            <a href="{{route('activities.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.activity')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('activities.create'))
                        <li class="nav-item start">
                            <a href="{{route('activities.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.add_new_activity')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.supervisor')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('supervisors.index'))
                        <li class="nav-item start">
                            <a href="{{route('supervisors.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.supervisor')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('supervisors.create'))
                        <li class="nav-item start">
                            <a href="{{route('supervisors.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.add_new_supervisor')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.admission_role')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('admission-roles.index'))
                    <li class="nav-item start">
                        <a href="{{route('admission-roles.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('admin/partials/navigation.admission_role')}}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('admission-roles.create'))
                        <li class="nav-item start">
                            <a href="{{route('admission-roles.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.add_new_admission_role')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{trans('admin/partials/navigation.education_level')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('education-levels.index'))
                        <li class="nav-item start">
                            <a href="{{route('education-levels.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.education_level')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif

                    @if(Auth::guard('admin')->user()->can('education-levels.create'))
                        <li class="nav-item start">
                            <a href="{{route('education-levels.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.add_new_education_level')}}</span>
                                <span class="selected"></span>
                            </a>
                         </li>
                    @endif
                </ul>
            </li>

                <li class="nav-item start">
                    <a href="{{route('contact-us.index')}}" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title"> {{trans('admin/appointment.contact-us')}}</span>
                    </a>
                </li>
            <li class="nav-item start">
                <a href="{{route('admin.general.setting')}}" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title"> {{trans('admin/partials/navigation.website_general_settings')}}</span>

                </a>
        </ul>

        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->