<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light nav-1 topbar mb-4 fixed-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <a class="sidebar-brand d-flex align-items-center justify-content-center text-decoration-none ml-3" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code logos"></i>
        </div>
        <div class="sidebar-brand-text mx-3 logo">RTP Admin</div>
    </a>

    <!-- Topbar Navbar -->

    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>


        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline profile">{{ auth()->user()->name }}</span>
                <img class=" rounded-circle" style="width: 40px" src="{{ asset('assets/img/undraw_profile.svg') }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('users.show', ['user' => auth()->user()->id]) }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    </ul>

</nav>

<!-- End of Topbar -->
