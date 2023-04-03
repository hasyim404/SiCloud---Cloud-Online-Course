@extends('landingpage.index')
@section('title')
    About
@endsection
@section('content')
<!-- ======= About Section ======= -->
<section id="about" class="about">

    <div class="container" data-aos="fade-up">

        <header class="section-header pt-5">
            {{-- <h2>Blog</h2> --}}
            <p class="text-decoration-underline">About SiCloud</p>
        </header>

        <div class="row gx-0">

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
            <h3>Who We Are</h3>
            <h2>Penyedia Materi Cource tentang Cloud Gratis</h2>
            <p>
                Penyediaan terhadap materi tentang cloud sudah sering banyak dijumpai di internet, tetapi biasanya tidak terlalu 
                banyak yang menyediakan course itu secara gratis. Latar belakang kami membuat aplikasi web ini adalah supaya orang 
                lain bisa mengakses materi dan course yang tersedia pada web kami secara gratis. Pada aplikasi web ini kami membuat 
                tentang penyedia materi cloud seperti AWS contohnya yang disediakan secara gratis, hanya bermodalkaan login saja dan 
                user yang telah mendaftar langsung bisa mengakses materi course yang diminati.
            </p>
            {{-- <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Read More</span>
                <i class="bi bi-arrow-right"></i>
                </a>
            </div> --}}
            </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ url('img/about.jpg') }}" class="img-fluid" alt="">
        </div>

        </div>
    </div>

</section>
<!-- End About Section -->
@endsection