<?php
namespace App\Http\Controllers;
use App\Models\PresentingIllness;
use Illuminate\Http\Request;
class PresentingIllnessController extends Controller
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
            'comment' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $PresentingIllness = new PresentingIllness;
            $PresentingIllness->comment = $request->input('comment');
            try {
                $PresentingIllness->save();
                return response()->json($PresentingIllness);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }
    /**
     * comment the specified resource.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PresentingIllness = PresentingIllness::findOrFail($id);
        return response()->json($PresentingIllness);
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
            'comment' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $PresentingIllness = PresentingIllness::findOrFail($id);
            $PresentingIllness->comment = $request->input('comment');
            try {
                $PresentingIllness->save();
                return response()->json($PresentingIllness);
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
            $PresentingIllness = PresentingIllness::findOrFail($id);
            $PresentingIllness->delete();
            return response()->json($PresentingIllness, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
