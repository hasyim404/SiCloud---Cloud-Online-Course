@extends('admin.index')
@section('title', 'Edit User')
@section('page_title')
    <h1>Edit User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">Kelola User</a></li>
            <li class="breadcrumb-item active"><a href="#!">Edit User</a></li>
        </ol>
    </nav>
@endsection
@section('content')
<section class="section profile">
    <div class="row">

      {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>    
      @endif --}}

      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            @empty($data->foto)
                <img src="{{ url('img/users_profile/!profile-default.jpg') }}" height="120px" width="120px" alt="Profile" class="rounded-circle">
            @else
                <img src="{{ url('img/users_profile')}}/{{$data->foto}}" height="120px" width="120px" alt="Profile" class="rounded-circle">
            @endempty
            <h2>{{ $data->f_name }} {{ $data->l_name }}</h2>
            <h3>{{ $data->email }}</h3>
            {{-- <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div> --}}
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active fw-bold" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail</button>
              </li>

              <li class="nav-item">
                <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Data</button>
              </li>

              <li class="nav-item">
                  <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>
            </ul>

            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
        
                <h5 class="card-title">Detail Profil User</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{ $data->f_name }} {{ $data->l_name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $data->email }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">No. Telp</div>
                  <div class="col-lg-9 col-md-8">{{ $data->no_telp }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Username</div>
                  <div class="col-lg-9 col-md-8">{{ $data->username }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Status</div>
                  <div class="col-lg-9 col-md-8">{{ $data->status }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">IsActive</div>
                  <div class="col-lg-9 col-md-8"><span class="badge {{ $class }}">{{ $isactive }}</span></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Role</div>
                  <div class="col-lg-9 col-md-8">{{ $data->role }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit" id="profile-edit">

                <h5 class="card-title">Form Edit Data User</h5>

                <!-- Profile Edit Form -->
                <form method="POST" action="{{ route('users.update',$data->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                          @if(!empty($data->foto)) 
                              <img src="{{ url('img/users_profile')}}/{{$data->foto}}" height="120px" width="120px" alt="Profile"  class="rounded p-2 border">
                          @else
                              <img src="{{ url('img/users_profile/!profile-default.jpg') }}" height="120px" width="120px" alt="Profile" class="rounded p-2 border">
                          @endif 
                          <div class="pt-2">
                              <div class="col-md-6">
                                  <input type="file" class="form-control @error('foto') is-invalid @enderror" id="floatingName" name="foto" placeholder="Foto">
                                  @error('foto')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>  
                                  @enderror
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="f_name" type="text" class="form-control @error('f_name') is-invalid @enderror" id="fullName" value="{{ $data->f_name }}" >
                          @error('f_name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>  
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="l_name" type="text" class="form-control @error('l_name') is-invalid @enderror" id="fullName" value="{{ $data->l_name }}">
                          @error('l_name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>  
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">No. Telp</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" id="Phone" value="{{ $data->no_telp }}">
                          @error('no_telp')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>  
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="Email" value="{{ $data->email }}">
                          @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>  
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="Twitter" value="{{ $data->username }}">
                          @error('username')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>  
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                    <label for="validationDefault04" class="col-md-4 col-lg-3 col-form-label">Status</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="@error('status') is-invalid @enderror selectpicker border rounded" data-live-search="true" id="validationDefault04" name="status">
                        <option selected disabled value="">-- Pilih Status --</option>
                        @php
                        $no = 1;  
                        @endphp
            
                        @foreach ($ar_status as $status)
                            @php $cek1 = ($status == $data->status) ? 'selected' : ''; @endphp
                            <option value="{{ $status }}" {{ $cek1 }}> {{ $no++ }}. {{ $status }}</option> 
            
                        @endforeach
                      </select>
                      @error('status')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>  
                      @enderror  
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="validationDefault04" class="col-md-4 col-lg-3 col-form-label">Role</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="@error('role') is-invalid @enderror selectpicker border rounded" data-live-search="true" id="validationDefault04" name="role">
                        <option selected disabled value="">-- Pilih Role --</option>
            
                        @foreach ($ar_role as $role)
                          @php $cek2 = ($role == $data->role) ? 'selected' : ''; @endphp
                          <option value="{{ $role }}" {{ $cek2 }}>- {{ $role }}</option> 
                        @endforeach
                        
                      </select>
                      @error('role')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>  
                      @enderror  
                    </div>
                  </div>

                  <div class="text-center">
                      <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-save"></i> Simpan perubahan</button>
                  </div>
                </form><!-- End Profile Edit Form -->
              </div>

              <div class="tab-pane fade" id="profile-change-password">

                <h5 class="card-title">Form Ubah Password</h5>

                <!-- Change Password Form -->
                <form method="POST" action="{{ url('/admin/users/'.$data->id.'/update-password') }}">
                  @csrf
                  @method('PUT')
                  
                  <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="password" type="password" class="form-control @error('password') is-invalid @enderror pww" id="newPassword">
                          @error('password')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>  
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror pww" id="password-confirm">
                      </div>
                  </div>

                  <!-- Checkbox Show/Hide Password -->
                  <div class="row mb-4">
                    <div class="form-check d-flex justify-content-start">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label"></label>
                      <div class="col-md-8 col-lg-9 ms-4">
                        <input class="form-check-input me-2" type="checkbox" id="checkbox" />
                        <label class="form-check-label" for="remember" onselectstart='return false;'>
                          {{ __('Show Password') }}
                      </label>
                      </div>
                    </div>
                  </div>
                  

                  <div class="text-center">
                      <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->
              </div>
              
            </div><!-- End Bordered Tabs -->

            <div class="text-end">
              <a class="btn btn-primary btn-md" href="{{ url('admin/users') }}">
                <i class="bi bi-caret-left-square"></i> Back
              </a>  
            </div>

          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@section('sweetalert2')
<script>
  @if ($errors->get('password'))
  {
    Swal.fire({
      title: 'Error',
      text: 'Ubah password gagal',
      icon: 'error',
      showConfirmButton: false
    })
  };
  @endif

  @if ($errors->get('f_name','l_name','no_telp','email','username','status','role','foto'))
  {
    Swal.fire({
      title: 'Error',
      text: 'Update data diri gagal',
      icon: 'error',
      showConfirmButton: false
    })
  };
  @endif

  // Show/Hide Password
  $(document).ready(function(){
      $('#checkbox').on('change', function(){
          $('.pww').attr('type',$('#checkbox').prop('checked')==true?"text":"password"); 
      });
  });
</script>
@endsection