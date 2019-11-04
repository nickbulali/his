<?php
namespace App\Http\Controllers;
use App\Models\Allergy;
use Illuminate\Http\Request;

class AllergyController extends Controller
{
    public function index(Request $request)
    {
        $Allergy = Allergy::orderBy('substance', 'asc')->get();
        return response()->json($Allergy);
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
            $Allergy = new Allergy;
            $Allergy->code_id = $request->input('code_id');
            $Allergy->substance = $request->input('substance');
            $Allergy->fundal_height = $request->input('fundal_height');
            try {
                $Allergy->save();
                return response()->json($Allergy);
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
        $Allergy = Allergy::findOrFail($id);
        return response()->json($Allergy);
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
            $Allergy = Allergy::findOrFail($id);
            $Allergy->code_id = $request->input('code_id');
            $Allergy->substance = $request->input('substance');
            $Allergy->fundal_height = $request->input('fundal_height');
            try {
                $Allergy->save();
                return response()->json($Allergy);
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
            $Allergy = Allergy::findOrFail($id);
            $Allergy->delete();
            return response()->json($Allergy, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
