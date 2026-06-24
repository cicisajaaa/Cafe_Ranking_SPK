<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {
        $criteria = Criteria::all();
        return view('admin.criteria.index', compact('criteria'));
    }

    public function create()
    {
        return view('admin.criteria.create');
    }

    public function store(Request $request)
    {
        Criteria::create($request->all());

        return redirect()->route('admin.criteria.index')
            ->with('success', 'Kriteria berhasil ditambahkan');
    }

    public function edit($id)
    {
        $criteria = Criteria::findOrFail($id);

        return view('admin.criteria.edit', compact('criteria'));
    }

    public function update(Request $request, $id)
{
    $criteria = Criteria::findOrFail($id);
    $criteria->update($request->all());

    return redirect()->route('admin.criteria.index')
        ->with('success', 'Kriteria berhasil diupdate');
}

    public function destroy($id)
    {
        Criteria::destroy($id);

        return redirect()->route('admin.criteria.index')
            ->with('success', 'Kriteria berhasil dihapus');
    }
}