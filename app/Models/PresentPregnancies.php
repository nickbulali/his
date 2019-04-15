<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class PresentPregnancies extends Model
{
    protected $table = 'present_pregnancies';
    protected $fillable = ['last_normal_menstrual_period','expected_date_of_delivery','gestation'];
    public $timestamps = false;
}

