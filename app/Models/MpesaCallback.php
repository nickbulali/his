<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class MpesaCallback extends Model
{
   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mpesa_callback';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['MerchantRequestID','CheckoutRequestID','ResultCode', 'ResultDesc'];

    public function mpesa_callback_metadata()
    {
        return $this->hasOne('App\Models\MpesaCallbackMetadata', 'MerchantRequestID', 'MerchantRequestID');
    }
}
