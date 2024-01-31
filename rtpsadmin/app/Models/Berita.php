<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';

    protected $fillable = [
        'site',
        'judul',
        'kategori_id',
        'konten_atas',
        'konten_bawah',
        'gambar_1',
        'gambar_2',
        'author',
        'status'
    ];
}
