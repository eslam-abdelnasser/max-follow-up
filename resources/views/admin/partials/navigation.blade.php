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
                    @if(Auth::guard('admin')->user()->can('languages.index'))
                        <li class="nav-item start">
                            <a href="{{route('languages.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">{{trans('admin/partials/navigation.show_all_languages')}}</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('languages.create'))
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
                    <span class="title">{{trans('admin/partials/navigation.about_us')}}</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
            @if(Auth::guard('admin')->user()->can('admin.about.index'))
                <li class="nav-item start">
                    <a href="{{route('admin.about.index')}}" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title">{{trans('admin/partials/navigation.about_us')}}</span>
                    </a>
                </li>
            @endif


            @if(Auth::guard('admin')->user()->can('admin.who.index'))
                <li class="nav-item start">
                    <a href="{{route('admin.who.index')}}" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title">{{trans('admin/partials/navigation.who')}}</span>
                    </a>
                </li>
            @endif

            @if(Auth::guard('admin')->user()->can('admin.director-words.index'))
                <li class="nav-item start">
                    <a href="{{route('admin.director-words.index')}}" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title">{{trans('admin/partials/navigation.director_words')}}</span>
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

         {{-- start why us module --}}

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Why us </span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('why-us.index'))
                        <li class="nav-item start">
                            <a href="{{route('why-us.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">show why us</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('why-us.create'))
                        <li class="nav-item start">
                            <a href="{{route('why-us.create')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Create why us</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
         {{-- start why us module --}}



            <li class="heading">
                <h3 class="uppercase">Gallery</h3>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Images</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('images.index'))
                        <li class="nav-item start">
                            <a href="{{route('images.index')}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Show images</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(Auth::guard('admin')->user()->can('images.create'))
                        <li class="nav-item start">
                            <a href="{{route('images.create',['type'=>'accreditation'])}}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Add new accreditation</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                        @if(Auth::guard('admin')->user()->can('images.create'))
                            <li class="nav-item start">
                                <a href="{{route('images.create',['type'=>'small-images'])}}" class="nav-link ">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Add images</span>
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

             {{---  start team navigation  --}}

            <li class="heading">
                <h3 class="uppercase">Team</h3>
            </li>
            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Team</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                   <li class="nav-item start">
                       <a href="javascript:;" class="nav-link nav-toggle">
                           <i class="icon-home"></i>
                           <span class="title">Team</span>
                           <span class="selected"></span>
                           <span class="arrow"></span>
                       </a>
                       <ul class="sub-menu">
                    @if(Auth::guard('admin')->user()->can('team.index'))
                        <li class="nav-item start">
                            <a href="{{route('team.index')}}" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Show team</span>
                            </a>
                        </li>
                        @endif


                        @if(Auth::guard('admin')->user()->can('team.create'))
                            <li class="nav-item start">
                                <a href="{{route('team.create')}}" class="nav-link nav-toggle">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">Create team</span>
                                </a>
                            </li>
                        @endif
                       </ul>
                   </li>

                    <li class="nav-item start">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">Admin structure</span>
                            <span class="selected"></span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if(Auth::guard('admin')->user()->can('admin-structure.index'))
                                <li class="nav-item start">
                                    <a href="{{route('admin-structure.index')}}" class="nav-link nav-toggle">
                                        <i class="icon-puzzle"></i>
                                        <span class="title">Show Admin Structure</span>
                                    </a>
                                </li>
                            @endif


                            @if(Auth::guard('admin')->user()->can('admin-structure.create'))
                                <li class="nav-item start">
                                    <a href="{{route('admin-structure.create')}}" class="nav-link nav-toggle">
                                        <i class="icon-puzzle"></i>
                                        <span class="title">Create Admin Structure</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    {{-- start board trustees --}}
                    <li class="nav-item start">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">Board Trustees</span>
                            <span class="selected"></span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if(Auth::guard('admin')->user()->can('board-trustees.index'))
                                <li class="nav-item start">
                                    <a href="{{route('board-trustees.index')}}" class="nav-link nav-toggle">
                                        <i class="icon-puzzle"></i>
                                        <span class="title">Show Board Trustees</span>
                                    </a>
                                </li>
                            @endif


                            @if(Auth::guard('admin')->user()->can('board-trustees.create'))
                                <li class="nav-item start">
                                    <a href="{{route('board-trustees.create')}}" class="nav-link nav-toggle">
                                        <i class="icon-puzzle"></i>
                                        <span class="title">Create Board Trustees</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    {{-- start board trustees --}}

                </ul>


            </li>
             {{---  end team navigation  --}}

            {{-- start admin structure --}}


            {{---  end team navigation  --}}

            {{-- end admin structure --}}







            <li class="heading">
                <h3 class="uppercase">{{trans('admin/partials/navigation.my_school')}}</h3>
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