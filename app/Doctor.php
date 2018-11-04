<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'id', 'f_name', 'l_name', 'email', 'password',
        'specialization_id', 'department_id', 'dob',
        'address', 'mobile', 'work', 'qualifications',
        'gender', 'nic', 'fee', 'active',
    ];

    protected $table = 'doctors';
    protected $primaryKey = 'id';
    protected $keyType='string';
    public $incrementing = false;

    public function specialization(){
        return $this->belongsTo('App\Specialization');
    }

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function admission(){
        return $this->hasMany('App\Admission');
    }

    public function appointments(){
        return $this->hasMany('App\Appointment');
    }

}
