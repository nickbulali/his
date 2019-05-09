<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class FamilyHistory extends Model
{
    protected $table = 'family_history';
    protected $fillable = ['condition_type_id','description','relation'];
    public $timestamps = false;

    public function conditionType()
    {
        return $this->hasOne('App\Models\ConditionTypes', 'id', 'condition_type_id');
    }

    public function relation()
    {
        return $this->hasOne('App\Models\FamilyRelation', 'id', 'relation');
    }
}

