<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable = [
      'patient_id', 'name', 'relationship', 'contact', 'address'
    ];

    public function patient(){
        return $this->belongsTo('App\Patient');
    }
}
