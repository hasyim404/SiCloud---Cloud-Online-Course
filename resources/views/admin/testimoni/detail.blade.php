@extends('admin.index')
@section('title', 'Edit Testimoni')
@section('page_title')
    <h1>Edit Data Testimoni</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/testimoni') }}">Kelola Testimoni</a></li>
            <li class="breadcrumb-item active"><a href="#!">Edit Data Testimoni</a></li>
        </ol>
    </nav>
@endsection
@section('content')
<section class="section profile">
    <div class="row">

      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            @if( empty($data->foto) ) 
                <img src="{{ url('img/users_profile/!profile-default.jpg') }}" height="120px" width="120px" alt="Profile" class="rounded-circle"> 
            @elseif (file_exists( public_path('img/users_profile/'.$data->foto) ))
                <img src="{{ url('img/users_profile')}}/{{$data->foto}}" height="120px" width="120px" alt="Profile"  class="rounded-circle">
            @elseif (file_exists( public_path('img/users_profile/testimoni_users_profile/'.$data->foto) ))
                <img src="{{ url('img/users_profile/testimoni_users_profile')}}/{{$data->foto}}" height="120px" width="120px" alt="Profile"  class="rounded-circle">
            @endif 
            
            <h2>{{ $data->nama }}</h2>
            <h3>{{ $data->email }}</h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

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
        
                <h5 class="card-title">Detail Data Testimoni </h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                  <div class="col-lg-9 col-md-8">{{ $data->nama }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $data->email }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Isi Pesan</div>
                  <div class="col-lg-9 col-md-8">{{ $data->isi_pesan }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Status</div>
                  <div class="col-lg-9 col-md-8"><span class="badge {{ $class }}">{{ $status }}</span></div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit" id="profile-edit">

                <h5 class="card-title">Form Edit Data Testimoni </h5>

                <!-- Profile Edit Form -->
                <form method="POST" action="{{ route('testimoni.update',$data->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="fullName" value="{{ $data->nama }}" >
                          @error('nama')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>  
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="Email" value="{{ $data->email }}">
                          @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>  
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                    <label for="isi_pesan" class="col-md-4 col-lg-3 col-form-label">Isi Pesan</label>
                    <div class="col-md-8 col-lg-9">
                        <textarea class="form-control @error('isi_pesan') is-invalid @enderror" name="isi_pesan" placeholder="Isi Pesan" id="floatingTextarea" style="height: 100px;">{{ $data->isi_pesan }}</textarea>
                        @error('isi_pesan')
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
              <a class="btn btn-primary btn-md" href=" {{ url('admin/testimoni') }}">
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
      text: 'Update data Testimoni gagal',
      icon: 'error',
      showConfirmButton: false
    })
  };
  @endif
</script>
@endsection