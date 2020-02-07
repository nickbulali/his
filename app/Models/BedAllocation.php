<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bedAllocation extends Model
{
	
	protected $table = 'bed_allocation';
	public $fillable = ['patient_id', 'bed_no', 'start_date', 'start_time', 'status'];

	public $timestamps = false;

	public function bed()
    {
        return $this->belongsTo('App\Models\bed', 'bed_no', 'bed_no');
    }

     public function patient()
    {
        return $this->belongsTo('App\Models\Patient', 'patient_id', 'id');
    }
}