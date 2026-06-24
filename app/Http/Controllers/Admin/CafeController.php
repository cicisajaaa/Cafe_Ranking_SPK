<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function index()
    {
        $cafes = Cafe::all();
        return view('admin.cafes.index', compact('cafes'));
    }

    public function create()
    {
        return view('admin.cafes.create');
    }

    public function store(Request $request)
    {
        Cafe::create($request->all());

        return redirect()->route('admin.cafes.index')
            ->with('success', 'Data cafe berhasil ditambahkan');
    }

    public function edit($id)
    {
        $cafe = Cafe::findOrFail($id);

        return view('admin.cafes.edit', compact('cafe'));
    }

    public function update(Request $request, $id)
{
    $cafe = Cafe::findOrFail($id);

    $cafe->update($request->all());

    return redirect()->route('admin.cafes.index')
        ->with('success', 'Data cafe berhasil diupdate');
}

    public function destroy($id)
    {
        $cafe = Cafe::findOrFail($id);
        $cafe->delete();

        return redirect()->route('admin.cafes.index')
            ->with('success', 'Data cafe berhasil dihapus');
    }
}