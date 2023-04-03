@extends('admin.index')
@section('title', 'Edit Modul')
@section('page_title')
    <h1>Edit Data Modul</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item "><a href="{{ url('/admin/modul') }}">Kelola Modul</a></li>
            <li class="breadcrumb-item active"><a href="#!">Edit Data Modul</a></li>
        </ol>
    </nav>
@endsection
@section('content')
<section class="section profile">
    <div class="row">

      <div class="col-xl-6">

        <div class="card">
          <div class="card-body pt-4 d-flex flex-column align-items-center">
            @empty($data->course->foto)
                <img src="{{ url('img/banner_course/!banner-default.jpg') }}" class="rounded" height="300px" width="300px" alt="Profile" >
            @else
                <img src="{{ url('img/banner_course')}}/{{$data->course->foto}}" class="rounded" height="250px" width="420px" alt="Profile" >
            @endempty 

            <h2 class="pt-1">Banner Course</h2>
            <p class="text-center">
              @empty($data->course->foto)
                <span class="badge bg-danger">-</span>
              @else
              <td>
                  {{ $data->course->foto }}
              </td>
              @endempty
            </p>
          </div>
        </div>

      </div>

      <div class="col-xl-6">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active fw-bold" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail</button>
              </li>

              <li class="nav-item">
                <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Data</button>
              </li>

            </ul>

            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
        
                <h5 class="card-title">Detail Isi Data Modul</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Judul Modul</div>
                  <div class="col-lg-9 col-md-8">{{ $data->jdl_modul }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Untuk Course</div>
                  <div class="col-lg-9 col-md-8">
                    @empty($data->course->nama_course)
                      <span class="badge bg-danger">Course Terhapus/hilang</span>
                    @else
                      {{ $data->course->nama_course }}
                    @endempty
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Deskripsi</div>
                  <div class="col-lg-9 col-md-8">
                    @empty($data->deskripsi)
                      -
                    @endempty
                    {{ $data->deskripsi }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Last Update</div>
                  <div class="col-lg-9 col-md-8">{{ $data->updated_at }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit" id="profile-edit">

                <h5 class="card-title">Edit Data Modul</h5>
                <!-- Profile Edit Form -->
                <form method="POST" action="{{ route('modul.update',$data->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Judul Course</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="jdl_modul" type="text" class="form-control @error('jdl_modul') is-invalid @enderror" id="fullName" value="{{ $data->jdl_modul }}" >
                          @error('jdl_modul')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>  
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                    <label for="validationDefault04" class="col-md-4 col-lg-3 col-form-label">Course</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="@error('course_id') is-invalid @enderror selectpicker border rounded" data-live-search="true" id="validationDefault04" name="course_id" required>
                        <option selected disabled value="">-- Pilih Course --</option>
                          @php
                          $no = 1;  
                          @endphp
                          
                          @foreach ($course as $crs)
                            @php $cek1 = ($crs->id == $data->course_id) ? 'selected' : ''; @endphp
                            <option value="{{ $crs->id }}" {{ $cek1 }}> {{ $no++ }}. {{ $crs->nama_course }}</option>
                          @endforeach
                      </select>
                      @error('course_id')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>  
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="isi_pesan" class="col-md-4 col-lg-3 col-form-label">Deskripsi</label>
                    <div class="col-md-8 col-lg-9">
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Deskripsi" id="floatingTextarea" style="height: 100px;">{{ $data->deskripsi }}</textarea>
                        @error('deskripsi')
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
              
            </div><!-- End Bordered Tabs -->

            <div class="text-end">
              <a class="btn btn-primary btn-md" href=" {{ url('admin/modul') }}">
                <i class="bi bi-caret-left-square"></i> Back
              </a>  
            </div>

          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@section('sweetalert2')
<script>

  @if ($errors->all())
  {
    Swal.fire({
      title: 'Error',
      text: 'Update data Modul gagal',
      icon: 'error',
      showConfirmButton: false
    })
  };
  @endif
</script>
@endsection