<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class SystemEnquiry extends Model
{
    protected $table = 'system_enquiry';
    protected $fillable = ['encounter_id','body_system_id'];
}
