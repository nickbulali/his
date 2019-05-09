<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
     protected $fillable = ['date','payment_method','description'];

     protected $guarded = [
        'number', 'amount', 'balance'
    ];

    public function Invoice()
   {
       return $this->hasMany('App\Models\Invoice', 'id', 'invoice_id');
   }
}
