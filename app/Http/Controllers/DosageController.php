<?php
namespace App\Http\Controllers;
use App\Models\Dosage;
use Illuminate\Http\Request;
class DosageController extends Controller
{
    public function index(Request $request)
    {
          $Dosage = Dosage::orderBy('id', 'ASC')->get();
        return response()->json($Dosage);
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
            'description' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Dosage = new Dosage;
            $Dosage->description = $request->input('description');
            try {
                $Dosage->save();
                return response()->json($Dosage);
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
        $Dosage = Dosage::findOrFail($id);
        return response()->json($Dosage);
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
            'description' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Dosage = Dosage::findOrFail($id);
            $Dosage->description = $request->input('description');
            try {
                $Dosage->save();
                return response()->json($Dosage);
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
            $Dosage = Dosage::findOrFail($id);
            $Dosage->delete();
            return response()->json($Dosage, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
