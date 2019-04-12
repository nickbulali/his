<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payments';
    protected $fillable=['amount','status','paid_by','invoice_id'];

    public function invoice()
    {
        return $this->hasOne('App\Models\Invoice');
    }
}
