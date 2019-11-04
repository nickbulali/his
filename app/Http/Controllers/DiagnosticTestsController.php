<?php
namespace App\Http\Controllers;
use App\Models\DiagnosticTest;
use Illuminate\Http\Request;
class DiagnosticTestsController extends Controller
{
    public function index()
    {
        $diagnosticTests = DiagnosticTest::orderBy('id', 'ASC')->paginate(10);
        return response()->json($diagnosticTests);
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
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
             $diagnosticTest = new DiagnosticTests;
             $diagnosticTest->encounter_id = $request->input('encounter_id');
            try {
                $diagnosticTest->save();
                return response()->json($diagnosticTest);
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
        $diagnosticTest = DiagnosticTest::findOrFail($id);
        return response()->json($diagnosticTest);
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
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $diagnosticTest = DiagnosticTest::findOrFail($id);
            $diagnosticTest->encounter_id = $request->input('encounter_id');
            try {
                $diagnosticTest->save();
                return response()->json($diagnosticTest);
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
            $diagnosticTest = DiagnosticTest::findOrFail($id);
            $diagnosticTest->delete();
            return response()->json($diagnosticTest, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
