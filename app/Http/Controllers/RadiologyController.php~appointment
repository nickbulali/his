<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Radiology;

class RadiologyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('search')) {
            $search = $request->query('search');
            $Radiology = Radiology::where('name', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $Radiology = Radiology::orderBy('id', 'ASC')->paginate(10);
        }

        return response()->json($Radiology);
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
            //'number' => 'required',
            //'expiry' => 'required',
            //'instrument_id' => 'required',
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Radiology = new Radiology;
            $Radiology->testname = $request->input('testname');
            $Radiology->shortname = $request->input('shortname');
            $Radiology->testtype = $request->input('testtype');
            $Radiology->category = $request->input('category');
            $Radiology->charge = $request->input('charge');
            try {
                $Radiology->save();

                return response()->json($Radiology);
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
        $Radiology = Radiology::findOrFail($id);

        return response()->json($Radiology);
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
            //'number' => 'required',
            //'expiry' => 'required',
            //'instrument_id' => 'required',
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Radiology = Radiology::findOrFail($id);
            $Radiology->testname = $request->input('testname');
            $Radiology->shortname = $request->input('shortname');
            $Radiology->testtype = $request->input('testtype');
            $Radiology->category = $request->input('category');
            $Radiology->charge = $request->input('charge');

            try {
                $Radiology->save();

                return response()->json($Radiology);
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
            $Radiology = Radiology::findOrFail($id);
            $Radiology->delete();

            return response()->json($Radiology, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}
