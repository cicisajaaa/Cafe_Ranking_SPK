<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Ranking;

class StudentController extends Controller
{
    public function index()
    {
        $totalCafe = Cafe::count();

        $topRanking = Ranking::with('cafe')
                        ->orderBy('ranking')
                        ->first();

        $topCafe = $topRanking
                    ? $topRanking->cafe->nama_cafe
                    : '-';

        $latestRanking = Ranking::count();

        $topCafes = Ranking::with('cafe')
                    ->orderBy('ranking')
                    ->limit(3)
                    ->get();

        return view('mahasiswa.dashboard', compact(
            'totalCafe',
            'topCafe',
            'latestRanking',
            'topCafes'
        ));
    }

    public function ranking()
    {
        $rankings = Ranking::with('cafe')
                    ->orderBy('ranking')
                    ->get();

        return view('mahasiswa.ranking', compact('rankings'));
    }

    public function showCafe($id)
    {
        $cafe = Cafe::findOrFail($id);

        return view('mahasiswa.cafe-detail', compact('cafe'));
    }
}