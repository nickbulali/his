<?php
namespace App\Http\Controllers;
use App\Models\Condition;
use Illuminate\Http\Request;
class ConditionController extends Controller
{
    public function index(Request $request)
    {
        $conditions = Condition::orderBy('created_at', 'desc')
                ->paginate(15);
        return response()->json($conditions);
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
            'comments' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $condition = new Conditions;
            $condition->condition_type_id = $request->input('condition_type_id');
            $condition->comments = $request->input('comments');
            try {
                $condition->save();
                return response()->json($condition);
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
        $condition = Condition::findOrFail($id);
        return response()->json($condition);
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
            'comments' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $condition = Condition::findOrFail($id);
            $condition->condition_type_id = $request->input('condition_type_id');
            $condition->comments = $request->input('comments');
            try {
                $condition->save();
                return response()->json($condition);
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
            $condition = Condition::findOrFail($id);
            $condition->delete();
            return response()->json($condition, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
