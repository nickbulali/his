<?php
namespace App\Http\Controllers;
use App\Models\MedicalSurgicalHistories;
use Illuminate\Http\Request;
class MedicalSurgicalHistoriesController extends Controller
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
            $MedicalSurgicalHistories = new MedicalSurgicalHistories;
            $MedicalSurgicalHistories->comment = $request->input('comment');
            try {
                $MedicalSurgicalHistories->save();
                return response()->json($MedicalSurgicalHistories);
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
        $MedicalSurgicalHistories = MedicalSurgicalHistories::findOrFail($id);
        return response()->json($MedicalSurgicalHistories);
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
            $MedicalSurgicalHistories = MedicalSurgicalHistories::findOrFail($id);
            $MedicalSurgicalHistories->comment = $request->input('comment');
            try {
                $MedicalSurgicalHistories->save();
                return response()->json($MedicalSurgicalHistories);
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
            $MedicalSurgicalHistories = MedicalSurgicalHistories::findOrFail($id);
            $MedicalSurgicalHistories->delete();
            return response()->json($MedicalSurgicalHistories, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
