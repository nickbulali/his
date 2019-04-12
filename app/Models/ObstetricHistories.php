
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObstetricHistories extends Model
{


    protected $table = 'obstetric_histories';
    protected $fillable = ['year','place','maturity','type_of_delivery','bwt','sex','fate','puerperium'];
    public $timestamps = false;
}

