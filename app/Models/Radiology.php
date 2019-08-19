<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Radiology extends Model
{
    protected $table = 'radiology';
    protected $fillable = ['testname','shortname','testtype','category','charge'];
}
