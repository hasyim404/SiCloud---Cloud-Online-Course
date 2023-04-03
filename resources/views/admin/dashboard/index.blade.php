@extends('admin.index')
@section('title', 'Dashboard')
@section('page_title')
    <h1>Dashboard </h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="bi bi-house"></i></a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
        </ol>
    </nav>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="row">

        <div class="col-lg-12">
            <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Course <span>| Saat ini</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cloud-haze2"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $course }}</h6>
                            {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                        </div>
                    </div>
                </div>

                </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">

                <div class="card-body">
                    <h5 class="card-title">Feedback <span>| Di Terima</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(248, 239, 224);">
                            <i class="bi bi-info-lg text-warning" ></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $feedback }}</h6>
                            {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                        </div>
                    </div>
                </div>

                </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-4">

                <div class="card info-card revenue-card">

                <div class="card-body">
                    <h5 class="card-title">Users <span>| Status Active</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <div class="ps-3 me-5">
                            <h6>{{ $user_active }}</h6>
                            {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}

                        </div>
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(248, 224, 224);">
                            <i class="text-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-person-exclamation" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V11a.5.5 0 0 0-.5-.5Zm0 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z"/>
                                </svg>
                            </i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $user_notActive }}</h6>
                            {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}

                        </div>
                    </div>

                </div>
                </div>

            </div><!-- End Customers Card -->

            </div>
        </div>
        <!-- End Left side columns -->

        <div class="col-lg-8">
            <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">Testimoni <span>| Inputan Terbaru</span></h5>

                    <div class="table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama&nbsp;User</th>
                                    <th scope="col">Isi&nbsp;Testimoni</th>
                                    <th class="text-center" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">

                                @php $no=1; @endphp
                                @foreach ( $testimoni as $data )
                                @php
                                    switch ($data->status) {
                                        case 0:
                                            $class = 'bg-danger';
                                            $status = 'Hide';
                                            break;
                                        case 1:
                                            $class = 'bg-success';
                                            $status = 'Show';
                                            break;

                                        default;
                                        break;
                                    };
                                @endphp
                                <tr>
                                    <th scope="row">{{ $no++ }}.</th>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->isi_pesan }}</td>
                                    <td class="text-center"><span class="badge {{ $class }}">{{ $status }}</span></div></td>
                                </tr>    
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Perbandingan Status</h5>
            
                    <!-- Pie Chart -->
                    <div id="pieChart" style="min-height: 400px;" class="echart"></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#pieChart")).setOption({
                                    title: {
                                        text: '',
                                        subtext: '',
                                        left: 'center'
                                    },
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        orient: 'vertical',
                                        left: 'left'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: '50%',
                                        data: [
                                            @foreach ($ar_status as $status)
                                                {
                                                value: {{ $status->jumlah }},
                                                name: '{{ $status->status }}'
                                                },    
                                            @endforeach
                                        ],
                                        emphasis: {
                                            itemStyle: {
                                                shadowBlur: 10,
                                                shadowOffsetX: 0,
                                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                                            }
                                        }
                                    }]
                                });
                            });
                        </script>
                    </div>
                    <!-- End Pie Chart -->
                </div>
            </div>
        </div>
            
        
    </div>
</div>
@endsection