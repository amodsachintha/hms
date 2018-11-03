<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = [
      'id', 'patient_id', 'doctor_id', 'bill_id', 'bed_id',
      'admission_date', 'discharge_date', 'status', 'active'
    ];

    protected $table = 'admissions';



    public function bill(){
        return $this->belongsTo('App\Bill');
    }

    public function bed(){
        return $this->hasOne('App\Bed');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function patient(){
        return $this->hasOne('App\Patient');
    }



}
