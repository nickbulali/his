<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Mpesa extends Model
{
   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mpesa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['MerchantRequestID','CheckoutRequestID','ResponseCode', 'ResponseDescription', 'CustomerMessage', 'invoice_id'];

    public function mpesa_callback()
    {
        return $this->hasOne('App\Models\MpesaCallback', 'MerchantRequestID', 'MerchantRequestID');
    }

    public function mpesa_callback_metadata()
    {
        return $this->hasOne('App\Models\MpesaCallbackMetadata', 'MerchantRequestID', 'MerchantRequestID');
    }
}
