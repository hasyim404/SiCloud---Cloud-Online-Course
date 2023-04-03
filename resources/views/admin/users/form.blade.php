@extends('admin.index')
@section('title', 'Form Kelola User')
@section('info', 'Form Tambah User')
@section('data1', 'Kelola User')
@section('data2', 'Form Tambah User')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title text-center my-3">Tambah User</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="col-md-3"></div>

        <div class="col-md-6">
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
              <select class="form-select @error('status') is-invalid @enderror" id="validationDefault04" name="status">
                <option selected disabled value="">-- Pilih Status --</option>
                @php
                $no = 1;  
                @endphp

                @foreach ($ar_status as $status)
                  @php
                    $select1 = (old('status') == $status) ? 'selected' : '';
                  @endphp

                  <option value="{{ $status }}" {{ $select1 }}> {{ $no++ }} - {{ $status }}</option> 

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
              <select class="form-select @error('role') is-invalid @enderror" id="validationDefault04" name="role">
                <option selected disabled value="">-- Pilih Role --</option>
    
                @foreach ($ar_role as $role)
                  @php
                    $select2 = (old('role') == $role) ? 'selected' : '';
                  @endphp
    
                <option value="{{ $role }}" {{ $select2 }}> {{ $role }}</option> 
    
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
        </div>
        
        <div class="text-center p-3">
          <button type="submit" class="btn btn-primary">Tambah</button>
          <a class="btn btn-secondary btn-md" href="{{ url('admin/users') }}">
            Back
          </a>  
        </div>
        
        <div class="col-md-3"></div>
      
      </form><!-- End floating Labels Form -->

    </div>
  </div>

@endsection

@section('sweetalert2')
<script>
  @if ($errors->any())
  {
    Swal.fire({
      title: 'Error',
      text: 'Gagal menambahkan user baru',
      icon: 'error',
      showConfirmButton: false
    })
  };
  @endif
</script>
@endsection


