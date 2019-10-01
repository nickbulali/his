<?php
namespace App\Http\Controllers;
use App\Models\Admissions;
use Illuminate\Http\Request;
class AdmissionController extends Controller
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
            'reason_for_admission' => 'required',
            'reason_for_discharge' => 'required',
            'comments' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Admissions = new Admissions;
            $Admissions->reason_for_admission = $request->input('reason_for_admission');
            $Admissions->reason_for_discharge = $request->input('reason_for_discharge');
            $Admissions->comments = $request->input('comments');
            try {
                $Admissions->save();
                return response()->json($Admissions);
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
        $Admissions = Admissions::findOrFail($id);
        return response()->json($Admissions);
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
            'reason_for_admission' => 'required',
            'reason_for_discharge' => 'required',
            'comments' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Admissions = Admissions::findOrFail($id);
            $Admissions->reason_for_admission = $request->input('reason_for_admission');
            $Admissions->reason_for_discharge = $request->input('reason_for_discharge');
            $Admissions->comments = $request->input('comments');
            try {
                $Admissions->save();
                return response()->json($Admissions);
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
            $Admissions = Admissions::findOrFail($id);
            $Admissions->delete();
            return response()->json($Admissions, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
