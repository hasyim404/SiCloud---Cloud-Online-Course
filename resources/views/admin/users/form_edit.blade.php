@extends('admin.index')
@section('title', 'Edit User')
@section('info', 'Form Edit User')
@section('page_title')
    <h1>Edit User {{ $data->f_name }} {{ $data->l_name }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
        </ol>
    </nav>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit User</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" method="POST" action="{{ route('users.update',$data->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control @error('f_name') is-invalid @enderror" value="{{ $data->f_name }}" id="floatingName" name="f_name" placeholder="First Name">
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
                <input type="text" class="form-control @error('l_name') is-invalid @enderror" value="{{ $data->l_name }}" id="floatingName"  name="l_name" placeholder="Last Name">
                <label for="floatingName">Last Name</label>
                @error('l_name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>  
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}" id="floatingName" name="email" placeholder="Email">
                <label for="floatingName">Email</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>  
                @enderror
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" value="{{ $data->no_telp }}" id="floatingName" name="no_telp" placeholder="No. Telp">
            <label for="floatingName">No. Telp</label>
            @error('no_telp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>  
            @enderror
          </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ $data->username }}" id="floatingName" name="username" placeholder="Username">
                <label for="floatingName">Username</label>
                @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>  
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="floatingName" name="password" placeholder="Password">
                <label for="floatingName">Password</label>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>  
                @enderror
            </div>
        </div>
        <div class="col-md-3">
          <label for="validationDefault04" class="form-label">Status</label>
          <select class="form-select @error('status') is-invalid @enderror" id="validationDefault04" name="status">
            <option selected disabled value="">-- Pilih Status --</option>
            @php
            $no = 1;  
            @endphp

            @foreach ($ar_status as $status)
                @php $cek1 = ($status == $data->status) ? 'selected' : ''; @endphp
                <option value="{{ $status }}" {{ $cek1 }}> {{ $no++ }} - {{ $status }}</option> 

            @endforeach
          </select>
          @error('status')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
          @enderror
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="floatingName" name="foto" placeholder="Foto">
                    <label for="floatingName">Foto</label>
                    @error('foto')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>  
                    @enderror
                    <div class="row">
                      <div class="col-lg text-center">
                        @if(!empty($data->foto)) 
                          <h5 class="pt-2">Current User Profile Image:</h5>
                          <img src="{{ url('img/users_profile')}}/{{$data->foto}}" height="120px" alt="Profile"  class="img-thumbnail p-1 ">
                          <br/>{{$data->foto}}
                        @endif    
                      </div>
                    </div>
                </div>
            </div>    
        </div>
        
        <div class="col-md-3">
            <label for="validationDefault04" class="form-label">Role</label>

            <select class="form-select @error('role') is-invalid @enderror" id="validationDefault04" name="role">
              <option selected disabled value="">-- Pilih Role --</option>
  
              @foreach ($ar_role as $role)
                @php $cek2 = ($role == $data->role) ? 'selected' : ''; @endphp
                <option value="{{ $role }}" {{ $cek2 }}> {{ $role }}</option> 
              @endforeach
              
            </select>
            @error('role')
              <div class="invalid-feedback">
                {{ $message }}
              </div>  
            @enderror
        </div>
        <div class="text-center p-3">
          <button type="submit" class="btn btn-primary">Edit</button>
          <a class="btn btn-secondary btn-md" href=" {{ url('admin/users') }}">
            Back
          </a>  
        </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>
@endsection

