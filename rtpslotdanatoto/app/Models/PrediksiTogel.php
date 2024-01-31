<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrediksiTogel extends Model
{
     protected $table = 'prediksi_togel';

     public function sitelist()
    {
        return $this->hasOne(Sitelist::class, 'id', 'site');
    }
}