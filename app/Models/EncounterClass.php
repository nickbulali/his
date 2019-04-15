<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class EncounterClass extends Model
{
    const inpatient = 1;
    const outpatient = 2;
    public $timestamps = false;
}
