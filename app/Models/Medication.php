<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Medication extends Model
{
    protected $table = 'medications';
    protected $fillable = ['patient_id','medication_status_id','drug_id','prescribed_by','test_type_id','dosage_id','quantity','start_time','end_time','refill','comments'];
    public $timestamps = false;

    public function drugs()
    {
        return $this->hasOne('App\Models\Drugs', 'id', 'drug_id');
    }

    public function dosage()
    {
        return $this->hasOne('App\Models\Dosage', 'id', 'dosage_id');
    }
}
