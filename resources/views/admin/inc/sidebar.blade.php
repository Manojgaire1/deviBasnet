
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
            <div class="pcoded-inner-navbar main-menu">
                <div class="">
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-trigger {{Request::is('admin/dashboard*') ? 'active ' : '' }}">
                            <a href="{{url('/admin/dashboard')}}">
                                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                <span class="pcoded-mtext">Dashboard</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-hasmenu {{Request::is('admin/vehicles*') ? 'active pcoded-trigger complete' : '' }}" dropdown-icon="style1" subitem-icon="style6">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="ti-car"></i><b>C</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.extra-components.main">Banners</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="{{Request::is('admin/vehicles') ? 'active ' : '' }}">
                                    <a href="{{route('admin.banner.index')}}">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">{{ __('Banner Lists') }}</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class=" pcoded-trigger  {{Request::is('admin/timelines*') ? 'active ' : '' }}">
                            <a href="{{url('/admin/timelines')}}">
                                <span class="pcoded-micon"><i class="ti-truck"></i><b>V</b></span>
                                <span class="pcoded-mtext">Timeline</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-hasmenu {{Request::is('admin/activities*') ? 'active pcoded-trigger complete' : '' }}" dropdown-icon="style1" subitem-icon="style6">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="ti-car"></i><b>C</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.extra-components.main">Activity</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="{{Request::is('admin/activities') ? 'active ' : '' }}">
                                    <a href="{{route('admin.activity.index')}}">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">{{ __('Activity Lists') }}</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="{{Request::is('admin/activities/types') ? 'active ' : '' }}">
                                    <a href="{{route('admin.activity.type.index')}}">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">{{ __('Type Lists') }}</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu {{Request::is('admin/vehicles*') ? 'active pcoded-trigger complete' : '' }}" dropdown-icon="style1" subitem-icon="style6">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="ti-car"></i><b>C</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.extra-components.main">CMS</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="{{Request::is('admin/vehicles') ? 'active ' : '' }}">
                                    <a href="{{route('admin.banner.index')}}">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">{{ __('About me') }}</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="{{Request::is('admin/cms/interests') ? 'active ' : '' }}">
                                    <a href="{{route('admin.cms.interest.index')}}">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">{{ __('Interests') }}</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu {{Request::is('admin/blogs*') ? 'active pcoded-trigger complete' : '' }}" dropdown-icon="style1" subitem-icon="style6">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="ti-car"></i><b>C</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.extra-components.main">Blog</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="{{Request::is('admin/blogs') ? 'active ' : '' }}">
                                    <a href="{{route('admin.blog.index')}}">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">{{ __('Blog Lists') }}</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="{{Request::is('admin/blogs/categories') ? 'active ' : '' }}">
                                    <a href="{{route('admin.blog.category.index')}}">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">{{ __('Category Lists') }}</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="pcoded-trigger  {{Request::is('admin/testimonials*') ? 'active ' : '' }}">
                            <a href="{{url('/admin/testimonials')}}">
                                <span class="pcoded-micon"><i class="ti-comment-alt"></i><b>B</b></span>
                                <span class="pcoded-mtext">Testimonials</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-trigger  {{Request::is('admin/settings*') ? 'active ' : '' }}">
                            <a href="{{url('/admin/settings')}}">
                                <span class="pcoded-micon"><i class="ti-settings"></i><b>B</b></span>
                                <span class="pcoded-mtext">Settings</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                </div>
            </nav>
