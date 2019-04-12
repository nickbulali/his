

<?php

namespace App\Http\Controllers;

use App\Models\AntenatalHistory;
use Illuminate\Http\Request;

class AntenatalHistoryController extends Controller
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
             'test_id' => 'required',
             'is_drug' => 'required',
             'presentation' => 'required',
             'fhr' => 'required',
             'comments' => 'required',
             'date_of_next_visit' => 'required',



        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $AntenatalHistory = new AntenatalHistory;
            $AntenatalHistory->encounter_id = $request->input('encounter_id');
            $AntenatalHistory->test_id = $request->input('test_id');
            $AntenatalHistory->is_drug = $request->input('is_drug');
            $AntenatalHistory->presentation = $request->input('presentation');
            $AntenatalHistory->fhr = $request->input('fhr');
            $AntenatalHistory->comments = $request->input('comments');
            $AntenatalHistory->date_of_next_visit = $request->input('date_of_next_visit');

            try {
                $AntenatalHistory->save();

                return response()->json($AntenatalHistory);
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
        $AntenatalHistory = AntenatalHistory::findOrFail($id);

        return response()->json($AntenatalHistory);
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
             'test_id' => 'required',
             'is_drug' => 'required',
             'presentation' => 'required',
             'fhr' => 'required',
             'comments' => 'required',
             'date_of_next_visit' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $AntenatalHistory = AntenatalHistory::findOrFail($id);
            $AntenatalHistory->encounter_id = $request->input('encounter_id');
            $AntenatalHistory->test_id = $request->input('test_id');
            $AntenatalHistory->is_drug = $request->input('is_drug');
            $AntenatalHistory->presentation = $request->input('presentation');
            $AntenatalHistory->fhr = $request->input('fhr');
            $AntenatalHistory->comments = $request->input('comments');
            $AntenatalHistory->date_of_next_visit = $request->input('date_of_next_visit');

            try {
                $AntenatalHistory->save();

                return response()->json($AntenatalHistory);
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
            $AntenatalHistory = AntenatalHistory::findOrFail($id);
            $AntenatalHistory->delete();

            return response()->json($AntenatalHistory, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
