<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class VitalSigns extends Model
{
    protected $table = 'vital_signs';
    protected $fillable = ['patient_id','body_temperature','respiratory_rate','heart_rate','blood_pressure','height','weight','body_mass_index','body_surface_area'];
   

      public function patient()
    {
        return $this->hasOne('App\Models\Patient', 'id', 'patient_id');
    }

    
}

