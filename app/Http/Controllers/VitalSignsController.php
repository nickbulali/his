<?php
namespace App\Http\Controllers;
use App\Models\VitalSigns;
use App\Models\Queue;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class VitalSignsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('search')) {
            $search = $request->query('search');
            $vitalSigns = VitalSigns::with('patient.name')->where('description', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $vitalSigns = VitalSigns::with('patient.name')->orderBy('id', 'ASC')->paginate(10)->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d');
        });
        }

        return response()->json($vitalSigns);

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
            $vitalSigns = new VitalSigns;
            $vitalSigns->patient_id = $request->input('patient_id');

            $vitalSigns->body_temperature = $request->input('body_temperature');
            $vitalSigns->respiratory_rate = $request->input('respiratory_rate');
            $vitalSigns->heart_rate = $request->input('heart_rate');
            $vitalSigns->blood_pressure = $request->input('blood_pressure');
            $vitalSigns->height = $request->input('height');
            $vitalSigns->weight = $request->input('weight');
            $vitalSigns->body_mass_index = $request->input('body_mass_index');
            $vitalSigns->body_surface_area = $request->input('body_surface_area');

            $queue = Queue::wherePatient_id($request->input('patient_id'))->orderBy('created_at', 'desc')->first();;
            $queue->queue_status_id = 3;

            try {
                $queue->save();
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }

            try {
                $vitalSigns->save();
                return response()->json($vitalSigns);
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
        $vitalSigns = VitalSigns::wherePatientId($id)->get();
        return response()->json($vitalSigns);
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
            $vitalSigns = VitalSigns::findOrFail($id);
            $vitalSigns->patient_id = $request->input('patient_id');
            $vitalSigns->body_temperature = $request->input('body_temperature');
            $vitalSigns->respiratory_rate = $request->input('respiratory_rate');
            $vitalSigns->heart_rate = $request->input('heart_rate');
            $vitalSigns->blood_pressure = $request->input('blood_pressure');

            $vitalSigns->height = $request->input('height');
            $vitalSigns->weight = $request->input('weight');
            $vitalSigns->body_mass_index = $request->input('body_mass_index');
            $vitalSigns->body_surface_area = $request->input('body_surface_area');
            try {
                $vitalSigns->save();
                return response()->json($vitalSigns);
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
            $vitalSigns = VitalSigns::findOrFail($id);
            $vitalSigns->delete();
            return response()->json($vitalSigns, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
