<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutPatientRegistration extends Model
{
    protected $table = 'outPatientRegistration';

	public $fillable = ['patientId', 'fName', 'mName', 'lName', 'idNo', 'medNo', 'fPlanningNo', 'ancNo', 'screeningNo', 'artNo', 'tbNo', 'opdNo', 'cu5No', 'eyeClinicNo', 'contactNo', 'email', 'nationality', 'languages', 'dob', 'occupation', 'maritalStatus', 'age', 'county', 'sCounty', 'village'];


	public $timestamps = false;


}
