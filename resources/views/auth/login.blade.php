@extends('layouts.app')
@section('title', 'Login')
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
    <div class="container px-5 py-5 px-md-5 text-center text-lg-start my-1" style="background-image: linear-gradient( 135deg, #a3b5fd 10%, #4f6296 100%); border-radius: 30px;">
        <div class="row gx-lg-5 align-items-center mb-5">
          <div class="col-lg-3"></div>
          {{-- <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
            <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
              The best offer <br />
              <span style="color: hsl(218, 81%, 75%)">for your business</span>
            </h1>
            <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Temporibus, expedita iusto veniam atque, magni tempora mollitia
              dolorum consequatur nulla, neque debitis eos reprehenderit quasi
              ab ipsum nisi dolorem modi. Quos?
            </p>
          </div> --}}
    
          <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
            <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
            <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
    
            <div class="card bg-glass">
              <div class="card-body px-4 py-5 px-md-5">

                <div class="">
                  <div class="d-flex justify-content-center flex-shrink-0">
                    <img src="{{ url('img/main-logo.png') }}" width="120px" alt="">  
                  </div>
                  <div class="d-flex justify-content-center flex-grow-1 display-5 fw-bold ls-tight" style="color: #6878FF">
                    LOGIN
                  </div>
                  <div class="d-flex justify-content-center mb-3">
                    <p class="text-muted fs-6">Untuk mulai mengakses course</p>
                  </div>
                </div>

                
                
                

                <form method="POST" action="{{ route('login') }}">
                    @csrf
    
                  <!-- Email input -->
                  <div class="form-floating mb-4">
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address"/>
                    <label class="form-label" for="form3Example3">{{ __('Email Address') }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
    
                  <!-- Password input -->
                    <div class="form-floating mb-4">
                      <input placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror pww" name="password" required autocomplete="current-password"/>
                      <label class="form-label" for="form3Example4">{{ __('Password') }}</label>
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
    
                  <!-- Checkbox Show/Hide Password -->
                  <div class="form-check d-flex justify-content-start">
                    <input class="form-check-input me-2" type="checkbox" id="checkbox" />
                    <label class="form-check-label" for="remember" onselectstart='return false;'>
                        {{ __('Show Password') }}
                    </label>
                  </div>
    
                  <!-- Submit button -->
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-block mb-4 px-5 mt-3">
                        {{ __('Login') }}
                    </button>
                  </div>
                  
                  <!-- Register buttons -->
                  <div class="text-center">
                      <p>Belum punya akun? <a href="{{ route('register') }}" class="link-danger">Daftar disini</a></p>
                  </div>

                  <!-- Home buttons -->
                  <div class="text-center ">
                      <p>atau <a href="{{ url('/home') }}" class="link-primary">Kembali ke halaman utama</a></p>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>

          <div class="col-lg-3"></div>
        </div>
      </div>
  </div>
  </section>
  <!-- Section: Design Block -->

  
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection