@extends('landingpage.index')
@section('title')
    Course {{ $course->nama_course }}
@endsection
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    {{-- <section class=""> --}}
        {{-- <div class="container">

            <ol>
            <li><a href="index.html">Home</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li>Blog Single</li>
            </ol>
            <h2>Blog Single</h2>

        </div> --}}
    {{-- </section> --}}
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12 mt-5">
                    <div class="sidebar mt-5">
                        <div class="container">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                                  <li class="breadcrumb-item"><a href="{{ url('/daftar-course') }}">Daftar Course</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">{{ $course->nama_course }}</li>
                                </ol>
                              </nav>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">

                    <div class="sidebar">
                            
                        <div class="post-item clearfix">
                            <div class="row">
                                <div class="col col-lg">
                                    @empty($course->foto)
                                        <img class="me-5 rounded" src="{{ url('img/banner_course/!banner-default.jpg') }}" style="width: 100%; height:100%;" alt="Banner-Course" >
                                    @else
                                        <img class="me-5 rounded" src="{{ url('img/banner_course')}}/{{$course->foto}}" style="width: 100%; height:100%;" alt="Banner-Course" >
                                    @endempty  
                                </div>   
                            </div>

                            <div class="row pt-5">
                                <div class="col col-lg">
                                    <h3 class="text-dark fw-bold">{{ $course->nama_course }}</h3>
                                    <time class="m-auto"><i class="bi bi-clock-history"></i> {{ $course->updated_at->format('Y M d') }} &nbsp;&nbsp; <i class="bi bi-file-earmark-text"></i> {{ $count_modul }} Modul</time><br>
                                    <h4 class="mt-5">Deskripsi:</h4>
                                    <span class="text-secondary">{{ $course->deskripsi_course }}</span>    
                                </div>
                            </div>

                            <div class="accordion mt-5" id="accordionExample">
                                @foreach ($join as $data_modul)
                                @php
                                    $target = $data_modul->id_modul;
                                @endphp
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$target}}" aria-expanded="true" aria-controls="collapse{{$target}}">
                                            {{ $data_modul->jdl_modul }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{$target}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="container">

                                                <p class="fs-4 fw-semibold">{{ $data_modul->jdl_modul }}</p>
                                                <p class="fw-semibold">
                                                    Deskripsi Modul: 
                                                    @if (!empty($data_modul->deskripsi_modul))
                                                        <p>{{ $data_modul->deskripsi_modul }}</p>
                                                        <hr class="mb-4">
                                                    @else
                                                        <p>-</p>
                                                        <hr class="mb-4">
                                                    @endif
                                                </p>
                                                <br>

                                                @if (!empty($data_modul->nama_video or $data_modul->pdfmateri))
                                                    
                                                        @if (!empty($data_modul->pdfmateri))
                                                            <a class="file_materi" href="{{ url('/daftar-course/filemateri-download'.'/'.$data_modul->id_filemateri) }}" title="Download">
                                                                <i class="bi bi-filetype-pdf text-danger"></i> {{ $data_modul->pdfmateri }}
                                                            </a>
                                                            <hr> 
                                                        @else
                                                            
                                                        @endif
                                                        

                                                        @if (!empty($data_modul->video))
                                                            <div class="d-flex flex-column align-items-center">
                                                                @php
                                                                    $ytarray=explode("/", $data_modul->video);
                                                                    $ytendstring=end($ytarray);
                                                                    $ytendarray=explode("?v=", $ytendstring);
                                                                    $ytendstring=end($ytendarray);
                                                                    $ytendarray=explode("&", $ytendstring);
                                                                    $ytcode=$ytendarray[0];
                                                                @endphp
                                                                
                                                                <iframe width="500" height="320" src="http://www.youtube.com/embed/{{$ytcode}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                                                </iframe>
                                                            </div>
                                                            <hr>
                                                        @else
                                                            
                                                        @endif
                                                        
                                                    @else
                                                        <p class="text-center py-3 text-secondary">Materi belum tersedia</p>
                                                    @endif 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                                
                            

                        </div> 
                        <!-- End sidebar recent posts-->
                    </div>

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">


                        <h3 class="sidebar-title">Recent Course</h3>
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

                </div><!-- End blog sidebar -->

            </div>

            <div class="row">
                <div class="col-lg-8 entries">
                    <div class="sidebar">
                        <h4 class="fw-bold">Kirim Feedback</h4>
                        <p>Jika kamu punya feedback/masukan tentang materi course saat ini, kamu bisa mengirim
                        pendapat dan ide mu disini</p>

                        <form method="POST" action="{{ route('daftar-course.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                      <textarea class="form-control @error('isi_feedback') is-invalid @enderror" name="isi_feedback" placeholder="Isi Feedback" id="floatingTextarea" style="height: 100px;">{{ old('isi_feedback') }}</textarea>
                                      <label for="floatingTextarea">Isi Feedback</label>
                                        @error('isi_feedback')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>  
                                        @enderror
                                    </div>
                                </div>  
                            </div>

                            <input type="hidden" name="nama" value="{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}">
                            <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">

                            <div class="modal-footer text-end pt-3">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Blog Section -->
@endsection

@section('sweetalert2')
<script>

    @if ($errors->all())
    {
        Swal.fire({
        title: 'Gagal',
        html: 
            [
                @foreach ($errors->all() as $error)
                    '- {{$error}}<br>',
                @endforeach
            ],
        icon: 'error',
        showConfirmButton: true
        });
    }
    @endif
</script>
@endsection