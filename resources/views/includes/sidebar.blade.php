<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">e-Transport</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pages
    </div>
    <!-- Profile Link -->
    <!-- Profile Link -->
    @auth
        @if (auth()->user()->role->name === 'admin')
            <li class="nav-item {{ Route::currentRouteName() == 'admin.profile' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.profile') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="nav-item {{Route::currentRouteName() == 'admin.subscriptions' ? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin.subscriptions')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Subscriptions</span>
                </a>
            </li>
            <li class="nav-item {{Route::currentRouteName() == 'admin.cards' ? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin.cards')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Orders (Cards)</span>
                </a>
            </li>
            <li class="nav-item {{Route::currentRouteName() == 'admin.users' ? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin.users')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Users</span>
                </a>
            </li>
            <li class="nav-item {{Route::currentRouteName() == 'admin.roles' ? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin.roles')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Roles</span>
                </a>
            </li>
            <li class="nav-item {{Route::currentRouteName() == 'admin.notifications' ? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin.notifications')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Notifications</span>
                </a>
            </li>
        @else
            <li class="nav-item {{ Route::currentRouteName() == 'user.profile' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.profile') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'user.subscriptions' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.subscriptions') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Buy Subscriptions</span>
                </a>
            </li>
            <li class="nav-item {{Route::currentRouteName() == 'user.cards' ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('user.cards') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>My Orders (Virtual Cards)</span>
                </a>
            </li>
            <li class="nav-item {{Route::currentRouteName() == 'user.notifications' ? 'active' : ''}}">
                <a class="nav-link" href="{{route('user.notifications')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>My Notifications</span>
                </a>
            </li>
        @endif
    @endauth
</ul>
<!-- End of Sidebar -->
