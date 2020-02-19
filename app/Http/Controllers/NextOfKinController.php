<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NextOfKinController extends Controller
{
    public function index(){


    $nextOfKin = NextOfKin::get();
    return response()->json($nextOfKin);
	}

	//create new next Of Kin
	public function store(Request $request){

		$nextOfKin = new NextOfKin;

		//Basic Information

		$nextOfKin->patientId = $request->input('patientId');
        $nextOfKin->fName = $request->input('fName');
        $nextOfKin->mName = $request->input('mName');
        $nextOfKin->lName = $request->input('lName');
        $nextOfKin->idNo = $request->input('idNo');
        $nextOfKin->contactNo = $request->input('contactNo');
        $nextOfKin->gender = $request->input('gender');
        $nextOfKin->dob = $request->input('dob');
        $nextOfKin->email = $request->input('email');
        $nextOfKin->nationality = $request->input('nationality');
        $nextOfKin->languages = $request->input('languages');
        $nextOfKin->occupation = $request->input('occupation');
        $nextOfKin->relationship = $request->input('relationship');

        // Next of kin address

        $nextOfKin->county = $request->input('county');
        $nextOfKin->sCounty = $request->input('sCounty');
        $nextOfKin->village = $request->input('village');
	}

}
