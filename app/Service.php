<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 'description', 'discount', 'price', 'active',
    ];

    protected $table = 'services';




}
