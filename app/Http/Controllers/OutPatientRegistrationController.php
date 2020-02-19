<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutPatientRegistrationController extends Controller
{
    public function index(){


    $outPatientRegistration = Anc_service::get();
    return response()->json($outPatientRegistration);
	}



	public function store (Request $request){

		$outPatientRegistration = new OutPatientRegistration;
		//Basic information

		$outPatientRegistration->patientId = $request->input('patientId');
		$outPatientRegistration->fName = $request->input('fName');	
		$outPatientRegistration->mName = $request->input('mName');	
		$outPatientRegistration->lName = $request->input('lName');
		$outPatientRegistration->idNo = $request->input('idNo');
		$outPatientRegistration->medNo = $request->input('medNo');
		$outPatientRegistration->fPlannigNo = $request->input('fPlannigNo');
		$outPatientRegistration->ancNo = $request->input('ancNo');
		$outPatientRegistration->screeningNo = $request->input('screeningNo');
		$outPatientRegistration->artNo = $request->input('artNo');
		$outPatientRegistration->tbNo = $request->input('tbNo');
		$outPatientRegistration->opdNo = $request->input('opdNo');
		$outPatientRegistration->cu5No = $request->input('cu5No');
		$outPatientRegistration->eyeClinicNo = $request->input('eyeClinicNo');
		$outPatientRegistration->contactNo = $request->input('contactNo');
		$outPatientRegistration->email = $request->input('email');
		$outPatientRegistration->nationality = $request->input('nationality');
		$outPatientRegistration->languages = $request->input('languages');
		$outPatientRegistration->dob = $request->input('dob');
		$outPatientRegistration->gender = $request->input('gender');
		$outPatientRegistration->occupation = $request->input('occupation');
		$outPatientRegistration->maritalStatus = $request->input('maritalStatus');
		$outPatientRegistration->age = $request->input('age');

		// address
		$outPatientRegistration->county = $request->input('county');
		$outPatientRegistration->sCounty = $request->input('sCounty');
		$outPatientRegistration->village = $request->input('village');

	}


}
