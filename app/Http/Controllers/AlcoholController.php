<?php
namespace App\Http\Controllers;
use App\Models\Alcohol;
use Illuminate\Http\Request;
class AlcoholController extends Controller
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
            $alcohol = new Alcohol;
            $alcohol->patient_id = $request->input('patient_id');
            $alcohol->kind = $request->input('kind');
            $alcohol->frequency = $request->input('frequency');
            $alcohol->quantity = $request->input('quantity');
            $alcohol->start_date = $request->input('start_date');
            $alcohol->end_date = $request->input('end_date');
            try {
                $alcohol->save();
                return response()->json($alcohol);
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
        $Alcohol = Alcohol::findOrFail($id);
        return response()->json($Alcohol);
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
            $alcohol = Alcohol::findOrFail($id);
            $alcohol->kind = $request->input('kind');
            $alcohol->frequency = $request->input('frequency');
            $alcohol->quantity = $request->input('quantity');
            $alcohol->start_date = $request->input('start_date');
            $alcohol->end_date = $request->input('end_date');
            try {
                $alcohol->save();
                return response()->json($alcohol);
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
            $Alcohol = Alcohol::findOrFail($id);
            $Alcohol->delete();
            return response()->json($Alcohol, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
