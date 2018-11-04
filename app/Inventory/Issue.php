<?php

namespace App\Inventory;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = 'issues';

    protected $fillable = [
        'user_id', 'item_id', 'uom_id', 'to', 'quantity', 'date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function item(){
        return $this->belongsTo('App\Inventory\Item');
    }

    public function uom(){
        return $this->belongsTo('App\Inventory\Uom');
    }


}
