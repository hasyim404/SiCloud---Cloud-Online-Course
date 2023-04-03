@extends('admin.index')
@section('title', 'Edit Judul Course')
@section('page_title')
    <h1>Edit Judul Course</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/course') }}">Kelola User</a></li>
            <li class="breadcrumb-item active"><a href="#!">Edit Judul Course</a></li>
        </ol>
    </nav>
@endsection
@section('content')
<section class="section profile">
    <div class="row">

      <div class="col-xl-6">

        <div class="card">
          <div class="card-body pt-4 d-flex flex-column align-items-center">
            @empty($data->foto)
                <img src="{{ url('img/banner_course/!banner-default.jpg') }}" class="rounded" height="300px" width="300px" alt="Profile" >
            @else
                <img src="{{ url('img/banner_course')}}/{{$data->foto}}" class="rounded" height="250px" width="420px" alt="Profile" >
            @endempty 

            <h2 class="pt-1">Banner Course</h2>
            <p class="text-center">
              @empty($data->foto)
                <span class="badge bg-danger">Tidak ada gambar</span>
              @else
                {{ $data->foto }}
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
        
                <h5 class="card-title">Detail Course</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama Course</div>
                  <div class="col-lg-9 col-md-8">{{ $data->nama_course }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Deskripsi</div>
                  <div class="col-lg-9 col-md-8">
                  @empty($data->deskripsi_course)
                    -
                  @endempty
                  {{ $data->deskripsi_course }}
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Last Update</div>
                  <div class="col-lg-9 col-md-8">{{ $data->updated_at }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit" id="profile-edit">

                <h5 class="card-title">Edit Data Course</h5>
                <!-- Profile Edit Form -->
                <form method="POST" action="{{ route('course.update',$data->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Banner Image</label>
                    <div class="col-md-8 col-lg-9">
                        @if(!empty($data->foto)) 
                            <img src="{{ url('img/banner_course')}}/{{$data->foto}}" height="120px" width="160px" alt="Profile"  class="rounded p-2 border">
                        @else
                            <img src="{{ url('img/banner_course/!banner-default.jpg') }}" height="120px" width="160px" alt="Profile" class="rounded p-2 border">
                        @endif 
                        <div class="pt-2">
                            <div class="col-md-12">
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="floatingName" name="foto" placeholder="Foto">
                                @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>  
                                @enderror
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Course</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="nama_course" type="text" class="form-control @error('nama_course') is-invalid @enderror" id="fullName" value="{{ $data->nama_course }}" >
                          @error('nama_course')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>  
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                    <label for="isi_pesan" class="col-md-4 col-lg-3 col-form-label">Deskripsi</label>
                    <div class="col-md-8 col-lg-9">
                        <textarea class="form-control @error('deskripsi_course') is-invalid @enderror" name="deskripsi_course" placeholder="Deskripsi" id="floatingTextarea" style="height: 100px;">{{ $data->deskripsi_course }}</textarea>
                        @error('deskripsi_course')
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
              <a class="btn btn-primary btn-md" href=" {{ url('admin/course') }}">
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
      text: 'Update data Course gagal',
      icon: 'error',
      showConfirmButton: false
    })
  };
  @endif
</script>
@endsection