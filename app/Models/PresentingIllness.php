<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class PresentingIllness extends Model
{
    protected $table = 'history_of_presenting_illness';
    protected $fillable = ['comment'];
    public $timestamps = false;
}

