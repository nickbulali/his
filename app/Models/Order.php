<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table='orders';
    
    protected $fillable = ['requested_by', 'status','charge_sheet_id','invoice_id'];

    public function invoice()
    {
    	return $this->belongsTo('App\Models\Invoice');
    }

    public function chargeSheet()
    {
    	return $this->hasOne('App\Models\ChargeSheet');
    }
      
}
