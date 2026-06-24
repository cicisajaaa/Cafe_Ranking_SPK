<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $fillable = [
        'cafe_id',
        'nilai_topsis',
        'ranking'
    ];

    public function cafe()
    {
        return $this->belongsTo(Cafe::class);
    }
}