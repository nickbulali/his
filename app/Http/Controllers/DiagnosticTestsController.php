<?php
namespace App\Http\Controllers;
use App\Models\DiagnosticTests;
use Illuminate\Http\Request;
class DiagnosticTestsController extends Controller
{
    public function index()
    {
        $DiagnosticTests = DiagnosticTests::orderBy('id', 'ASC')->paginate(10);
        return response()->json($DiagnosticTests);
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
             $DiagnosticTests = new DiagnosticTests;
             $DiagnosticTests->encounter_id = $request->input('encounter_id');
            try {
                $DiagnosticTests->save();
                return response()->json($DiagnosticTests);
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
        $DiagnosticTests = DiagnosticTests::findOrFail($id);
        return response()->json($DiagnosticTests);
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
            $DiagnosticTests = DiagnosticTests::findOrFail($id);
            $DiagnosticTests->encounter_id = $request->input('encounter_id');
            try {
                $DiagnosticTests->save();
                return response()->json($DiagnosticTests);
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
            $DiagnosticTests = DiagnosticTests::findOrFail($id);
            $DiagnosticTests->delete();
            return response()->json($DiagnosticTests, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
