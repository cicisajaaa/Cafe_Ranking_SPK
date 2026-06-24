@extends('layouts.app')

@section('title','Data Cafe')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex items-center justify-between gap-4 mb-4">
        <h1 class="text-2xl font-semibold text-[#1b1b18]">Data Cafe</h1>
        <a href="{{ route('cafes.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-gray-100 hover:bg-gray-200 border border-gray-200 text-[#1b1b18]">
            + Tambah Cafe
        </a>
    </div>

    <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
        <div class="p-4 border-b border-gray-200">
            <p class="text-sm text-gray-600">Daftar cafe yang tersimpan</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr class="text-left">
                        <th class="px-4 py-3 font-medium text-gray-700">Nama Cafe</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Harga</th>
                        <th class="px-4 py-3 font-medium text-gray-700">WiFi</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Kenyamanan</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Colokan</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Jarak</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Jam Operasional</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach($cafes as $c)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $c->nama_cafe }}</td>
                        <td class="px-4 py-3">{{ $c->harga }}</td>
                        <td class="px-4 py-3">{{ $c->kecepatan_wifi }}</td>
                        <td class="px-4 py-3">{{ $c->kenyamanan }}</td>
                        <td class="px-4 py-3">{{ $c->colokan }}</td>
                        <td class="px-4 py-3">{{ $c->jarak }}</td>
                        <td class="px-4 py-3">{{ $c->jam_operasional }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <a href="{{ route('cafes.edit',$c->id) }}" class="inline-flex items-center px-3 py-1.5 rounded-md border border-gray-300 hover:bg-gray-100">
                                Edit
                            </a>

                            <form action="{{ route('cafes.destroy',$c->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 rounded-md bg-red-50 border border-red-200 hover:bg-red-100 text-red-700 ml-2" onclick="return confirm('Yakin hapus cafe ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if($cafes->count() === 0)
                    <tr>
                        <td colspan="8" class="px-4 py-6 text-center text-gray-500">Belum ada data cafe</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

