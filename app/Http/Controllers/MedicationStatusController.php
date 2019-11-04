<?php
namespace App\Http\Controllers;
use App\Models\MedicationStatus;
use Illuminate\Http\Request;
class MedicationStatusController extends Controller
{
    public function index(Request $request)
    {
         $MedicationStatus = MedicationStatus::orderBy('id', 'ASC')->get();
        return response()->json($MedicationStatus);
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
            'display' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $MedicationStatus = new MedicationStatus;
            $MedicationStatus->display = $request->input('display');
            try {
                $MedicationStatus->save();
                return response()->json($MedicationStatus);
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
        $MedicationStatus = MedicationStatus::findOrFail($id);
        return response()->json($MedicationStatus);
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
            'display' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $MedicationStatus = MedicationStatus::findOrFail($id);
            $MedicationStatus->display = $request->input('display');
            try {
                $MedicationStatus->save();
                return response()->json($MedicationStatus);
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
            $MedicationStatus = MedicationStatus::findOrFail($id);
            $MedicationStatus->delete();
            return response()->json($MedicationStatus, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
