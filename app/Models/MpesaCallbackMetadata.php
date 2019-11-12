<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class MpesaCallbackMetadata extends Model
{
   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mpesa_callback_metadata';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['MerchantRequestID','CheckoutRequestID','Amount', 'MpesaReceiptNumber', 'Balance', 'TransactionDate', 'PhoneNumber'];
}
