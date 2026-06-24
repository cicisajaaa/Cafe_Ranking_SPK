@extends('layouts.mahasiswa')

@section('content')

<div class="card shadow-sm border-0 p-4">

    <h2 class="fw-bold mb-3">{{ $cafe->nama_cafe }}</h2>

    <table class="table mb-3">
        <tr>
            <th>Harga</th>
            <td>{{ $cafe->harga }}</td>
        </tr>
        <tr>
            <th>Kecepatan Wifi</th>
            <td>{{ $cafe->wifi }} Mbps</td>
        </tr>
        <tr>
            <th>Kenyamanan</th>
            <td>{{ $cafe->kenyamanan }}</td>
        </tr>
        <tr>
            <th>Colokan</th>
            <td>{{ $cafe->colokan }}</td>
        </tr>
        <tr>
            <th>Jarak</th>
            <td>{{ $cafe->jarak }} km</td>
        </tr>
        <tr>
            <th>Jam Operasional</th>
            <td>{{ $cafe->jam_operasional }} jam</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>
                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($cafe->alamat) }}" 
                   target="_blank">
                   {{ $cafe->alamat }}
                </a>
            </td>
        </tr>
    </table>

    <!-- Embed Google Maps -->
    @if($cafe->alamat)
    <iframe
    width="100%"
    height="250"
    style="border:0"
    loading="lazy"
    allowfullscreen
    referrerpolicy="no-referrer-when-downgrade"
    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA-8Op8f4sZ2Qaxjy0BPpeFMnm_qeAeuKA&q={{ urlencode($cafe->alamat) }}">
</iframe>
    @endif

    <a href="{{ route('student.dashboard') }}" class="btn btn-secondary">
        Kembali ke Dashboard
    </a>

</div>

@endsection