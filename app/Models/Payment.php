<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'invoice_number', 'date', 'method',
        'description', 'status'
    ];

    protected $guarded = [
        'number', 'amount', 'balance'
    ];

     public function getStatusAttribute($value)
    {
        if($value==0){
        return 'not complete';
    }
    return 'complete';
    }
}
