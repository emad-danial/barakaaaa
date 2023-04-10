<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;

use App\Http\Controllers\website\objects\flight;
use App\User;
class getBookingFlights extends Controller
{

	private $rules=[
	    'page'=>'required|integer',
	    'userId'=>"required|integer|exists:users,id"
	   
	];   



	public function index(Request $request){
		$validator = Validator::make($request->all(), $this->rules);
			if($validator->fails()) 
				 	return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);


			$user=User::find($request->userId);
			$getFlight=DB::select('SELECT
					 user_flight.id as userflightId,
					 user_flight.num_of_adults as numOfAdults,
		   			 user_flight.num_of_child as numOfChild,
		   			 user_flight.status as status ,
	      			 user_flight.flight_id as flightId,
	      			 user_flight.total_price as total_price
	       FROM user_flight
	        WHERE user_flight.user_id=?
	         order by user_flight.created_at DESC limit 20 offset ?',[$user->id,$request->page*20]);


			$result=[];
			foreach ($getFlight as $key) {
				array_push($result,
					['flight'=>flight::flightObject($key->flightId),
					 'status'=>$key->status,
					 'userflightId'=>$key->userflightId,
					 'numOfChild'=>$key->numOfChild,
					 'numOfAdults'=>$key->numOfAdults,
					 'total_price'=>$key->total_price
					 ]);
			}




	    return response()->json(['status'=>"success",'flights'=>$result]);    
	              	      
    }
}
