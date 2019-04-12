
<?php

namespace App\Http\Controllers;

use App\Models\DrugCatgeories;
use Illuminate\Http\Request;

class DrugCatgeoriesController extends Controller
{
    public function index()
    {
        $DrugCatgeories = DrugCatgeories::orderBy('id', 'ASC')->paginate(10);

        return response()->json($DrugCatgeories);
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
             $DrugCatgeories = new DrugCatgeories;
             $DrugCatgeories->description = $request->input('description');

            try {
                $DrugCatgeories->save();

                return response()->json($DrugCatgeories);
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
        $DrugCatgeories = DrugCatgeories::findOrFail($id);

        return response()->json($DrugCatgeories);
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
            $DrugCatgeories = DrugCatgeories::findOrFail($id);
            $DrugCatgeories->description = $request->input('description');

            try {
                $DrugCatgeories->save();

                return response()->json($DrugCatgeories);
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
            $DrugCatgeories = DrugCatgeories::findOrFail($id);
            $DrugCatgeories->delete();

            return response()->json($DrugCatgeories, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
