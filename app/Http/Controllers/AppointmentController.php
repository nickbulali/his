<?php
namespace App\Http\Controllers;
use App\Models\Appointment;
use App\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('search')) {
            $search = $request->query('search');
            $Appointment = Appointment::with('patient.name','user')->where('description', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $Appointment = Appointment::with('patient.name','user')->orderBy('id', 'ASC')->paginate(10);

        }

        return response()->json($Appointment);

    }

       public function report(Request $request)
    {
         if ($request->query('search')) {
            $search = $request->query('search');
            $AppointmentReport = Appointment::with('patient.name','user')->where('description', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $AppointmentReport = Appointment::with('patient.name','user')->orderBy('id', 'ASC')->paginate(10);

        }

        return response()->json($AppointmentReport);
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
            $Appointment = new Appointment;
            $Appointment->patient_id = $request->input('patient_id');
            $Appointment->user_id = $request->input('user_id');
            $Appointment->appointment_date = $request->input('appointment_date');
            $Appointment->appointment_time = $request->input('appointment_time');
            $Appointment->status = $request->input('status');

       
            try {
                $Appointment->save();
                return response()->json($Appointment);
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
        $Appointment = Appointment::wherePatientId($id)->get();
        return response()->json($Appointment);
    }


 public function countAppointments(Request $request)
    {
       
            $AppointmentCount = Appointment::count();
        

        return response()->json($AppointmentCount);
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
            $Appointment = Appointment::findOrFail($id);
            $Appointment->patient_id = $request->input('patient_id');
            $Appointment->user_id = $request->input('user_id');
            $Appointment->appointment_date = $request->input('appointment_date');
            $Appointment->appointment_time = $request->input('appointment_time');
            $Appointment->status = $request->input('status');
            try {
                $Appointment->save();
                return response()->json($Appointment);
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
            $Appointment = Appointment::findOrFail($id);
            $Appointment->delete();
            return response()->json($Appointment, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
