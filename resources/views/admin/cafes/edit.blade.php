@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Edit Cafe</h2>

    <a href="/cafes" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form action="/cafes/{{ $cafe->id }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Cafe</label>

                <input type="text"
                       name="nama_cafe"
                       class="form-control"
                       value="{{ $cafe->nama_cafe }}"
                       required>
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga</label>

                    <input type="number"
                           name="harga"
                           class="form-control"
                           value="{{ $cafe->harga }}"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Kecepatan Wifi</label>

                    <input type="number"
                           name="kecepatan_wifi"
                           class="form-control"
                           value="{{ $cafe->kecepatan_wifi }}"
                           required>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Kenyamanan</label>

                    <input type="number"
                           name="kenyamanan"
                           class="form-control"
                           value="{{ $cafe->kenyamanan }}"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Colokan</label>

                    <input type="number"
                           name="colokan"
                           class="form-control"
                           value="{{ $cafe->colokan }}"
                           required>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Jarak</label>

                    <input type="number"
                           step="0.1"
                           name="jarak"
                           class="form-control"
                           value="{{ $cafe->jarak }}"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Jam Operasional</label>

                    <input type="number"
                           name="jam_operasional"
                           class="form-control"
                           value="{{ $cafe->jam_operasional }}"
                           required>
                </div>

                <div class="mb-3">
    <label for="alamat" class="form-label">Alamat Cafe</label>
    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $cafe->alamat ?? '') }}">
</div>
            </div>

            <button type="submit"
                    class="btn btn-warning">
                <i class="bi bi-pencil-square"></i>
                Update Data
            </button>

        </form>

    </div>

</div>

@endsection