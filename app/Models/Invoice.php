<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  //   
      protected $table = 'invoices';
      protected $fillable = [
            'invoice_no',
    		'opened_by',
    		'encounter_id',
            'total',
            'status' 
            

    ];

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function encounter()
    {
    	return $this->belongsTo('App\Models\Encounter');
    }
}
