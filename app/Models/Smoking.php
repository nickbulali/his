<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Smoking extends Model
{
    protected $table = 'smoking';
    protected $fillable = ['kind','frequency','quantity'];
    public $timestamps = false;
}

