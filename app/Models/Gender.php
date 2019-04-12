<?php

namespace App\Models;
/*
 * (c) @iLabAfrica
 */
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    const male = 1;
    const female = 2;
    const both = 3;
    const unknown = 4;

    public $timestamps = false;

    public function Patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
