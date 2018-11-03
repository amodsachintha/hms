<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabReport extends Model
{
    protected $fillable = [
        'name', 'description', 'discount', 'price', 'active'
    ];

    protected $table = 'lab_reports';

    public function patientReports(){
        return $this->hasMany('App\PatientReport');
    }

}
