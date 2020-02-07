<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
	protected $table = 'beds';

    public $fillable = ['bed_no', 'ward_no', 'status'];


    public $timestamps = false;


    public function ward()
    {
        return $this->belongsTo('App\Models\Ward', 'ward_no', 'ward_no');
    }
    
}
