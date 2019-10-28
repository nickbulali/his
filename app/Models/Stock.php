<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $fillable = ['lot_no', 'batch_no', 'expiry_date', 'manufacturer', 'supplier_id', 'quantity_supplied', 'cost_per_unit', 'date_received', 'remarks'];

    protected $with = ['request'];

    public $timestamps = false;

    public function request() {
	  return $this->hasMany('App\Models\ItemRequest',  'item_id', 'id');
	}

	public function getBalanceAttribute() {

	  return $this->quantity_supplied - $this->quantity_issued;
	}
}