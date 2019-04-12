
<?php

namespace App\Http\Controllers;

use App\Models\ResultType;
use Illuminate\Http\Request;

class ResultTypeController extends Controller
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
             'test_type_id' => 'required',
             'specimen_type_id' => 'required',
     


        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $ResultType = new ResultType;
            $ResultType->code_id = $request->input('code_id');
            $ResultType->test_type_id = $request->input('test_type_id');
            $ResultType->specimen_type_id = $request->input('specimen_type_id');
           

            try {
                $ResultType->save();

                return response()->json($ResultType);
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
        $ResultType = ResultType::findOrFail($id);

        return response()->json($ResultType);
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
             'test_type_id' => 'required',
             'specimen_type_id' => 'required',
     

        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $ResultType = ResultType::findOrFail($id);
            $ResultType->code_id = $request->input('code_id');
            $ResultType->test_type_id = $request->input('test_type_id');
            $ResultType->specimen_type_id = $request->input('specimen_type_id');
           
           

            try {
                $ResultType->save();

                return response()->json($ResultType);
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
            $ResultType = ResultType::findOrFail($id);
            $ResultType->delete();

            return response()->json($ResultType, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
