<?php
namespace App\Http\Controllers;
use App\Models\MedicalSurgicalHistory;
use Illuminate\Http\Request;
class MedicalSurgicalHistoryController extends Controller
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
            'comment' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $medicalSurgicalHistory = new MedicalSurgicalHistory;
            $medicalSurgicalHistory->comment = $request->input('comment');
            try {
                $medicalSurgicalHistory->save();
                return response()->json($medicalSurgicalHistory);
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
        $medicalSurgicalHistory = MedicalSurgicalHistory::findOrFail($id);
        return response()->json($medicalSurgicalHistory);
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
            'comment' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $medicalSurgicalHistory = MedicalSurgicalHistory::findOrFail($id);
            $medicalSurgicalHistory->comment = $request->input('comment');
            try {
                $medicalSurgicalHistory->save();
                return response()->json($medicalSurgicalHistory);
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
            $medicalSurgicalHistory = MedicalSurgicalHistory::findOrFail($id);
            $medicalSurgicalHistory->delete();
            return response()->json($medicalSurgicalHistory, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
