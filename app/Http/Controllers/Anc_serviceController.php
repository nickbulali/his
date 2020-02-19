<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anc_service;
use App\User;

class Anc_serviceController extends Controller
{
    public function index(){


    $anc_service = Anc_service::get();
    return response()->json($anc_service);
	}

	//create new service

	public function store(Request $request){

	
           $anc_service = new Anc_service;
           $anc_service->condition = $request->input('condition');
           $anc_service->m_diagnosis = $request->input('m_diagnosis');
           $anc_service->o_diagnosis = $request->input('o_diagnosis');
           $anc_service->classification = $request->input('classification');
           $anc_service->treatment = $request->input('treatment');
           $anc_service->prescription_no = $request->input('prescription_no');
           $anc_service->outcome = $request->input('outcome');
           $anc_service->referral_from = $request->input('referral_from');
           $anc_service->refer = $request->input('refer');
           $anc_service->referral_to = $request->input('referral_to');
           $anc_service->user_id = $request->input('user_id');
           $anc_service->referred_date = $request->input('referred_date');
           $anc_service->notes = $request->input('notes');

           $anc_service->save();
           return response()->json($anc_service);
	}
}
