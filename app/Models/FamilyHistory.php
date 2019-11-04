<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class FamilyHistory extends Model
{
    protected $table = 'family_histories';
    protected $fillable = ['patient_id', 'condition_type_id','description','relation', 'start_date', 'end_date'];
    public $timestamps = false;

    public function conditionType()
    {
        return $this->hasOne('App\Models\ConditionTypes', 'id', 'condition_type_id');
    }

    public function relation()
    {
        return $this->hasOne('App\Models\FamilyRelation', 'id', 'relation');
    }

    public function loader()
    {
        return FamilyHistory::find($this->id)->load(
            'relation',
            'conditionType'
        );
    }
}

