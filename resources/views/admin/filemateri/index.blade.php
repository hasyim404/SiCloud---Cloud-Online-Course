@extends('admin.index')
@section('title', 'Kelola Filemateri')
@section('page_title')
    <h1>Kelola File Materi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/admin/filemateri') }}">Kelola File Materi</a></li>
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
                                        <th scope="col">Nama&nbsp;File</th>
                                        <th scope="col">For&nbsp;Modul</th>
                                        <th scope="col" class="text-center">Uploaded&nbsp;at</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no=1; @endphp
                                    @foreach ( $filemateri as $data )
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>
                                            <a href="{{ url('admin/filemateri-download'.'/'.$data->id) }}" title="Download">
                                                <i class="bi bi-filetype-pdf text-danger"></i> {{ $data->pdfmateri }}
                                            </a>
                                        </td>
                                        @empty($data->modul->jdl_modul)
                                        <td>
                                            <span class="badge bg-danger">Modul Tidak ada/Terhapus</span>
                                        </td>
                                        @else
                                        <td>
                                            {{ $data->modul->jdl_modul }}
                                        </td>
                                        @endempty
                                        <td>{{ $data->created_at }}</td>
                                        <td class="text-center">
                                            <form method="POST" id="formDelete">
                                                @csrf
                                                @method('DELETE')

                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('filemateri.show',$data->id) }}" class="btn btn-primary btn-sm" title="Preview">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    &nbsp;
                                                    <button data-action="{{ route('filemateri.destroy',$data->id) }}" type="submit" class="btn btn-danger btn-sm btnDelete" title="Hapus">
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
                        <h1 class="modal-title  card-title" id="staticBackdropLabel">Form Tambah Data File Materi </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3 mt-1" method="POST" action="{{ route('filemateri.store') }}" enctype="multipart/form-data">
                            @csrf
                    
                            <div class="col-md-12">
                              <div class="row g-3 mb-3">
                                <label for="fullName" class="form-label">Upload File Materi</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control @error('pdfmateri') is-invalid @enderror" id="floatingName" name="pdfmateri" placeholder="File Materi">
                                    @error('pdfmateri')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>  
                                    @enderror
                                </div>
                              </div>

                              <div class="row g-3 mb-3">
                                <label for="validationDefault04" class="form-label">Modul</label>
                                <div class="col-md-8">
                                    <select class=" @error('modul_id') is-invalid @enderror selectpicker border rounded" data-live-search="true" id="modul_id" name="modul_id">
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
        title: 'Gagal menambahkan file',
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