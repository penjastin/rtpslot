<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GengToto extends Model
{
    use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

    protected $table = 'danatoto_gamelists';

    protected $fillable = [
        'id',
        'vid',
        'game_name',
        'image_url',
        'value',
        'pola',
        'pola_rtp',
        'order',
        'status_game',
        'status_vendor',
    ];

    public function vendors()
    {
        return $this->hasMany(Vendor::class, 'id', 'vid' );
    }
}