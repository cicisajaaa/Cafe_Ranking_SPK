<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Ranking;

class OwnerController extends Controller
{
    public function index()
    {
        $totalCafe = Cafe::count();
        $topCafe = Ranking::with('cafe')->orderBy('ranking')->first();
        $topCafes = Ranking::with('cafe')->orderBy('ranking')->take(5)->get();
        $totalRanking = Ranking::count();

        return view('owner.dashboard', [
            'totalCafe' => $totalCafe,
            'topCafe' => $topCafe?->cafe?->nama_cafe ?? '-',
            'totalRanking' => $totalRanking,
            'topCafes' => $topCafes,
        ]);
    }
    public function ranking()
{
    $rankings = \App\Models\Ranking::with('cafe')
        ->orderBy('ranking')
        ->get();

    return view('owner.ranking', compact('rankings'));
}
}