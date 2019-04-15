<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargeSheet extends Model
{
     protected $table = 'charge_sheets';
     protected $fillable = ['cost','covered_by','test_type_id'];
     public function testType()
     {
     	return $this->hasMany('App\Models\TestType');
     }
}
