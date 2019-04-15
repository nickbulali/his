<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class VitalSigns extends Model
{
    protected $table = 'vital_signs';
    protected $fillable = ['bodyTemparature','respiratory_rate','heart_rate','blood_pressure'];
    public $timestamps = false;
}

