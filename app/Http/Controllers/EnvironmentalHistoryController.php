<?php
namespace App\Http\Controllers;
use App\Models\EnvironmentalHistories;
use Illuminate\Http\Request;
class EnvironmentalHistoryController extends Controller
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
            'patient_id' => 'required',
            'description' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $SocialHistory = new EnvironmentalHistories;
            $SocialHistory->patient_id = $request->input('patient_id');
            $SocialHistory->description = $request->input('description');
            $SocialHistory->start_date = $request->input('start_date');
            $SocialHistory->end_date = $request->input('end_date');
            try {
                $SocialHistory->save();
                return response()->json($SocialHistory);
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
        $SocialHistory = EnvironmentalHistories::findOrFail($id);
        return response()->json($SocialHistory);
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
            'description' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $SocialHistory = EnvironmentalHistories::findOrFail($id);
            $SocialHistory->description = $request->input('description');
            $SocialHistory->start_date = $request->input('start_date');
            $SocialHistory->end_date = $request->input('end_date');
            try {
                $SocialHistory->save();
                return response()->json($SocialHistory);
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
            $SocialHistory = EnvironmentalHistories::findOrFail($id);
            $SocialHistory->delete();
            return response()->json($SocialHistory, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
