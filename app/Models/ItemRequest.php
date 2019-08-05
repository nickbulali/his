<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ItemRequest extends Model
{	
	protected $table = 'requests';

    protected $with = ['Supplies', 'user', 'status'];

    public $fillable = ['item_id', 'curr_bal','quantity_requested', 'remarks'];

    public $timestamps = true;

    public function Supplies()
    {
        return $this->hasOne('App\Models\Supplies', 'id', 'item_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'requested_by', 'id');
    }

    public function status()
    {
        return $this->hasOne('App\Models\RequestStatus', 'id', 'status_id');
    }
}