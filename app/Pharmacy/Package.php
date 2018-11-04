<?php

namespace App\Pharmacy;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'manufacturer_id', 'upc', 'package_type', 'package_quantity',
        'brand_name', 'discount', 'price',
    ];

    public function manufacturer(){
        return $this->belongsTo('App\Pharmacy\Manufacturer');
    }

    public function drug(){
        return $this->hasOne('App\Pharmacy\Drug');
    }
}
