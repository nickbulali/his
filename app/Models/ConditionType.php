<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class ConditionType extends Model
{
    protected $table = 'condition_types';
    protected $fillable = ['code_id','description'];
    public $timestamps = false;
}

