@extends('landingpage.index')
@section('title')
    Daftar Course
@endsection
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="">
        {{-- <div class="container">

            <ol>
            <li><a href="index.html">Home</a></li>
            <li>Blog</li>
            </ol>
            <h2>Blog</h2>

        </div> --}}
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12">
                    <div class="sidebar">
                        <div class="container">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Daftar Course</li>
                                </ol>
                              </nav>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 entries">

                    <div class="sidebar">
                        <div class="sidebar-item recent-posts">

                            @livewire('search-pagination')
                            
                        </div><!-- End sidebar recent posts-->
                    </div>

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div id="searchbar" class="sticky-top">
                        <div class="sidebar">

                            <h4 class="fw-bold pb-3">Recent Course</h4>
                            <div class="sidebar-item recent-posts">

                                @foreach ( $pag_course as $data )
                                    <div class="post-item clearfix">
                                        <a href="{{ route('daftar-course.show',$data->id) }}">
                                            @empty($data->foto)
                                                <img src="{{ url('img/banner_course/!banner-default.jpg') }}" alt="Banner-Course" >
                                            @else
                                                <img src="{{ url('img/banner_course')}}/{{$data->foto}}" alt="Banner-Course" >
                                            @endempty 
                                            <h4>{{ $data->nama_course }}</h4>
                                            <time datetime="{{ $data->updated_at->format('Y M d') }}"><i class="bi bi-clock-history"></i> {{ $data->updated_at->format('Y M d') }}</time>
                                        </a>
                                    </div>    
                                @endforeach

                            </div><!-- End sidebar recent posts-->

                        </div><!-- End sidebar -->
                    </div>
                    

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Section -->
@endsection