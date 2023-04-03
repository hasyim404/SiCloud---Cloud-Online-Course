@extends('admin.index')
@section('title', 'Form Course')
@section('info', 'Form Course')
@section('data1', 'Kelola Course')
@section('data2', 'Form Course')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Tambah Course</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data">
        @csrf

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
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="nama_course" placeholder="Nama Course">
                    <label for="floatingName">Nama Course</label>
                </div>
            </div>   
          </div> 

          <div class="row g-3">
            <div class="col-md-4">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Deskripsi" name="deskripsi_course" id="floatingTextarea" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Deskripsi Course</label>
                </div>
            </div>   
          </div> 

          <div class="row g-3">
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="file" class="form-control" id="floatingName" name="foto" placeholder="Banner Foto">
                    <label for="floatingName">Banner Foto</label>
                </div>
            </div>   
          </div> 

          <div class="row g-3">
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="jdl_modul" placeholder="Judul Modul">
                    <label for="floatingName">Judul Modul</label>
                </div>
            </div>   
          </div> 

          <div class="row g-3">
            <div class="col-md-4">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Deskripsi" name="deskripsi_modul" id="floatingTextarea" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Deskripsi Modul</label>
                </div>
            </div>   
          </div> 

          <div class="row g-3">
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="file" class="form-control" id="floatingName" name="file_materi" placeholder="File Materi">
                    <label for="floatingName">File Materi</label>
                </div>
            </div>   
          </div> 

          <div class="row g-3">
            <div class="col-md-4">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Deskripsi" name="video" id="floatingTextarea" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Video</label>
                </div>
            </div>   
          </div> 

          <div class="text-center p-3">
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a class="btn btn-secondary btn-md" href=" {{ url('admin/course') }}">
              Back
            </a>  
          </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>
@endsection

