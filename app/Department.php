<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'description', 'active'
    ];


    public function users(){
        return $this->hasMany('App\User');
    }

    public function doctors(){
        return $this->hasMany('App\Doctor');
    }
}
