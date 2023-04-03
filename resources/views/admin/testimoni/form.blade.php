@extends('admin.index')
@section('title', 'Form Kelola Testimoni')
@section('info', 'Form Tambah Testimoni')
@section('data1', 'Kelola Testimoni')
@section('data2', 'Form Tambah Testimoni')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title text-center my-3">Tambah Testimoni</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" method="POST" action="{{ route('testimoni.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="col-md-3"></div>

        <div class="col-md-6">
          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="floatingName" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap">
                <label for="floatingName">Nama Lengkap</label>
                @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>  
                @enderror
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="floatingName" name="email" value="{{ old('email') }}" placeholder="Email">
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
          <a class="btn btn-secondary btn-md" href=" {{ url('admin/testimoni') }}">
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
      text: 'Gagal menambahkan Testimoni',
      icon: 'error',
      showConfirmButton: false
    })
  };
  @endif
</script>
@endsection


