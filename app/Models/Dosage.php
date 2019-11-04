<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Dosage extends Model
{
    protected $table = 'dosages';
    protected $fillable = ['description'];
    public $timestamps = false;
}
