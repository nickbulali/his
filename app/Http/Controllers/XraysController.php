
<?php

namespace App\Http\Controllers;

use App\Models\Xrays;
use Illuminate\Http\Request;

class XraysController extends Controller
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
             'encounter_id' => 'required',
             'image_url' => 'required',
             'comments' => 'required',


        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Xrays = new Xrays;
            $Xrays->encounter_id = $request->input('encounter_id');
            $Xrays->image_url = $request->input('image_url');
            $Xrays->comments = $request->input('comments');

            try {
                $Xrays->save();

                return response()->json($Xrays);
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
        $Xrays = Xrays::findOrFail($id);

        return response()->json($Xrays);
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
             'encounter_id' => 'required',
             'image_url' => 'required',
             'comments' => 'required',

        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Xrays = Xrays::findOrFail($id);
            $Xrays->encounter_id = $request->input('encounter_id');
            $Xrays->image_url = $request->input('image_url');
            $Xrays->comments = $request->input('comments');

            try {
                $Xrays->save();

                return response()->json($Xrays);
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
            $Xrays = Xrays::findOrFail($id);
            $Xrays->delete();

            return response()->json($Xrays, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
