<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anc_signs extends Model
{
    
	protected $table = 'anc_signs';

	public $fillable = ['s_pressure', 'd_pressure', 'temperature', 'height', 'weight', 'notes', 'supplementation', 'visual', 'fever', 'hiv', 'tb'];


	public $timestamps = false;
}
