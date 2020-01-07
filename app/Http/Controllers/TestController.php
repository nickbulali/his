<?php
namespace App\Http\Controllers;
use Auth;
use App\Models\Test;
use App\Models\Specimen;
use Illuminate\Http\Request;
class TestController extends Controller
{
    public function index(Request $request)
    {
        // Search Conditions
        if (
            $request->query('search') ||
            $request->query('test_status_id') ||
            $request->query('date_from') ||
            $request->query('date_to')
        ) {
            $tests = Test::search(
                $request->query('search'),
                $request->query('test_status_id'),
                ($request->query('date_from') ? $request->query('date_from') : date('Y-m-d')),
                $request->query('date_to')
            );
        } else {
\Log::info(Test::with(
                'encounter.patient.name',
                'encounter.patient.gender',
                'specimenType',
                'labTestType'
            )->orderBy('created_at', 'DESC')->get());
            $tests = Test::with(
                'encounter.patient.name',
                'encounter.patient.gender',
                'specimenType',
                'labTestType'
            )->orderBy('created_at', 'DESC')->paginate(25);
        }
        return response()->json($tests);
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
            'encounter_id' => 'required',
            'test_type_id' => 'required',
            'specimen_id' => 'required',
            'test_status_id' => 'required',
            'created_by' => 'required',
            'tested_by' => 'required',
            'verified_by' => 'required',
            'requested_by' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $test = new Test;
            $test->encounter_id = $request->input('encounter_id');
            $test->identifier = $request->input('identifier');
            $test->test_type_id = $request->input('test_type_id');
            $test->specimen_type_id = $request->input('specimen_type_id');
            $test->test_status_id = $request->input('test_status_id');
            $test->created_by = $request->input('created_by');
            $test->tested_by = $request->input('tested_by');
            $test->verified_by = $request->input('verified_by');
            $test->requested_by = $request->input('requested_by');
            $test->time_started = $request->input('time_started');
            $test->time_completed = $request->input('time_completed');
            $test->time_verified = $request->input('time_verified');
            $test->time_sent = $request->input('time_sent');
            try {
                $test->save();
                return response()->json($test->loader());
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
        return response()->json(Test::find($id)->loader());
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
            'encounter_id' => 'required',
            'test_type_id' => 'required',
            'specimen_id' => 'required',
            'test_status_id' => 'required',
            'created_by' => 'required',
            'tested_by' => 'required',
            'verified_by' => 'required',
            'requested_by' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $test = Test::find($id);
            $test->encounter_id = $request->input('encounter_id');
            $test->identifier = $request->input('identifier');
            $test->test_type_id = $request->input('test_type_id');
            $test->specimen_type_id = $request->input('specimen_type_id');
            $test->test_status_id = $request->input('test_status_id');
            $test->created_by = $request->input('created_by');
            $test->tested_by = $request->input('tested_by');
            $test->verified_by = $request->input('verified_by');
            $test->requested_by = $request->input('requested_by');
            $test->time_started = $request->input('time_started');
            $test->time_completed = $request->input('time_completed');
            $test->time_verified = $request->input('time_verified');
            $test->time_sent = $request->input('time_sent');
            try {
                $test->save();
                return response()->json($test->loader());
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }
}
