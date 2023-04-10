<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Controllers\website\objects\flight;
use App\models\userFlight;
use App\models\AppSetting;
use App\Http\Controllers\website\flightsController;
use Validator;
use Mail;
use App\User;
class flightsController extends Controller
{
	public function index(Request $request){
	    
	    $plus="";
	    if($request->has('price') == true){
            if($request->price == 0) $plus=" where flights.price >0 and flights.price <=200 ";
            if($request->price == 1) $plus=" where flights.price >200 and flights.price <=300 ";
            if($request->price == 2) $plus=" where flights.price >300 and flights.price <=400 ";
            if($request->price == 3) $plus=" where flights.price >400 and flights.price <=500 ";
            if($request->price == 4) $plus=" where flights.price >500 ";
	    }
	    
	    if($request->has('cityName') == true){
	        $plus=" where flights.to_city='".$request->cityName."' Or flights.from_city='".$request->cityName."'";
	    }
	    
		$getFlight=DB::select('SELECT flights.id as id from flights'.$plus);
		$result=[];  foreach ($getFlight as $key ) array_push($result,flight::flightObject($key->id));
		return view('website.flights',['flights'=>$result]);
	}

	public function flightDetail($id,$name){
	    
		$flight=flight::flightObject($id);
        $update=DB::update('UPDATE flights SET flights.view_count=flights.view_count+1 WHERE flights.id=?',[$id]);
		
		$topFlight=DB::select('SELECT flights.id as id from flights order by flights.created_at DESC limit 3 ');
		$result=[]; foreach($topFlight as $key) array_push($result,flight::flightObject($key->id));
		return view('website.flightDetail',['flight'=>$flight,'topFlight'=>$result]);
	}

	public function getOfferFlight(Request $request){
	    
	   // dd($request);
		$validate=Validator::make($request->all(),[
			'flightId'=>'required|integer',
			'numForAdult'=>'required',
			'numForChild'=>'required',
		]);
		if($validate->fails())	return redirect()->back()->with('error', 'make sure that you insert all Required Feild');

		$userFlight=new userFlight();
		$userFlight->user_id=Auth::user()->id;
		$userFlight->flight_id=$request->flightId;
		$userFlight->num_of_adults=$request->numForAdult;
		$userFlight->num_of_child=$request->numForChild;
		$userFlight->save();
		
		
		
		
		
		flightsController::sendEmail($userFlight->id,Auth::user()->email,"Flight Booking-Baraka Travel",Auth::user()->email);
		flightsController::sendEmail($userFlight->id,Auth::user()->email,"Flight Booking-Baraka Travel",AppSetting::all()->first()->email);
		
		
        
		
		return redirect('/confirmation')->with('success', 'Your message has been sent successfully!');

	}
	
	
	public static function sendEmail($userflightId,$email,$isFRomDash=NULL,$targetEmail=NULL){

	    
		$GLOBALS['email'] = $targetEmail;
		$GLOBALS['subject'] = $isFRomDash;
		
		if(	$GLOBALS['subject'] == NULL) 	$GLOBALS['subject']="bills";
		
	 	$user=User::where('email','=',$email)->first();
	 	
	 	
		$getFlight=DB::select('SELECT
				 user_flight.num_of_adults as numOfAdults,
	   			 user_flight.num_of_child as numOfChild,
	   			 user_flight.status as status ,
      			 user_flight.flight_id as flightId
       FROM user_flight WHERE user_flight.id=?',[$userflightId]);	
	
	    $flight=['flight'=>flight::flightObject($getFlight[0]->flightId),
        	 'status'=>$getFlight[0]->status,
	        'numOfChild'=>$getFlight[0]->numOfChild,
	        'numOfAdults'=>$getFlight[0]->numOfAdults,
	         'price'=>($getFlight[0]->numOfAdults*flight::flightObject($getFlight[0]->flightId)['priceAdult']+
     	  $getFlight[0]->numOfChild*flight::flightObject($getFlight[0]->flightId)
	  			['priceChild'])];
	  			
	  			
	  			
	  			
	  			
	  			
	  			
		
		    Mail::send('website.billFlight',['user'=>$user,'flight'=>$flight], function ($message) {
		          $message->from(emailSender(),$GLOBALS['subject']);
		          $message->subject($GLOBALS['subject']);
		          $message->to($GLOBALS['email']);
		    });
	}
}
