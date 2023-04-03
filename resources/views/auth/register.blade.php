@extends('layouts.app')
@section('title', 'Register')
@section('content')

<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
    <style>
      
      .background-radial-gradient {
        
        /* background-image: linear-gradient( 135deg, #52E5E7 10%, #130CB7 100%); */
        /* background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); */
        background-image: radial-gradient(650px circle at 0% 0%,
            /* hsl(0, 0%, 93%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%, */
            transparent 100%),
          radial-gradient(1250px circle at 100% 100%,
            /* hsl(218, 41%, 45%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%, */
            transparent 100%);
      }
  
      #radius-shape-1 {
        /* background-image: linear-gradient(120deg, #89f7fe 0%, #66a6ff 100%); */
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
        /* background: radial-gradient(#209cff, #68e0cf); */
        background: linear-gradient(120deg, #d9e2fc 0%, #5671bb 100%);
        overflow: hidden;
      }
  
      #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        /* background: radial-gradient(#209cff, #68e0cf); */
        background: linear-gradient(120deg, #d9e2fc 0%, #5671bb 100%);
        overflow: hidden;
        overflow: hidden;
      }
  
      .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(25px);
      }
    </style>
  
  <div class="container">
    <div class="container px-5 py-5 px-md-5 text-center text-lg-start my-5" style="background-image: linear-gradient( 135deg, #a3b5fd 10%, #4f6296 100%); border-radius: 30px;">
        <div class="row gx-lg-5 align-items-top mb-5">
          <div class="col-lg-6 mb-5 mb-lg-0 d-none d-lg-block pt-5" style="z-index: 10">
            <div class="d-flex justify-content-center">
              <div href="{{ url('/home') }}" class="d-flex align-items-center mb-5">
                <div class="flex-shrink-0">
                  <img src="{{ url('img/main-logo.png') }}" width="120px" alt="">  
                </div>
                <div class="flex-grow-1 display-5 fw-bold ls-tight text-primary">
                  &nbsp;SiCloud
                </div>
              </div>
            </div>
            <h5 class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
              Pada aplikasi web ini kami membuat tentang penyedia materi cloud seperti AWS 
              contohnya yang disediakan secara gratis, hanya bermodalkaan login saja dan user yang 
              telah mendaftar langsung bisa mengakses materi course yang diminati.
            </h5>
          </div>
    
          <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
            <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
            <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
    
            <div class="card bg-glass">
              <div class="card-body px-4 py-5 px-md-5">
                <div class="d-flex justify-content-center">
                  <div class="d-flex align-items-center mb-5">
                    <div class="flex-grow-1 display-5 fw-bold ls-tight text-primary">
                      REGISTER
                    </div>
                  </div>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                  <!-- 2 column grid First Name & Last Name -->
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-floating">
                        <input type="text" id="form3Example1" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ old('f_name') }}" placeholder="First name" />
                        <label class="form-label" for="form3Example1">First name</label>
                        @error('f_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-floating">
                        <input type="text" id="form3Example2" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ old('l_name') }}" placeholder="Last name" />
                        <label class="form-label" for="form3Example2">Last name</label>
                        @error('l_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <!-- No. Telepon input -->
                  <div class="form-floating mb-4">
                    <input type="text" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" placeholder="No. Telepon"/>
                    <label class="form-label" for="form3Example3">No. Telepon</label>
                    @error('no_telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <!-- Username input -->
                  <div class="form-floating mb-4">
                    <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username"/>
                    <label class="form-label" for="form3Example3">Username</label>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <!-- Status input -->
                  <div class="mb-4">
                    <label class="form-label d-block">Status Sebagai:</label>
                    @php
                      $ar_status = ['Pelajar','Mahasiswa','Pekerja','Lainnya'];
                    @endphp
                    @foreach($ar_status as $status)
                      @php
                        $cek = (old('status') == $status)? 'checked':'';
                      @endphp
                      <div class="form-check form-check-inline">
                        <input class="form-check-input @error('status') is-invalid @enderror"  type="radio" name="status" value="{{ $status }}" {{ $cek }}>
                        <label class="form-check-label" for="gridRadios1">
                            {{ $status }}
                        </label>
                      </div>
                    @endforeach
                    @error('status')
                        <br>
                        <span class="invalid-feedback d-inline" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  
    
                  <!-- Email input -->
                  <div class="form-floating mb-4">
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address"/>
                    <label class="form-label" for="form3Example3">{{ __('Email Address') }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <!-- 2 column grid Password & Confirm Password -->
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror pww" name="password" value="{{ old('password') }}" placeholder="Password" />
                        <label class="form-label" for="password">Password</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror pww" name="password_confirmation" placeholder="Confirm Password" />
                        <label class="form-label" for="password-confirm">Confirm Password</label>
                      </div>
                    </div>
                  </div>
    
                  <!-- Checkbox Show/Hide Password -->
                  <div class="form-check d-flex justify-content-start">
                    <input class="form-check-input me-2" type="checkbox" id="checkbox"/>
                    <label class="form-check-label" for="remember" onselectstart='return false;'>
                        {{ __('Show Password') }}
                    </label>
                  </div>
    
                  <!-- Submit button -->
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-block mb-4 px-5 mt-3">
                        Daftar
                    </button>
                  </div>
                  
                  <!-- Register buttons -->
                  <div class="text-center">
                      <p>Sudah punya akun? <a href="{{ route('login') }}" class="link-primary">Login</a></p>
                  </div>

                  <!-- Home buttons -->
                  <div class="text-center ">
                      <p>atau <a href="{{ url('/home') }}" class="link-primary">Kembali ke halaman utama</a></p>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
  </div>
  </section>
  <!-- Section: Design Block -->

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
