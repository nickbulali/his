<?php
namespace App\Http\Controllers;
use Auth;
use App\Models\Test;
use App\Models\Specimen;
use App\Models\Encounter;
use Illuminate\Http\Request;
class EncounterController extends Controller
{
    public function index(Request $request)
    {
        // Search Conditions
        if (
            $request->query('search') ||
            $request->query('date_from') ||
            $request->query('date_to')
        ) {
            $encounters = Encounter::search(
                $request->query('search'),
                ($request->query('date_from') ? $request->query('date_from') : date('Y-m-d')),
                $request->query('date_to')
            );
        } else {
            $encounters = Encounter::with(
                'patient.name',
                'patient.gender',
                'tests.testType.specimenTypes'
            )->orderBy('created_at', 'DESC')->paginate(10);
        }
        return response()->json($encounters);
    }
    public function store(Request $request)
    {
        $rules = [
            'patient_id' => 'required',
            'location_id'    => 'required',
            'encounter_class_id'  => 'required',
            'practitioner_name'  => 'required',
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
            try {
                $encounter->save();
                return response()->json($encounter->loader(), 200);
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
        $encounter = Encounter::findOrFail($id);
        return response()->json($encounter);
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
            'patient_id' => 'required',
            'location_id'    => 'required',
            'encounter_class_id'  => 'required',
            'practitioner_name'  => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $encounter = Encounter::find($id);
            $encounter->patient_id = $request->input('patient_id');
            $encounter->location_id = $request->input('location_id');
            $encounter->practitioner_name = $request->input('practitioner_name');
            $encounter->encounter_class_id = $request->input('encounter_class_id');
            $encounter->bed_no = $request->input('bed_no');
            try {
                $encounter->save();
                return response()->json($encounter->loader(), 200);
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
            $encounter = Encounter::findOrFail($id);
            $encounter->delete();
            return response()->json($encounter, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function addTests(Request $request)
    {
        $rules = [
            'encounter_id' => 'required',
            'practitioner_name'  => 'required',
            'testTypeIds' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            foreach ($request->input('testTypeIds') as $testTypeId) {
                $test = new Test;
                $test->encounter_id = $request->input('encounter_id');
                $test->test_type_id = $testTypeId;
                $test->test_status_id = TestStatus::pending;
                $test->created_by = Auth::user()->id;
                $test->requested_by = $request->input('practitioner_name');
                $test->save();
            }
            try {
                $encounter = Encounter::find($request->input('encounter_id'));
                return response()->json($encounter->loader(), 200);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

    public function patientVisits($id){
        $encounters = Encounter::wherePatient_id($id)->with(
                'patient.name',
                'patient.gender',
                'encounterClass',
                'location',
                'tests.testType.specimenTypes'
            )->orderBy('created_at', 'DESC')->paginate(4);

        return response()->json($encounters);
    }
}
