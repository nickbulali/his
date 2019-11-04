<?php
namespace App\Http\Controllers;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\Dosage;
use App\Models\Drugs;
use Auth;
use Illuminate\Http\Request;
class MedicationController extends Controller
{
    public function index(Request $request)

    {

        if ($request->query('search')) {
            $search = $request->query('search');
            $Medications = Medications::whereHas('patient.name', function ($query) use ($search) {
                $query->where('text', 'LIKE', "%{$search}%")->orWhere('family', 'LIKE', "%{$search}%");
            })->with('dosage', 'drugs', 'medication_status', 'patient.name')
            ->paginate(25);
        } 
        else {
          $Medications = Medications::with('patient.name')->with('dosage')->with('drugs')->with('medication_status')
          ->paginate(25);
      }
      return response()->json($Medications);  
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
            $medication = new Medication;
            $medication->patient_id = $request->input('patient_id');
            $medication->medication_status_id = $request->input('medication_status_id');
            $medication->drug_id = $request->input('drug_id');
            $medication->prescribed_by = $request->input('prescribed_by');
            $medication->test_type_id = $request->input('test_type_id');
            $medication->dosage_id = $request->input('dosage_id');
            $medication->quantity = $request->input('quantity');
            $medication->start_time = $request->input('start_time');
            $medication->end_time = $request->input('end_time');
            $medication->refill = $request->input('refill');
            $medication->comments = $request->input('comments');
            try {
                $medication->save();
                return response()->json($medication);
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
        $medication = Medication::findOrFail($id);
        return response()->json($medication);
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
            $medication = Medication::findOrFail($id);
            $medication->patient_id = $request->input('patient_id');
            $medication->medication_status_id = $request->input('medication_status_id');
            $medication->drug_id = $request->input('drug_id');
            $medication->prescribed_by = $request->input('prescribed_by');
            $medication->test_type_id = $request->input('test_type_id');
            $medication->dosage_id = $request->input('dosage_id');
            $medication->quantity = $request->input('quantity');
            $medication->start_time = $request->input('start_time');
            $medication->end_time = $request->input('end_time');
            $medication->refill = $request->input('refill');
            $medication->comments = $request->input('comments');
            try {
                $medication->save();
                return response()->json($medication);
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
            $medication = Medication::findOrFail($id);
            $medication->delete();
            return response()->json($medication, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
