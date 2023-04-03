<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

  <title>@yield('title') - Admin | SiCloud</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('img/title-logo.png') }}" rel="icon">
  <link href="{{ url('img/title-logo.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('template/admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('template/admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('template/admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('template/admin/assets/css/style.css') }}" rel="stylesheet">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  <!-- Livewire Laravel -->
  @livewireStyles
  
</head>

<body>

  <!-- ======= Sweetalert ======= -->
  @include('sweetalert::alert')
  <!-- End Sweetalert -->

  <!-- ======= Header ======= -->
  @include('admin.partials.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.partials.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      @yield('page_title')
    </div><!-- End Page Title -->

    <!-- ======= Content ======= -->
    <section class="section dashboard">
      <div class="row">

        @yield('content')

      </div>
    </section>
    <!-- ======= End Content ======= -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  {{-- @include('admin.partials.footer') --}}
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template/admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('template/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/admin/assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('template/admin/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('template/admin/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('template/admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('template/admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('template/admin/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Sweetalert JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 
  <!-- Template Main JS File -->
  <script src="{{ asset('template/admin/assets/js/main.js') }}"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

  @yield('sweetalert2')

  <script>
    $( document ).ready(function() {
      $('.selectpicker').selectpicker();
    });
  </script>

  <!-- Livewire Laravel -->
  @livewireScripts

</body>

</html>