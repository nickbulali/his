<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class MedicationSheet extends Model
{
    protected $table = 'medication_sheets';
    protected $fillable = ['medication_id','time_due'];
}
