<?php
namespace App\Http\Controllers;
use App\Models\VitalSigns;
use Illuminate\Http\Request;
use DB;
class VitalSignsController extends Controller
{
    public function index(Request $request)
    {


 if ($request->query('search')) {
            $search = $request->query('search');
            $VitalSigns = VitalSigns::with('patient.name')->where('description', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $VitalSigns = VitalSigns::with('patient.name')->orderBy('id', 'ASC')->paginate(10);
        }

        return response()->json($VitalSigns);

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
           
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $VitalSigns = new VitalSigns;
           $VitalSigns->patient_id = $request->input('patient_id');

            $VitalSigns->body_temperature = $request->input('body_temperature');
            $VitalSigns->respiratory_rate = $request->input('respiratory_rate');
            $VitalSigns->heart_rate = $request->input('heart_rate');
            $VitalSigns->blood_pressure = $request->input('blood_pressure');
            $VitalSigns->height = $request->input('height');
            $VitalSigns->weight = $request->input('weight');
            $VitalSigns->body_mass_index = $request->input('body_mass_index');
            $VitalSigns->body_surface_area = $request->input('body_surface_area');
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
    
    ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $VitalSigns = VitalSigns::findOrFail($id);
            $VitalSigns->patient_id = $request->input('patient_id');
            $VitalSigns->body_temperature = $request->input('body_temperature');
            $VitalSigns->respiratory_rate = $request->input('respiratory_rate');
            $VitalSigns->heart_rate = $request->input('heart_rate');
            $VitalSigns->blood_pressure = $request->input('blood_pressure');

            $VitalSigns->height = $request->input('height');
            $VitalSigns->weight = $request->input('weight');
            $VitalSigns->body_mass_index = $request->input('body_mass_index');
            $VitalSigns->body_surface_area = $request->input('body_surface_area');
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
