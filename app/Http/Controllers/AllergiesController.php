
<?php

namespace App\Http\Controllers;

use App\Models\Allergies;
use Illuminate\Http\Request;

class AllergiesController extends Controller
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
             'substance' => 'required',
             'fundal_height' => 'required',


        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Allergies = new Allergies;
            $Allergies->code_id = $request->input('code_id');
            $Allergies->substance = $request->input('substance');
            $Allergies->fundal_height = $request->input('fundal_height');

            try {
                $Allergies->save();

                return response()->json($Allergies);
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
        $Allergies = Allergies::findOrFail($id);

        return response()->json($Allergies);
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
             'substance' => 'required',
             'fundal_height' => 'required',

        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Allergies = Allergies::findOrFail($id);
            $Allergies->code_id = $request->input('code_id');
            $Allergies->substance = $request->input('substance');
            $Allergies->fundal_height = $request->input('fundal_height');

            try {
                $Allergies->save();

                return response()->json($Allergies);
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
            $Allergies = Allergies::findOrFail($id);
            $Allergies->delete();

            return response()->json($Allergies, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
