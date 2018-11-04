<?php

namespace App\Pharmacy;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = [
        'drug_id', 'purchase_id', 'quantity', 'unit_price', 'price'
    ];

    protected $table = 'purchase_items';


    public function drug(){
        return $this->belongsTo('App\Pharmacy\Drug');
    }

    public function purchase(){
        return $this->belongsTo('App\Pharmacy\Purchase');
    }


}
