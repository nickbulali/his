<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $table = 'diagnosis';
    protected $fillable = ['patient_id','description','user_id'];
     protected $casts = [
    'created_at'  => 'date:Y-m-d',
  
];
}

