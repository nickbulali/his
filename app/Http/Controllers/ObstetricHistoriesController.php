<?php
namespace App\Http\Controllers;
use App\Models\ObstetricHistories;
use Illuminate\Http\Request;
class ObstetricHistoriesController extends Controller
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
            'year' => 'required',
            'place' => 'required',
            'maturity' => 'required',
            'type_of_delivery' => 'required',
            'bwt' => 'required',
            'sex' => 'required',
            'fate' => 'required',
            'puerperium' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $ObstetricHistories = new ObstetricHistories;
            $ObstetricHistories->year = $request->input('year');
            $ObstetricHistories->place = $request->input('place');
            $ObstetricHistories->maturity = $request->input('maturity');
            $ObstetricHistories->type_of_delivery = $request->input('type_of_delivery');
            $ObstetricHistories->bwt = $request->input('bwt');
            $ObstetricHistories->sex = $request->input('sex');
            $ObstetricHistories->fate = $request->input('fate');
            $ObstetricHistories->puerperium = $request->input('puerperium');
            try {
                $ObstetricHistories->save();
                return response()->json($ObstetricHistories);
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
        $ObstetricHistories = ObstetricHistories::findOrFail($id);
        return response()->json($ObstetricHistories);
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
              'year' => 'required',
            'place' => 'required',
            'maturity' => 'required',
            'type_of_delivery' => 'required',
            'bwt' => 'required',
            'sex' => 'required',
            'fate' => 'required',
            'puerperium' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $ObstetricHistories = ObstetricHistories::findOrFail($id);
            $ObstetricHistories->year = $request->input('year');
            $ObstetricHistories->place = $request->input('place');
            $ObstetricHistories->maturity = $request->input('maturity');
            $ObstetricHistories->type_of_delivery = $request->input('type_of_delivery');
            $ObstetricHistories->bwt = $request->input('bwt');
            $ObstetricHistories->sex = $request->input('sex');
            $ObstetricHistories->fate = $request->input('fate');
            $ObstetricHistories->puerperium = $request->input('puerperium');
            try {
                $ObstetricHistories->save();
                return response()->json($ObstetricHistories);
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
            $ObstetricHistories = ObstetricHistories::findOrFail($id);
            $ObstetricHistories->delete();
            return response()->json($ObstetricHistories, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
