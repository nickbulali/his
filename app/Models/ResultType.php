<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class ResultType extends Model
{
    protected $table = 'test_result_types';
    protected $fillable = ['code_id', 'test_type_id', 'specimen_type_id'];
    public $timestamps = false;
}

