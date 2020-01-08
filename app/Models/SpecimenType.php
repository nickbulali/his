<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class SpecimenType extends Model
{
    public function labTestTypes()
    {
        return $this->belongsToMany('App\Models\LabTestType', 'lab_test_type_specimen_type');
    }
}
