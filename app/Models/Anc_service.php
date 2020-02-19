<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Anc_services;

class Anc_service extends Model
{
    protected $table = 'anc_service';

    public $fillable = ['condition', 'm_diagnosis', 'o_diagnosis', 'classification', 'treatment', 'prescription_no', 'outcome', 'referral_from', 'refer', 'referral_to', 'referred_by', 'user_id', 'notes'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }


	public $timestamps = false;
}
