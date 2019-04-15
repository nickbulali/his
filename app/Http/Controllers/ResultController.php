<?php
namespace App\Http\Controllers;
use App\Models\Result;
use Illuminate\Http\Request;
class ResultController extends Controller
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
            'test_id' => 'required',
            'parameter'=> 'required',
            'measure_id' => 'required',
            'result' => 'required',
            'lab_result_type_id' => 'required',
            'time_entered'=> 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Result = new Result;
            $Result->test_id = $request->input('test_id');
            $Result->parameter = $request->input('parameter');
            $Result->measure_id = $request->input('measure_id');
            $Result->result = $request->input('result');
            $Result->lab_result_type_id = $request->input('lab_result_type_id');
            $Result->time_entered = $request->input('time_entered');
            try {
                $Result->save();
                return response()->json($Result);
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
        $Result = Result::findOrFail($id);
        return response()->json($Result);
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
            'test_id' => 'required',
            'parameter'=> 'required',
            'measure_id' => 'required',
            'result' => 'required',
            'lab_result_type_id' => 'required',
            'time_entered'=> 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Result = Result::findOrFail($id);
            $Result->test_id = $request->input('test_id');
            $Result->parameter = $request->input('parameter');
            $Result->measure_id = $request->input('measure_id');
            $Result->result = $request->input('result');
            $Result->lab_result_type_id = $request->input('lab_result_type_id');
            $Result->time_entered = $request->input('time_entered');
            try {
                $Result->save();
                return response()->json($Result);
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
            $Result = Result::findOrFail($id);
            $Result->delete();
            return response()->json($Result, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
