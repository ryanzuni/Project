@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="card-text">
                        {{ __('Welcome') }} {{ auth()->user()->name }} !
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\Pengunjung::count() }}</h3>
                            <p>Data Pengunjung</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $userRegistrations }}</h3>
                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ \App\Models\Pengunjung::sum('type_r2') }}</h3>
                            <p>Roda 2 Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-motorcycle"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ \App\Models\Pengunjung::sum('type_r4') }}</h3>
                            <p>Roda 4 Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data Pengunjung Terbaru</h3>
                                    </div>
                                    <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Total</th>
                                                    <th>Type (R2)</th>
                                                    <th>Type (R4)</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($recentPengunjungs as $index => $pengunjung)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $pengunjung->total }}</td>
                                                    <td>{{ $pengunjung->type_r2 }}</td>
                                                    <td>{{ $pengunjung->type_r4 }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($pengunjung->date)) }}</td>
                                                    <!--<td>
                                                    @php
                                                        $bulanNames = [
                                                            'Januari', 'Februari', 'Maret', 'April',
                                                            'Mei', 'Juni', 'Juli', 'Agustus',
                                                            'September', 'Oktober', 'November', 'Desember'
                                                        ];
                                                    @endphp
                                                        
                                                    </td>-->
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <!-- Doughnut Chart -->
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Doughnut Chart - Total Pengunjung</h3>
                                                </div>
                                                <div class="card-body">
                                                    <canvas id="doughnutChart"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Bar Chart -->
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Bar Chart - Total Pengunjung (Roda 2 & Roda 4)</h3>
                                                </div>
                                                <div class="card-body">
                                                    <canvas id="barChart" height="300">></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                    // Ambil data pengunjung terbaru dari PHP
                                    const recentPengunjungs = @json($recentPengunjungs);

                                     // Siapkan array untuk label date dan jumlah pengunjung
                                    const labelsDoughnut = [];
                                    const dataDoughnut = [];

                                    // Siapkan array untuk label jenis kendaraan dan jumlah pengunjung
                                    const labelsBar = ['Roda 2', 'Roda 4'];
                                    const dataBar = [0, 0]; // Initial counts

                                    // Ambil data dari PHP dan masukkan ke dalam array
                                    recentPengunjungs.forEach(pengunjung => {
                                    // Data for Doughnut Chart
                                    labelsDoughnut.push(`Date ${pengunjung.date}`);
                                    dataDoughnut.push(pengunjung.total);
                                        
                                    // Data for Bar Chart (Roda 2 & Roda 4 total counts)
                                    if (pengunjung.type_r2) {
                                        dataBar[0] = pengunjung.type_r2;
                                    }  
                                    if (pengunjung.type_r4) {
                                        dataBar[1] = pengunjung.type_r4;
                                    }
                                        
                                    });

                                    // Membuat Doughnut Chart
                                    const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
                                    const doughnutChart = new Chart(ctxDoughnut, {
                                        type: 'doughnut',
                                        data: {
                                            labels: labelsDoughnut,
                                            datasets: [{
                                                label: 'total',
                                                data: dataDoughnut,
                                                backgroundColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(255, 205, 86)',
                                                    'rgb(75, 192, 192)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(201, 203, 207)'],
                                                hoverOffset: 4
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }}
                                        });

                                        // Membuat Bar Chart (Total counts for Roda 2 & Roda 4)
                                        const ctxBar = document.getElementById('barChart').getContext('2d');
                                        const barChart = new Chart(ctxBar, {
                                            type: 'bar',
                                            data: {
                                                labels: labelsBar,
                                                datasets: [{
                                                    label: 'Total Kendaraan',
                                                    data: dataBar,
                                                    backgroundColor: [
                                                        'rgb(54, 162, 235)',
                                                        'rgb(75, 192, 192)'],
                                                    borderColor: [
                                                        'rgb(54, 162, 235)',
                                                        'rgb(75, 192, 192)'],
                                                    borderWidth: 2
                                                    }]
                                                },
                                                options: {
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true
                                                        }
                                                        }}
                                                    });
                                            </script>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content -->
@endsection