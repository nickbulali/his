<?php
namespace App\Http\Controllers;
use App\Models\AdmissionEncounter;
use Illuminate\Http\Request;
class AdmissionEncounterController extends Controller
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
            'admission_id' => 'required',
            'encounter_id' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $AdmissionEncounter = new AdmissionEncounter;
            $AdmissionEncounter->admission_id = $request->input('admission_id');
            $AdmissionEncounter->encounter_id = $request->input('encounter_id');
            try {
                $AdmissionEncounter->save();
                return response()->json($AdmissionEncounter);
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
        $AdmissionEncounter = AdmissionEncounter::findOrFail($id);
        return response()->json($AdmissionEncounter);
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
            'admission_id' => 'required',
            'encounter_id' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $AdmissionEncounter = AdmissionEncounter::findOrFail($id);
            $AdmissionEncounter->admission_id = $request->input('admission_id');
            $AdmissionEncounter->encounter_id = $request->input('encounter_id');
            try {
                $AdmissionEncounter->save();
                return response()->json($AdmissionEncounter);
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
            $AdmissionEncounter = AdmissionEncounter::findOrFail($id);
            $AdmissionEncounter->delete();
            return response()->json($AdmissionEncounter, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
