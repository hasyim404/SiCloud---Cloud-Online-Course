@extends('admin.index')
@section('title', 'Edit Link Video')
@section('page_title')
    <h1>Edit Data Link Video</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/videomateri') }}">Kelola User</a></li>
            <li class="breadcrumb-item active"><a href="$!">Edit Data Link Video</a></li>
        </ol>
    </nav>
@endsection
@section('content')
<section class="section profile">
    <div class="row">

      <div class="col-xl-5">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            @php
                $ytarray=explode("/", $data->video);
                $ytendstring=end($ytarray);
                $ytendarray=explode("?v=", $ytendstring);
                $ytendstring=end($ytendarray);
                $ytendarray=explode("&", $ytendstring);
                $ytcode=$ytendarray[0];
            @endphp

            <iframe width="360" height="295" src="http://www.youtube.com/embed/{{$ytcode}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
            
            <h2>{{ $data->nama_video }}</h2>
            <h3 class="text-center">Modul: 
              @empty($data->modul->jdl_modul)
              <td>
                  <span class="badge bg-danger">-</span>
              </td>
              @else
              <td>
                  {{ $data->modul->jdl_modul }}
              </td>
              @endempty
            </h3>
          </div>
        </div>

      </div>

      <div class="col-xl-7">

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
        
                <h5 class="card-title">Detail Data Link Video </h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Judul Video</div>
                  <div class="col-lg-9 col-md-8">{{ $data->nama_video }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Link Video</div>
                  <div class="col-lg-9 col-md-8">{{ $data->video }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Untuk Modul</div>
                  <div class="col-lg-9 col-md-8">
                    @empty($data->modul->jdl_modul)
                      <span class="badge bg-danger">Modul Tidak ada/Terhapus</span>
                    @else
                      {{ $data->modul->jdl_modul }}
                    @endempty
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Last update</div>
                  <div class="col-lg-9 col-md-8">{{ $data->updated_at }}</div>
                </div>

                {{-- <div class="row">
                  <div class="col-lg-3 col-md-4 label">Status</div>
                  <div class="col-lg-9 col-md-8"><span class="badge {{ $class }}">{{ $status }}</span></div>
                </div> --}}

              </div>

              <div class="tab-pane fade show profile-edit" id="profile-edit">

                <h5 class="card-title">Form Edit Data Link Video </h5>

                <!-- Profile Edit Form -->
                <form method="POST" action="{{ route('videomateri.update',$data->id) }}">
                  @csrf
                  @method('PUT')

                  <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Judul Video</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="nama_video" type="text" class="form-control @error('nama_video') is-invalid @enderror" id="fullName" value="{{ $data->nama_video }}" >
                          @error('nama_video')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>  
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Link Video</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="video" type="text" class="form-control @error('video') is-invalid @enderror" id="Email" value="{{ $data->video }}">
                          @error('video')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>  
                          @enderror
                      </div>
                  </div>

                  <div class="row mb-3">
                    <label for="validationDefault04" class="col-md-4 col-lg-3 col-form-label">Modul</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="@error('modul_id') is-invalid @enderror selectpicker border rounded" data-live-search="true" id="validationDefault04" name="modul_id">
                        <option selected disabled value="">-- Pilih Modul --</option>
                          @php
                          $no = 1;  
                          @endphp
                          
                          @foreach ($modul as $mdl)
                            @php $cek1 = ($mdl->id == $data->modul_id) ? 'selected' : ''; @endphp
                            <option value="{{ $mdl->id }}" {{ $cek1 }}> {{ $no++ }}. {{ $mdl->jdl_modul }}</option>
                          @endforeach
                      </select>
                      @error('modul_id')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>  
                      @enderror
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-save"></i> Simpan perubahan</button>
                  </div>

                </div>
                </form><!-- End Profile Edit Form -->
              </div>
              
            </div><!-- End Bordered Tabs -->

            <div class="text-end">
              <a class="btn btn-primary btn-md" href=" {{ url('admin/videomateri') }}">
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
      text: 'Update data Link Video gagal',
      icon: 'error',
      showConfirmButton: false
    })
  };
  @endif
</script>
@endsection