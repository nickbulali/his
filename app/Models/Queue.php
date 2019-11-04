<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    public function patient()
    {
        return $this->hasOne('App\Models\Patient', 'id', 'patient_id');
    }

    public function queueStatus()
    {
        return $this->hasOne('App\Models\QueueStatus', 'id', 'queue_status_id');
    }
}
