<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'invoice_id', 'date', 'method',
        'description', 'status'
    ];

    protected $guarded = [
        'number', 'amount', 'balance'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

     
}
