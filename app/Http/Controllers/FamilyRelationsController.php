<?php
namespace App\Http\Controllers;
use App\Models\FamilyRelation;
use Illuminate\Http\Request;
class FamilyRelationsController extends Controller
{
    public function index(Request $request)
    {
        $familyRelation = FamilyRelation::orderBy('display', 'asc')->get();
        return response()->json($familyRelation);
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
            'condition_type_id' => 'required',
            'description' => 'required',
            'relation' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $familyRelation = new FamilyRelation;
            $familyRelation->condition_type_id = $request->input('condition_type_id');
            $familyRelation->description = $request->input('description');
            $familyRelation->relation = $request->input('relation');
            try {
                $familyRelation->save();
                return response()->json($familyRelation);
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
        $familyRelation = FamilyRelation::findOrFail($id);
        return response()->json($familyRelation);
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
            'condition_type_id' => 'required',
            'description' => 'required',
            'relation' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $familyRelation = FamilyRelation::findOrFail($id);
            $familyRelation->condition_type_id = $request->input('condition_type_id');
            $familyRelation->description = $request->input('description');
            $familyRelation->relation = $request->input('relation');
            try {
                $familyRelation->save();
                return response()->json($familyRelation);
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
            $familyRelation = FamilyRelation::findOrFail($id);
            $familyRelation->delete();
            return response()->json($familyRelation, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
