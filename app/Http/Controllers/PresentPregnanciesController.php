<?php
namespace App\Http\Controllers;
use App\Models\PresentPregnancies;
use Illuminate\Http\Request;
class PresentPregnanciesController extends Controller
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
            $PresentPregnancies = new PresentPregnancies;
            $PresentPregnancies->reason_for_admission = $request->input('reason_for_admission');
            $PresentPregnancies->expected_date_of_delivery = $request->input('expected_date_of_delivery');
            $PresentPregnancies->gestation = $request->input('gestation');
            try {
                $PresentPregnancies->save();
                return response()->json($PresentPregnancies);
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
        $PresentPregnancies = PresentPregnancies::findOrFail($id);
        return response()->json($PresentPregnancies);
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
            $PresentPregnancies = PresentPregnancies::findOrFail($id);
            $PresentPregnancies->reason_for_admission = $request->input('reason_for_admission');
            $PresentPregnancies->expected_date_of_delivery = $request->input('expected_date_of_delivery');
            $PresentPregnancies->gestation = $request->input('gestation');
            try {
                $PresentPregnancies->save();
                return response()->json($PresentPregnancies);
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
            $PresentPregnancies = PresentPregnancies::findOrFail($id);
            $PresentPregnancies->delete();
            return response()->json($PresentPregnancies, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
