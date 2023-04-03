@extends('landingpage.index')
@section('title', 'My Profile')
@section('content')
    <!-- ======= Blog Section ======= -->
    <section id="about" class="about mt-5">
        <div class="container mb-5" data-aos="fade-up">
            <h1>My Profile</h1>
          <div class="row mt-5">

            
  
            <div class="col-lg-4">
                <div class="card sidebar d-flex flex-column align-items-center p-3">
                    @empty(Auth::user()->foto)
                        <img src="{{ url('img/users_profile/!profile-default.jpg') }}" height="120px" width="120px" alt="Profile" class="rounded-circle">
                    @else
                        <img src="{{ url('img/users_profile')}}/{{Auth::user()->foto}}" height="120px" width="120px" alt="Profile" class="rounded-circle">
                    @endempty
                    <h2 class="pt-3">{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</h2>
                    <h6>{{ Auth::user()->email }}</h6>
                </div>
                
            </div>

            <div class="col-lg-8">
                <div class="card sidebar p-3">
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                          <button class="nav-link active fw-bold" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                          </li>
        
                        <li class="nav-item">
                            <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                        </li>
                    </ul>

                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview p-2" id="profile-overview">

                            <h5 class="card-title fw-bold text-decoration-underline pb-3">My profile</h5>
                  
                          {{-- <h5 class="card-title mt-3">Details:</h5> --}}
          
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                            <div class="col-lg-9 col-md-8">{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</div>
                          </div>
          
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Email</div>
                            <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                          </div>
          
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">No. Telp</div>
                            <div class="col-lg-9 col-md-8">{{ Auth::user()->no_telp }}</div>
                          </div>
          
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Username</div>
                            <div class="col-lg-9 col-md-8">{{ Auth::user()->username }}</div>
                          </div>
          
                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Status</div>
                            <div class="col-lg-9 col-md-8">{{ Auth::user()->status }}</div>
                          </div>
          
                        </div>

                        <div class="tab-pane fade profile-edit pt-3 p-2" id="profile-edit">

                            <h5 class="card-title fw-bold text-decoration-underline pb-3">Edit data</h5>

                            <!-- Profile Edit Form -->
                            <form method="POST" action="{{ route('my-profile.update',Auth::user()->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        @if(!empty(Auth::user()->foto)) 
                                            <img src="{{ url('img/users_profile')}}/{{Auth::user()->foto}}" height="120px" width="120px" alt="Profile"  class="rounded p-2 border">
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
                                        <input name="f_name" type="text" class="form-control @error('f_name') is-invalid @enderror" id="fullName" value="{{ Auth::user()->f_name }}" >
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
                                        <input name="l_name" type="text" class="form-control @error('l_name') is-invalid @enderror" id="fullName" value="{{ Auth::user()->l_name }}">
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
                                        <input name="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" id="Phone" value="{{ Auth::user()->no_telp }}">
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
                                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="Email" value="{{ Auth::user()->email }}">
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
                                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="Twitter" value="{{ Auth::user()->username }}">
                                        @error('username')
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
            
                        <div class="tab-pane fade pt-3 p2" id="profile-change-password">

                            <h5 class="card-title fw-bold text-decoration-underline pb-3">Ubah Password</h5>

                            <!-- Change Password Form -->
                            <form method="POST" action="{{ route('update-password',Auth::user()->id) }}">
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
                                <div class="form-check d-flex justify-content-start mb-3">
                                    <input class="form-check-input me-2" type="checkbox" id="checkbox" />
                                    <label class="form-check-label" for="remember" onselectstart='return false;'>
                                        {{ __('Show Password') }}
                                    </label>
                                </div>
            
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Change Password</button>
                                </div>
                            </form><!-- End Change Password Form -->
            
                        </div>
          
                    </div><!-- End Bordered Tabs -->
                    <div class="text-end">
                        <a class="btn btn-primary btn-md" href=" {{ url()->previous() }}">
                            <i class="bi bi-caret-left-square"></i> Back
                        </a>  
                    </div>
                </div>    
                
            </div>

          </div>
        </div>
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