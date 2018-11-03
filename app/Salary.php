<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
      'user_id',
      'basic_salary',
      'ot_hours',
      'bonus',
      'epf_etf',
      'other_reductions',
      'total_worked_days',
      'total'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }



}
