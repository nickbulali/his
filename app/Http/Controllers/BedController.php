<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bed;


class BedController extends Controller
   {

   	public function index(){


    $bed = Bed::get();
    return response()->json($bed);



   }

    //create new bed 
	public function store(Request $request){

	
           $bed = new Bed;
           $bed->bed_no = $request->input('bed_no');
           $bed->ward_no = $request->input('ward_no');
           $bed->status = 'Pending';

           $bed->save();
           return response()->json($bed);
	}

	//read bed status
	public function show($id)
    {
        $bed = Bed::findOrFail($id);

        return response()->json($bed);
    }

    // update bed status
    public function update($id){
    	
    }


    //delete bed 
    public function destroy($id)
    {
        $bed = Bed::findOrFail($id);

        $bed->items()->delete();

        $bed->delete();

        return response()
            ->json(['deleted' => true]);
    }

    //allocate bed 
    public function allocate(){
    	
    }
}
