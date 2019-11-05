<?php
namespace App\Http\Controllers;
use App\Models\PresentPregnancy;
use Illuminate\Http\Request;
class PresentPregnancyController extends Controller
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
            'last_normal_menstrual_period' => 'required',
            'expected_date_of_delivery' => 'required',
            'gestation' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $PresentPregnancy = new PresentPregnancy;
            $PresentPregnancy->reason_for_admission = $request->input('reason_for_admission');
            $PresentPregnancy->expected_date_of_delivery = $request->input('expected_date_of_delivery');
            $PresentPregnancy->gestation = $request->input('gestation');
            try {
                $PresentPregnancy->save();
                return response()->json($PresentPregnancy);
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
        $PresentPregnancy = PresentPregnancy::findOrFail($id);
        return response()->json($PresentPregnancy);
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
            'reason_for_admission' => 'required',
            'expected_date_of_delivery' => 'required',
            'gestation' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $PresentPregnancy = PresentPregnancy::findOrFail($id);
            $PresentPregnancy->reason_for_admission = $request->input('reason_for_admission');
            $PresentPregnancy->expected_date_of_delivery = $request->input('expected_date_of_delivery');
            $PresentPregnancy->gestation = $request->input('gestation');
            try {
                $PresentPregnancy->save();
                return response()->json($PresentPregnancy);
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
            $PresentPregnancy = PresentPregnancy::findOrFail($id);
            $PresentPregnancy->delete();
            return response()->json($PresentPregnancy, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
