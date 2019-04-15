<?php
namespace App\Http\Controllers;
use App\Models\DrugAbuse;
use Illuminate\Http\Request;
class DrugAbuseController extends Controller
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
            $DrugAbuse = new DrugAbuse;
            $DrugAbuse->kind = $request->input('kind');
            $DrugAbuse->frequency = $request->input('frequency');
            $DrugAbuse->quantity = $request->input('quantity');
            try {
                $DrugAbuse->save();
                return response()->json($DrugAbuse);
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
        $DrugAbuse = DrugAbuse::findOrFail($id);
        return response()->json($DrugAbuse);
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
            $DrugAbuse = DrugAbuse::findOrFail($id);
            $DrugAbuse->kind = $request->input('kind');
            $DrugAbuse->frequency = $request->input('frequency');
            $DrugAbuse->quantity = $request->input('quantity');
            try {
                $DrugAbuse->save();
                return response()->json($DrugAbuse);
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
            $DrugAbuse = DrugAbuse::findOrFail($id);
            $DrugAbuse->delete();
            return response()->json($DrugAbuse, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
