<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Condition extends Model
{
    protected $table = 'conditions';
    protected $fillable = ['condition_type_id','comments'];
    public $timestamps = false;
}

