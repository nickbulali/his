<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public function Code()
    {
        return $this->belongsTo('App\Models\CodeSystem');
    }
}
