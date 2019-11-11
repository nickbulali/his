<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LabTestTypeCategory;
class LabTestTypeCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('search')) {
            $search = $request->query('search');
            $LabTestTypeCategory = LabTestTypeCategory::where('name', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $LabTestTypeCategory = LabTestTypeCategory::orderBy('id', 'ASC')->paginate(10);
        }
        return response()->json($LabTestTypeCategory);
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
            'name' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $LabTestTypeCategory = new LabTestTypeCategory;
            $LabTestTypeCategory->code = $request->input('code');
            $LabTestTypeCategory->name = $request->input('name');
            try {
                $LabTestTypeCategory->save();
                return response()->json($LabTestTypeCategory);
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
        $LabTestTypeCategory = LabTestTypeCategory::findOrFail($id);
        return response()->json($LabTestTypeCategory);
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
            'name' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $LabTestTypeCategory = LabTestTypeCategory::findOrFail($id);
            $LabTestTypeCategory->code = $request->input('code');
            $LabTestTypeCategory->name = $request->input('name');
            try {
                $LabTestTypeCategory->save();
                return response()->json($LabTestTypeCategory);
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
            return response()->json(LabTestTypeCategory::destroy($id), 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
