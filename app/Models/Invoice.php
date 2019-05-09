<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helper\HasManyRelation;
use App\Models\InvoiceItem;

class Invoice extends Model
{
    use HasManyRelation;

    protected $fillable = [
        'customer_id', 'date', 'due_date', 'discount',
        'terms_and_conditions', 'reference'
    ];

    protected $guarded = [
        'number', 'sub_total', 'total'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function items()
    {
        return $this->hasManyThrough('App\Models\Item','App\Models\InvoiceItem','invoice_id','id');
    }
  
    public function setSubTotalAttribute($value)
    {
        $this->attributes['sub_total'] = $value;
        $discount = $this->attributes['discount'];
        $this->attributes['total'] = $value - $discount;
    }
}
