<?php
namespace App\Http\Controllers;
use App\Models\SocialHistory;
use Illuminate\Http\Request;
class SocialHistoryController extends Controller
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
            'occupation' => 'required',
            'residence' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $SocialHistory = new SocialHistory;
            $SocialHistory->occupation = $request->input('occupation');
            $SocialHistory->residence = $request->input('residence');
            try {
                $SocialHistory->save();
                return response()->json($SocialHistory);
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
        $SocialHistory = SocialHistory::findOrFail($id);
        return response()->json($SocialHistory);
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
            'occupation' => 'required',
            'residence' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $SocialHistory = SocialHistory::findOrFail($id);
            $SocialHistory->occupation = $request->input('occupation');
            $SocialHistory->residence = $request->input('residence');
            try {
                $SocialHistory->save();
                return response()->json($SocialHistory);
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
            $SocialHistory = SocialHistory::findOrFail($id);
            $SocialHistory->delete();
            return response()->json($SocialHistory, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
