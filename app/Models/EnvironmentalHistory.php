<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class EnvironmentalHistory extends Model
{
    protected $table = 'environmental_histories';
    protected $fillable = ['patient_id', 'description', 'start_date', 'end_date'];
    public $timestamps = false;
}
