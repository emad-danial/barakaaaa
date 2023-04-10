<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use Carbon\Carbon;
use App\Http\Controllers\website\objects\hotel;
use App\User;
class getBookingHotels extends Controller
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
		$getHotelBookINg=DB::select('SELECT *,order_hotel.id as orderId from order_hotel 
		                                inner join hotels on hotels.id=order_hotel.hotel_id
									WHERE order_hotel.user_id=?  limit 20 offset ?',[$user->id,$request->page*20]);

		$result=[];
		foreach($getHotelBookINg as $key){
		    	$getPrice=DB::select('SELECT hotel_rooms.price as price
		                                    	from hotel_rooms WHERE hotel_rooms.id=?',[$key->hotel_room_id]);
		                                    	
            $dateFrom = Carbon::parse($key->reserve_from);
            $dateTo=Carbon::parse($key->reserve_to);
            $diff = $dateFrom->diffInDays($dateTo);                              	
		    
		    
			array_push($result,[
				'orderHotelId'=>$key->orderId,
				'reservefrom'=>$key->reserve_from,
				'reserveto'=>$key->reserve_to,
				'numOfnights'=>$diff,
				'status'=>$key->status,
				'hotel'=>hotel::hotelObject($key->hotel_id),
				'roomPrice'=>$getPrice[0]->price,
				'totalPrice'=>$key->total_price
			]);
		}





	    return response()->json(['status'=>"success",'hotels'=>$result]);    
	              	      
    }
}
