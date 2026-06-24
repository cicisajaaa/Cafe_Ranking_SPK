@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">

    <!-- HEADER -->
    <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h4 class="fw-bold mb-1">Edit Cafe</h4>
                <small class="text-muted">
                    Perbarui data cafe untuk perhitungan TOPSIS
                </small>
            </div>

            <a href="{{ route('admin.cafes.index') }}"
               class="btn btn-outline-secondary btn-sm position-relative"
               style="z-index: 9999;">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
            </a>

        </div>
    </div>

    <!-- CARD -->
    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form action="{{ route('admin.cafes.update', $cafe->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Nama Cafe</label>
                        <input type="text" name="nama_cafe" class="form-control" value="{{ $cafe->nama_cafe }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" value="{{ $cafe->harga }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kecepatan Wifi</label>
                        <input type="number" name="kecepatan_wifi" class="form-control" value="{{ $cafe->kecepatan_wifi }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kenyamanan</label>
                        <input type="number" name="kenyamanan" class="form-control" value="{{ $cafe->kenyamanan }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Colokan</label>
                        <input type="number" name="colokan" class="form-control" value="{{ $cafe->colokan }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jarak (km)</label>
                        <input type="number" step="0.1" name="jarak" class="form-control" value="{{ $cafe->jarak }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jam Operasional</label>
                        <input type="number" name="jam_operasional" class="form-control" value="{{ $cafe->jam_operasional }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $cafe->alamat }}">
                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-warning px-4">
                        <i class="bi bi-pencil-square me-1"></i>
                        Update Data
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection