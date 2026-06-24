@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-0">Hasil Ranking TOPSIS</h2>
        <small class="text-muted">
            Hasil perhitungan Sistem Pendukung Keputusan Pemilihan Cafe
        </small>
    </div>

    <form action="{{ route('admin.ranking.calculate') }}" method="POST">
    @csrf

    <button class="btn btn-primary">
        <i class="bi bi-calculator"></i>
        Hitung TOPSIS
    </button>
</form>

</div>

<div class="mb-3">

    <a href="{{ route('admin.ranking.pdf') }}"
       class="btn btn-danger">

        <i class="bi bi-file-earmark-pdf-fill"></i>
        Export PDF

    </a>

</div>
<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th width="150">Ranking</th>
                        <th>Nama Cafe</th>
                        <th width="200">Nilai TOPSIS</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($rankings as $r)

                        <tr>

                            <td>
                                @if($r->ranking == 1)
                                    <span class="badge bg-warning text-dark fs-6">
                                        🥇 Juara 1
                                    </span>
                                @elseif($r->ranking == 2)
                                    <span class="badge bg-secondary fs-6">
                                        🥈 Juara 2
                                    </span>
                                @elseif($r->ranking == 3)
                                    <span class="badge bg-dark fs-6">
                                        🥉 Juara 3
                                    </span>
                                @else
                                    <span class="badge bg-primary">
                                        #{{ $r->ranking }}
                                    </span>
                                @endif
                            </td>

                            <td>
                                <strong>{{ $r->cafe->nama_cafe }}</strong>
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="progress flex-grow-1" style="height:10px;">
                                        <div class="progress-bar" style="width: {{ $r->nilai_topsis * 100 }}%"></div>
                                    </div>
                                    <strong>{{ number_format($r->nilai_topsis,3) }}</strong>
                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Belum ada hasil ranking. Silakan klik tombol Hitung TOPSIS.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection