<?php

namespace App\Inventory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    protected $table = 'categories';

    public function items(){
        return $this->hasMany('App\Inventory\Item');
    }

}
