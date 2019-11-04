<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class MedicalSurgicalHistory extends Model
{
    protected $table = 'medical_surgical_histories';
    protected $fillable = ['comment'];
    public $timestamps = false;
}

