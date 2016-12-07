<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\VaccinationStatus;

use App\Session;
class VaccinationStatusController extends Controller
{
    public function add(Request $request){
    	
    	$v_status = new VaccinationStatus;

    	$v_status->p_id = $request->p_id;
    	$v_status->v_id = $request->v_id;
    	$v_status->vaccination_date = $request->v_date;

    	$v_status->save();

    	return redirect()->route('posts.show',$v_status->p_id);
    }
}
