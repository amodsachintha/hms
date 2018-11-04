<?php

namespace App\Inventory;

use Illuminate\Database\Eloquent\Model;

class InvPurchaseItem extends Model
{
    protected $table = 'inv_purchase_items';

    protected $fillable = [
        'item_id', 'purchase_id', 'quantity', 'unit_price', 'price'
    ];


    public function item(){
        return $this->belongsTo('App\Inventory\Item');
    }

    public function purchase(){
        return $this->belongsTo('App\Inventory\InvPurchase');
    }
}
