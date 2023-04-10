<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\website\objects\umarh;
use App\Http\Controllers\website\hotelsController;
use App\User;
use App\models\AppSetting;
use App\models\HotelRooms;
use App\models\hotelOrder;
use App\models\Hotel as Hotels; 
class bookHotel extends Controller
{
	private $rules=[
	    'reserveFrom'=>'required|date',
	    'reserveTo'=>'required|date',
	    'userId'=>"required|integer|exists:users,id",
	    'hotelId'=>'required|integer|exists:hotels,id',
	    'roomId'=>'required|integer'
	   
	];   


	public function index(Request $request){
		$validator = Validator::make($request->all(), $this->rules);
			if($validator->fails()) 
				 	return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);


		$hotel=Hotels::findOrFail($request->hotelId); 
		if($hotel->availble_tickets <=0) 
				return response()->json(['status'=>"fail",'message'=>"no Avalibale Tickets for This Hotel"]);
				
				
	    $HotelRooms=HotelRooms::find($request->roomId);
	    if($request->reserveFrom < $HotelRooms->from_date)  
	            	return response()->json(['status'=>"fail",'message'=>"Please Check that's You Reserve From  ".$HotelRooms->from_date]);
	            	
	   	    if($request->reserveTo > $HotelRooms->to_date)  
	            	return response()->json(['status'=>"fail",'message'=>"Please Check that's You Reserve To  ".$HotelRooms->to_date]);         	


			
		$orderHotel=new hotelOrder();
		$orderHotel->hotel_room_id=$request->roomId;
		$orderHotel->hotel_id=$request->hotelId;
		$orderHotel->user_id=$request->userId;
		$orderHotel->reserve_from=$request->reserveFrom;
		$orderHotel->reserve_to=$request->reserveTo;
		$orderHotel->status="pending";
		$orderHotel->payment_type="Cashe";
		$orderHotel->save();

		$getPrice=DB::select('SELECT hotel_rooms.price as price
			from hotel_rooms WHERE hotel_rooms.id=?',[$request->roomId]);


        $countDays=DB::select('SELECT DATEDIFF(order_hotel.reserve_from,order_hotel.reserve_to) as result FROM order_hotel where order_hotel.id=?',[$orderHotel->id]);
        
	    $price=$getPrice[0]->price*(abs($countDays[0]->result));

	    $updatePrice=hotelOrder::find($orderHotel->id);
	    $updatePrice->total_price=$price;
	    $updatePrice->save();



	    $user=User::find($request->userId);
	    hotelsController::sendEmail($orderHotel->id,$user->email,NULL,$user);
	     hotelsController::sendEmail($orderHotel->id,AppSetting::all()->first()->email,NULL,$user);
	     
	     
	   

	     $hotel->availble_tickets=$hotel->availble_tickets-1;
	     $hotel->save(); 
		return response()->json(['status'=>"success",'message'=>"for booking with Baraka Travel, we will contact you within 48 hours max to confirm your booking."]);    
	
	}

}
