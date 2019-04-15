<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class AnthropometricMeasurements extends Model
{
    protected $table = 'anthropometric_measurements';
    protected $fillable = ['height','weight','body_mass_index','body_surface_area'];
    public $timestamps = false;
}
