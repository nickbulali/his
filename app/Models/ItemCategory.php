<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = 'item_categories';

    public function item()
    {
        return $this->hasMany('App\Models\Item');
    }
    
}
