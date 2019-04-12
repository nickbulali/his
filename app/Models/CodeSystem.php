<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeSystem extends Model
{
	 protected $table = 'code_system';

    public $timestamps = false;
    public $fillable = ['name', 'link','description'];
}
