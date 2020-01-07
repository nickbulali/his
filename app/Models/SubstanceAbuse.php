<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubstanceAbuse extends Model
{
    protected $table = 'substance_abuses';
    protected $fillable = ['substance_type_id','frequency','quantity'];
    public $timestamps = false;
}

