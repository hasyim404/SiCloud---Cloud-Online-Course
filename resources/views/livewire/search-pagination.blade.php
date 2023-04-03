<div class="">
    <h1 class="fw-bold" style="color: #012970">Course Tersedia</h1>
    <div class="d-flex justify-content-center">
        <div class="col-md-8 sidebar-item search-form pt-3 pb-5">
            {{-- <h3 class="sidebar-title">Search</h3> --}}
            <form>
                <input class="form-control" wire:model="searchTerm" type="text" placeholder="Cari Course">
                <button type="button" disabled><i class="bi bi-search"></i></button>
            </form>
            @if (!empty($search) && $course->count() > 0)
                <h5 class="text-center fw-semibold fst-italic mt-3">Hasil "{{ $searchTerm }}": {{ $course->count() }} Course ditemukan</h5>
            @elseif ($search && $course->count() == 0)
                <h5 class="text-center fw-semibold fst-italic mt-3">Tidak ada hasil yang cocok dengan "{{ $searchTerm }}"</h5>
            @endif
            {{-- @empty($search)
            
            @else
                <h5 class="text-center mt-3">Hasil: {{ $course->count() }} Course ditemukan</h5>
            @endempty --}}
            
        </div><!-- End sidebar search formn-->    
    </div>

    @if ($course && $course->count() > 0)
        @foreach ( $course as $data )
            <div class="post-item clearfix ">
                <a href="{{ route('daftar-course.show',$data->id) }}">
                    <div class="row">
                        <div class="col col-lg-4">
                            @empty($data->foto)
                                <img class="me-5 rounded" src="{{ url('img/banner_course/!banner-default.jpg') }}" style="width: 200px !important" alt="Banner-Course" >
                            @else
                                <img class="me-5 rounded" src="{{ url('img/banner_course')}}/{{$data->foto}}" style="width: 200px !important" alt="Banner-Course" >
                            @endempty  
                        </div>   
                        <div class="col col-lg-8">
                            <h3 class="text-dark fw-semibold">{{ $data->nama_course }}</h3>
                            <time class="m-auto"><i class="bi bi-clock-history"></i> {{ $data->updated_at->format('Y M d') }}</time>
                            <span class="text-secondary">{{ $data->deskripsi_course }}</span>    
                        </div>
                    </div>
                    
                </a>
            </div> <br>  <hr> <br>     
        @endforeach
    @else
    <h3 class="sidebar-title text-center">Course Tidak ditemukan</h3>
    @endif

</div>

