<?php
namespace App\Http\Controllers;
use App\Models\VitalSigns;
use Illuminate\Http\Request;
class VitalSignsController extends Controller
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
            'body_temperature' => 'required',
            'respiratory_rate' => 'required',
            'heart_rate' => 'required',
            'blood_pressure' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $VitalSigns = new VitalSigns;
            $VitalSigns->body_temperature = $request->input('body_temperature');
            $VitalSigns->respiratory_rate = $request->input('respiratory_rate');
            $VitalSigns->heart_rate = $request->input('heart_rate');
            $VitalSigns->blood_pressure = $request->input('blood_pressure');
            try {
                $VitalSigns->save();
                return response()->json($VitalSigns);
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
        $VitalSigns = VitalSigns::findOrFail($id);
        return response()->json($VitalSigns);
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
              'body_temperature' => 'required',
            'respiratory_rate' => 'required',
            'heart_rate' => 'required',
            'blood_pressure' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $VitalSigns = VitalSigns::findOrFail($id);
            $VitalSigns->body_temperature = $request->input('body_temperature');
            $VitalSigns->respiratory_rate = $request->input('respiratory_rate');
            $VitalSigns->heart_rate = $request->input('heart_rate');
            $VitalSigns->blood_pressure = $request->input('blood_pressure');
            try {
                $VitalSigns->save();
                return response()->json($VitalSigns);
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
            $VitalSigns = VitalSigns::findOrFail($id);
            $VitalSigns->delete();
            return response()->json($VitalSigns, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
