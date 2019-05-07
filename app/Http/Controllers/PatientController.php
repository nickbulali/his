<?php
namespace App\Http\Controllers;
use Auth;
use App\Models\Name;
use App\Models\Test;
use App\Models\Patient;
use App\Models\Encounter;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PatientController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('search')) {
            $search = $request->query('search');
            $patient = Patient::whereHas('name', function ($query) use ($search) {
                $query->where('given', 'LIKE', "%{$search}%")->orWhere('family', 'LIKE', "%{$search}%");
            })->with('gender', 'name', 'maritalStatus', 'bloodGroup', 'allergies')
                ->paginate(11);
        } else {
            $patient = Patient::with('name', 'gender', 'maritalStatus', 'bloodGroup', 'allergies')->orderBy('created_at', 'DESC')->paginate(11);
        }
        return response()->json($patient);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'identifier' => 'required',
            'birth_date' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $name = new Name;
            $name->text = $request->input('family');
            $name->family = $request->input('family');
            $name->given = $request->input('given');
            try {
                $name->save();
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            $patient = new Patient;
            $patient->identifier = $request->input('identifier');
            $patient->name_id = $name->id;
            $patient->gender_id = $request->input('gender_id');
            $patient->birth_date = $request->input('birth_date');
            $patient->marital_status = $request->input('maritalstatus_id');
            $patient->created_by = Auth::user()->id;
            try {
                $patient->save();
                return response()->json($patient->loader());
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::with('name', 'gender', 'maritalStatus', 'encounter.encounterClass', 'encounter.location', 'bloodGroup', 'allergies')->findOrFail($id);
        return response()->json($patient);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  request
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'identifier' => 'required',
            'name_id'    => 'required',
            'gender_id'  => 'required',
            'birth_date' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $patient = Patient::findOrFail($id);
            $patient->identifier = $request->input('identifier');
            $patient->active = $request->input('active');
            $patient->name_id = $request->input('name_id');
            $patient->gender_id = $request->input('gender_id');
            $patient->birth_date = $request->input('birth_date');
            $patient->deceased = $request->input('deceased');
            $patient->deceased_date_time = $request->input('deceased_date_time');
            $patient->marital_status = $request->input('marital_status');
            $patient->photo = $request->input('photo');
            $patient->organization_id = $request->input('organization_id');
            $patient->created_by = Auth::user()->id;
            $name = Name::findOrFail($request->input('name.id'));
            $name->family = $request->input('name.family');
            $name->given = $request->input('name.given');
            try {
                $patient->save();
                $name->save();
                return response()->json($patient);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $patient = Patient::findOrFail($id);
            $patient->delete();
            return response()->json($patient, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    /**
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function testRequest(Request $request)
    {
        $rules = [
            'patient_id' => 'required',
            'location_id'    => 'required',
            'encounter_class_id'  => 'required',
            'practitioner_name'  => 'required',
            'testTypeIds' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $encounter = new Encounter;
            $encounter->patient_id = $request->input('patient_id');
            $encounter->location_id = $request->input('location_id');
            $encounter->practitioner_name = $request->input('practitioner_name');
            $encounter->encounter_class_id = $request->input('encounter_class_id');
            $encounter->bed_no = $request->input('bed_no');
            $encounter->save();
            foreach ($request->input('testTypeIds') as $testTypeId) {
         //save order items in tests
                $test = new Test;
                $test->encounter_id = $encounter->id;
                $test->test_type_id = $testTypeId;
                $test->test_status_id = TestStatus::pending;
                $test->created_by = Auth::user()->id;
                $test->requested_by = $request->input('practitioner_name');
                $test->save();
            }
            try {
                $patient = Patient::find($request->input('patient_id'));
                return response()->json($patient, 200);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }
    public function get_patients(){
    //Registered patrients today
        $patient = Patient::whereDate('created_at', Carbon::today())->count();
        return response()->json( $patient);
    }
    public function attachAllergy($patientId, $allergyId){
         $patient= Patient::find($patientId);
       try{
           $patient->allergies()->attach($allergyId);
           return redirect()->action('PatientController@show',['patientId' => $patientId]);
       } catch (\Illuminate\Database\QueryException $e) {
           return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
       }
    }
}
