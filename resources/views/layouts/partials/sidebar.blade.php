<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <x-application-logo />
        <span class="brand-text font-weight-light">
            {{ config('app.name') }}
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- @isset(auth()->user()->teams)
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ Storage::url(auth()->user()->img) }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>
        @endisset --}}

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="{{ __('Search') }}"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Dashboard') }}
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                @role('Admin|Team Supervisor|Team Collaborator|Independiente|Main Salesman|Salesmen')
                    <li
                        class="nav-item {{ request()->routeIs('admin.appointments.*') || request()->routeIs('admin.customers.*') ? 'menu-open' : '' }}">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Clients Managements
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @role('Admin|Team Supervisor|Team Collaborator|Independiente|Main Salesman|Salesmen')
                                <li class="nav-item">
                                    <a href="{{ route('admin.appointments.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            {{ __('Appointments') }}
                                            {{-- <i class="right fas fa-angle-left"></i> --}}
                                        </p>
                                    </a>
                                </li>
                            @endrole

                            @role('Admin|Team Supervisor|Team Collaborator|Independiente|Main Salesman|Salesmen')
                                <li class="nav-item">
                                    <a href="{{ route('admin.customers.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            {{ __('Customers') }}
                                            {{-- <i class="right fas fa-angle-left"></i> --}}
                                        </p>
                                    </a>
                                </li>
                            @endrole
                            {{-- <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li> --}}
                        </ul>
                    </li>
                @endrole
                @role('Admin|Main Salesman')
                    <li
                        class="nav-item {{ request()->routeIs('admin.roles.*') || request()->routeIs('admin.users.*') ? 'menu-open' : '' }}">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>
                                Users Managements
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @role('Admin|Main Salesman')
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            {{ __('Users') }}
                                            {{-- <i class="right fas fa-angle-left"></i> --}}
                                        </p>
                                    </a>
                                </li>
                            @endrole
                            @role('Admin')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            {{ __('Roles') }}
                                            {{-- <i class="right fas fa-angle-left"></i> --}}
                                        </p>
                                    </a>
                                </li>
                            @endrole
                            {{-- <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li> --}}
                        </ul>
                    </li>
                @endrole
                @role('Admin|Main Salesman')
                    <li class="nav-item">
                        <a href="{{ route('admin.teams.index') }}"
                            class="nav-link {{ request()->routeIs('admin.teams.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                {{ __('Teams') }}
                            </p>
                        </a>
                    </li>
                @endrole

                @role('Salesmen')
                    <li class="nav-item">
                        <a href="{{ route('admin.team.view') }}"
                            class="nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                {{ __('My Team') }}
                                {{-- <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>
                    </li>
                @endrole
                {{-- <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
