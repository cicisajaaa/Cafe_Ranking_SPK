<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cafe;

class CafeSeeder extends Seeder
{
    public function run()
    {
        Cafe::create([
            'nama_cafe' => 'Kopi Kenangan',
            'harga' => 25000,
            'kecepatan_wifi' => 85,
            'kenyamanan' => 85,
            'colokan' => 70,
            'jarak' => 2.0,
            'jam_operasional' => 10
        ]);

        Cafe::create([
            'nama_cafe' => 'Cafe Heritage 1815',
            'harga' => 25000,
            'kecepatan_wifi' => 80,
            'kenyamanan' => 82,
            'colokan' => 75,
            'jarak' => 4.5,
            'jam_operasional' => 11
        ]);

        Cafe::create([
            'nama_cafe' => 'Fore Coffee',
            'harga' => 32000,
            'kecepatan_wifi' => 90,
            'kenyamanan' => 90,
            'colokan' => 80,
            'jarak' => 2.5,
            'jam_operasional' => 12
        ]);

        Cafe::create([
            'nama_cafe' => 'Tomoro Coffee',
            'harga' => 24000,
            'kecepatan_wifi' => 78,
            'kenyamanan' => 76,
            'colokan' => 65,
            'jarak' => 7.0,
            'jam_operasional' => 10
        ]);
    }
}