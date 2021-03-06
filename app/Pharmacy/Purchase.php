<?php

namespace App\Pharmacy;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'user_id', 'supplier_id', 'invoice_no', 'amount', 'date'
    ];

    protected $table = 'purchases';

    public function supplier()
    {
        return $this->belongsTo('App\Pharmacy\Supplier');
    }

    public function purchaseItems()
    {
        return $this->hasMany('App\Pharmacy\PurchaseItem');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


}
