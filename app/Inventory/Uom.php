<?php

namespace App\Inventory;

use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    protected $table = 'uoms';

    public function issues(){
        return $this->hasMany('App\Inventory\Issue');
    }

    public function items(){
        return $this->hasMany('App\Inventory\Item');
    }

}
