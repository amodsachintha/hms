<?php

namespace App\Pharmacy;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'contact_person', 'phone', 'address'
    ];

    protected $table = 'suppliers';

    public function purchases(){
        return $this->hasMany('App\Pharmacy\Purchase');
    }

}
