@extends('admin.index')
@section('title', 'Kelola Feedback')
@section('page_title')
    <h1>Kelola Feedback</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/admin/feedback') }}">Kelola Feedback</a></li>
        </ol>
    </nav>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="row">

        <div class="col-xxl-12">
            <div class="card info-card sales-card">
                <div class="d-flex flex-row p-3">  
                    <li class="dropdown-header text-center px-2"><a href="{{ url('admin/get-feedback-pdf') }}" class="btn btn-danger btn-sm">
                        <i class="bi bi-filetype-pdf"></i> Export PDF</a>
                    </li>     
                </div>
                
                <div class="d-flex align-items-center mt-2">
                    <div class="card-body">
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama&nbsp;User</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Isi&nbsp;Feedback</th>
                                    <th scope="col">Course</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $no=1; @endphp
                                @foreach ( $feedback as $data )
                                <tr>
                                    <th scope="row">{{ $no++ }}.</th>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->isi_feedback }}</td>
                                    @empty($data->course->nama_course)
                                    <td>
                                        <span class="badge bg-danger">Course Terhapus/hilang</span>
                                    </td>
                                    @else
                                    <td>
                                        {{ $data->course->nama_course }}
                                    </td>
                                    @endempty
                                    <td>
                                        <form method="POST" id="formDelete">
                                            @csrf
                                            @method('DELETE')

                                            <div class="d-flex justify-content-center">
                                                <button data-action="{{ route('feedback.destroy',$data->id) }}" type="submit" class="btn btn-danger btn-sm btnDelete" title="Hapus Feedback">
                                                        <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                    {{-- <td><span class="badge bg-success">Approved</span></td> --}}
                                </tr>    
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('sweetalert2')
<script type="text/javascript">

    $('body').on('click', '.btnDelete', function(e) {
        e.preventDefault();
        var action = $(this).data('action');
        Swal.fire({
            title: 'Yakin ingin menghapus data ?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan lagi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#formDelete').attr('action', action);
                $('#formDelete').submit();
            }
        })
    })

</script>
@endsection