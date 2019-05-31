<?php
namespace App\Http\Controllers;
use App\Models\ConditionTypes;
use Illuminate\Http\Request;
class ConditionTypesController extends Controller
{
    public function index(Request $request)
    {
        $conditionTypes = ConditionTypes::orderBy('description', 'asc')->get();
        return response()->json($conditionTypes);
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
            $conditionTypes = new ConditionTypes;
            $conditionTypes->code_id = $request->input('code_id');
            $conditionTypes->description = $request->input('description');
            try {
                $conditionTypes->save();
                return response()->json($conditionTypes);
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
        $conditionTypes = ConditionTypes::findOrFail($id);
        return response()->json($conditionTypes);
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
            $conditionTypes = ConditionTypes::findOrFail($id);
            $conditionTypes->code_id = $request->input('code_id');
            $conditionTypes->description = $request->input('description');
            try {
                $conditionTypes->save();
                return response()->json($conditionTypes);
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
            $conditionTypes = ConditionTypes::findOrFail($id);
            $conditionTypes->delete();
            return response()->json($conditionTypes, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
