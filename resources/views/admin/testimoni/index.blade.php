@extends('admin.index')
@section('title', 'Kelola Testimoni')
@section('page_title')
    <h1>Kelola Testimoni</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/admin/testimoni') }}">Kelola Testimoni</a></li>
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
                    <li class="dropdown-header text-center px-2"><a href="{{ url('admin/get-testimoni-excel') }}" class="btn btn-success btn-sm">
                        <i class="bi bi-file-earmark-spreadsheet"></i> Export Excel</a>
                    </li>  
                    <li class="dropdown-header text-center"><a href="{{ url('admin/get-testimoni-pdf') }}" class="btn btn-danger btn-sm">
                        <i class="bi bi-filetype-pdf"></i> Export PDF</a>
                    </li>     
                </div>
                
                <div class="d-flex align-items-center mt-2">
                    
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <table class="table table-borderless align-middle datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama&nbsp;User</th>
                                        <th scope="col">Isi Pesan</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no=1; @endphp
                                    @foreach ( $testimoni as $data )
                                    <tr>
                                        <th scope="row">{{ $no++ }}.</th>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->isi_pesan }}</td>
                                        <td>
                                            @livewire('testimoni-status', ['model' => $data, 'field' => 'status'], key($data->id))
                                        </td>
                                        <td class="text-center">
                                            <form method="POST" id="formDelete">
                                                @csrf
                                                @method('DELETE')
                                                
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('testimoni.edit',$data->id) }}" class="btn btn-warning btn-sm" title="Detail">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    &nbsp;
                                                    <button data-action="{{ route('testimoni.destroy',$data->id) }}"  type="submit" class="btn btn-danger btn-sm btnDelete" title="Hapus">
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
                        <h1 class="modal-title  card-title" id="staticBackdropLabel">Form Tambah Data Testimoni</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3 mt-1" method="POST" action="{{ route('testimoni.store') }}" enctype="multipart/form-data">
                            @csrf
                    
                            <div class="col-md-12">
                              <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="floatingName" class="form-label">Nama User</label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="floatingName" value="{{ old('nama') }}" placeholder="Nama User">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>  
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="floatingName" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingName" value="{{ old('email') }}" placeholder="Email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>  
                                        @enderror
                                    </div>
                              </div>
                              
                              <div class="row g-3 mb-3">
                                <label for="fullName" class="form-label">Upload Foto</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="floatingName" name="foto" placeholder="Upload Foto">
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

    $('body').on('change', '.btnStatus', function(e) {
        e.preventDefault();
        var action = $(this).data('action');
        Swal.fire({
            title: 'Status Berhasil Di ubah',
            icon: 'success',
            showConfirmButton: true,
            timer: 3000
        })
    });

    @if ($errors->all())
    {
        Swal.fire({
        title: 'Gagal menambahkan data testimoni',
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