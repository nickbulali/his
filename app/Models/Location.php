<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Location extends Model
{
    public $timestamps = false;
    protected $table = 'location';
    protected $fillable = ['identifier','name'];
}
