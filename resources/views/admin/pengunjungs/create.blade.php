@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Form Create Pengunjung') }}</h1>
                    <a href="{{ route('admin.pengunjungs.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> </a>
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
                    <form method="post" action="{{ route('admin.pengunjungs.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <div class="form-group row border-bottom pb-4">
                                <label for="type_r2" class="col-sm-2 col-form-label">Type R2</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="type_r2" name="type_r2" oninput="calculateTotal()" value="{{ old('type_r2') }}">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="type_r4" class="col-sm-2 col-form-label">Type R4</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="type_r4" name="type_r4" oninput="calculateTotal()" value="{{ old('type_r4') }}">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="total" class="col-sm-2 col-form-label">Total</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="total" name="total" value="{{ old('total') }}" readonly>
                                </div>
                            </div>

                            <!--<div class="form-group row border-bottom pb-4">
                                <label for="minggu" class="col-sm-2 col-form-label">Week</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="minggu" name="minggu">
                                        @for ($weekNumber = 1; $weekNumber <= 4; $weekNumber++)
                                            <option value="{{ $weekNumber }}" {{ old('minggu') == $weekNumber ? 'selected' : '' }}>{{ $weekNumber }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="bulan" class="col-sm-2 col-form-label">Month</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="bulan" name="bulan">
                                        @php
                                            $bulanNames = [
                                                'Januari', 'Februari', 'Maret', 'April',
                                                'Mei', 'Juni', 'Juli', 'Agustus',
                                                'September', 'Oktober', 'November', 'Desember'
                                            ];
                                        @endphp

                                        @foreach ($bulanNames as $index => $bulanName)
                                            <option value="{{ $index + 1 }}" {{ old('bulan') == ($index + 1) ? 'selected' : '' }}>
                                                {{ $bulanName }}
                                            </option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div> -->
                            <div class="form-group row border-bottom pb-4">
                                <label for="date" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                                </div>             
                            </form>
                        </div>
                            <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div><!-- /.content -->
@endsection

@section('styles')
<style>
.ck-editor__editable_inline {
    min-height: 200px;
}
</style>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
    function calculateTotal() {
        // Get the values of type_r2 and type_r4
        var type_r2 = parseFloat(document.getElementById('type_r2').value) || 0;
        var type_r4 = parseFloat(document.getElementById('type_r4').value) || 0;

        // Calculate the total and update the total input field
        var total = type_r2 + type_r4;
        document.getElementById('total').value = total;
    }
</script>
@endsection