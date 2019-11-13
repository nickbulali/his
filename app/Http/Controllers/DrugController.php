<?php
namespace App\Http\Controllers;
use App\Models\Drug;
use Illuminate\Http\Request;
use DB;
class DrugController extends Controller
{
    public function index(Request $request)
    {

  if ($request->query('search')) {
            $search = $request->query('search');
            $drugs = Drug::where('trade_name', 'LIKE', "%{$search}%")
                ->get();
        } else {
            $drugs = Drug::get();
        }
        return response()->json($drugs);

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
             'price'=> 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $drug = new Drug;
            $drug->generic_name = $request->input('generic_name');
            $drug->trade_name = $request->input('trade_name');
            $drug->strength_value = $request->input('strength_value');
            $drug->strength_unit = $request->input('strength_unit');
            $drug->dosage_form = $request->input('dosage_form');
            $drug->administration_route = $request->input('administration_route');
            try {
                $drug->save();
                return response()->json($drug);
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
        $drug = Drug::findOrFail($id);
        return response()->json($drug);
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
            'price'=> 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $drug = Drug::findOrFail($id);
            $drug->generic_name = $request->input('generic_name');
            $drug->trade_name = $request->input('trade_name');
            $drug->strength_value = $request->input('strength_value');
            $drug->strength_unit = $request->input('strength_unit');
            $drug->dosage_form = $request->input('dosage_form');
            $drug->administration_route = $request->input('administration_route');
            $drugs->price = $request->input('price');
            try {
                $drug->save();
                return response()->json($drug);
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
            $drug = Drug::findOrFail($id);
            $drug->delete();
            return response()->json($drug, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
