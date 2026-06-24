@extends('layouts.app')

@section('content')

<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h2 class="fw-bold mb-1">Data Cafe</h2>
            <small class="text-muted">
                Kelola data cafe untuk perhitungan TOPSIS
            </small>
        </div>

        <a href="{{ route('admin.cafes.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Cafe
        </a>

    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <div class="table-responsive">

            <table id="cafeTable" class="table table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th width="70">No</th>
                        <th>Nama Cafe</th>
                        <th>Harga</th>
                        <th>Kecepatan WiFi</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($cafes as $cafe)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <strong>{{ $cafe->nama_cafe }}</strong>
                        </td>

                        <td>
                            Rp {{ number_format($cafe->harga, 0, ',', '.') }}
                        </td>

                        <td>
                            <span class="badge bg-success">
                                {{ $cafe->kecepatan_wifi }}
                            </span>
                        </td>

                        <td>

                            <!-- EDIT -->
                            <a href="{{ route('admin.cafes.edit', $cafe->id) }}"
                               class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('admin.cafes.destroy', $cafe->id) }}"
                                  method="POST"
                                  class="d-inline delete-form">

                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn btn-danger btn-sm delete-btn">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>

                            </form>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            <i class="bi bi-info-circle"></i>
                            Belum ada data cafe
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>
</div>

<!-- DELETE CONFIRM -->
<script>
document.querySelectorAll('.delete-btn').forEach(btn=>{
    btn.addEventListener('click', function(){
        let form = this.closest('form');

        Swal.fire({
            title: 'Yakin hapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result)=>{
            if(result.isConfirmed){
                form.submit();
            }
        });
    });
});
</script>

<!-- DATATABLE -->
<script>
$(function () {
    $('#cafeTable').DataTable();
});
</script>

@endsection