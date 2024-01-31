<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    public function sitelist()
    {
        return $this->hasOne(Sitelist::class, 'id', 'site');
    }
}
