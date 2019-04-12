
<?php

namespace App\Http\Controllers;

use App\Models\AnthropometricMeasurements;
use Illuminate\Http\Request;

class AnthropometricMeasurementsController extends Controller
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
             'height' => 'required',
             'weight' => 'required',
             'body_mass_index' => 'required',
             'body_surface_area' => 'required',
        



        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $AnthropometricMeasurements = new AnthropometricMeasurements;
            $AnthropometricMeasurements->height = $request->input('height');
            $AnthropometricMeasurements->weight = $request->input('weight');
            $AnthropometricMeasurements->body_mass_index = $request->input('body_mass_index');
            $AnthropometricMeasurements->body_surface_area = $request->input('body_surface_area');
         
            try {
                $AnthropometricMeasurements->save();

                return response()->json($AnthropometricMeasurements);
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
        $AnthropometricMeasurements = AnthropometricMeasurements::findOrFail($id);

        return response()->json($AnthropometricMeasurements);
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
              'height' => 'required',
             'weight' => 'required',
             'body_mass_index' => 'required',
             'body_surface_area' => 'required',
            
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $AnthropometricMeasurements = AnthropometricMeasurements::findOrFail($id);
            $AnthropometricMeasurements->height = $request->input('height');
            $AnthropometricMeasurements->weight = $request->input('weight');
            $AnthropometricMeasurements->body_mass_index = $request->input('body_mass_index');
            $AnthropometricMeasurements->body_surface_area = $request->input('body_surface_area');
         
            try {
                $AnthropometricMeasurements->save();

                return response()->json($AnthropometricMeasurements);
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
            $AnthropometricMeasurements = AnthropometricMeasurements::findOrFail($id);
            $AnthropometricMeasurements->delete();

            return response()->json($AnthropometricMeasurements, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
