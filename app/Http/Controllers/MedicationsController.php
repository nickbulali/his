
<?php

namespace App\Http\Controllers;

use App\Models\Medications;
use Illuminate\Http\Request;

class MedicationsController extends Controller
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
             'patient_id' => 'required',
             'medication_status_id' => 'required',
             'drug_id' => 'required',
             'prescribed_by' => 'required',
             'test_type_id'=> 'required',
             'dosage_id'=> 'required',
         
             'quantity' => 'required',
             'start_time' => 'required',
             'end_time'=> 'required',
             'refill'=> 'required',
             'comments'=> 'required',

        



        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Medications = new Medications;
            $Medications->patient_id = $request->input('patient_id');
            $Medications->medication_status_id = $request->input('medication_status_id');
            $Medications->drug_id = $request->input('drug_id');
            $Medications->prescribed_by = $request->input('prescribed_by');
            $Medications->test_type_id = $request->input('test_type_id');
            $Medications->dosage_id = $request->input('dosage_id');
            $Medications->quantity = $request->input('quantity');
            $Medications->start_time = $request->input('start_time');
            $Medications->end_time = $request->input('end_time');
            $Medications->refill = $request->input('refill');
            $Medications->comments = $request->input('comments');

         
            try {
                $Medications->save();

                return response()->json($Medications);
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
        $Medications = Medications::findOrFail($id);

        return response()->json($Medications);
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
             'patient_id' => 'required',
             'medication_status_id' => 'required',
             'drug_id' => 'required',
             'prescribed_by' => 'required',
             'test_type_id'=> 'required',
             'dosage_id'=> 'required',
             'quantity' => 'required',
             'start_time' => 'required',
             'end_time'=> 'required',
             'refill'=> 'required',
             'comments'=> 'required',

            
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Medications = Medications::findOrFail($id);
            $Medications->patient_id = $request->input('patient_id');
            $Medications->medication_status_id = $request->input('medication_status_id');
            $Medications->drug_id = $request->input('drug_id');
            $Medications->prescribed_by = $request->input('prescribed_by');
            $Medications->test_type_id = $request->input('test_type_id');
            $Medications->dosage_id = $request->input('dosage_id');
            $Medications->quantity = $request->input('quantity');
            $Medications->start_time = $request->input('start_time');
            $Medications->end_time = $request->input('end_time');
            $Medications->refill = $request->input('refill');
            $Medications->comments = $request->input('comments');
         
            try {
                $Medications->save();

                return response()->json($Medications);
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
            $Medications = Medications::findOrFail($id);
            $Medications->delete();

            return response()->json($Medications, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
