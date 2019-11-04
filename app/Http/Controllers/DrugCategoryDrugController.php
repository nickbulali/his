<?php
namespace App\Http\Controllers;
use App\Models\DrugCategoryDrug;
use Illuminate\Http\Request;
class DrugCategoryDrugController extends Controller
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
            'drug_id' => 'required',
            'drug_category_id' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $drugCategoryDrug = new DrugCategoryDrug;
            $drugCategoryDrug->drug_id = $request->input('drug_id');
            $drugCategoryDrug->drug_category_id = $request->input('drug_category_id');
            try {
                $drugCategoryDrug->save();
                return response()->json($drugCategoryDrug);
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
        $drugCategoryDrug = DrugCategoryDrug::findOrFail($id);
        return response()->json($drugCategoryDrug);
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
            'drug_id' => 'required',
            'drug_category_id' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $drugCategoryDrug = DrugCategoryDrug::findOrFail($id);
            $drugCategoryDrug->drug_id = $request->input('drug_id');
            $drugCategoryDrug->drug_category_id = $request->input('drug_category_id');
            try {
                $drugCategoryDrug->save();
                return response()->json($drugCategoryDrug);
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
            $drugCategoryDrug = DrugCategoryDrug::findOrFail($id);
            $drugCategoryDrug->delete();
            return response()->json($drugCategoryDrug, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
