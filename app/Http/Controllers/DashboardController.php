<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\Criteria;
use App\Models\Ranking;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahCafe = Cafe::count();
        $jumlahKriteria = Criteria::count();
        $jumlahRanking = Ranking::count();

$topCafe = Ranking::with('cafe')
    ->orderBy('ranking')
    ->first();

$topRankings = Ranking::with('cafe')
    ->orderBy('ranking')
    ->take(5)
    ->get();

return view('admin.dashboard', [
    'jumlahCafe' => Cafe::count(),
    'jumlahKriteria' => Criteria::count(),
    'jumlahRanking' => Ranking::count(),
    'topCafe' => $topCafe,
    'topRankings' => $topRankings
]);
        
    }
    
}