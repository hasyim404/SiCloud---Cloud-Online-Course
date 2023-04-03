@extends('admin.index')
@section('title', 'Kelola Link Video')
@section('page_title')
    <h1>Kelola Link Video</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/admin/videomateri') }}">Kelola Link Video</a></li>
        </ol>
    </nav>
@endsection
@section('content')
@php
    use Illuminate\Support\Str;
@endphp
<div class="col-lg-12">
    <div class="row">

        <div class="col-xxl-12">
            <div class="card info-card sales-card">
                <div class="d-flex flex-row p-3">
                    <li class="dropdown-header">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="bi bi-plus"></i> Tambah Data
                        </button>
                    </li>
                </div>
                
                <div class="d-flex align-items-center mt-2">
                    
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <table class="table table-borderless align-middle datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Preview Video</th>
                                        <th scope="col">Judul&nbsp;Video</th>
                                        <th scope="col">For&nbsp;Modul</th>
                                        <th scope="col" class="text-center">Last&nbsp;Update</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                    @php $no=1; @endphp
                                    @foreach ( $videomateri as $data )
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>
                                            @php
                                                $ytarray=explode("/", $data->video);
                                                $ytendstring=end($ytarray);
                                                $ytendarray=explode("?v=", $ytendstring);
                                                $ytendstring=end($ytendarray);
                                                $ytendarray=explode("&", $ytendstring);
                                                $ytcode=$ytendarray[0];
                                            @endphp
                                            
                                            <iframe width="360" height="295" src="http://www.youtube.com/embed/{{$ytcode}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                            </iframe>
                                        </td>
                                        <td>{{ $data->nama_video }}</td>
                                        @empty($data->modul->jdl_modul)
                                        <td>
                                            <span class="badge bg-danger">Modul Tidak ada/Terhapus</span>
                                        </td>
                                        @else
                                        <td>
                                            {{ $data->modul->jdl_modul }}
                                        </td>
                                        @endempty
                                        <td class="text-center">{{ $data->updated_at }}</td>
                                        <td class="text-center">
                                            <form method="POST" id="formDelete">
                                                @csrf
                                                @method('DELETE')

                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('videomateri.edit',$data->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    &nbsp;
                                                    <button data-action="{{ route('videomateri.destroy',$data->id) }}"  type="submit" class="btn btn-danger btn-sm btnDelete" title="Hapus">
                                                            <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        {{-- <td><span class="badge bg-success">Approved</span></td> --}}
                                    </tr>    
                                    @endforeach
                                    
                                </tbody>
                            </table> 
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title  card-title" id="staticBackdropLabel">Form Tambah Data Link Video </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3 mt-1" method="POST" action="{{ route('videomateri.store') }}" >
                            @csrf
                    
                            <div class="col-md-12">
                              <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                      <label for="floatingName" class="form-label">Judul Video</label>
                                      <input type="text" name="nama_video" class="form-control @error('nama_video') is-invalid @enderror" id="floatingName" value="{{ old('nama_video') }}" placeholder="Judul Video">
                                      @error('nama_video')
                                          <div class="invalid-feedback">
                                          {{ $message }}
                                          </div>  
                                      @enderror
                                </div>
                                <label for="validationDefault04" class="form-label">Modul</label>
                                <div class="col-md-6">
                                        
                                        <select class="@error('modul_id') is-invalid @enderror selectpicker border rounded" data-live-search="true" id="validationDefault04" name="modul_id">
                                            <option selected disabled value="">-- Pilih Modul --</option>
                                            @php
                                            $no = 1;  
                                            @endphp

                                            @foreach ($modul as $mdl)
                                            @php
                                                $select1 = (old('modul_id') == $mdl->id) ? 'selected' : '';
                                            @endphp

                                            <option value="{{ $mdl->id }}" {{ $select1 }}> {{ $no++ }}. {{ $mdl->jdl_modul }}</option> 

                                            @endforeach
                                        </select>
                                        @error('modul_id')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>  
                                        @enderror
                                </div>
                              </div>
                              
                              <div class="row g-3 mb-3">
                                <div class="col-md">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                          <input type="text" name="video" class="form-control @error('video') is-invalid @enderror" id="floatingName" value="{{ old('video') }}" placeholder="Link Video">
                                          <label for="floatingName">Link Video</label>
                                          @error('video')
                                              <div class="invalid-feedback">
                                              {{ $message }}
                                              </div>  
                                          @enderror
                                          <p class="fs-6 fst-italic pt-1"><span class="fw-bold">*Link Video must be:</span> https://www.youtube.com/watch?v=aaaaa</p>
                                          <button type="button" class="btn btn-warning btn-sm btnSee"><i class="bi bi-info-circle"></i> How to get the link?</button>
                                        </div>
                                    </div>
                                </div>  
                              </div>
                              
                            </div>
                            
                            <div class="modal-footer text-center mt-5">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Tambah</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            </div>

                        </form><!-- End floating Labels Form -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('sweetalert2')
<script type="text/javascript">

    $('body').on('click', '.btnDelete', function(e) {
        e.preventDefault();
        var action = $(this).data('action');
        Swal.fire({
            title: 'Yakin ingin menghapus data ?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan lagi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#formDelete').attr('action', action);
                $('#formDelete').submit();
            }
        })
    });

    $(document).ready(function(){
        $(document).on('click', '.btnSee', function(){
            Swal.fire({
                // imageUrl: 'https://peserta32.sib3.nurulfikri.com/low-assets/how-to-get-link-video.png',
                imageUrl: '{{ url('img/how-to-get-link-video.jpeg') }}',
                imageWidth: 600,
                imageHeight: 400,
                imageAlt: 'How to..',
            })
        });
    });

    @if ($errors->all())
    {
        Swal.fire({
        title: 'Gagal menambahkan video',
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