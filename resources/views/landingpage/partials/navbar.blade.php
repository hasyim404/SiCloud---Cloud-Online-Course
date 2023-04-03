  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ url('/home') }}" class="logo d-flex align-items-center">
        <img src="{{ url('img/main-logo.png') }}" alt="">
        <span>SiCloud</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ Request::is('/') || Request::is('home') ? "active" : "" }}" href="{{ url('/home') }}">Home</a></li>
          <li><a class="nav-link scrollto {{ Request::is('daftar-course') ? "active" : "" }}" href="{{ url('/daftar-course') }}">Course</a></li>
          <li><a class="nav-link scrollto {{ Request::is('about') ? "active" : "" }}" href="{{ url('/about') }}">About</a></li>

          @guest
            @if (Route::has('login'))
              <li>
                <a class="getstarted scrollto" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
            @endif
          @else
            <li class="dropdown">
              <a href="#">
                <span class="m-2">{{ Auth::user()->username }}</span> 

                @if(!empty(Auth::user()->foto)) 
                    <img src="{{ url('img/users_profile')}}/{{Auth::user()->foto}}" height="35px" width="35px" alt="Profile"  class="rounded-circle">
                @else
                    <img src="{{ url('img/users_profile/!profile-default.jpg') }}" height="35px" width="35px" alt="Profile" class="rounded-circle">
                @endif 
                {{-- <i class="bi bi-chevron-down"></i> --}}
              </a>
              <ul>
                <li>
                  <a href="{{ route('my-profile.index') }}">
                    <span>My Profile</span>
                  </a>
                </li>
                @if (Auth::user()->role == 'Admin')
                <li>
                  <a href="{{ url('/admin/dashboard') }}">
                    <span>Go to Admin</span>
                  </a>
                </li>
                @endif
                <hr class="mx-3">
                <li>
                  <a class="text-danger" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">

                      {{-- <button class="btn btn-danger btn-md"> --}}
                        {{ __('Logout') }}  
                      {{-- </button> --}}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </li>
              </ul>
            </li>
          @endguest
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->