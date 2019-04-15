<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class LabTestTypeCategory extends Model
{
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function testTypes()
    {
        return $this->hasMany('App\Models\LabTestType');
    }
}
