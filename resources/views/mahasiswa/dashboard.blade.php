@extends('layouts.mahasiswa')

@section('content')

<div class="mb-3">
    <h2 class="fw-bold mb-1" style="font-size:1.6rem;">
        Dashboard Mahasiswa
    </h2>
    <p class="text-muted" style="font-size:0.9rem;">
        Temukan rekomendasi cafe terbaik berdasarkan metode TOPSIS.
    </p>
</div>

<div class="card border-0 shadow-sm mb-3" style="padding:0.8rem;">
    <div class="card-body p-3 d-flex align-items-center">

        <div class="me-3">
            <i class="bi bi-cup-hot-fill text-primary" style="font-size:40px;"></i>
        </div>

        <div>
            <h5 class="fw-bold mb-1" style="font-size:1rem;">
                Selamat Datang, {{ auth()->user()->name }}
            </h5>
            <p class="text-muted mb-0" style="font-size:0.8rem;">
                Sistem ini membantu memilih cafe terbaik berdasarkan
                harga, wifi, kenyamanan, colokan, jarak, dan jam operasional.
            </p>
        </div>

    </div>
</div>

<div class="row g-3 mb-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 p-2 text-center">
            <i class="bi bi-cup-hot-fill text-primary" style="font-size:35px;"></i>
            <h6 class="text-muted mt-2 mb-0" style="font-size:0.8rem;">Total Cafe</h6>
            <h4 class="fw-bold mt-1" style="font-size:1.2rem;">{{ $totalCafe }}</h4>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 p-2 text-center">
            <i class="bi bi-trophy-fill text-warning" style="font-size:35px;"></i>
            <h6 class="text-muted mt-2 mb-0" style="font-size:0.8rem;">Cafe Terbaik</h6>
            <h5 class="fw-bold mt-1" style="font-size:1rem;">{{ $topCafe }}</h5>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 p-2 text-center">
            <i class="bi bi-bar-chart-fill text-success" style="font-size:35px;"></i>
            <h6 class="text-muted mt-2 mb-0" style="font-size:0.8rem;">Total Ranking</h6>
            <h4 class="fw-bold mt-1" style="font-size:1.2rem;">{{ $latestRanking }}</h4>
        </div>
    </div>

</div>

<div class="d-flex justify-content-between align-items-center mb-2">
    <h4 class="fw-bold mb-0" style="font-size:1.2rem;">Top 3 Cafe Terbaik</h4>
    <span class="badge bg-primary" style="font-size:0.8rem;">TOPSIS</span>
</div>

<div class="row g-3">
@foreach($topCafes as $cafe)
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 p-2 text-center">
            @if($loop->iteration == 1)
                <i class="bi bi-trophy-fill text-warning" style="font-size:40px;"></i>
            @elseif($loop->iteration == 2)
                <i class="bi bi-award-fill text-secondary" style="font-size:40px;"></i>
            @else
                <i class="bi bi-award-fill text-danger" style="font-size:40px;"></i>
            @endif

            <h6 class="fw-bold mt-2" style="font-size:0.9rem;">{{ $cafe->cafe->nama_cafe }}</h6>
            <span class="badge bg-dark mb-1" style="font-size:0.75rem;">Ranking #{{ $cafe->ranking }}</span>
            <h5 class="text-primary fw-bold mb-1" style="font-size:1rem;">
                {{ number_format($cafe->nilai_topsis,3) }}
            </h5>
            <small class="text-muted" style="font-size:0.75rem;">Nilai TOPSIS</small>

            <div class="mt-2">
                <a href="{{ route('student.cafe',$cafe->cafe->id) }}"
                   class="btn btn-outline-primary btn-sm" style="font-size:0.75rem; padding:0.25rem 0.5rem;">
                    Detail Cafe
                </a>
            </div>

        </div>
    </div>
@endforeach
</div>

@endsection