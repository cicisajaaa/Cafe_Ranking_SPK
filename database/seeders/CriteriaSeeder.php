<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criteria;

class CriteriaSeeder extends Seeder
{
    public function run(): void
    {
        Criteria::create([
            'nama_kriteria' => 'Harga',
            'kode' => 'C1',
            'bobot' => 0.25,
            'type' => 'cost'
        ]);

        Criteria::create([
            'nama_kriteria' => 'Kecepatan WiFi',
            'kode' => 'C2',
            'bobot' => 0.20,
            'type' => 'benefit'
        ]);

        Criteria::create([
            'nama_kriteria' => 'Kenyamanan Tempat',
            'kode' => 'C3',
            'bobot' => 0.20,
            'type' => 'benefit'
        ]);

        Criteria::create([
            'nama_kriteria' => 'Ketersediaan Colokan',
            'kode' => 'C4',
            'bobot' => 0.15,
            'type' => 'benefit'
        ]);

        Criteria::create([
            'nama_kriteria' => 'Jarak dari Kampus',
            'kode' => 'C5',
            'bobot' => 0.10,
            'type' => 'cost'
        ]);

        Criteria::create([
            'nama_kriteria' => 'Jam Operasional',
            'kode' => 'C6',
            'bobot' => 0.10,
            'type' => 'benefit'
        ]);
    }
}