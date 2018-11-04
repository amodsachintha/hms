<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'id', 'patient_id', 'vat', 'taxes', 'discount', 'total', 'payment_method',
        'chard_cheque_no', 'reciept_no', 'status', 'paid', 'active'
    ];

    protected $table = 'bills';
    protected $primaryKey = 'id';
    protected $keyType='string';
    public $incrementing = false;

    public function admission(){
        return $this->hasOne('App\Admission');
    }

    public function patientReports(){
        return $this->hasMany('App\PatientReport');
    }

    public function patientServices(){
        return $this->hasMany('App\PatientService');
    }

    public function appointments(){
        return $this->hasMany('App\Appointment');
    }


}
