<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubstanceType extends Model
{
    protected $table = 'substance_types';
    protected $fillable = ['name'];
    public $timestamps = false;
}

