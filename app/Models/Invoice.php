<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helper\HasManyRelation;

class Invoice extends Model
{
    use HasManyRelation;

    protected $fillable = [
        'patient_id', 'date', 'due_date', 'discount','tax',
        'description','status'
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
        return $this->hasMany(InvoiceItem::class);
    }


    public function setSubTotalAttribute($value)
    {
        $this->attributes['sub_total'] = $value;
        $discount = $this->attributes['discount'];
        $this->attributes['total'] = $value - $discount;
    }

}
