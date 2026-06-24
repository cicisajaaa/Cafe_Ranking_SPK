@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="mb-4">
        <h2 class="fw-bold">Dashboard Admin</h2>
        <p class="text-muted">
            Sistem Pendukung Keputusan Pemilihan Cafe Menggunakan Metode TOPSIS
        </p>
    </div>

    <!-- Statistik -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>
                        <small class="text-muted">
                            Total Cafe
                        </small>

                        <h2 class="fw-bold">
                            {{ $jumlahCafe }}
                        </h2>
                    </div>

                    <i class="bi bi-cup-hot-fill text-primary fs-1"></i>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>
                        <small class="text-muted">
                            Total Kriteria
                        </small>

                        <h2 class="fw-bold">
                            {{ $jumlahKriteria }}
                        </h2>
                    </div>

                    <i class="bi bi-list-check text-success fs-1"></i>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>
                        <small class="text-muted">
                            Cafe Terbaik
                        </small>

                        <h5 class="fw-bold">
                            {{ $topCafe?->cafe?->nama_cafe ?? '-' }}
                        </h5>
                    </div>

                    <i class="bi bi-trophy-fill text-warning fs-1"></i>

                </div>
            </div>
        </div>

    </div>

    <!-- Grafik -->
<div class="card border-0 shadow-sm mb-4">

    <div class="card-header bg-white">

        <h5 class="mb-0">
            📈 Grafik Nilai TOPSIS Cafe
        </h5>

    </div>

    <div class="card-body">

        <canvas id="chartRanking" height="90"></canvas>

    </div>

</div>

    <!-- Top 3 dan Cafe Terbaik -->
    <div class="row g-4 mb-4">

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        🏆 Top 3 Cafe Terbaik
                    </h5>
                </div>

                <div class="card-body">

                    @foreach($topRankings->take(3) as $ranking)

                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">

                        <div>

                            <h6 class="fw-bold mb-1">
                                {{ $ranking->cafe->nama_cafe }}
                            </h6>

                            <small class="text-muted">
                                Ranking #{{ $ranking->ranking }}
                            </small>

                        </div>

                        <span class="badge bg-primary px-3 py-2">

                            {{ number_format($ranking->nilai_topsis,3) }}

                        </span>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

        <div class="col-lg-5">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body text-center d-flex flex-column justify-content-center">

                    <div style="font-size:70px;">
                        🏆
                    </div>

                    <h3 class="fw-bold">

                        {{ $topCafe?->cafe?->nama_cafe ?? '-' }}

                    </h3>

                    <p class="text-muted mb-3">

                        Cafe dengan nilai TOPSIS tertinggi saat ini

                    </p>

                    <span class="badge bg-success px-4 py-2 mx-auto">

                        Nilai TOPSIS :
                        {{ number_format($topCafe->nilai_topsis ?? 0,3) }}

                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- Ringkasan Sistem -->

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                📋 Ringkasan Sistem
            </h5>

        </div>

        <div class="card-body">

            <div class="row text-center">

                <div class="col-md-4">

                    <h2 class="text-primary fw-bold">

                        {{ $jumlahCafe }}

                    </h2>

                    <small class="text-muted">

                        Alternatif Cafe

                    </small>

                </div>

                <div class="col-md-4">

                    <h2 class="text-success fw-bold">

                        {{ $jumlahKriteria }}

                    </h2>

                    <small class="text-muted">

                        Kriteria Penilaian

                    </small>

                </div>

                <div class="col-md-4">

                    <h2 class="text-warning fw-bold">

                        {{ number_format($topCafe->nilai_topsis ?? 0,3) }}

                    </h2>

                    <small class="text-muted">

                        Nilai TOPSIS Tertinggi

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('chartRanking');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: [

            @foreach($topRankings as $r)

                '{{ $r->cafe->nama_cafe }}',

            @endforeach

        ],

        datasets: [{

            label: 'Nilai TOPSIS',

            data: [

                @foreach($topRankings as $r)

                    {{ $r->nilai_topsis }},

                @endforeach

            ],

            borderColor: '#0d6efd',

            backgroundColor: 'rgba(13,110,253,0.12)',

            borderWidth: 4,

            fill: true,

            tension: 0.4,

            pointRadius: 6,

            pointHoverRadius: 8,

            pointBackgroundColor: '#0d6efd',

            pointBorderColor: '#ffffff',

            pointBorderWidth: 2

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        plugins: {

            legend: {

                display: false

            },

            tooltip: {

                backgroundColor: '#1f2937',

                titleColor: '#fff',

                bodyColor: '#fff'

            }

        },

        scales: {

            y: {

                beginAtZero: true,

                max: 1,

                ticks: {

                    stepSize: 0.1

                },

                grid: {

                    color: 'rgba(0,0,0,0.05)'

                }

            },

            x: {

                grid: {

                    display: false

                }

            }

        }

    }

});

</script>

@endsection

