<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTogel extends Model
{
    protected $table = 'jenis_togel';

    public function sitelist()
    {
        return $this->hasOne(Sitelist::class, 'id', 'site_id');
    }
}
