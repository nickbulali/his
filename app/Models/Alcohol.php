<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alcohol extends Model
{
    protected $table = 'alcohol';
    protected $fillable = ['kind','frequency','quantity'];
    public $timestamps = false;
}

