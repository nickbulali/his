<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class Medications extends Model
{
    protected $table = 'medications';
    protected $fillable = ['patient_id','medication_status_id','drug_id','prescribed_by','test_type_id','dosage_id','quantity','start_time','end_time','refill','comments'];
}
