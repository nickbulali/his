<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable = [
        'invoice_id', 'item_id', 'unit_price', 'qty'
    ];

     public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

}
