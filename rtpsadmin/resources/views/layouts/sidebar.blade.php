<div class="side">
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        {{-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-code"></i>
            </div>
            <div class="sidebar-brand-text mx-3">RTP Admin</div>
        </a> --}}

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Dashboard -->
        <div class="sidebar-heading" style="font-size:12px">
            Admin
        </div>

        <li class="nav-item active">
            <a class="nav-link menu-1" href="/">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span class="">Dashboard</span></a>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading" style="font-size:12px">
            User
        </div>

        <li class="nav-item">
            <a class="nav-link pb-0 menu-1" href="{{ route('users.index') }}">
                <i class="fas fa-users"></i>
                <span class="">User Management</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0 menu-1" href="{{ route('users.show', ['user' => auth()->user()->id]) }}">
                <i class="fas fa-fw fa-user"></i>
                <span class="">My Profile</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link menu-1" href="{{ route('users.edit', ['user' => auth()->user()->id]) }}">
                <i class="fas fa-fw fa-user-edit"></i>
                <span class="">Edit Profile</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading" style="font-size:12px">
            Menu
        </div>

        <li class="nav-item">
            <a class="nav-link pb-0 menu-2" href="{{ route('tambah_game.index') }}">
                <i class="fa fa-th-large"></i>
                <span class="">Add Games</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0 menu-2" href="{{ route('prediksi_togel.edit', auth()->user()->sites->id) }}">
                <i class="fa fa-book"></i>
                <span class="">Togel Predictions</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0 menu-2" href="{{ route('berita_all.edit', auth()->user()->sites->id) }}">
                <i class="fas fa-fw fa-list"></i>
                <span class="">News</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link menu-1" href="{{ route('site_setting.edit', auth()->user()->sites->id) }}">
                <i class="fas fa-fw fa-cog"></i>
                <span class="">Site Settings</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link pb-0 menu-1" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span class="">{{ __('Logout') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

        <!-- Divider -->
        {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

        <!-- Sidebar Toggler (Sidebar) -->
        {{-- <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div> --}}

    </ul>

</div>
<!-- End of Sidebar -->
