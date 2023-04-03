@extends('admin.index')
@section('title', 'Form Feedback')
@section('info', 'Form Feedback')
@section('data1', 'Kelola Feedback')
@section('data2', 'Form Feedback')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Tambah Feedback</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" method="POST" action="{{ route('feedback.update',$data->id) }}">
        @csrf
        @method('PUT')

        @if ($errors->any())
          <div class="alert alert-danger">
            {{-- <strong>Whoops!</strong> Ada Salah saat input data --}}
            <strong>Error!</strong>
            {{-- <br><br> --}}
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>                        
                @endforeach
            </ul>
          </div>    
        @endif

        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" value="{{ $data->nama }}" id="floatingName" name="nama" placeholder="Nama User">
              <label for="floatingName">Nama User</label>
            </div>
          </div>
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-floating">
              <input type="email" class="form-control" value="{{ $data->email }}" id="floatingName" name="email" placeholder="Email">
              <label for="floatingName">Email</label>
            </div>
          </div>    
        </div>
        
        <div class="row g-3">
          <div class="col-md-3">
            <label for="validationDefault04" class="form-label">Course</label>
            <select class="form-select" id="validationDefault04" name="course_id" required>
              <option selected disabled value="">-- Pilih Course --</option>
                @php
                $no = 1;  
                @endphp
                
                @foreach ($course as $crs)
                  @php $cek1 = ($crs->id == $data->course_id) ? 'selected' : ''; @endphp
                  <option value="{{ $crs->id }}" {{ $cek1 }}> {{ $no++ }} - {{ $crs->nama_course }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="col-6">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Feedback" name="isi_feedback" id="floatingTextarea" style="height: 100px;">{{ $data->isi_feedback }}</textarea>
            <label for="floatingTextarea">Feedback</label>
          </div>
        </div>

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

