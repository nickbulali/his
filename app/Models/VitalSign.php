<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    protected $table = 'vital_signs';

    public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'body_temperature',
        'respiratory_rate',
        'heart_rate',
        'blood_pressure',
        'height',
        'weight',
        'body_mass_index',
        'body_surface_area'
    ];
   
    protected $casts = [
        'created_at'  => 'date:Y-m-d',
    ];

    public function patient()
    {
        return $this->hasOne('App\Models\Patient', 'id', 'patient_id');
    }
}

