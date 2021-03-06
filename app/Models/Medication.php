<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Medication extends Model
{
    protected $table = 'medications';

    protected $fillable = [
        'patient_id',
        'medication_status_id',
        'drugs',
        'prescribed_by',
        'test_type_id',
        'dosage_id',
        'quantity',
        'start_time',
        'end_time',
        'refill',
        'comments'
    ];

    protected $casts = [
        'created_at'  => 'date:Y-m-d',
    ];

    public function patient()
    {
        return $this->hasOne('App\Models\Patient', 'id', 'patient_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function Dosage()
    {
        return $this->belongsTo('App\Models\Dosage', 'dosage_id', 'id');
    }

    public function Drugs()
    {
        return $this->belongsTo('App\Models\Drug', 'drug_id', 'id');
    }

    public function medication_status()
    {
        return $this->belongsTo('App\Models\MedicationStatus', 'medication_status_id', 'id');
    }

}
