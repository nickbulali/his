<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
        return $this->hasMany('App\Models\FamilyHistory');
    }
    public function socialHistory()
    {
        return $this->hasMany('App\Models\SocialHistories');
    }
    public function environmentalHistory()
    {
        return $this->hasMany('App\Models\EnvironmentalHistories');
    }
    public function smokingHistory()
    {
        return $this->hasMany('App\Models\Smoking');
    }
    public function alcoholHistory()
    {
        return $this->hasMany('App\Models\Alcohol');
    }

    public function loader()
    {
        return Patient::find($this->id)->load(
            'name',
            'gender',
            'maritalStatus'
        );
    }
    public static function frequency($query=null, $by_status=true, $by_year=true, $by_month=true, $by_gender=true){
        $counts = [];
        if($query===null){
            $query = DB::table('patients');
        }

        $selects = "count(*) as num";
        $group_bys = '';

        if($by_status){
            $selects = $selects.", patients.active";
            $group_bys = $group_bys.", patients.active";
        }
        if($by_year){
            $selects = $selects.", YEAR(patients.created_at) as year";
            $group_bys = $group_bys.", year";
        }
        if($by_month){
            $selects = $selects.", MONTH(patients.created_at) as month";
            $group_bys = $group_bys.", month";
        }
        if($by_gender){
            $selects = $selects.", patients.gender_id";
            $group_bys = $group_bys.", patients.gender_id";
        }

        if($group_bys){ //substr($group_bys, 1)
            $counts = $query->selectRaw($selects)->groupBy(DB::raw(substr($group_bys, 1)))->get();
        }else{
            $counts = $query->selectRaw($selects)->get();
        }

        return $counts;
    }
}
