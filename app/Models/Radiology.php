<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class Radiology extends Model
{
    protected $table = 'radiology';
    // todo: remove x-ray as independent concept
    // todo: these details need be updates
    protected $fillable = ['encounter_id','image_url','comments'];
}
