<?php
namespace App\Http\Controllers;
use App\Models\PresentingComplaint;
use Illuminate\Http\Request;
class PresentingComplaintController extends Controller
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
            $presentingComplaint = new PresentingComplaint;
            $presentingComplaint->comment = $request->input('comment');
            try {
                $presentingComplaint->save();
                return response()->json($presentingComplaint);
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
        $presentingComplaint = PresentingComplaint::findOrFail($id);
        return response()->json($presentingComplaint);
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
            $presentingComplaint = PresentingComplaint::findOrFail($id);
            $presentingComplaint->comment = $request->input('comment');
            try {
                $presentingComplaint->save();
                return response()->json($presentingComplaint);
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
            $presentingComplaint = PresentingComplaint::findOrFail($id);
            $presentingComplaint->delete();
            return response()->json($presentingComplaint, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
