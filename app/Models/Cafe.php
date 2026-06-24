<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
   protected $fillable = [
    'nama_cafe',
    'alamat',
    'harga',
    'kecepatan_wifi',
    'kenyamanan',
    'colokan',
    'jarak',
    'jam_operasional'
];
}
