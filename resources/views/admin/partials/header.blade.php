
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('admin/dashboard') }}" class="logo d-flex align-items-center">
        <img src="{{ url('img/main-logo.png') }}" alt="">
        <span class="d-none d-lg-block">SiCloud</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="p-2">{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</span>
              @empty(Auth::user()->foto)
                  <img src="{{ url('img/users_profile/!profile-default.jpg') }}" alt="Profile" class="rounded-circle">
              @else
                  <img src="{{ url('img/users_profile')}}/{{Auth::user()->foto}}" alt="Profile" class="rounded-circle">
              @endempty  
            
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</h6>
              <span>{{ Auth::user()->email }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('users.edit', Auth::user()->id ) }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <button class="btn btn-danger btn-sm">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </button>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>