<?php

namespace App\Pharmacy;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'drug_id', 'quantity', 'unit_price', 'sub_total'
    ];

    protected $table = 'order_items';

    public function order(){
        return $this->belongsTo('App\Pharmacy\Order');
    }

    public function drug(){
        return $this->belongsTo('App\Pharmacy\Drug');
    }

}
