@extends('layouts.app')

@section('content')

<!-- Header + Caption -->
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h2 class="fw-bold mb-1">Data Kriteria</h2>
            <small class="text-muted">
                Kelola kriteria yang akan digunakan dalam perhitungan TOPSIS, termasuk kode, bobot, dan tipe.
            </small>
        </div>

        <a href="/criteria/create" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Kriteria
        </a>

    </div>
</div>

<!-- Tabel Kriteria -->
<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Tipe</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($criteria as $c)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $c->kode }}</td>
                        <td>{{ $c->nama_kriteria }}</td>
                        <td>{{ $c->bobot }}</td>
                        <td>{{ ucfirst($c->type) }}</td>
                        <td>
                            <a href="/criteria/{{ $c->id }}/edit" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="/criteria/{{ $c->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus kriteria ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="bi bi-info-circle me-1"></i> Belum ada data kriteria
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection