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
            $Smoking = new Smoking;
            $Smoking->kind = $request->input('kind');
            $Smoking->frequency = $request->input('frequency');
            $Smoking->quantity = $request->input('quantity');
            try {
                $Smoking->save();
                return response()->json($Smoking);
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
            $Smoking = Smoking::findOrFail($id);
            $Smoking->kind = $request->input('kind');
            $Smoking->frequency = $request->input('frequency');
            $Smoking->quantity = $request->input('quantity');
            try {
                $Smoking->save();
                return response()->json($Smoking);
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
