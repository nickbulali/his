
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialHistory extends Model
{


    protected $table = 'social_history';
    protected $fillable = ['occupation','residence'];
    public $timestamps = false;
}

