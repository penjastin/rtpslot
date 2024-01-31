<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hometogel extends Model
{
    use HasFactory;
    protected $table = 'hometogel_gamelists';
    public $timestamps = false;

    protected $fillable = [
        'vid',
        'game_name',
        'image_url',
        'value',
        'pola',
        'pola_rtp',
        'order'
    ];
}
