<?php
namespace App\Http\Controllers;
use App\Models\LabTestType;
use Illuminate\Http\Request;
class LabTestTypeController extends Controller
{
    public function index(Request $request)
    {
        
            $LabTestType = LabTestType::orderBy('id', 'ASC')->paginate(10);

             return response()->json($LabTestType);
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
            'test_type_category_id' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $LabTestType = new LabTestType;
            $LabTestType->name = $request->input('name');
            $LabTestType->description = $request->input('description');
            $LabTestType->culture = $request->input('culture');
            $LabTestType->test_type_category_id = $request->input('test_type_category_id');
            $LabTestType->targetTAT = $request->input('targetTAT');
            try {
                $LabTestType->save();
                return response()->json($LabTestType->loader());
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
        return response()->json(LabTestType::find($id)->loader());
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
            'test_type_category_id' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $LabTestType = LabTestType::findOrFail($id);
            $LabTestType->name = $request->input('name');
            $LabTestType->description = $request->input('description');
            $LabTestType->culture = $request->input('culture');
            $LabTestType->test_type_category_id = $request->input('test_type_category_id');
            $LabTestType->targetTAT = $request->input('targetTAT');
            try {
                $LabTestType->save();
                return response()->json($LabTestType->loader());
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
            $LabTestType = LabTestType::findOrFail($id);
            $LabTestType->delete();
            return response()->json($LabTestType, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
