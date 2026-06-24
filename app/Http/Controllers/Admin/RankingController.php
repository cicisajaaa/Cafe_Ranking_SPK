<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Models\Criteria;
use App\Models\Ranking;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RankingController extends Controller
{
    public function index()
    {
        $rankings = Ranking::with('cafe')
            ->orderBy('ranking')
            ->get();

        return view('admin.ranking', compact('rankings'));
    }

    public function calculate()
    {
        $cafes = Cafe::all();
        $criteria = Criteria::all();

        if ($cafes->count() == 0 || $criteria->count() == 0) {
            return back()->with('error', 'Data cafe atau kriteria masih kosong');
        }

        // Mapping kode kriteria ke field database
        $fieldMap = [
            'C1' => 'harga',
            'C2' => 'kecepatan_wifi',
            'C3' => 'kenyamanan',
            'C4' => 'colokan',
            'C5' => 'jarak',
            'C6' => 'jam_operasional',
        ];

        $matriks = [];
        $denominator = [];

        // Hitung penyebut normalisasi
        foreach ($criteria as $c) {

            if (!isset($fieldMap[$c->kode])) {
                continue;
            }

            $field = $fieldMap[$c->kode];

            $sum = 0;

            foreach ($cafes as $cafe) {
                $sum += pow($cafe->$field, 2);
            }

            $denominator[$c->kode] = sqrt($sum);
        }

        // Normalisasi terbobot
        foreach ($cafes as $cafe) {

            $matriks[$cafe->id] = [];

            foreach ($criteria as $c) {

                if (!isset($fieldMap[$c->kode])) {
                    continue;
                }

                $field = $fieldMap[$c->kode];

                if ($denominator[$c->kode] == 0) {
                    $normalisasi = 0;
                } else {
                    $normalisasi = $cafe->$field / $denominator[$c->kode];
                }

                $matriks[$cafe->id][$c->kode] =
                    $normalisasi * $c->bobot;
            }
        }

        // Solusi ideal positif dan negatif
        $Aplus = [];
        $Aminus = [];

        foreach ($criteria as $c) {

            $values = [];

            foreach ($matriks as $row) {
                $values[] = $row[$c->kode];
            }

            if ($c->type == 'benefit') {

                $Aplus[$c->kode] = max($values);
                $Aminus[$c->kode] = min($values);

            } else {

                $Aplus[$c->kode] = min($values);
                $Aminus[$c->kode] = max($values);
            }
        }

        // Kosongkan ranking lama
        Ranking::truncate();

        $hasil = [];

        // Hitung nilai preferensi
        foreach ($cafes as $cafe) {

            $dplus = 0;
            $dminus = 0;

            foreach ($criteria as $c) {

                $nilai = $matriks[$cafe->id][$c->kode];

                $dplus += pow(
                    $nilai - $Aplus[$c->kode],
                    2
                );

                $dminus += pow(
                    $nilai - $Aminus[$c->kode],
                    2
                );
            }

            $dplus = sqrt($dplus);
            $dminus = sqrt($dminus);

            if (($dplus + $dminus) == 0) {
                $vi = 0;
            } else {
                $vi = $dminus / ($dplus + $dminus);
            }

            $hasil[] = [
                'cafe_id' => $cafe->id,
                'nilai_topsis' => $vi,
            ];
        }

        // Urutkan ranking
        usort($hasil, function ($a, $b) {
            return $b['nilai_topsis'] <=> $a['nilai_topsis'];
        });

        foreach ($hasil as $index => $row) {

            Ranking::create([
                'cafe_id' => $row['cafe_id'],
                'nilai_topsis' => $row['nilai_topsis'],
                'ranking' => $index + 1,
            ]);
        }

        return redirect('/ranking')
            ->with('success', 'Perhitungan TOPSIS berhasil');
    }
    public function exportPdf() {
    $rankings = Ranking::with('cafe')
        ->orderBy('ranking')
        ->get();

    $pdf = Pdf::loadView(
        'admin.ranking_pdf',
        compact('rankings')
    );

    return $pdf->download('ranking-cafe.pdf');
}
}