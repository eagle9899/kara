<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item {{ Request::is('admin/home') ? 'active' : ''}}">
      <a class="nav-link " href="{{ route('admin_home') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li
      class="nav-item  {{ Request::is('admin/category/*') || Request::is('admin/property/*') || Request::is('admin/post/*') ? 'active' : ''}}">
      <a class="nav-link collapsed" data-bs-target="#menus-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Menus</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="menus-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="{{ Request::is('admin/category/*') ? 'active' : '' }}">
          <a href="{{ route('category_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Category</span>
          </a>
        </li>

        <li class="{{ Request::is('admin/sub-category/*') ? 'active' : '' }}">
          <a href="{{ route('sub_category_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Sub Category</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}">
          <a href="{{ route('ad_post_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Post a new One</span>
          </a>
        </li>

      </ul>
    </li>

    {{-- users start --}}
    <li class="nav-item  {{ Request::is('admin/users/*')  }}">
      <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Users List</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="{{ Request::is('admin/users/show') ? 'active' : '' }}">
          <a href="{{ route('ad_user_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Users</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/users/mail-all') ? 'active' : '' }}">
          <a href="{{ route('ad_user_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Users Activation</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/users/mail-all') ? 'active' : '' }}">
          <a href="{{ route('ad_user_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Users Mails</span>
          </a>
        </li>
      </ul>
    </li>
    {{-- users end --}}

    <li
      class="nav-item  {{ Request::is('admin/advertise/ads-*') || Request::is('admin/advertise/page-ads-*') ? 'active' : ''}}">
      <a class="nav-link collapsed" data-bs-target="#advertis-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Advertisement</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="advertis-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="{{ Request::is('admin/advertise/ads-*') ? 'active' : ''}}">
          <a href="{{ route('ad_home_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Home Advertisement</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/advertise/page-ads-*') ? 'active' : '' }}">
          <a href="{{ route('ad_page_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Page Advertisement</span>
          </a>
        </li>

      </ul>
    </li>


    <li class="nav-item  {{ Request::is('admin/photos/*') || Request::is('admin/photos/*') ? 'active' : ''}}">
      <a class="nav-link collapsed" data-bs-target="#photos-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Photos</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="photos-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="{{ Request::is('admin/photos/*') ? 'active' : ''}}">
          <a href="{{ route('ad_post_photos_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Home Photos</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/advertise/page-ads-*') ? 'active' : '' }}">
          <a href="{{ route('ad_page_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Page Advertisement</span>
          </a>
        </li>

      </ul>
    </li>

    {{-- pages start --}}

    <li
      class="nav-item  {{ Request::is('admin/about/*') || Request::is('admin/faq/*') || Request::is('admin/post/*') ? 'active' : ''}}">
      <a class="nav-link collapsed" data-bs-target="#pages-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Pages</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="pages-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="{{ Request::is('admin/about/*') ? 'active' : '' }}">
          <a href="{{ route('ad_about_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>About</span>
          </a>
        </li>

        <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}">
          <a href="{{ route('ad_faq_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Faq</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/terms/*') ? 'active' : '' }}">
          <a href="{{ route('ad_terms_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Terms and Conditions</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/privacy/*') ? 'active' : '' }}">
          <a href="{{ route('ad_privacy_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Privacy and Policy</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/desclaimir/*') ? 'active' : '' }}">
          <a href="{{ route('ad_disclaimir_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Disclaimir</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/loginpage/*') ? 'active' : '' }}">
          <a href="{{ route('ad_loginpage_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Login Page User</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/contact/*') ? 'active' : '' }}">
          <a href="{{ route('ad_contactpage_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Contact</span>
          </a>
        </li>

      </ul>
    </li>

    {{-- pages end --}}


    {{-- subscriber start --}}

    <li class="nav-item  {{ Request::is('admin/subcriber/*')  }}">
      <a class="nav-link collapsed" data-bs-target="#subscriber-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Subscriber Section</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="subscriber-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="{{ Request::is('admin/subscriber/show') ? 'active' : '' }}">
          <a href="{{ route('ad_subscriber_showall_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Subcriber</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/subscriber/mail-all') ? 'active' : '' }}">
          <a href="{{ route('ad_subscriber_mailto_all') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Send Email to All</span>
          </a>
        </li>

      </ul>
    </li>

    {{-- subcriber end --}}

    {{-- subscriber start --}}

    <li class="nav-item  {{ Request::is('admin/setting/*')  }}">
      <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Setting Section</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="setting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="{{ Request::is('admin/setting/*') ? 'active' : '' }}">
          <a href="{{ route('ad_setting_show') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Setting</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/ouraddress/*') ? 'active' : '' }}">
          <a href="{{ route('ad_address_ad_view') }}" class="nav-link">
            <i class="bi bi-circle"></i><span>Our Location</span>
          </a>
        </li>

      </ul>
    </li>

    {{-- subcriber end --}}

    {{-- Income start --}}

    <li class="nav-item  {{ Request::is('admin/income/*')  }}">
      <a href="{{ route('ad_income_view') }}" class="nav-link">
        <i class="bi bi-circle"></i><span>Income</span>
      </a>
    </li>

    {{-- Income end --}}



    <li class="nav-heading">Pages</li>

    <li class="nav-item active">
      <a class="nav-link collapsed" href="{{ route('ad_faqpage_ad_view') }}">
        <i class="bi bi-person"></i>
        <span>Faq Page</span>
      </a>
    </li>

    <li class="nav-item {{ Request::is('admin/socialicon/*') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="{{ route('ad_socialicon_ad_view') }}">
        <i class="bi bi-person"></i>
        <span>Social Icon</span>
      </a>
    </li>

    <li class="nav-item {{ Request::is('admin/shareable/*') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="{{ route('ad_shareable_ad_view') }}">
        <i class="bi bi-person"></i>
        <span>Shareable Icon</span>
      </a>
    </li>

    <li class="nav-item active">
      <a class="nav-link collapsed" href="{{ route('admin_profile') }}">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li>


  </ul>

</aside><!-- End Sidebar-->