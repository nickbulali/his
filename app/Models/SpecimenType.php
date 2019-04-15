<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class SpecimenType extends Model
{
    public function testTypes()
    {
        return $this->belongsToMany('App\Models\TestType', 'test_type_mappings');
    }
}
