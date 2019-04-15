<?php
namespace App\Http\Controllers;
use App\Models\MedicationSheets;
use Illuminate\Http\Request;
class MedicationSheetsController extends Controller
{
    public function index(Request $request)
    {
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
            'medication_id' => 'required',
            'time_due' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $MedicationSheets = new MedicationSheets;
            $MedicationSheets->medication_id = $request->input('medication_id');
            $MedicationSheets->time_due = $request->input('time_due');
            try {
                $MedicationSheets->save();
                return response()->json($MedicationSheets);
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
        $MedicationSheets = MedicationSheets::findOrFail($id);
        return response()->json($MedicationSheets);
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
            'medication_id' => 'required',
            'time_due' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $MedicationSheets = MedicationSheets::findOrFail($id);
            $MedicationSheets->medication_id = $request->input('medication_id');
            $MedicationSheets->time_due = $request->input('time_due');
            try {
                $MedicationSheets->save();
                return response()->json($MedicationSheets);
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
            $MedicationSheets = MedicationSheets::findOrFail($id);
            $MedicationSheets->delete();
            return response()->json($MedicationSheets, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
