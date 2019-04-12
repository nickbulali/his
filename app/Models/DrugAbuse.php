

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrugAbuse extends Model
{


    protected $table = 'drug_abuse';
    protected $fillable = ['kind','frequency','quantity'];
    public $timestamps = false;
}

