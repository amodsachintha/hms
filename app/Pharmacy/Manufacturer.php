<?php

namespace App\Pharmacy;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = ['name'];

    public function packages(){
        return $this->hasMany('App\Pharmacy\Package');
    }
}
