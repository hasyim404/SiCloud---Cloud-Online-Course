@extends('admin.index')
@section('title', 'Kelola Judul Course')
@section('page_title')
    <h1>Kelola Judul Course</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/admin/course') }}">Kelola Judul Course</a></li>
        </ol>
    </nav>
@endsection
@section('content')
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
                
                <div class="d-flex align-items-center">

                    <div class="card-body">

                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama&nbsp;Course</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Banner</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $no=1; @endphp
                                @foreach ( $course as $data )
                                <tr>
                                    <th scope="row">{{ $no++ }}.</th>
                                    <td>{{ $data->nama_course }}</td>
                                    <td>{{ $data->deskripsi_course }}</td>
                                    <td>
                                        @empty($data->foto)
                                            <img src="{{ url('img/banner_course/!banner-default.jpg') }}" height="100px" width="150px"  alt="Profile" class="rounded">
                                        @else
                                            <img src="{{ url('img/banner_course')}}/{{$data->foto}}" height="100px" width="150px" alt="Profile" class="rounded">
                                        @endempty
                                    </td>
                                    <td class="text-center">
                                        <form method="POST" id="formDelete">
                                            @csrf
                                            @method('DELETE')

                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('course.edit',$data->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                &nbsp;
                                                <button data-action="{{ route('course.destroy',$data->id) }}"  type="submit" class="btn btn-danger btn-sm btnDelete" title="Hapus">
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

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title  card-title" id="staticBackdropLabel">Form Tambah Data Course</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3 mt-1" method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data">
                            @csrf
                    
                            <div class="col-md-12">
                              <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                      <label for="floatingName" class="form-label">Nama Course</label>
                                      <input type="text" name="nama_course" class="form-control @error('nama_course') is-invalid @enderror" id="floatingName" value="{{ old('nama_course') }}" placeholder="Nama Course">
                                      @error('nama_course')
                                          <div class="invalid-feedback">
                                          {{ $message }}
                                          </div>  
                                      @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="password">Foto</label>
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="floatingName" name="foto" >
                                    @error('foto')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>  
                                    @enderror
                                </div>
                              </div>
                              
                              <div class="row g-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('deskripsi_course') is-invalid @enderror" name="deskripsi_course" placeholder="Deskripsi" id="floatingTextarea" style="height: 100px;">{{ old('deskripsi_course') }}</textarea>
                                        <label for="floatingTextarea">Deskripsi</label>
                                          @error('deskripsi_course')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>  
                                          @enderror
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

    @if ($errors->all())
    {
        Swal.fire({
        title: 'Gagal menambah data course',
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