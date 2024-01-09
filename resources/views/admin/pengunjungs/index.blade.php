@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 justify-content-between d-flex">
                    <h1 class="m-0">{{ __('Data Pengunjung') }}</h1>
                    <div>
                    <a href="{{ route('admin.pengunjungs.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> </a>
                    <a href="{{ route('admin.pengunjungs.print', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" target="_blank" class="btn btn-primary"> <i class="fa fa-print" width="100%"></i> </a></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- Tambahkan form filter di bagian atas halaman -->
            <form action="{{ route('admin.pengunjungs.index') }}" method="GET" class="mb-3">
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-4">
                        <!-- Tambahkan tombol filter -->
                        <button type="submit" class="btn btn-primary mt-4">Filter</button>
                        <a href="{{ route('admin.pengunjungs.index') }}" class="btn btn-secondary mt-4">Reset</a>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">                         
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Type (R2) </th>
                                        <th>Type (R4) </th>
                                        <th>Total</th>
                                        <th>Date</th>
                                      <!--  <th>Month</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengunjungs as $pengunjung)
                                    <tr>
                                        <td>{{ ($pengunjungs->currentPage() - 1) * $pengunjungs->perPage() + $loop->index + 1 }}</td>
                                        <td>{{ $pengunjung->type_r2}}</td>
                                        <td>{{ $pengunjung->type_r4}}</td>
                                        <td>{{ $pengunjung->total }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pengunjung->date)->format('d/m/Y') }}</td>
                                        <!--<td>
                                        @php
                                            $bulanNames = [
                                                'Januari', 'Februari', 'Maret', 'April',
                                                'Mei', 'Juni', 'Juli', 'Agustus',
                                                'September', 'Oktober', 'November', 'Desember'
                                            ];
                                        @endphp
                                            
                                        </td>-->
                                        
                                        <td>
                                            <a href="{{ route('admin.pengunjungs.edit', $pengunjung) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>
                                            <form onclick="return confirm('are you sure ?');" class="d-inline-block" action="{{ route('admin.pengunjungs.destroy', $pengunjung) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $pengunjungs->links() }}
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content -->
@endsection