<?php
namespace App\Http\Controllers;
use App\Models\MaritalStatus;
use Illuminate\Http\Request;
class MaritalStatusController extends Controller
{
    public function index()
    {
        $maritalStatus = MaritalStatus::orderBy('id', 'ASC')->get();
        return response()->json($maritalStatus);
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
            'code' => 'required',
            'display' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $maritalStatus = new MaritalStatus;
            $maritalStatus->code = $request->input('code');
            $maritalStatus->display = $request->input('display');
            try {
                $maritalStatus->save();
                return response()->json($maritalStatus);
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
        $maritalStatus = MaritalStatus::findOrFail($id);
        return response()->json($MaritalStatus);
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
            'code' => 'required',
            'display' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $maritalStatus = MaritalStatus::findOrFail($id);
            $maritalStatus->code = $request->input('code');
            $maritalStatus->display = $request->input('display');
            try {
                $maritalStatus->save();
                return response()->json($maritalStatus);
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
            $maritalStatus = MaritalStatus::findOrFail($id);
            $maritalStatus->delete();
            return response()->json($maritalStatus, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
