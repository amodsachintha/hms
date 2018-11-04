<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name', 'l_name', 'email', 'password', 'role_id', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function attendances(){
        return $this->hasMany('App\Attendance');
    }

    public function salary(){
        return $this->hasOne('App\Salary');
    }

    public function orders(){
        return $this->hasMany('App\Pharmacy\Order');
    }

}
