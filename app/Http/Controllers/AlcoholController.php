<?php
namespace App\Http\Controllers;
use App\Models\Alcohol;
use Illuminate\Http\Request;
class HabitController extends Controller
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
            'kind' => 'required',
            'frequency' => 'required',
            'quantity' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $habit = new Alcohol;
            $habit->patient_id = $request->input('patient_id');
            $habit->kind = $request->input('kind');
            $habit->frequency = $request->input('frequency');
            $habit->quantity = $request->input('quantity');
            $habit->start_date = $request->input('start_date');
            $habit->end_date = $request->input('end_date');
            try {
                $habit->save();
                return response()->json($habit);
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
        $habit = Alcohol::findOrFail($id);
        return response()->json($habit);
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
            'kind' => 'required',
            'frequency' => 'required',
            'quantity' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $habit = Alcohol::findOrFail($id);
            $habit->kind = $request->input('kind');
            $habit->frequency = $request->input('frequency');
            $habit->quantity = $request->input('quantity');
            $habit->start_date = $request->input('start_date');
            $habit->end_date = $request->input('end_date');
            try {
                $habit->save();
                return response()->json($habit);
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
            $habit = Alcohol::findOrFail($id);
            $habit->delete();
            return response()->json($habit, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
