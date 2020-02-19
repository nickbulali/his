<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    
    protected $table = 'NextOfKin';

	public $fillable = ['patientId', 'fName', 'mName', 'lName', 'idNo','contactNo', 'gender', 'dob', 'email', 'nationality', 'languages', 'relationship', 'county', 'sCounty', 'village'];


	public $timestamps = false;

}
