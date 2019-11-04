<?php
namespace App\Http\Controllers;
use App\Models\Smoking;
use Illuminate\Http\Request;
class SmokingController extends Controller
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
            $smoking = new Smoking;
            $smoking->patient_id = $request->input('patient_id');
            $smoking->kind = $request->input('kind');
            $smoking->frequency = $request->input('frequency');
            $smoking->quantity = $request->input('quantity');
            $smoking->start_date = $request->input('start_date');
            $smoking->end_date = $request->input('end_date');
            try {
                $smoking->save();
                return response()->json($smoking);
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
        $Smoking = Smoking::findOrFail($id);
        return response()->json($Smoking);
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
            $smoking = Smoking::findOrFail($id);
            $smoking->kind = $request->input('kind');
            $smoking->frequency = $request->input('frequency');
            $smoking->quantity = $request->input('quantity');
            $smoking->start_date = $request->input('start_date');
            $smoking->end_date = $request->input('end_date');
            try {
                $smoking->save();
                return response()->json($smoking);
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
            $Smoking = Smoking::findOrFail($id);
            $Smoking->delete();
            return response()->json($Smoking, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
