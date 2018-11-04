<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'id',
        'f_name',
        'l_name',
        'gender',
        'dob',
        'address',
        'nic',
        'mobile1',
        'mobile2',
        'active',
    ];

    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $keyType='string';
    public $incrementing = false;


    public function patientReports(){
        return $this->hasMany('App\PatientReport');
    }

    public function guardians(){
        return $this->hasMany('App\Guardian');
    }

    public function patientServices(){
        return $this->hasMany('App\PatientService');
    }

    public function admission(){
        return $this->belongsTo('App\Admission');
    }

    public function appointments(){
        return $this->hasMany('App\Appointment');
    }



}
