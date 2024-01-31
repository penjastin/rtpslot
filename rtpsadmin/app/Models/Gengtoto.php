<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gengtoto extends Model
{
    use HasFactory;
    protected $table = 'gengtoto_gamelists';
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
