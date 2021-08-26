
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
                        <li class="pcoded-trigger  {{Request::is('admin/makes*') ? 'active ' : '' }}">
                            <a href="{{url('/admin/makes')}}">
                                <span class="pcoded-micon"><i class="ti-layout-media-center-alt"></i><b>V</b></span>
                                <span class="pcoded-mtext">Makes</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class=" pcoded-trigger  {{Request::is('admin/models*') ? 'active ' : '' }}">
                            <a href="{{url('/admin/models')}}">
                                <span class="pcoded-micon"><i class="ti-truck"></i><b>V</b></span>
                                <span class="pcoded-mtext">Models</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-trigger  {{Request::is('admin/dimensions*') ? 'active ' : '' }}">
                            <a href="{{url('/admin/dimensions')}}">
                                <span class="pcoded-micon"><i class="ti-ruler-alt-2"></i><b>V</b></span>
                                <span class="pcoded-mtext">Dimensions</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-hasmenu {{Request::is('admin/shipping*') ? 'active pcoded-trigger complete' : '' }}" dropdown-icon="style1" subitem-icon="style6">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="ti-car"></i><b>C</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.extra-components.main">Shipping</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-trigger  {{Request::is('admin/quotations*') ? 'active ' : '' }}">
                            <a href="{{url('/admin/quotations')}}">
                                <span class="pcoded-micon"><i class="ti-shopping-cart-full"></i><b>B</b></span>
                                <span class="pcoded-mtext">Quotations</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-trigger  {{Request::is('admin/inquiries*') ? 'active ' : '' }}">
                            <a href="{{url('/admin/inquiries')}}">
                                <span class="pcoded-micon"><i class="ti-envelope"></i><b>B</b></span>
                                <span class="pcoded-mtext">Inquiries</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-trigger  {{Request::is('admin/customers*') ? 'active ' : '' }}">
                            <a href="{{url('/admin/customers')}}">
                                <span class="pcoded-micon"><i class="ti-user"></i><b>B</b></span>
                                <span class="pcoded-mtext">Customers</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-trigger  {{Request::is('admin/users*') ? 'active ' : '' }}">
                            <a href="{{url('/admin/users')}}">
                                <span class="pcoded-micon"><i class="ti-id-badge"></i><b>B</b></span>
                                <span class="pcoded-mtext">Users</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-trigger  {{Request::is('admin/branches*') ? 'active ' : '' }}">
                            <a href="{{url('/admin/branches')}}">
                                <span class="pcoded-micon"><i class="ti-layout-tab"></i><b>B</b></span>
                                <span class="pcoded-mtext">CMS</span>
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
