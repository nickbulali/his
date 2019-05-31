<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class SocialHistories extends Model
{
    protected $table = 'social_histories';
    protected $fillable = ['patient_id', 'occupation','residence'];
    public $timestamps = false;
}

