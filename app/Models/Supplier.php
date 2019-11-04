<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $fillable = ['name', 'phone', 'email', 'address'];

    public $timestamps = false;
}