<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediksi extends Model
{
    use HasFactory;
    protected $table = 'prediksi_togel';
    public $timestamps = false;

    protected $fillable = [
        'site',
        'jenis_togel',
        'kategori_id',
        'tanggal',
        'bbfs',
        'angka_main',
        'd4',
        'd3',
        'bb_2d',
        'cadangan_2d',
        'colok_bebeas_2d',
        'colok_bebas',
        'shio'
    ];
}
