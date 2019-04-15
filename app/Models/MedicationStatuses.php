<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class MedicationStatuses extends Model
{
    protected $table = 'medication_statuses';
    protected $fillable = ['display'];
}
