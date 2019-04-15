<?php
namespace App\Http\Controllers;
use App\Models\Conditions;
use Illuminate\Http\Request;
class ConditionsController extends Controller
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
            'comments' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Conditions = new Conditions;
            $Conditions->condition_type_id = $request->input('condition_type_id');
            $Conditions->comments = $request->input('comments');
            try {
                $Conditions->save();
                return response()->json($Conditions);
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
        $Conditions = Conditions::findOrFail($id);
        return response()->json($Conditions);
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
            $Conditions = Conditions::findOrFail($id);
            $Conditions->condition_type_id = $request->input('condition_type_id');
            $Conditions->comments = $request->input('comments');
            try {
                $Conditions->save();
                return response()->json($Conditions);
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
            $Conditions = Conditions::findOrFail($id);
            $Conditions->delete();
            return response()->json($Conditions, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
