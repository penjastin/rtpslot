<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situstoto extends Model
{
    use HasFactory;
    protected $table = 'situstoto_gamelists';
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
