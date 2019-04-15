<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionEncounter extends Model
{
    protected $table = 'admission_encounter';
    protected $fillable = ['admission_id','encounter_id'];
}
