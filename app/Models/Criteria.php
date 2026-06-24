<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    // Pastikan nama tabel sesuai migration
    protected $table = 'criteria'; // jangan 'criterias'
    
    protected $fillable = [
        'nama_kriteria',
        'kode',
        'bobot',
        'type'
    ];
}