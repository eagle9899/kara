<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item {{ Request::is('user/home') ? 'active' : ''}}">
      <a class="nav-link " href="{{ route('user_home') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    {{-- pages start --}}
    <li class="nav-item {{ Request::is('user/post/*') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="{{ route('user_post_view') }}">
        <i class="bi bi-person"></i>
        <span>Posts</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('user/income/*') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="{{ route('user_photo') }}">
        <i class="bi bi-person"></i>
        <span>Posts Photos</span>
      </a>
    </li>

    <li class="nav-item {{ Request::is('user/income/*') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="{{ route('user_income_view') }}">
        <i class="bi bi-person"></i>
        <span>Incomes</span>
      </a>
    </li>

    {{-- pages end --}}





    <li class="nav-heading">Pages</li>


    <li class="nav-item active">
      <a class="nav-link collapsed" href="{{ route('user_profile') }}">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li>


  </ul>

</aside><!-- End Sidebar-->