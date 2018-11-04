<?php

namespace App\Pharmacy;

use Illuminate\Database\Eloquent\Model;

class Chemical extends Model
{
    protected $fillable = ['name'];


    public function drugs(){
        return $this->hasMany('App\Pharmacy\Drug');
    }

}
