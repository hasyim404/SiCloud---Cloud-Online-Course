<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

  <title>SiCloud - @yield('title')</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('img/title-logo.png') }}" rel="icon">
  <link href="{{ url('img/title-logo.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="{{ asset('template/landingpage/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('template/landingpage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/landingpage/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/landingpage/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('template/landingpage/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('template/landingpage/assets/css/style.css') }}" rel="stylesheet">

  <!-- MyCSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- Livewire Laravel -->
  @livewireStyles

  <!-- =======================================================
  * Template Name: FlexStart - v1.11.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Sweetalert ======= -->
  @include('sweetalert::alert')
  <!-- End Sweetalert -->

  <!-- ======= Header ======= -->
  @include('landingpage.partials.navbar')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @yield('hero')
  <!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    @yield('content')
    <!-- End About Section -->

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('landingpage.partials.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template/landingpage/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('template/landingpage/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('template/landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/landingpage/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('template/landingpage/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('template/landingpage/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('template/landingpage/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Sweetalert JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  @yield('sweetalert2')

  <!-- Template Main JS File -->
  <script src="{{ asset('template/landingpage/assets/js/main.js') }}"></script>

  <!-- Livewire Laravel -->
  @livewireScripts

</body>

</html>