<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Result extends Model
{
    protected $fillable = ['test_id', 'parameter', 'measure_id', 'result' ,'lab_result_type_id', 'time_entered'];

    public $timestamps = false;

    public function test()
    {
        return $this->belongsTo('App\Models\Test');
    }

    public function logs()
    {
        return $this->hasMany('App\Models\ResultLog');
    }
}
