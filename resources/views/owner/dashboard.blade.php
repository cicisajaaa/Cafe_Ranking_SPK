@extends('layouts.mahasiswa')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="mb-4">

        <h2 class="fw-bold">
            Dashboard Owner
        </h2>

        <p class="text-muted mb-0">
            Monitoring performa cafe berdasarkan hasil perhitungan TOPSIS.
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
                            {{ $totalCafe }}
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
                            Cafe Terbaik
                        </small>

                        <h5 class="fw-bold">
                            {{ $topCafe }}
                        </h5>

                    </div>

                    <i class="bi bi-trophy-fill text-warning fs-1"></i>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Total Ranking
                        </small>

                        <h2 class="fw-bold">
                            {{ $totalRanking }}
                        </h2>

                    </div>

                    <i class="bi bi-bar-chart-fill text-success fs-1"></i>

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

            <canvas id="chartOwner" height="90"></canvas>

        </div>

    </div>

    <!-- Top 3 + Cafe Terbaik -->

    <div class="row g-4 mb-4">

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white">

                    <h5 class="mb-0">
                        🏆 Top 3 Cafe Terbaik
                    </h5>

                </div>

                <div class="card-body">

                    @foreach($topCafes->take(3) as $cafe)

                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">

                        <div>

                            <h6 class="fw-bold mb-1">

                                {{ $cafe->cafe->nama_cafe }}

                            </h6>

                            <small class="text-muted">

                                Ranking #{{ $cafe->ranking }}

                            </small>

                        </div>

                        <span class="badge bg-primary px-3 py-2">

                            {{ number_format($cafe->nilai_topsis,3) }}

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

                        {{ $topCafe }}

                    </h3>

                    <p class="text-muted">

                        Cafe dengan nilai TOPSIS tertinggi

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('chartOwner');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: [

            @foreach($topCafes as $cafe)

                '{{ $cafe->cafe->nama_cafe }}',

            @endforeach

        ],

        datasets: [{

            label: 'Nilai TOPSIS',

            data: [

                @foreach($topCafes as $cafe)

                    {{ $cafe->nilai_topsis }},

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

        plugins: {

            legend: {

                display: false

            }

        },

        scales: {

            y: {

                beginAtZero: true,

                max: 1

            }

        }

    }

});

</script>

@endsection
