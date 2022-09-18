<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="{{ route('user_home') }}" class="logo d-flex align-items-center">
      <img src="{{ asset('uploads/icon/'.$global_setting_data->logo) }}" alt="">
      <span class="d-none d-lg-block">Kara Admin</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
  </div><!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->



      <li class="nav-item dropdown pe-5">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="{{ asset('userprofile/'.Auth::guard('user')->user()->photo) }}" alt="Profile"
            class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::guard('user')->user()->name }}</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-item">
            <h6 class="ps-2">{{ Auth::guard('user')->user()->name }}</h6>
            <span class="ps-2">{{ Auth::guard('user')->user()->email }}</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('user_profile') }}">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
              <i class="bi bi-gear"></i>
              <span>Account Settings</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
              <i class="bi bi-question-circle"></i>
              <span>Need Help?</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('user_logout') }}">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

{{-- 
                
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-link">
                        <a href="" target="_blank"
                         class="btn btn-warning">Front End</a>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                         
                        <img src="{{ asset('userprofile/'.Auth::guard('admin')->user()->photo) }}"
class="rounded-circle mr-1" alt="image">
<div class="d-sm-none d-lg-inline-block text-capitalize">{{ Auth::guard('admin')->user()->name }}</div></a>
<div class="dropdown-menu dropdown-menu-right">
  <a href="{{ route('admin_profile') }}" class="dropdown-item has-icon">
    <i class="far fa-user"></i> Edit Profile
  </a>
  <a href="{{ route('admin_logout') }}" class="dropdown-item has-icon text-danger">
    <i class="fas fa-sign-out-alt"></i> Logout
  </a>
</div>
</li>
</ul>
</nav>
--}}