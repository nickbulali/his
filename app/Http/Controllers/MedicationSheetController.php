<?php
namespace App\Http\Controllers;
use App\Models\MedicationSheet;
use Illuminate\Http\Request;
class MedicationSheetController extends Controller
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
            $medicationSheet = new MedicationSheet;
            $medicationSheet->medication_id = $request->input('medication_id');
            $medicationSheet->time_due = $request->input('time_due');
            try {
                $medicationSheet->save();
                return response()->json($medicationSheet);
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
        $medicationSheet = MedicationSheet::findOrFail($id);
        return response()->json($medicationSheet);
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
            $medicationSheet = MedicationSheet::findOrFail($id);
            $medicationSheet->medication_id = $request->input('medication_id');
            $medicationSheet->time_due = $request->input('time_due');
            try {
                $medicationSheet->save();
                return response()->json($medicationSheet);
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
            $medicationSheet = MedicationSheet::findOrFail($id);
            $medicationSheet->delete();
            return response()->json($medicationSheet, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
