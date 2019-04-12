

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AntenatalHistory extends Model
{


    protected $table = 'antenatal_history';
    protected $fillable = ['encounter_id','test_id','fundal_height','presentation','fhr','comments','date_of_next_visit'];
    public $timestamps = false;
}

