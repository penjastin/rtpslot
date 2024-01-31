<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

    protected $table = 'vendors';

    protected $fillable = [
        'id',
        'vendor',
        'vendor_name',
        'image_url_vendor',
    ];

    public function gengtoto()
    {
        return $this->hasMany(GengToto::class, 'vid', 'id');
    }
}