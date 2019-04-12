
<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use Illuminate\Http\Request;

class DrugsController extends Controller
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
             'generic_name' => 'required',
             'trade_name' => 'required',
             'strength_value' => 'required',
             'strength_unit' => 'required',
             'dosage_form'=> 'required',
             'administration_route'=> 'required',

        



        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Drugs = new Drugs;
            $Drugs->generic_name = $request->input('generic_name');
            $Drugs->trade_name = $request->input('trade_name');
            $Drugs->strength_value = $request->input('strength_value');
            $Drugs->strength_unit = $request->input('strength_unit');
            $Drugs->dosage_form = $request->input('dosage_form');
            $Drugs->administration_route = $request->input('administration_route');
         
            try {
                $Drugs->save();

                return response()->json($Drugs);
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
        $Drugs = Drugs::findOrFail($id);

        return response()->json($Drugs);
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
              'generic_name' => 'required',
             'trade_name' => 'required',
             'strength_value' => 'required',
             'strength_unit' => 'required',
             'dosage_form'=> 'required',
             'administration_route'=> 'required',
            
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Drugs = Drugs::findOrFail($id);
            $Drugs->generic_name = $request->input('generic_name');
            $Drugs->trade_name = $request->input('trade_name');
            $Drugs->strength_value = $request->input('strength_value');
            $Drugs->strength_unit = $request->input('strength_unit');
            $Drugs->dosage_form = $request->input('dosage_form');
            $Drugs->administration_route = $request->input('administration_route');
         
            try {
                $Drugs->save();

                return response()->json($Drugs);
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
            $Drugs = Drugs::findOrFail($id);
            $Drugs->delete();

            return response()->json($Drugs, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
