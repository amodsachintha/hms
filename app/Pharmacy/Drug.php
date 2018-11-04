<?php

namespace App\Pharmacy;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = [
        'chemical_id', 'package_id', 'unit_type', 'qoh', 'best_before',
        'reorder_point', 'unit_price', 'active',
    ];

    protected $table = 'drugs';

    public function chemical(){
        return $this->belongsTo('App\Pharmacy\Chemical');
    }

    public function package(){
        return $this->belongsTo('App\Pharmacy\Package');
    }

    public function purchaseItems(){
        return $this->hasMany('App\Pharmacy\PurchaseItem');
    }

    public function orderItems(){
        return $this->hasMany('App\Pharmacy\OrderItem');
    }


}
