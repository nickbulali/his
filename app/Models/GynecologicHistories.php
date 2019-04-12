
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GynecologicHistories extends Model
{


    protected $table = 'gynecologic_histories';
    protected $fillable = ['age_at_menarche','duration_of_menstrual_cycle','length_of_menstrual_cycle','any_menstrual_problem','history_of_sti','history_of_gynecological_operation','contraception_history'];
    public $timestamps = false;
}

