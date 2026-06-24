@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="fw-bold">Edit Kriteria</h2>

    <a href="/criteria" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form action="{{ route('admin.criteria.update', $criteria->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Kode Kriteria
                </label>

                <input type="text"
                       name="kode"
                       class="form-control"
                       value="{{ $criteria->kode }}"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Nama Kriteria
                </label>

                <input type="text"
                       name="nama_kriteria"
                       class="form-control"
                       value="{{ $criteria->nama_kriteria }}"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Bobot
                </label>

                <input type="number"
                       step="0.01"
                       name="bobot"
                       class="form-control"
                       value="{{ $criteria->bobot }}"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Type
                </label>

                <select name="type"
                        class="form-select">

                    <option value="benefit"
                        {{ $criteria->type == 'benefit' ? 'selected' : '' }}>
                        Benefit
                    </option>

                    <option value="cost"
                        {{ $criteria->type == 'cost' ? 'selected' : '' }}>
                        Cost
                    </option>

                </select>

            </div>

            <button type="submit"
                    class="btn btn-warning">

                <i class="bi bi-pencil-square"></i>
                Update Kriteria

            </button>

        </form>

    </div>

</div>

@endsection