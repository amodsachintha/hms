<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id', 'doctor_id', 'bill_id', 'date',
        'start', 'end', 'active',
    ];

    protected $table = 'appointments';


    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function bill(){
        return $this->belongsTo('App\Bill');
    }






}
