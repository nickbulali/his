<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'description', 'unit_price'
    ];

    protected $appends = ['text'];

    public function getTextAttribute()
    {
        return $this->attributes['item_code'].' - '.$this->attributes['description'];
    }

    public function itemCategory()
    {
        return $this->belongsTo('App\Models\ItemCategory', 'item_category_id', 'id');
    }
}
