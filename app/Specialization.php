<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    protected $table = 'specializations';


    public function doctors(){
        return $this->hasMany('App\Doctor');
    }

}
