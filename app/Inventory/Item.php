<?php

namespace App\Inventory;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name', 'category_id', 'uom_id', 'qoh', 'stock_medium',
        'stock_low','description','active'
    ];

    protected $table = 'items';

    public function uom(){
        return $this->belongsTo('App\Inventory\Uom');
    }

    public function category(){
        return $this->belongsTo('App\Inventory\Category');
    }

    public function issues(){
        return $this->hasMany('App\Inventory\Issue');
    }

    public function purchaseItems(){
        return $this->hasMany('App\Inventory\InvPurchaseItem');
    }

}
