
<?php

namespace App\Http\Controllers;

use App\Models\ConditionTypes;
use Illuminate\Http\Request;

class ConditionTypesController extends Controller
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
             'code_id' => 'required',
             'description' => 'required',
     


        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $ConditionTypes = new ConditionTypes;
            $ConditionTypes->code_id = $request->input('code_id');
            $ConditionTypes->description = $request->input('description');
           

            try {
                $ConditionTypes->save();

                return response()->json($ConditionTypes);
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
        $ConditionTypes = ConditionTypes::findOrFail($id);

        return response()->json($ConditionTypes);
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
             'code_id' => 'required',
             'description' => 'required',
     

        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $ConditionTypes = ConditionTypes::findOrFail($id);
            $ConditionTypes->code_id = $request->input('code_id');
            $ConditionTypes->description = $request->input('description');
           

            try {
                $ConditionTypes->save();

                return response()->json($ConditionTypes);
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
            $ConditionTypes = ConditionTypes::findOrFail($id);
            $ConditionTypes->delete();

            return response()->json($ConditionTypes, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
