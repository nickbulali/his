<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ward;


class WardController extends Controller
{

   public function index(){


    $ward = Ward::get();
    return response()->json($ward);



   }


    //create new ward 
	public function store(Request $request){

		$ward = new Ward;
		$ward->ward_no = $request->input('ward_no');


		$ward->save();
           return response()->json($ward);
	}

	
	public function show($id)
    {
        $ward = Ward::with(['bed_no'])
            ->findOrFail($id);
        return response()
            ->json(['Ward' => $Ward]);
    }

    // update Ward 
    public function update($id){
    	
    }


    //delete Ward 
    public function destroy($id)
    {
        $Ward = Ward::findOrFail($id);

        $Ward->items()->delete();

        $Ward->delete();

        return response()
            ->json(['deleted' => true]);
    }
}
