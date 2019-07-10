<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable = [
        'item_id', 'unit_price', 'qty'
    ];

     public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
