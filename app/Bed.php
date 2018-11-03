<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    protected $fillable = [
        'bed_number', 'ward_id', 'bed_type', 'capacity', 'occupied'
    ];


    public function ward(){
        return $this->belongsTo('App\Ward');
    }

    public function admission(){
        return $this->belongsTo('App\Admission');
    }

}
