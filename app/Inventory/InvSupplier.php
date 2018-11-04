<?php

namespace App\Inventory;

use Illuminate\Database\Eloquent\Model;

class InvSupplier extends Model
{
    protected $fillable = [
        'name', 'contact_person', 'phone', 'address'
    ];

    protected $table = 'inv_suppliers';

    public function purchases(){
        return $this->hasMany('App\Inventory\InvPurchase');
    }
}
