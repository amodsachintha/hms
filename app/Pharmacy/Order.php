<?php

namespace App\Pharmacy;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'date', 'reciept_no', 'payment_method', 'taxes', 'total'
    ];

    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function orderItems()
    {
        return $this->hasMany('App\Pharmacy\OrderItem');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


}
