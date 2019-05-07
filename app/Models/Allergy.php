<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    protected $table = 'allergies';
    protected $fillable = ['code_id','substance','is_drug'];
    public $timestamps = false;
}

