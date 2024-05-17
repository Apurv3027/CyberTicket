<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <!-- <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.png" alt="logo" /></a>
  </div> -->
    <ul class="nav">
        <!-- <li class="nav-item menu-items">
      <a class="nav-link" href="{{ url('/') }}">
        <span class="menu-icon">
          <i class="mdi mdi-home"></i>
        </span>
        <span class="menu-title">Home</span>
      </a>
    </li> -->
        <li class="nav-item nav-category">
            <span class="nav-link">Menu</span>
        </li>
        <li class="nav-item menu-items {{ request()->is('admindashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admindashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items {{ request()->is('adminusers') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/adminusers') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item menu-items {{ request()->is('adminuserticketsdata') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/adminuserticketsdata') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Tickets</span>
            </a>
        </li>
        <li
            class="nav-item menu-items {{ request()->is('adminmoviesdata') || request()->is('adminmovies') || request()->is('updatemovie/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/adminmoviesdata') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Current Movies</span>
            </a>
        </li>
        <li
            class="nav-item menu-items {{ request()->is('adminupcomingmoviesdata') || request()->is('adminupcomingmovies') || request()->is('updateupcomingmovie/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/adminupcomingmoviesdata') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Upcoming Movies</span>
            </a>
        </li>
        <li
            class="nav-item menu-items {{ request()->is('adminmultiplexdata') || request()->is('adminmultiplex') || request()->is('updatemultiplex/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/adminmultiplexdata') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Multiplex</span>
            </a>
        </li>
        <li
            class="nav-item menu-items {{ request()->is('adminscreendata') || request()->is('adminscreen') || request()->is('updatescreen/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/adminscreendata') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Screen</span>
            </a>
        </li>
        <li
            class="nav-item menu-items {{ request()->is('adminmovieshowdata') || request()->is('adminmovieshow') || request()->is('updatemovieshow/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/adminmovieshowdata') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Movie Shows</span>
            </a>
        </li>
        <li class="nav-item menu-items {{ request()->is('adminusercontactdata') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/adminusercontactdata') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">User Contact</span>
            </a>
        </li>
    </ul>
</nav>
