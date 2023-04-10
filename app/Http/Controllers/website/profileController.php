<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;
use App\Http\Controllers\website\objects\flight;
use App\Http\Controllers\website\objects\hotel;
use App\Http\Controllers\website\objects\umarh;
use App\User;
use App\Http\Controllers\website\profileController;
use Hash;

use App\models\Umrah;
class profileController extends Controller
{
	public function index(){
		$user=Auth::user();
		return view('website.profile',['user'=>$user]);
	}


	public function editProfile(){
		$user=Auth::user();
		return view('website.editProfile',['user'=>$user]);
	}

	public function updateProfile(Request $request){
	
		
		$validate=Validator::make($request->all(),[
			'first_name'=>'required|min:3',
			'last_name'=>'required|min:3',
		    'email' => ['required', 'string', 'email'],
			'mobile'=>['required','string'],

		]);

		if($validate->fails())	
			return back()->with('message','make sure that you enter all Required Field');

		// chk email
		$email=User::where('email','=',$request->email)->where('id','!=',$request->userId)->count();
		if($email !=0) 
			return back()->with('message','make sure that you enter all Required Field');

		// chk phone
		$mobile=User::where('mobile','=',$request->mobile)->where('id','!=',$request->userId)->count();
		if($mobile !=0) 
			return back()->with('message','make sure that you enter all Required Field');

		// chk Password
		if($request->has('password') == true)
			if($request->password !=$request->password_confirmation)
				return back()->with('message','make sure that you enter all Required Field');
		


		$user=User::find($request->userId);
		$user->first_name=$request->first_name;
		$user->last_name=$request->last_name;
		$user->mobile=$request->mobile;
		$user->email=$request->email;
		if($request->has('password') == true) 
		$user->password=Hash::make($request->password);	
		if($request->file('image') == true)
		$user->image=profileController::uploadImage($request->image);
		$user->Save();


		return back()->with('success','your Information Has Been update Success');

	}


	public  static function uploadImage($file){
        $icon =$file;
        $icon_new_name = time() . $icon->getClientOriginalName();
        $icon->move('uploads/users', $icon_new_name);
        return  'uploads/users/' . $icon_new_name;
            
	}


	public function flightBookIng(){
		$user=Auth::user();
		$getFlight=DB::select('SELECT
				 user_flight.id as userflightId,
				 user_flight.num_of_adults as numOfAdults,
	   			 user_flight.num_of_child as numOfChild,
	   			 user_flight.status as status ,
      			 user_flight.flight_id as flightId
       FROM user_flight WHERE user_flight.user_id=?',[$user->id]);


		$result=[];
		foreach ($getFlight as $key) {
			array_push($result,
				['flight'=>flight::flightObject($key->flightId),
				 'status'=>$key->status,
				 'userflightId'=>$key->userflightId,
				 'numOfChild'=>$key->numOfChild,
				 'numOfAdults'=>$key->numOfAdults,
				 'price'=>
				 ($key->numOfAdults*flight::flightObject($key->flightId)['priceAdult']+
				  $key->numOfChild*flight::flightObject($key->flightId)['priceChild'])]);
		}


		return view('website.flightBookIng',['user'=>$user,'flightBookIng'=>$result]);
	}


	public function flightBookIngProfile($userflightId){
		$user=Auth::user();
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
	 'price'=>
	 ($getFlight[0]->numOfAdults*flight::flightObject($getFlight[0]->flightId)['priceAdult']+
	  $getFlight[0]->numOfChild*flight::flightObject($getFlight[0]->flightId)
	  			['priceChild'])];
		
		return view('website.flightBookIngProfile',['user'=>$user,'flight'=>$flight]);
	}



	public function hotelsBookIng(){
		$user=Auth::user();
		$getHotelBookINg=DB::select('SELECT *,order_hotel.id as orderId ,  hotel_rooms.name as roomName from order_hotel 
		                                inner join hotels on hotels.id=order_hotel.hotel_id
		                                inner join hotel_rooms on hotel_rooms.id=order_hotel.hotel_room_id
									WHERE order_hotel.user_id=? ',[$user->id]);

		$result=[];
		foreach($getHotelBookINg as $key){
		    	$getPrice=DB::select('SELECT hotel_rooms.price as price
		                                    	from hotel_rooms WHERE hotel_rooms.id=?',[$key->hotel_room_id]);
		    
		    
			array_push($result,[
				'orderHotelId'=>$key->orderId,
				'reservefrom'=>$key->reserve_from,
				'reserveto'=>$key->reserve_to,
				'status'=>$key->status,
				'TypeofRoom'=>$key->roomName,
				'hotel'=>hotel::hotelObject($key->hotel_id),
				'roomPrice'=>$getPrice[0]->price
			]);
		}


		return view('website.hotelsBookIng',['user'=>$user,'hotelsBookIng'=>$result]);
	}



	public function hotelsBookIngProfile($orderHotelId){
		$user=Auth::user();
		$getHotelBookINg=DB::select('SELECT *,hotel_rooms.name as roomName  from order_hotel 
	                    	 inner join hotels on hotels.id=order_hotel.hotel_id
	                    	      inner join hotel_rooms on hotel_rooms.id=order_hotel.hotel_room_id
									WHERE order_hotel.id=?',[$orderHotelId]);
									
								

		$getPrice=DB::select('SELECT hotel_rooms.price as price
		                      	from hotel_rooms WHERE hotel_rooms.id=?',[$getHotelBookINg[0]->hotel_room_id]);

	

			$result =[
				'orderHotelId'=>$getHotelBookINg[0]->id,
				'reservefrom'=>$getHotelBookINg[0]->reserve_from,
				'reserveto'=>$getHotelBookINg[0]->reserve_to,
				'status'=>$getHotelBookINg[0]->status,
				'hotel'=>hotel::hotelObject($getHotelBookINg[0]->hotel_id),
					'TypeofRoom'=>$getHotelBookINg[0]->roomName,
				'roomPrice'=>$getPrice[0]->price
			];

		

		return view('website.hotelsBookIngProfile',['user'=>$user,'hotelsBookIng'=>$result]);
	}
	
	
	
	public function hajjBooking(){
	    $user=Auth::user();
	    $getHajj=DB::select('SELECT umrahs.id as idumrahs,orders_package.*,umarh_pricing.price as price  from orders_package 
	                            	INNER JOIN umarh_pricing on umarh_pricing.id=orders_package.package_pricing_id
                                    INNER JOIN umrahs on umrahs.id=umarh_pricing.umarh_id 
                        	WHERE umrahs.package_type="hajj" AND orders_package.user_id=?',[$user->id]);
                        	
        
        $result=[];
        foreach($getHajj as $key) array_push($result,[
                    'id'=>$key->id,
                    'hajj'=>umarh::umarobject($key->idumrahs)['umar'],
                    'status'=>$key->status,
                    'departure_date'=>$key->departure_date,
                    'return_date'=>$key->return_date,
                    'prief_travel'=>$key->prief_travel,
                     'payment_type'=>$key->payment_type,
                    'price'=>$key->price
            ]);
            
            
        return view('website.hajjBooking',['user'=>$user,'hajjBooking'=>$result]);    
	}
	
	
	
	public function umarahBooking(){
	    $user=Auth::user();
	    $getHajj=DB::select('SELECT umrahs.id as idumrahs,orders_package.*,umarh_pricing.price as price  from orders_package 
	                            	INNER JOIN umarh_pricing on umarh_pricing.id=orders_package.package_pricing_id
                                    INNER JOIN umrahs on umrahs.id=umarh_pricing.umarh_id 
                        	WHERE umrahs.package_type="umar" AND orders_package.user_id=?',[$user->id]);
                        	
        
        $result=[];
        foreach($getHajj as $key) array_push($result,[
                    'id'=>$key->id,
                    'hajj'=>umarh::umarobject($key->idumrahs)['umar'],
                    'status'=>$key->status,
                    'departure_date'=>$key->departure_date,
                    'return_date'=>$key->return_date,
                    'prief_travel'=>$key->prief_travel,
                    'price'=>$key->price,
                    'payment_type'=>$key->payment_type
            ]);
            
            
        return view('website.umrahBooking',['user'=>$user,'hajjBooking'=>$result]);    
	}
	
	
	
	
	public function hajjBookingDetail($orderPackageId){
	      $user=Auth::user();
	    $getHajj=DB::select('SELECT umrahs.id as idumrahs,orders_package.*,umarh_pricing.price as price  from orders_package 
	                            	INNER JOIN umarh_pricing on umarh_pricing.id=orders_package.package_pricing_id
                                    INNER JOIN umrahs on umrahs.id=umarh_pricing.umarh_id 
                        	WHERE umrahs.package_type="hajj" AND orders_package.id=?',[$orderPackageId]);
                        	
        
        $result=[
      
                    'id'=>$getHajj[0]->id,
                    'hajj'=>umarh::umarobject($getHajj[0]->idumrahs)['umar'],
                    'status'=>$getHajj[0]->status,
                    'departure_date'=>$getHajj[0]->departure_date,
                    'return_date'=>$getHajj[0]->return_date,
                    'prief_travel'=>$getHajj[0]->prief_travel,
                        'city_code'=>$getHajj[0]->city_code,
                    'price'=>$getHajj[0]->price
            ];
            
            
        return view('website.hajjBookingDetail',['user'=>$user,'hajjBooking'=>$result]);    
	}
	
	

	public function umarahBookingDetail($orderPackageId){
	      $user=Auth::user();
	    $getHajj=DB::select('SELECT umrahs.id as idumrahs,orders_package.*,umarh_pricing.price as price  from orders_package 
	                            	INNER JOIN umarh_pricing on umarh_pricing.id=orders_package.package_pricing_id
                                    INNER JOIN umrahs on umrahs.id=umarh_pricing.umarh_id 
                        	WHERE umrahs.package_type="umar" AND orders_package.id=?',[$orderPackageId]);
                        	
        
        $result=[
      
                    'id'=>$getHajj[0]->id,
                    'hajj'=>umarh::umarobject($getHajj[0]->idumrahs)['umar'],
                    'status'=>$getHajj[0]->status,
                    'departure_date'=>$getHajj[0]->departure_date,
                    'return_date'=>$getHajj[0]->return_date,
                    'prief_travel'=>$getHajj[0]->prief_travel,
                    'city_code'=>$getHajj[0]->city_code,
                   
                    'price'=>$getHajj[0]->price
            ];
            
            
      	return view('website.umrahBookingProfile',['user'=>$user,'hajjBooking'=>$result]); 
	}
	
	
	public function Evisa(){
	    $getEvisa=DB::select('SELECT * FROM evisa WHERE evisa.user_id=?',[Auth::user()->id]);
	    return view('website.evisaProfileP',['user'=>Auth::user(),'evisa'=>$getEvisa]);
	}
	
	
	public function EvisaDetail($evisaId){
	     $getEvisa=DB::select('SELECT * FROM evisa WHERE evisa.id=?',[$evisaId]);
	     $evisaDetail=DB::select('SELECT * FROM evisa_detail WHERE evisa_detail.evisa_id=?',[$evisaId]);
	     return view('website.evisaProfileDetail',['user'=>Auth::user(),'evisa'=>$getEvisa,'evisaDetail'=>$evisaDetail]);
	}
	
	
	
	
}
