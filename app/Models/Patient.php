<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/*
 * Demographics and other administrative information about an individual or animal receiving care or
 * other health-related services.racking patient is the center of the healthcare process.
 * https://www.hl7.org/fhir/patient.html
 */
class Patient extends Model
{
    protected $table = 'patients';

    protected $fillable = ['identifier'];

    public function address()
    {
        return $this->hasMany('App\Models\Address');
    }

    public function maritalStatus()
    {
        return $this->hasOne('App\Models\MaritalStatus', 'id', 'marital_status');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function name()
    {
        return $this->hasOne('App\Models\Name', 'id', 'name_id');
    }

    public function gender()
    {
        return $this->hasOne('App\Models\Gender', 'id', 'gender_id');
    }

    public function bloodGroup()
    {
        return $this->hasOne('App\Models\BloodGroup', 'id', 'blood_group_id');
    }

    public function practitioner()
    {
        return $this->hasOne('App\Models\Practitioner');
    }

    public function tests()
    {
        return $this->hasManyThrough('App\Models\Test', 'App\Models\Encounter');
    }

    public function encounter()
    {
        return $this->hasMany('App\Models\Encounter');
    }

    public function medications()
    {
        return $this->hasMany('App\Models\Medications');
    }

    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public function allergies()
    {
        return $this->belongsToMany('App\Models\Allergy');
    }

    public function familyHistory()
    {
        return $this->belongsToMany('App\Models\FamilyHistory');
    }

    public function loader()
    {
        return Patient::find($this->id)->load(
            'name',
            'gender',
            'maritalStatus'
        );
    }
}
