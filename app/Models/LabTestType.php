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

    public function test()
    {
        return $this->hasMany('App\Models\Test');
    }

    public function testTypeCategory()
    {
        return $this->hasOne('App\Models\TestTypeCategory', 'id', 'test_type_category_id');
    }

    public function specimenTypes()
    {
        return $this->belongsToMany('App\Models\SpecimenType', 'test_type_mappings');
    }

    public function measures()
    {
        return $this->hasMany('App\Models\Measure');
    }

    public function loader()
    {
        return TestType::find($this->id)->load(
            'measures.measureType',
            'measures.measureRanges.gender',
            'testTypeCategory',
            'specimenTypes'
        );
    }
}
