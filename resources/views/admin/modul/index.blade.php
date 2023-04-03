@extends('admin.index')
@section('title', 'Kelola Modul')
@section('page_title')
    <h1>Kelola Modul</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/admin/modul') }}">Kelola Modul</a></li>
        </ol>
    </nav>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="row">

        <div class="col-xxl-12">
            <div class="card info-card sales-card">
                <div class="d-flex flex-row p-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="bi bi-plus"></i> Tambah Data
                    </button>
                </div>
                
                <div class="d-flex align-items-center mt-2">
                    
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <table class="table table-borderless align-middle datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Modul</th>
                                        <th scope="col">For Course</th>
                                        <th scope="col" class="text-center">Last Update</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no=1; @endphp
                                    @foreach ( $modul as $data )
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $data->jdl_modul }}</td>
                                        @empty($data->course->nama_course)
                                        <td>
                                            <span class="badge bg-danger">Course Terhapus/hilang</span>
                                        </td>
                                        @else
                                        <td>
                                            {{ $data->course->nama_course }}
                                        </td>
                                        @endempty
                                        <td class="text-center">{{ $data->updated_at }}</td>
                                        <td class="text-center">
                                            <form method="POST" id="formDelete">
                                                @csrf
                                                @method('DELETE')

                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('modul.edit',$data->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    &nbsp;
                                                    <button data-action="{{ route('modul.destroy',$data->id) }}"  type="submit" class="btn btn-danger btn-sm btnDelete" title="Hapus">
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
                        <h1 class="modal-title  card-title" id="staticBackdropLabel">Form Tambah Data Modul </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3 mt-1" method="POST" action="{{ route('modul.store') }}" >
                            @csrf
                    
                            <div class="col-md-12">
                              <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                      <label for="floatingName" class="form-label">Judul Modul</label>
                                      <input type="text" name="jdl_modul" class="form-control @error('jdl_modul') is-invalid @enderror" id="floatingName" value="{{ old('jdl_modul') }}" placeholder="Judul Modul">
                                      @error('jdl_modul')
                                          <div class="invalid-feedback">
                                          {{ $message }}
                                          </div>  
                                      @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault04" class="form-label">Course</label>
                                    <select class=" @error('course_id') is-invalid @enderror selectpicker border rounded" data-live-search="true"  id="validationDefault04" name="course_id">
                                        <option selected disabled value="">-- Pilih Course --</option>
                                        @php
                                        $no = 1;  
                                        @endphp

                                        @foreach ($course as $crs)
                                        @php
                                            $select1 = (old('course_id') == $crs->id) ? 'selected' : '';
                                        @endphp

                                        <option value="{{ $crs->id }}" {{ $select1 }}> {{ $no++ }}. {{ $crs->nama_course }}</option> 

                                        @endforeach
                                    </select>
                                    @error('modul_id')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>  
                                    @enderror
                                </div>

                                <div class="row g-3">
                                    <div class="col-md">
                                        <div class="form-floating">
                                          <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Deskripsi" id="floatingTextarea" style="height: 100px;">{{ old('deskripsi') }}</textarea>
                                          <label for="floatingTextarea">Deskripsi</label>
                                            @error('deskripsi')
                                              <div class="invalid-feedback">
                                                {{ $message }}
                                              </div>  
                                            @enderror
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
    })

    @if ($errors->all())
    {
        Swal.fire({
        title: 'Gagal menambahkan data modul',
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