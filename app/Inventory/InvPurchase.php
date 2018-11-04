<?php

namespace App\Inventory;

use Illuminate\Database\Eloquent\Model;

class InvPurchase extends Model
{
    protected $fillable = [
        'user_id', 'supplier_id', 'invoice_no', 'amount', 'date'
    ];

    protected $table = 'inv_purchases';

    public function supplier()
    {
        return $this->belongsTo('App\Inventory\InvSupplier');
    }

    public function purchaseItems()
    {
        return $this->hasMany('App\Inventory\InvPurchaseItem');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
