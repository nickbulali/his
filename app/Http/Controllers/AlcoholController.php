<?php
namespace App\Http\Controllers;
use App\Models\SubstanceAbuse;
use Illuminate\Http\Request;
class SubstanceAbuseController extends Controller
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
            'substance_type_id' => 'required',
            'frequency' => 'required',
            'quantity' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $substanceAbuse = new SubstanceAbuse;
            $substanceAbuse->patient_id = $request->input('patient_id');
            $substanceAbuse->substance_type_id = $request->input('substance_type_id');
            $substanceAbuse->frequency = $request->input('frequency');
            $substanceAbuse->quantity = $request->input('quantity');
            $substanceAbuse->start_date = $request->input('start_date');
            $substanceAbuse->end_date = $request->input('end_date');
            try {
                $substanceAbuse->save();
                return response()->json($substanceAbuse);
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
        $substanceAbuse = SubstanceAbuse::findOrFail($id);
        return response()->json($substanceAbuse);
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
            'substance_type_id' => 'required',
            'frequency' => 'required',
            'quantity' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $substanceAbuse = SubstanceAbuse::findOrFail($id);
            $substanceAbuse->substance_type_id = $request->input('substance_type_id');
            $substanceAbuse->frequency = $request->input('frequency');
            $substanceAbuse->quantity = $request->input('quantity');
            $substanceAbuse->start_date = $request->input('start_date');
            $substanceAbuse->end_date = $request->input('end_date');
            try {
                $substanceAbuse->save();
                return response()->json($substanceAbuse);
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
            $substanceAbuse = SubstanceAbuse::findOrFail($id);
            $substanceAbuse->delete();
            return response()->json($substanceAbuse, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
