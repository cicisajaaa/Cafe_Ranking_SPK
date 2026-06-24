@extends('layouts.mahasiswa')

@section('content')

<div class="mb-4">
    <h1 class="fw-bold mb-1" style="font-size:1.5rem;">
        🏆 Ranking Cafe Terbaik
        <span class="badge bg-info text-dark ms-2">Ranking</span>
    </h1>
    <p class="text-muted" style="font-size:0.9rem;">
        Hasil rekomendasi cafe berdasarkan metode TOPSIS.
    </p>
</div>

<!-- Top 3 Cafe -->
<div class="row g-3 mb-4">
    @foreach($rankings->take(3) as $r)
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    @if($loop->iteration == 1)
                        <i class="bi bi-trophy-fill text-warning" style="font-size:45px;"></i>
                        <div class="badge bg-warning text-dark mt-2">Juara 1</div>
                    @elseif($loop->iteration == 2)
                        <i class="bi bi-award-fill text-secondary" style="font-size:45px;"></i>
                        <div class="badge bg-secondary mt-2">Juara 2</div>
                    @else
                        <i class="bi bi-award-fill text-danger" style="font-size:45px;"></i>
                        <div class="badge bg-danger mt-2">Juara 3</div>
                    @endif

                    <h5 class="fw-bold mt-3">{{ $r->cafe->nama_cafe }}</h5>
                    <div class="text-primary fw-bold fs-4">
                        {{ number_format($r->nilai_topsis,3) }}
                    </div>
                    <small class="text-muted">Nilai TOPSIS</small>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Semua Ranking -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white fw-bold">
        Semua Ranking Cafe
    </div>
    <div class="card-body p-2">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-center" style="font-size:0.85rem;">
                    <tr>
                        <th>#</th>
                        <th>Nama Cafe</th>
                        <th>Nilai TOPSIS</th>
                    </tr>
                </thead>
                <tbody style="font-size:0.85rem;">
                    @foreach($rankings as $r)
                        <tr class="text-center">
                            <td>
                                @if($r->ranking == 1)
                                    <span class="badge bg-warning text-dark">#1</span>
                                @elseif($r->ranking == 2)
                                    <span class="badge bg-secondary">#2</span>
                                @elseif($r->ranking == 3)
                                    <span class="badge bg-danger">#3</span>
                                @else
                                    <span class="badge bg-dark">#{{ $r->ranking }}</span>
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $r->cafe->nama_cafe }}</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="progress flex-grow-1 me-2" style="height:6px;">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                             style="width: {{ $r->nilai_topsis * 100 }}%;">
                                        </div>
                                    </div>
                                    <strong>{{ number_format($r->nilai_topsis,3) }}</strong>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection