@extends('admin.index')
@section('title', 'Form Kelola Modul')
@section('info', 'Form Tambah Modul')
@section('data1', 'Kelola Modul')
@section('data2', 'Form Tambah Modul')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title text-center my-3">Tambah Modul</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" method="POST" action="{{ route('modul.store') }}">
        @csrf

        <div class="col-md-3"></div>

        <div class="col-md-6">
          <div class="row g-3 mb-3">
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control @error('jdl_modul') is-invalid @enderror" id="floatingName" name="jdl_modul" value="{{ old('jdl_modul') }}" placeholder="Judul Modul">
                <label for="floatingName">Judul Modul</label>
                @error('jdl_modul')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>  
                @enderror
              </div>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-12">
              <label for="validationDefault04" class="form-label">Course</label>
              <select class="form-select @error('course_id') is-invalid @enderror" id="validationDefault04" name="course_id">
                <option selected disabled value="">-- Pilih Course --</option>
                @php
                $no = 1;  
                @endphp

                @foreach ($course as $crs)
                  @php
                    $select1 = (old('course_id') == $crs->id) ? 'selected' : '';
                  @endphp

                  <option value="{{ $crs->id }}" {{ $select1 }}> {{ $no++ }} - {{ $crs->nama_course }}</option> 

                @endforeach
              </select>
              @error('course_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>  
              @enderror
            </div>
          </div>
          
          
          <div class="row g-3 mb-3">
            <div class="col-md">
                <div class="form-floating">
                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Deskripsi" id="floatingTextarea" style="height: 100px;">{{ old('deskripsi') }}</textarea>
                  <label for="floatingTextarea">Deskripsi</label>
                    @error('deskripsi')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>  
                    @enderror
                </div>
            </div>  
          </div>
        
        <div class="text-center p-3">
          <button type="submit" class="btn btn-primary">Tambah</button>
          <a class="btn btn-secondary btn-md" href=" {{ url('admin/modul') }}">
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
      text: 'Gagal menambahkan Modul',
      icon: 'error',
      showConfirmButton: false
    })
  };
  @endif
</script>
@endsection


