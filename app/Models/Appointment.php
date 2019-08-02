<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Appointment extends Model
{

    protected $table = 'appointment';
    protected $fillable = ['patient_id','user_id','appointment_date','appointment_time', 'status'];
   

      public function patient()
    {
        return $this->hasOne('App\Models\Patient', 'id', 'patient_id');
    }
      public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
}

