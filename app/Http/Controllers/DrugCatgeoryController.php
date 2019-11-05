<?php
namespace App\Http\Controllers;
use App\Models\DrugCatgeories;
use Illuminate\Http\Request;
class DrugCatgeoryController extends Controller
{
    public function index()
    {
        $drugCatgeories = DrugCatgeory::orderBy('id', 'ASC')->paginate(10);
        return response()->json($drugCatgeories);
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
        	'description' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
             $drugCatgeory = new DrugCatgeory;
             $drugCatgeory->description = $request->input('description');
            try {
                $drugCatgeory->save();
                return response()->json($drugCatgeory);
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
        $drugCatgeory = DrugCatgeory::findOrFail($id);
        return response()->json($drugCatgeory);
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
        	   'description' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $drugCatgeory = DrugCatgeory::findOrFail($id);
            $drugCatgeory->description = $request->input('description');
            try {
                $drugCatgeory->save();
                return response()->json($drugCatgeory);
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
            $drugCatgeory = DrugCatgeory::findOrFail($id);
            $drugCatgeory->delete();
            return response()->json($drugCatgeory, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
