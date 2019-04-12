

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresentingComplaints extends Model
{


    protected $table = 'presenting_complaints';
    protected $fillable = ['comment'];
    public $timestamps = false;
}

