<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientService extends Model
{
    protected $table = 'patient_services';

    protected $fillable = [
      'patient_id', 'service_id', 'status', 'active'
    ];

    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function service(){
        return $this->belongsTo('App\Service');
    }

    public function bill(){
        return $this->belongsTo('App\Bill');
    }

}
