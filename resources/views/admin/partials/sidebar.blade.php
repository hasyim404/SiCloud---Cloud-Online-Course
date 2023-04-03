<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/dashboard') || Request::is('admin') ? "" : "collapsed" }}" 
          href="{{ url('admin/dashboard') }}">
          <i class="bi bi-grid"></i>
          
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Kelola Data</li>

      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/users/*') || Request::is('admin/users/*/edit') ? "" : "collapsed" }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i>
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
              <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
            </svg>
          </i>
          <span>User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse{{ Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/users/*') || Request::is('admin/users/*/edit') ? " show" : "" }} " data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/users/*') || Request::is('admin/users/*/edit') ? "active" : "" }}" href="{{ url('admin/users') }}">
              <i class="bi bi-person-lines-fill fs-6"></i><span>Kelola User</span>
            </a>
          </li>
        </ul>
      </li><!-- End Kelola User Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/course') || Request::is('admin/course/create') || Request::is('admin/course/*') || Request::is('admin/course/*/edit') ||
                              Request::is('admin/modul') || Request::is('admin/modul/create') || Request::is('admin/modul/*') || Request::is('admin/modul/*/edit') ||
                              Request::is('admin/filemateri') || Request::is('admin/filemateri/create') || Request::is('admin/filemateri/*') || Request::is('admin/filemateri/*/edit') ||
                              Request::is('admin/videomateri') || Request::is('admin/videomateri/create') || Request::is('admin/videomateri/*') || Request::is('admin/videomateri/*/edit') 
                              ? "" : "collapsed" }}" data-bs-target="#components-nav-course" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cloud-plus-fill"></i><span>Course</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-course" class="nav-content collapse{{ Request::is('admin/course') || Request::is('admin/course/create') || Request::is('admin/course/*') || Request::is('admin/course/*/edit') ||
                                                                     Request::is('admin/modul') || Request::is('admin/modul/create') || Request::is('admin/modul/*') || Request::is('admin/modul/*/edit') ||
                                                                     Request::is('admin/filemateri') || Request::is('admin/filemateri/create') || Request::is('admin/filemateri/*') || Request::is('admin/filemateri/*/edit') ||
                                                                     Request::is('admin/videomateri') || Request::is('admin/videomateri/create') || Request::is('admin/videomateri/*') || Request::is('admin/videomateri/*/edit') ? " show" : "" }} " data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ Request::is('admin/course') || Request::is('admin/course/create') || Request::is('admin/course/*') || Request::is('admin/course/*/edit') ? "active" : "" }}" href="{{ url('admin/course') }}">
              <i class="bi bi-cloud-haze2 fs-6" ></i><span>Judul Course</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('admin/modul') || Request::is('admin/modul/create') || Request::is('admin/modul/*') || Request::is('admin/modul/*/edit') ? "active" : "" }}" href="{{ url('admin/modul') }}">
              <i class="bi bi-files fs-6" ></i><span>Modul</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('admin/filemateri') || Request::is('admin/filemateri/create') || Request::is('admin/filemateri/*') || Request::is('admin/filemateri/*/edit') ? "active" : "" }}" href="{{ url('admin/filemateri') }}">
              <i class="bi bi-file-earmark-pdf fs-6"></i><span>File Materi</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('admin/videomateri') || Request::is('admin/videomateri/create') || Request::is('admin/videomateri/*') || Request::is('admin/videomateri/*/edit') ? "active" : "" }}" href="{{ url('admin/videomateri') }}">
              <i class="bi bi-file-earmark-play fs-6" ></i><span>Link Video</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Course Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/modul') || Request::is('admin/modul/create') || Request::is('admin/modul/*') || Request::is('admin/modul/*/edit') ? "" : "collapsed" }}" 
          href="{{ url('admin/modul') }}">
          <i class="bi bi-files"></i>
          
          <span>Modul</span>
        </a>
      </li>
      <!-- End Testimoni Nav --> --}}

      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/feedback') || Request::is('admin/feedback/create') || Request::is('admin/feedback/*') || Request::is('admin/feedback/*/edit') ? "" : "collapsed" }}" 
          href="{{ url('admin/feedback') }}">
          <i class="bi bi-envelope-fill"></i>
          
          <span>Feedback</span>
        </a>
      </li>
      <!-- End Feedback Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/testimoni') || Request::is('admin/testimoni/create') || Request::is('admin/testimoni/*') || Request::is('admin/testimoni/*/edit') ? "" : "collapsed" }}" 
          href="{{ url('admin/testimoni') }}">
          <i class="bi bi-chat-right-quote"></i>
          
          <span>Testimoni</span>
        </a>
      </li>

      <hr class="px-5">
      <li class="nav-heading">Go To</li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('/home') }}">
              <i class="bi bi-house"></i>
              <span>Landingpage</span>
          </a>
      </li>

      <hr class="px-5">
      <li class="nav-heading">Dokumentasi</li>

      <li class="nav-item">
          <a class="nav-link collapsed" target="_blank" href="https://documenter.getpostman.com/view/18406189/2s8YzZQeoU">
            <i class="bi bi-file-earmark-code"></i>
              <span>API Dokumentasi</span>
          </a>
      </li>
      
      <!-- End Search Bar -->
      <!-- End Testimoni Nav -->

    </ul>

  </aside>