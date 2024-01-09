@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Laporan Data') }}</h1>
                    <div>
                    <a href="{{ route('admin.pengunjungs.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left" width="100%"></i> </a>
                    <a href="{{ route('admin.pengunjungs.print', ['start_date' => request('start_date'), 'end_date' => 
                    request('end_date')]) }}" class="btn btn-primary"> <i class="fa fa-print" width="100%"></i> </a></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-3">
                        <div class="form-group" align="center">
                        <img src="{{ asset('frontend/assets/img/KopSurat1.jpg') }}" alt="Logo" height="100px" width="100%"> <!-- Ganti 'path/to/logo.png' dengan path sesuai logo Anda -->
                            <p align="center" style="margin-top: 1px;"><b>Laporan Data Pengunjung</b></p>
                            <table class="static" align="center" rules="all" border="1px" style="width: 55%">
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 15%">Total</th>
                                    <th style="width: 30%">Type (R2)</th>
                                    <th style="width: 30%">Type (R4)</th>
                                    <th style="width: 20%">Date</th>
                                    <!--<th style="width: 30%">Bulan</th>-->
                                </tr>
                                @foreach ($pengunjungs as $index => $pengunjung)
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
                            </table>
                        </div>
                        <div style="width: 77%">
                            <p align="right">Pesawaran, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                            <p align="right">Pimpinan,</p></br></br></br>
                            <!-- Tambahkan tanda tangan atau nama pimpinan di sini -->
                            <!-- Contoh tanda tangan -->
                            <p align="right"></p>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content -->
    <!-- /.content -->
    <script type="text/javascript">
        // Fungsi untuk mencetak saat halaman dimuat
        window.print();
    </script>
@endsection

@section('styles')
<style type="text/css" media="print">
    /* Menghilangkan tombol Cetak */
    .print-button {
        display: none;
    }

    /* Mengatur tampilan cetak */
    body {
        margin: 0;
        padding: 10px;
    }

    /* Menghilangkan tulisan "Copyright" */
    .copyright {
        display: none;
    }
</style>

<style>
    table.static {
        width: 100%;
    }

    table.static th {
        background-color: #f2f2f2;
    }

    table.static th, table.static td {
        padding: 5px;
        text-align: left;
    }
</style>
@endsection
