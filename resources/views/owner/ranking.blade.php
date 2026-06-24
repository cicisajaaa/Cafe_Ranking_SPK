@extends('layouts.mahasiswa')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Ranking Cafe
        </h2>

        <p class="text-muted mb-0">
            Hasil perhitungan metode TOPSIS.
        </p>
    </div>

    <div>

        <span class="badge bg-primary p-2">
            {{ count($rankings) }} Cafe
        </span>

    </div>

</div>

<div class="row mb-4">

    @if(isset($rankings[0]))

    <div class="col-md-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center">

                <div style="font-size:50px">
                    🏆
                </div>

                <h5 class="fw-bold mt-2">
                    Cafe Terbaik
                </h5>

                <p class="mb-0">
                    {{ $rankings[0]->cafe->nama_cafe }}
                </p>

            </div>

        </div>

    </div>

    @endif

    <div class="col-md-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center">

                <i class="bi bi-cup-hot-fill text-primary fs-1"></i>

                <h5 class="fw-bold mt-2">
                    Total Cafe
                </h5>

                <h3>
                    {{ count($rankings) }}
                </h3>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center">

                <i class="bi bi-bar-chart-fill text-success fs-1"></i>

                <h5 class="fw-bold mt-2">
                    Status
                </h5>

                <span class="badge bg-success">
                    Data Terupdate
                </span>

            </div>

        </div>

    </div>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white">

        <h5 class="mb-0">
            Daftar Ranking Cafe
        </h5>

    </div>
@if(isset($topCafe))

<div class="alert alert-success shadow-sm">

    <h5 class="mb-1">
        🏆 Cafe Rekomendasi Terbaik
    </h5>

    <strong>
        {{ $topCafe->cafe->nama_cafe }}
    </strong>

    <br>

    Nilai TOPSIS :

    <strong>
        {{ number_format($topCafe->nilai_topsis,3) }}
    </strong>

</div>

@endif
    <div class="card-body p-0">

        <table class="table table-hover align-middle mb-0">

            <thead class="table-light">

                <tr>
                    <th width="120">Ranking</th>
                    <th>Nama Cafe</th>
                    <th width="180">Nilai TOPSIS</th>
                </tr>

            </thead>

            <tbody>

            @foreach($rankings as $ranking)

                <tr>

                    <td>

                        @if($ranking->ranking == 1)

                            <span class="badge bg-warning text-dark">
                                🏆 #1
                            </span>

                        @elseif($ranking->ranking == 2)

                            <span class="badge bg-secondary">
                                🥈 #2
                            </span>

                        @elseif($ranking->ranking == 3)

                            <span class="badge bg-info">
                                🥉 #3
                            </span>

                        @else

                            #@if($ranking->ranking == 1)

<span class="badge bg-warning">
🥇 Juara 1
</span>

@elseif($ranking->ranking == 2)

<span class="badge bg-secondary">
🥈 Juara 2
</span>

@elseif($ranking->ranking == 3)

<span class="badge bg-danger">
🥉 Juara 3
</span>

@else

<span class="badge bg-primary">
#{{ $ranking->ranking }}
</span>

@endif

                        @endif

                    </td>

                    <td>

                        <strong>
                            {{ $ranking->cafe->nama_cafe }}
                        </strong>

                    </td>

                    <td>

                        <div class="d-flex align-items-center">

                            <div class="progress flex-grow-1 me-2"
                                 style="height:10px;">

                                <div class="progress-bar"
                                     style="width: {{ $ranking->nilai_topsis * 100 }}%">
                                </div>

                            </div>

                            <span class="badge bg-primary">

                                {{ number_format($ranking->nilai_topsis,3) }}

                            </span>

                        </div>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection