
<?php

namespace App\Http\Controllers;

use App\Models\FamilyHistory;
use Illuminate\Http\Request;

class FamilyHistoryController extends Controller
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
             'condition_type_id' => 'required',
             'description' => 'required',
             'relation' => 'required',
     


        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $FamilyHistory = new FamilyHistory;
            $FamilyHistory->condition_type_id = $request->input('condition_type_id');
            $FamilyHistory->description = $request->input('description');
            $FamilyHistory->relation = $request->input('relation');
           

            try {
                $FamilyHistory->save();

                return response()->json($FamilyHistory);
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
        $FamilyHistory = FamilyHistory::findOrFail($id);

        return response()->json($FamilyHistory);
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
             'condition_type_id' => 'required',
             'description' => 'required',
             'relation' => 'required',
     

        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $FamilyHistory = FamilyHistory::findOrFail($id);
            $FamilyHistory->condition_type_id = $request->input('condition_type_id');
            $FamilyHistory->description = $request->input('description');
            $FamilyHistory->relation = $request->input('relation');
           
           

            try {
                $FamilyHistory->save();

                return response()->json($FamilyHistory);
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
            $FamilyHistory = FamilyHistory::findOrFail($id);
            $FamilyHistory->delete();

            return response()->json($FamilyHistory, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
