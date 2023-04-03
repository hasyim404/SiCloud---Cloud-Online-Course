@extends('admin.index')
@section('title', 'Form Kelola File Materi')
@section('info', 'Form Tambah File Materi')
@section('data1', 'Kelola File Materi')
@section('data2', 'Form Tambah File Materi')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title text-center my-3">Tambah File Materi</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" method="POST" action="{{ route('filemateri.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="col-md-3"></div>

        <div class="col-md-6">
          <div class="row g-3 mb-3">
            <div class="col-md-12">
              <input type="file" class="form-control @error('pdfmateri') is-invalid @enderror" id="floatingName" name="pdfmateri" placeholder="File Materi">
              @error('pdfmateri')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>  
              @enderror
          </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-12">
              <label for="validationDefault04" class="form-label">Modul</label>
              <select class="form-select @error('modul_id') is-invalid @enderror" id="validationDefault04" name="modul_id">
                <option selected disabled value="">-- Pilih Modul --</option>
                @php
                $no = 1;  
                @endphp

                @foreach ($modul as $mdl)
                  @php
                    $select1 = (old('modul_id') == $mdl->id) ? 'selected' : '';
                  @endphp

                  <option value="{{ $mdl->id }}" {{ $select1 }}> {{ $no++ }} - {{ $mdl->jdl_modul }}</option> 

                @endforeach
              </select>
              @error('modul_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>  
              @enderror
            </div>
          </div>
        
        <div class="text-center p-3">
          <button type="submit" class="btn btn-primary">Tambah</button>
          <a class="btn btn-secondary btn-md" href=" {{ url('admin/filemateri') }}">
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
      text: 'Gagal memasukkan File',
      icon: 'error',
      showConfirmButton: false
    })
  };
  @endif
</script>
@endsection


