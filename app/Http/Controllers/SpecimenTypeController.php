<?php

namespace App\Http\Controllers;


use App\Models\SpecimenType;
use Illuminate\Http\Request;

class SpecimenTypeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('search')) {
            $search = $request->query('search');
            $specimenType = SpecimenType::where('name', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $specimenType = SpecimenType::orderBy('name', 'ASC')->paginate(10);
        }

        return response()->json($specimenType);
    }

    public function specimencollection($id)
    {
        $testTypes = SpecimenType::with('testTypes')->whereId($id)->get();

        return response()->json($testTypes);
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
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $specimenType = new SpecimenType;
            $specimenType->name = $request->input('name');

            try {
                $specimenType->save();

                return response()->json($specimenType);
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
        $specimenType = SpecimenType::findOrFail($id);

        return response()->json($specimenType);
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
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $specimenType = SpecimenType::findOrFail($id);
            $specimenType->name = $request->input('name');

            try {
                $specimenType->save();

                return response()->json($specimenType);
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
            $specimenType = SpecimenType::findOrFail($id);
            $specimenType->delete();

            return response()->json($specimenType, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
