<?php
namespace App\Http\Controllers;
use App\Models\ConditionType;
use Illuminate\Http\Request;
class ConditionTypeController extends Controller
{
    public function index(Request $request)
    {
        $conditionTypes = ConditionType::orderBy('description', 'asc')->get();
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
            $conditionType = new ConditionTypes;
            $conditionType->code_id = $request->input('code_id');
            $conditionType->description = $request->input('description');
            try {
                $conditionType->save();
                return response()->json($conditionType);
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
        $conditionType = ConditionType::findOrFail($id);
        return response()->json($conditionType);
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
            $conditionType = ConditionType::findOrFail($id);
            $conditionType->code_id = $request->input('code_id');
            $conditionType->description = $request->input('description');
            try {
                $conditionType->save();
                return response()->json($conditionType);
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
            $conditionType = ConditionType::findOrFail($id);
            $conditionType->delete();
            return response()->json($conditionType, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
