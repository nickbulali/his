<?php
namespace App\Http\Controllers;
use App\Models\GynecologicHistories;
use Illuminate\Http\Request;
class GynecologicHistoriesController extends Controller
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
            'age_at_menarche' => 'required',
            'duration_of_menstrual_cycle' => 'required',
            'length_of_menstrual_cycle' => 'required',
            'any_menstrual_problem' => 'required',
            'history_of_sti' => 'required',
            'history_of_gynecological_operation' => 'required',
            'contraception_history' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $GynecologicHistories = new GynecologicHistories;
            $GynecologicHistories->age_at_menarche = $request->input('age_at_menarche');
            $GynecologicHistories->duration_of_menstrual_cycle = $request->input('duration_of_menstrual_cycle');
            $GynecologicHistories->length_of_menstrual_cycle = $request->input('length_of_menstrual_cycle');
            $GynecologicHistories->any_menstrual_problem = $request->input('any_menstrual_problem');
            $GynecologicHistories->history_of_sti = $request->input('history_of_sti');
            $GynecologicHistories->history_of_gynecological_operation = $request->input('history_of_gynecological_operation');
            $GynecologicHistories->contraception_history = $request->input('contraception_history');
            try {
                $GynecologicHistories->save();
                return response()->json($GynecologicHistories);
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
        $GynecologicHistories = GynecologicHistories::findOrFail($id);
        return response()->json($GynecologicHistories);
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
              'age_at_menarche' => 'required',
            'duration_of_menstrual_cycle' => 'required',
            'length_of_menstrual_cycle' => 'required',
            'any_menstrual_problem' => 'required',
            'history_of_sti' => 'required',
            'history_of_gynecological_operation' => 'required',
            'contraception_history' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $GynecologicHistories = GynecologicHistories::findOrFail($id);
            $GynecologicHistories->age_at_menarche = $request->input('age_at_menarche');
            $GynecologicHistories->duration_of_menstrual_cycle = $request->input('duration_of_menstrual_cycle');
            $GynecologicHistories->length_of_menstrual_cycle = $request->input('length_of_menstrual_cycle');
            $GynecologicHistories->any_menstrual_problem = $request->input('any_menstrual_problem');
            $GynecologicHistories->history_of_sti = $request->input('history_of_sti');
            $GynecologicHistories->history_of_gynecological_operation = $request->input('history_of_gynecological_operation');
            $GynecologicHistories->contraception_history = $request->input('contraception_history');
            try {
                $GynecologicHistories->save();
                return response()->json($GynecologicHistories);
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
            $GynecologicHistories = GynecologicHistories::findOrFail($id);
            $GynecologicHistories->delete();
            return response()->json($GynecologicHistories, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
