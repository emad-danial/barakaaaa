<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\website\flightsController;
use App\User;
use App\models\AppSetting;
use App\models\userFlight;
use App\Http\Controllers\website\objects\flight;
class bookFlight extends Controller
{
	private $rules=[
	   'flightId'=>'required|integer',
	   'numForAdult'=>'required',
	   'numForChild'=>'required',
	   'userId'=>"required|integer|exists:users,id",
	];   


	public function index(Request $request){
		$validator = Validator::make($request->all(), $this->rules);
			if($validator->fails()) 
				 return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);


	
		$userFlight=new userFlight();
		$userFlight->user_id=$request->userId;
		$userFlight->flight_id=$request->flightId;
		$userFlight->num_of_adults=$request->numForAdult;
		$userFlight->num_of_child=$request->numForChild;
		
		$userFlight->total_price=($request->numForAdult*flight::flightObject($request->flightId)['priceAdult']+
		     	  $request->numForChild*flight::flightObject($request->flightId)
			  			['priceChild']);
		
		$userFlight->save();
	
	
	   
		
		$User=User::find($request->userId);
		flightsController::sendEmail($userFlight->id,$User->email,"Flight Booking-Baraka Travel",$User->email);
		flightsController::sendEmail($userFlight->id,$User->email,"Flight Booking-Baraka Travel",AppSetting::all()->first()->email);
	    

		

		


		return response()->json(['status'=>"success",'message'=>'for booking with Baraka Travel, we will contact you within 48 hours max to confirm your booking.']);    
	
	}
}
