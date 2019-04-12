

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xrays extends Model
{
    //
     protected $table = 'x_rays';
     protected $fillable = ['encounter_id','image_url','comments'];


     
}
