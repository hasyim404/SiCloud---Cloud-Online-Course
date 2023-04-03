@extends('admin.index')
@section('title', 'Kelola Users')
@section('page_title')
    <h1>Kelola User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/admin/users') }}">Kelola User</a></li>
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
                    <li class="dropdown-header text-center px-2"><a href="{{ url('admin/get-users-excel') }}" class="btn btn-success btn-sm">
                        <i class="bi bi-file-earmark-spreadsheet"></i> Export Excel</a>
                    </li>     
                </div>
                
                <div class="d-flex align-items-center mt-2">
                    
                    <div class="card-body">
                        <table class="table table-borderless align-middle datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama User</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Active</th>
                                    <th scope="col" class="text-center">Role</th>
                                    <th scope="col" class="text-center">Foto</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $no=1; @endphp
                                @foreach ( $users as $data )
                                <tr>
                                    <th scope="row">{{ $no++ }}.</th>
                                    <td>{{ $data->f_name }} {{ $data->l_name }}</td>
                                    {{-- <td>{{ $data->username }}</td> --}}
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        @livewire('user-is-active', ['model' => $data, 'field' => 'isactive'], key($data->id))
                                    </td>
                                    <td class="text-center">{{ $data->role }}</td>
                                    <td class="text-center">
                                        @empty($data->foto)
                                            <img src="{{ url('img/users_profile/!profile-default.jpg') }}" height="50px" width="50px"  alt="Profile" class="rounded-circle">
                                        @else
                                            <img src="{{ url('img/users_profile')}}/{{$data->foto}}" height="50px" width="50px" alt="Profile" class="rounded-circle">
                                        @endempty
                                    </td>
                                    <td>
                                        <form method="POST" id="formDelete">
                                            @csrf
                                            @method('DELETE')

                                            <div class="d-flex justify-content-center">
                                                {{-- <a href="{{ route('users.show',$data->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a> --}}
                                                <a href="{{ route('users.edit',$data->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                &nbsp;
                                                <button data-action="{{ route('users.destroy',$data->id) }}"  type="submit" class="btn btn-danger btn-sm btnDelete" title="Hapus Users">
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
                        <h1 class="modal-title  card-title" id="staticBackdropLabel">Form Tambah Data User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3 mt-1" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                    
                            <div class="col-md-12">
                              <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                  <div class="form-floating">
                                    <input type="text" class="form-control @error('f_name') is-invalid @enderror" id="floatingName" name="f_name" value="{{ old('f_name') }}" placeholder="First Name">
                                    <label for="floatingName">First Name</label>
                                    @error('f_name')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>  
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('l_name') is-invalid @enderror" id="floatingName" name="l_name" value="{{ old('l_name') }}" placeholder="Last Name">
                                        <label for="floatingName">Last Name</label>
                                        @error('l_name')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>  
                                        @enderror
                                    </div>
                                </div>
                              </div>
                              
                              <div class="row g-3 mb-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingName" name="email" value="{{ old('email') }}" placeholder="Email">
                                        <label for="floatingName">Email</label>
                                        @error('email')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>  
                                        @enderror
                                    </div>
                                </div>
                              </div>
                              
                              <div class="row g-3 mb-3">
                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="floatingName"  name="no_telp" value="{{ old('no_telp') }}" placeholder="No. Telp">
                                    <label for="floatingName">No. Telp</label>
                                    @error('no_telp')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>  
                                    @enderror
                                  </div>
                                </div>  
                              </div>
                              
                              <div class="row g-3 mb-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingName" name="username" value="{{ old('username') }}" placeholder="Username">
                                        <label for="floatingName">Username</label>
                                        @error('username')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>  
                                        @enderror
                                    </div>
                                </div>  
                              </div>
                    
                              <!-- 2 column grid Password & Confirm Password -->
                              <div class="row g-3">
                                <div class="col-md-6 mb-4">
                                  <div class="form-floating">
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password" />
                                    <label class="form-label" for="password">Password</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                  <div class="form-floating">
                                    <input type="password" id="password-confirm" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password" />
                                    <label class="form-label" for="password-confirm">Confirm Password</label>
                                  </div>
                                </div>
                              </div>
                    
                              <div class="row mb-3">
                                <div class="col-md mb-3">
                                  <label for="validationDefault04" class="form-label">Status</label>
                                  <select class="@error('status') is-invalid @enderror selectpicker border rounded" data-live-search="true" id="validationDefault04" name="status">
                                    <option selected disabled value="">-- Pilih Status --</option>
                                    @php
                                    $no = 1;  
                                    @endphp
                    
                                    @foreach ($ar_status as $status)
                                      @php
                                        $select1 = (old('status') == $status) ? 'selected' : '';
                                      @endphp
                    
                                      <option value="{{ $status }}" {{ $select1 }}> {{ $no++ }}. {{ $status }}</option> 
                    
                                    @endforeach
                                  </select>
                                  @error('status')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>  
                                  @enderror
                                </div>
                                <div class="col-md">
                                  <label for="validationDefault04" class="form-label">Role</label>
                                  <select class="@error('role') is-invalid @enderror selectpicker border rounded" data-live-search="true" id="validationDefault04" name="role">
                                    <option selected disabled value="">-- Pilih Role --</option>
                        
                                    @foreach ($ar_role as $role)
                                      @php
                                        $select2 = (old('role') == $role) ? 'selected' : '';
                                      @endphp
                        
                                    <option value="{{ $role }}" {{ $select2 }}>- {{ $role }}</option> 
                        
                                    @endforeach
                                  </select>
                                  @error('role')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>  
                                  @enderror
                              </div>
                              </div>
                              
                              <div class="row mb-3">
                                  <div class="col-md-7">
                                      <label class="form-label" for="password">Foto</label>
                                      <input type="file" class="form-control @error('foto') is-invalid @enderror" id="floatingName" name="foto" >
                                      @error('foto')
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
    });

    $('body').on('change', '.btnIsActive', function(e) {
        e.preventDefault();
        var action = $(this).data('action');
        Swal.fire({
            title: 'Status Active Berhasil Di ubah',
            icon: 'success',
            showConfirmButton: true,
            timer: 3000
        })
    });

    @if ($errors->all())
    {
        Swal.fire({
        title: 'Gagal menambahkan data user',
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