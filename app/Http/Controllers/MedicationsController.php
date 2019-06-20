<?php
namespace App\Http\Controllers;
use App\Models\Medications;
use App\Models\Patient;
use App\Models\Dosage;
use App\Models\Drugs;
use Auth;
use Illuminate\Http\Request;
class MedicationsController extends Controller
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
            'patient_id' => 'required',
            'medication_status_id' => 'required',
            'drug_id' => 'required',
            
            'dosage_id'=> 'required',
            'quantity' => 'required',
            'start_time'=> 'required',
            'end_time'=> 'required',

           
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Medications = new Medications;
            $Medications->patient_id = $request->input('patient_id');
            $Medications->medication_status_id = $request->input('medication_status_id');
            $Medications->drug_id = $request->input('drug_id');
            $Medications->prescribed_by =Auth::user()->id;
            $Medications->dosage_id = $request->input('dosage_id');
            $Medications->quantity = $request->input('quantity');
            $Medications->start_time = $request->input('start_time');
            $Medications->end_time = $request->input('end_time');
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
            
            'dosage_id'=> 'required',
            'quantity' => 'required',
            'start_time'=> 'required',
            'end_time'=> 'required',

         
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $Medications = Medications::findOrFail($id);
         $Medications->patient_id = $request->input('patient_id');
            $Medications->medication_status_id = $request->input('medication_status_id');
            $Medications->drug_id = $request->input('drug_id');
            $Medications->prescribed_by =Auth::user()->id;
            $Medications->dosage_id = $request->input('dosage_id');
            $Medications->quantity = $request->input('quantity');
            $Medications->start_time = $request->input('start_time');
            $Medications->end_time = $request->input('end_time');
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
