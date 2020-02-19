<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anc_signs;


class Anc_signsController extends Controller
{
    	public function index(){


    $anc_signs = Anc_signs::get();
    return response()->json($anc_signs);
	}


  //create new sign 
	public function store(Request $request){

	
           $anc_signs = new Anc_signs;
           $anc_signs->s_pressure = $request->input('s_pressure');
           $anc_signs->d_pressure = $request->input('d_pressure');
           $anc_signs->temperature = $request->input('temperature');
           $anc_signs->height = $request->input('height');
           $anc_signs->weight = $request->input('weight');
           $anc_signs->notes = $request->input('notes');
           $anc_signs->supplementation = $request->input('supplementation');
           $anc_signs->visual = $request->input('visual');
           $anc_signs->fever = $request->input('fever');
           $anc_signs->hiv = $request->input('hiv');
           $anc_signs->tb = $request->input('tb');


           $anc_signs->save();
           return response()->json($anc_signs);
	}

}