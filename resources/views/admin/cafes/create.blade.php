@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Tambah Cafe</h2>
    <a href="/cafes" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="/cafes" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Cafe</label>
                <input type="text" name="nama_cafe" class="form-control" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kecepatan Wifi</label>
                    <input type="number" name="kecepatan_wifi" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kenyamanan</label>
                    <input type="number" name="kenyamanan" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Ketersediaan Colokan</label>
                    <input type="number" name="colokan" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jarak dari Kampus</label>
                    <input type="number" step="0.1" name="jarak" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jam Operasional</label>
                    <input type="number" name="jam_operasional" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
    <div class="mb-3">
    <label for="alamat" class="form-label">Alamat Cafe</label>
    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $cafe->alamat ?? '') }}">
</div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan Data
            </button>
        </form>
    </div>
</div>

@endsection