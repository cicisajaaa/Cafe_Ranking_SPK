@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Tambah Kriteria</h2>
    <a href="/criteria" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="/criteria" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Kode Kriteria</label>
                <input type="text" name="kode" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Kriteria</label>
                <input type="text" name="nama_kriteria" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Bobot</label>
                <input type="number" step="0.01" name="bobot" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Tipe Kriteria</label>
                <select name="type" class="form-select" required>
                    <option value="benefit">Benefit</option>
                    <option value="cost">Cost</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan Kriteria
            </button>
        </form>
    </div>
</div>

@endsection