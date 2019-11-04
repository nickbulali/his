<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use App\User;
use Auth;
class DiagnosisController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('search')) {
            $search = $request->query('search');
            $Diagnosis = Diagnosis::where('name', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $Diagnosis = Diagnosis::orderBy('id', 'ASC')->get();
        }

        return response()->json($Diagnosis);
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
            //'number' => 'required',
            //'expiry' => 'required',
            //'instrument_id' => 'required',
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Diagnosis = new Diagnosis;
            $Diagnosis->patient_id = $request->input('patient_id');
            $Diagnosis->user_id =Auth::user()->id;
            $Diagnosis->description = $request->input('description');
            try {
                $Diagnosis->save();

                return response()->json($Diagnosis);
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
        $Diagnosis = Diagnosis::wherePatientId($id)->get();

        return response()->json($Diagnosis);
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
            //'number' => 'required',
            //'expiry' => 'required',
            //'instrument_id' => 'required',
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Diagnosis = Diagnosis::findOrFail($id);
            $Diagnosis->patient_id = $request->input('patient_id');
            $Diagnosis->user_id =Auth::user()->id;
            $Diagnosis->description = $request->input('description');
            try {
                $Diagnosis->save();

                return response()->json($Diagnosis);
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
            $Diagnosis = Diagnosis::findOrFail($id);
            $Diagnosis->delete();

            return response()->json($Diagnosis, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}
