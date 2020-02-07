<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BedAllocation;


class BedAllocationController extends Controller
{

   public function index(){


    $bedAllocation = BedAllocation::get();
    return response()->json($bedAllocation);



   }


    //create new bedAllocation
	public function store(Request $request){

		$bedAllocation = new BedAllocation;
		$bedAllocation->patient_id = $request->input('patient_id');
        $bedAllocation->bed_no = $request->input('bed_no');
        $bedAllocation->start_date = $request->input('start_date');
        $bedAllocation->start_time = $request->input('start_time');

        $bedAllocation->status = 'Pending';

        $bedAllocation->save();
        return response()->json($bedAllocation);

	}



    public function discharge($id, Request $request)
    {

       
            $bedAllocation = BedAllocation::findOrFail($id);
            $bedAllocation->bed_no = $request->input('bed_no');
            $bedAllocation->ward_no = $request->input('ward_no');
            $bedAllocation->status = $request->input('status');


            try {
                $bedAllocation->save();

                return response()->json($bedAllocation);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }

    

	
	public function show($id)
    {
        $bedAllocation = BedAllocation::findOrFail($id);

        return response()->json($bedAllocation);
    }

    // update bedAllocation
    public function update($id, Request $request){
    	$rules = [

        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $bedAllocation = BedAllocation::findOrFail($id);
            $bedAllocation->patient_id = $request->input('patient_id');
            $bedAllocation->bed_no = $request->input('bed_no');
            $bedAllocation->start_date = $request->input('start_date');
            $bedAllocation->start_time = $request->input('start_time');
            $bedAllocation->status = $request->input('status');


            try {
                $bedAllocation->save();

                return response()->json($bedAllocation);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }


    //delete bedAllocation
    public function destroy($id)
    {
        $bedAllocation = BedAllocation::findOrFail($id);

        $bedAllocation->items()->delete();

        $bedAllocation->delete();

        return response()
            ->json(['deleted' => true]);
    }
}
