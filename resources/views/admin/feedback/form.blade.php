@extends('admin.index')
@section('title', 'Form Feedback')
@section('info', 'Form Feedback')
@section('data1', 'Kelola Feedback')
@section('data2', 'Form Feedback')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title text-center my-3">Tambah Feedback</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" method="POST" action="{{ route('feedback.store') }}">
        @csrf

        <div class="col-md-3"></div>
        
        <div class="col-md-6">
          <div class="row g-3 mb-3">
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" id="floatingName" name="nama" placeholder="Nama User">
                <label for="floatingName">Nama User</label>
                @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>  
                @enderror
              </div>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="floatingName" name="email" placeholder="Email">
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
            <div class="col-md-12">
              <div class="form-floating">
                <textarea class="form-control @error('isi_feedback') is-invalid @enderror" placeholder="Feedback" name="isi_feedback" id="floatingTextarea" style="height: 100px;">{{ old('isi_feedback') }}</textarea>
                <label for="floatingTextarea">Feedback</label>
                @error('isi_feedback')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>  
                @enderror
              </div>
            </div>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label for="validationDefault04" class="form-label">Course</label>
              <select class="form-select @error('course_id') is-invalid @enderror" id="validationDefault04" name="course_id">
                <option selected disabled value="">-- Pilih Course --</option>
                  @php
                  $no = 1;  
                  @endphp
                  
                  @foreach ($course as $data)
                    @php
                      $select1 = (old('course_id') == $data->id) ? 'selected' : '';
                    @endphp
                    <option value="{{ $data->id }}" {{ $select1 }}> {{ $no++ }} - {{ $data->nama_course }}</option>
                  @endforeach
              </select>
              @error('course_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>  
              @enderror
            </div>
          </div>
          
        </div>

        <div class="col-md-3"></div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a class="btn btn-secondary btn-md" href=" {{ url('admin/feedback') }}">
            Back
          </a>  
        </div>
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
      text: 'Gagal menambahkan Feedback',
      icon: 'error',
      showConfirmButton: false
    })
  };
  @endif
</script>
@endsection

