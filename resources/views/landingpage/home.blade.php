@extends('landingpage.index')
@section('title')
    Home
@endsection
@section('hero')
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Belajar Cloud Semakin Mudah Dengan SiCloud</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Menghadirkan Course Online Gratis Tentang Berbagai Macam Materi Cloud</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                <div class="text-center text-lg-start">
                    @guest
                    <a href="{{ route('register') }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Daftar Sekarang</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>    
                    @else
                    <a href="{{ url('daftar-course') }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Lihat Course</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>    
                    @endguest
                    
                </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ url('template/landingpage/assets/img/hero-img.png') }}" class="img-fluid" alt="">
            </div>
            </div>
        </div>
        
    </section>
@endsection

@section('content')

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

        <div class="row d-flex justify-content-center">

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-journals"></i>
                    <div>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $count_course }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Course</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-file-earmark-text" style="color: #ee6c20;"></i>
                    <div>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $count_modul }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Modul</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-people" style="color: #bb0852;"></i>
                    <div>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $count_user }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>User Bergabung</p>
                    </div>
                </div>
            </div>

        </div>

        </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                {{-- <h2>Blog</h2> --}}
                <p>Recent Course</p>
            </header>

            <div class="row">

                @foreach ($course as $data)
                
                <div class="col-lg-3">
                    <a href="{{ route('daftar-course.show',$data->id) }}">
                        <div class="post-box">
                            <div class="post-img">
                                @empty($data->foto)
                                    <img class="img-fluidd" src="{{ url('img/banner_course/!banner-default.jpg') }}" width="100%" height="100%" alt="Banner-Course" >
                                @else
                                    <img class="img-fluidd" src="{{ url('img/banner_course')}}/{{$data->foto}}" width="100%" height="100%" alt="Banner-Course" >
                                @endempty  
                            </div>
                            <span class="post-date">{{ $data->created_at }}</span>
                            <h3 class="post-title">{{ $data->nama_course }}</h3>
                            {{-- <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a> --}}
                        </div>
                    </a>
                </div>    

                @endforeach
                

            </div>

            <div class="text-center mt-4">
                <a href="{{ route('daftar-course.index') }}" class="btn btn-primary btn-lg rounded-4">Lihat semua course</a>    
            </div>
        </div>

    </section>
    <!-- End Recent Blog Posts Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">

        <div class="container" data-aos="fade-up">
  
          <header class="section-header">
            <h2>Testimoni</h2>
            <p>Apa yang mereka katakan</p>
          </header>
  
          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
  
            @foreach ( $testimoni as $data )

              <div class="swiper-slide">
                <div class="testimonial-item">
                    <div class="profile">
                        @if( empty($data->foto) ) 
                            <img src="{{ url('img/users_profile/!profile-default.jpg') }}" height="80px" width="80px" alt="Profile" class="testimonial-img border"> 
                        @elseif (file_exists( public_path('img/users_profile/'.$data->foto) ))
                            <img src="{{ url('img/users_profile')}}/{{$data->foto}}" height="80px" width="80px" alt="Profile" class="testimonial-img border">
                        @elseif (file_exists( public_path('img/users_profile/testimoni_users_profile/'.$data->foto) ))
                            <img src="{{ url('img/users_profile/testimoni_users_profile')}}/{{$data->foto}}" height="80px" width="80px" alt="Profile"  class="testimonial-img border">
                        @endif 
                        <h3>{{ $data->nama }}</h3>
                        {{-- <h4>Ceo &amp; Founder</h4> --}}
                    </div>
                  {{-- <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div> --}}
                  <p>
                    {{ $data->isi_pesan }}
                  </p>
                  
                </div>
              </div><!-- End testimonial item -->

            @endforeach
  
            </div>
            <div class="swiper-pagination"></div>
          </div>
  
        </div>

        @guest
        @else
        <!-- Button trigger modal -->
        <div class="text-center mt-4">
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-arrow-right"></i> Bagikan pengalamanmu disini <i class="bi bi-arrow-left"></i>
            </button>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ceritakan pengalamanmu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3 mt-3" method="POST" id="confirmTestimoni" >
                            @csrf

                    
                            <div class="col-md-12">
                              <div class="row g-3 mb-3">
                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" value="{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}" @disabled(true) placeholder="Nama Lengkap">
                                    <label for="floatingName">Nama Lengkap</label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row g-3 mb-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                      <textarea class="form-control @error('isi_pesan') is-invalid @enderror" name="isi_pesan" placeholder="Isi Pesan" id="floatingTextarea" style="height: 100px;">{{ old('isi_pesan') }}</textarea>
                                      <label for="floatingTextarea">Isi Pesan</label>
                                        @error('isi_pesan')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>  
                                        @enderror
                                    </div>
                                </div>  
                              </div>

                              <input type="hidden" name="nama" value="{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}">
                              <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                              <input type="hidden" name="foto" value="{{ Auth::user()->foto }}">
                              
                            </div>
                            
                            <div class="modal-footer text-center">
                                <button data-action="{{ route('home.store') }}" type="submit" class="btn btn-primary btnConfirm">Kirim</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            </div>

                        </form><!-- End floating Labels Form -->
                    </div>
                </div>
            </div>
        </div>
        @endguest
  
    </section>
    <!-- End Testimonials Section -->
@endsection

@section('sweetalert2')
<script>

    $('body').on('click', '.btnConfirm', function(e) {
        e.preventDefault();
        var action = $(this).data('action');
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Testimoni hanya bisa di kirim 1x",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Nanti aja',
            confirmButtonText: 'Sudah yakin'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#confirmTestimoni').attr('action', action);
                $('#confirmTestimoni').submit();
            }
        })
    });

    // const list_error =  [
    //                         @foreach ($errors->all() as $error)
    //                             '- {{$error}}<br>',
    //                         @endforeach
    //                     ],

    @if ($errors->all())
    {
        Swal.fire({
        title: 'Gagal',
        html: 
            [
                @foreach ($errors->all() as $error)
                    '- {{$error}}.<br>',
                @endforeach
            ],
        icon: 'error',
        showConfirmButton: true
        });
    }
    @endif
</script>
@endsection