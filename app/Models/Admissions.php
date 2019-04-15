<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admissions extends Model
{
    protected $table = 'admissions';
    protected $fillable = ['reason_for_admission','reason_for_discharge','comments'];
}
