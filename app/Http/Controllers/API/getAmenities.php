<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class getAmenities extends Controller
{
	public function index(){
		$amentities=DB::select('SELECT amenities.id,amenities.name FROM amenities');

		return response()->json(['status'=>'success','amentities'=>$amentities]);
	}
}
