<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\website\objects\hotel;
use DB;
use Validator;
use Auth;
use Carbon\Carbon;
use App\models\Rate;
use App\models\AppSetting;

use App\models\hotelOrder;
use Mail;
use App\Http\Controllers\paymentController;

use App\models\Hotel as Hotels; 
class hotelsController extends Controller
{
	public function index(Request $request){
		
		$getHotels=Hotels::all();
		if($request->has('cityName') == true){
			if($request->cityName !="")
				$getHotels=$getHotels->where('city', '=', $request->cityName);	
		}

		if($request->has('hotelName') == true){
			if($request->hotelName !="")
					$getHotels=$getHotels->where('name', '=', $request->hotelName);		
		}

		if($request->has('amentities') == true){
			$plus="0";
			foreach($request->amentities as $key) $plus=$plus." ,".$key;

			$getHotels=DB::select('SELECT hotels.id as id FROM hotels INNER JOIN hotel_amenities on hotel_amenities.hotel_id=hotels.id WHERE hotel_amenities.amenities_id in ('.$plus.') GROUP BY hotels.id');
		}
		
		if($request->has('price') == true){
		    
		    $getHotels=DB::select('SELECT hotels.id as id from hotels');
		    
		    $result=[];
		  foreach($getHotels as $key){
		        $minPrice=hotel::hotelObject($key->id)['minPrice'];
		      
		        if($request->price == 0)
		            if($minPrice >0 && $minPrice <=200) array_push($result,hotel::hotelObject($key->id));
		        if($request->price == 1)
	                if($minPrice >200 && $minPrice <=300) array_push($result,hotel::hotelObject($key->id));
	            
	            if($request->price == 2)
	                if($minPrice >300 && $minPrice <=400) array_push($result,hotel::hotelObject($key->id));
	            
	            if($request->price == 3)
	                if($minPrice >400 && $minPrice <=500) array_push($result,hotel::hotelObject($key->id));
	                
                if($request->price == 4)
                      if($minPrice >500) array_push($result,hotel::hotelObject($key->id));     

		    } 
	    	$amentities=DB::select('SELECT * FROM amenities');
			return view('website.hotels',['hotels'=>$result,'amentities'=>$amentities]);
		}


		

   


		
			

			$result=[]; foreach($getHotels as $key) array_push($result,hotel::hotelObject($key->id));
			$amentities=DB::select('SELECT * FROM amenities');
			return view('website.hotels',['hotels'=>$result,'amentities'=>$amentities]);
	}

	public function hoteldetail($id,$name){
	     $update=DB::update('UPDATE hotels SET hotels.view_count=hotels.view_count+1 WHERE hotels.id=?',[$id]);
	     
	  
		return view('website.hotelDetail',['hotel'=>hotel::hotelObject($id)]);
	}

	/**
	 * this to submit an rate to an package 
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function submitRate(Request $request){
			
			$validate=Validator::make($request->all(),[
				'rateValue'=>'required|numeric',
				'hotelId'=>'required|integer|exists:hotels,id',
				'mobile'=>'required|numeric',
				'name'=>'required|min:1',
				'ratemessage'=>'required|min:1'
			]);
			if($validate->fails())	return back();

			$rate=new Rate();
			$rate->hotel_id	=$request->hotelId;
			$rate->name=$request->name;
			$rate->mobile=$request->mobile;
			$rate->message=$request->ratemessage;
			$rate->rate=$request->rateValue;
			$rate->user_id=Auth::user()->id;
			$rate->is_approve="disactive";
			$rate->create_at=Carbon::now();	
			$rate->save();
			 flash()->success('Thank you for your feedback, we will confirm your feedback soon');
             return redirect()->back();
// 			return back();
		}
		
		
	public function bookHotel(Request $request){
	    
	    	$validate=Validator::make($request->all(),[
				'reserveFrom'=>'min:1',
				'reserveTo'=>'min:1',
			]);
			if($validate->fails())  { return ['data'=> "error"]; }
			
	        if (Auth::check() == false) {
                    return ['data'=>'login'];
            }
	     
	    $upadethotel=Hotels::findOrFail($request->hotelId); 
	    
	    if($upadethotel->availble_tickets > 0){
	        
	   
    	    $orderHotel=new hotelOrder();
    	    $orderHotel->hotel_room_id=$request->roomId;
    	    $orderHotel->hotel_id=$request->hotelId;
    	    $orderHotel->user_id=Auth::user()->id;
    	    $orderHotel->reserve_from=$request->reserveFrom;
    	    $orderHotel->reserve_to=$request->reserveTo;
    	   
    	    $orderHotel->status="pending";
    	    $orderHotel->payment_type="Cashe";
    	    $orderHotel->save();
    	    
    	   //if($request->payment_type  == "Visa"){
        //         $payment=new paymentController();
        //       return ['data'=>"visa","link"=>$payment->payment($request->pricing,Auth::user()->first_name,$orderHotel->id,"hotel")];
        // }   
    	        
    	        
    	        
    	         if ($upadethotel != null) {
                        $upadethotel->update([
                            'availble_tickets' =>($upadethotel->availble_tickets-1) ,
                        ]);
                    }
                    
                    
                  
        
                    
    	    
       $dd= hotelsController::sendEmail($orderHotel->id,Auth::user()->email,NULL,Auth::user());
    	    hotelsController::sendEmail($orderHotel->id,AppSetting::all()->first()->email,NULL,Auth::user());
    
    
	   	return ['data'=>'success'];
	    }else{
	        return ['data'=>'errornotavilible'];
	    }
	}
	
	
	
	public static function sendEmail($orderHotelId,$email,$message = NULL ,$userObj = NULL){
	    
		$GLOBALS['email'] = $email;
		
				$GLOBALS['subject'] = $message;
		        if($GLOBALS['subject'] == NULL) $GLOBALS['subject']="Hotel Booking-Baraka Travel";
		        
		if($userObj == NULL)    $user=Auth::user();
	    else  $user=$userObj;
	    
		$getHotelBookINg=DB::select('SELECT * from order_hotel 
									WHERE order_hotel.id=?',[$orderHotelId]);

		$getPrice=DB::select('SELECT hotel_rooms.price as price,hotel_rooms.name as name
			from hotel_rooms WHERE hotel_rooms.id=?',[$getHotelBookINg[0]->hotel_room_id]);
    
        $countDays=DB::select('SELECT DATEDIFF(order_hotel.reserve_from,order_hotel.reserve_to) as result FROM order_hotel where order_hotel.id=?',[$orderHotelId]);
        
	    $price=$getPrice[0]->price*(abs($countDays[0]->result));

			$result =[
				'orderHotelId'=>$getHotelBookINg[0]->id,
				'reservefrom'=>$getHotelBookINg[0]->reserve_from,
				'reserveto'=>$getHotelBookINg[0]->reserve_to,
				'status'=>$getHotelBookINg[0]->status,
				'number_persons'=>'1',
				'hotel'=>hotel::hotelObject($getHotelBookINg[0]->hotel_id),
				'roomPrice'=>$price,
				'roomType'=>$getPrice[0]->name
			];
			
			
			$GLOBALS['subject']="Hotel Booking-Baraka Travel";

		
	
		
		return  Mail::send('website.billHotel',['user'=>$user,'hotelsBookIng'=>$result], function ($message) {
		          $message->from(emailSender(),	$GLOBALS['subject'] );
		          $message->subject($GLOBALS['subject']);
		          $message->to($GLOBALS['email']);
		    });

		
	    
	    
	    
	}

		
}
