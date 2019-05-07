<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class MedicationStatus extends Model
{
    protected $table = 'medication_statuses';
    protected $fillable = ['display'];
    public $timestamps = false;
}
