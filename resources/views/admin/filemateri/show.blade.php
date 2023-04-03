@extends('admin.index')
@section('title', 'Kelola Filemateri')
@section('page_title')
    <h1>Preview File Materi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/filemateri') }}">Kelola File Materi</a></li>
            <li class="breadcrumb-item active"><a href="#!">Prefiew File Materi</a></li>
        </ol>
    </nav>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="row">

        <div class="col-xxl-12">
            <div class="card info-card sales-card">
                <div class="d-flex flex-row justify-content-center p-3">
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="bi bi-question-circle "></i> Stop Auto Download PDF - <span class="fw-semibold">IDM</span>
                    </button>
                </div>
                
                <div class="d-flex align-items-center mt-2">
                    
                    <div class="card-body">
                        <embed src="{{ url('file_materi'.'/'.$data->pdfmateri) }}" height="600" width="100%" alt="Preview PDF">
                    </div>

                </div>

                <div class="text-end my-3 me-4">
                    <a class="btn btn-primary btn-md" href=" {{ url('admin/filemateri') }}">
                        <i class="bi bi-caret-left-square"></i> Back
                    </a>  
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title  card-title" id="staticBackdropLabel">Stop Auto Download PDF</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    
                        <div class="col-md-12">
                            <div class="row g-3 mb-3">
                            <div class="col-md-12">
                                <ol>
                                    <li>Buka IDM.</li>
                                    <li>Pergi ke Option.</li>
                                    <li>Pilih "File types".</li>
                                    <li>Hilangkan "PDF", lalu save.</li>
                                </ol>    
                                <img src="{{ url('img/auto-download-pdf-idm.jpeg') }}" class="img-thumbnail" alt="" width="600" height="400">
                            </div>
                            
                            </div>
                        </div>
                        
                        <div class="modal-footer text-center mt-5">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection