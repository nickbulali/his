<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class LabTestType extends Model
{
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $table = 'lab_test_types';

    public function test()
    {
        return $this->hasMany('App\Models\Test');
    }

    public function testTypeCategory()
    {
        return $this->hasOne('App\Models\LabTestTypeCategory', 'id', 'test_type_category_id');
    }

    public function specimenTypes()
    {
        return $this->belongsToMany('App\Models\SpecimenType', 'lab_test_type_specimen_type');
    }

    public function loader()
    {
        return TestType::find($this->id)->load(
            'testTypeCategory',
            'specimenTypes'
        );
    }
}
