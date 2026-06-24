@extends('layouts.app')
@section('title','Kriteria & Bobot')
@section('content')
<h1>Kriteria & Bobot</h1>
<a href="{{ route('criteria.create') }}">Tambah Kriteria</a>
<table border="1">
    <tr>
        <th>Kode</th>
        <th>Nama Kriteria</th>
        <th>Bobot</th>
        <th>Type</th>
        <th>Aksi</th>
    </tr>
    @foreach($criteria as $c)
    <tr>
        <td>{{ $c->kode }}</td>
        <td>{{ $c->nama_kriteria }}</td>
        <td>{{ $c->bobot }}</td>
        <td>{{ $c->type }}</td>
        <td>
            <a href="{{ route('criteria.edit',$c->id) }}">Edit</a>
            <form action="{{ route('criteria.destroy',$c->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection