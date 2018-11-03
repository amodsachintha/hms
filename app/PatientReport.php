<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientReport extends Model
{
    protected $fillable = [
        'patient_id', 'lab_report_id', 'description',
        'location', 'status', 'active',
    ];

    protected $table = 'patient_reports';


    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function labReport(){
        return $this->belongsTo('App\LabReport');
    }

    public function bill(){
        return $this->belongsTo('App\Bill');
    }




}
