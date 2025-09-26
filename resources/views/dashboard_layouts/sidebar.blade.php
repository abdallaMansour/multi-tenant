<!-- sidebar-wrapper -->
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
        <div class="sidebar-brand" style="text-align: center;">
            <a href="index.html">
                <img src="{{ asset('assets/images/logo-dark.png') }}" height="24" class="custom-logo logo-light-mode" alt="">
                <img src="{{ asset('assets/images/logo-light.png') }}" height="24" class="custom-logo logo-dark-mode" alt="">
                <span class="sidebar-colored">
                    <!-- <img src="assets/images/logo-light.png" height="24" alt=""> -->
                </span>
            </a>
        </div>

        @if (auth()->check())
            <ul class="sidebar-menu">
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="ti ti-home me-2"></i>{{ __('sidebar.dashboard') }}</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('admin.dashboard') }}">{{ __('sidebar.analytics') }}</a></li>
                            {{-- <li><a href="index-crypto.html">Cryptocurrency</a></li> --}}
                        </ul>
                    </div>
                </li>
                @can('read-tenant')
                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="ti ti-building me-2"></i>{{ __('sidebar.tenants') }}</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="{{ route('tenants') }}">{{ __('sidebar.all_tenants') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('read-database_credential')
                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="ti ti-database me-2"></i>{{ __('sidebar.database_credentials') }}</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="{{ route('database-credentials') }}">{{ __('sidebar.database_credentials') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('read-business_activity')
                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="ti ti-briefcase me-2"></i>{{ __('sidebar.business_activities') }}</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="{{ route('business-activities') }}">{{ __('sidebar.business_activities') }}</a></li>
                                <li><a href="{{ route('business-activity-requirements') }}">{{ __('sidebar.business_activity_requirements') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('read-admin')
                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="ti ti-users me-2"></i>{{ __('sidebar.users') }}</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="{{ route('admin.users.index') }}">{{ __('sidebar.users') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('read-role')
                    {{-- New section Roles & Permissions --}}

                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="ti ti-shield-lock me-2"></i>{{ __('sidebar.roles_permissions') }}</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="{{ route('admin.roles.index') }}">{{ __('sidebar.roles') }}</a></li>
                                <li><a href="{{ route('admin.permissions.index') }}">{{ __('sidebar.permissions') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan

                @canany(['read-theme', 'read-page'])
                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="ti ti-palette me-2"></i>{{ __('sidebar.themes') }}</a>
                        <div class="sidebar-submenu">
                            <ul>
                                @can('read-page')
                                    <li><a href="{{ route('admin.pages.index') }}">{{ __('sidebar.pages') }}</a></li>
                                @endcan
                                @can('read-theme')
                                    <li><a href="{{ route('admin.themes.index') }}">{{ __('sidebar.themes') }}</a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('read-package')
                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="ti ti-package me-2"></i>{{ __('sidebar.packages') }}</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="{{ route('admin.packages.index') }}">{{ __('sidebar.packages') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
            </ul>
        @elseif (auth()->guard('tenant')->check())
            <ul class="sidebar-menu">
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="ti ti-home me-2"></i>{{ __('sidebar.tenant_dashboard') }}</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('tenant.dashboard') }}">{{ __('sidebar.tenant_analytics') }}</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="javascript:void(0)"><i class="ti ti-building me-2"></i>{{ __('sidebar.settings') }}</a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('tenant.settings') }}">{{ __('sidebar.tenant_settings') }}</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- sidebar-menu  -->
        @endif
    </div>
</nav>
<!-- sidebar-wrapper  -->
