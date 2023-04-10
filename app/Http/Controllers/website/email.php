<?php

namespace App\Http\Controllers\website;
use App\Http\Controllers\website\objects\umarh;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use Mail;
class email extends Controller
{

	public function index($packageId){
         $user=Auth::user();
	    $getHajj=DB::select('SELECT umrahs.id as idumrahs,umrahs.from_city as from_city,orders_package.*,umarh_pricing.price as price  from orders_package 
	                            	INNER JOIN umarh_pricing on umarh_pricing.id=orders_package.package_pricing_id
                                    INNER JOIN umrahs on umrahs.id=umarh_pricing.umarh_id 
                        	WHERE umrahs.package_type="umar" AND orders_package.id=?',[$packageId]);
                        	
      $person=DB::select('SELECT first_name,last_name  from orders_persons WHERE order_package_id=?',[$packageId]);  
        $result=[
      
                    'id'=>$getHajj[0]->id,
                    'hajj'=>umarh::umarobject($getHajj[0]->idumrahs)['umar'],
                    'status'=>$getHajj[0]->status,
                    'departure_date'=>$getHajj[0]->departure_date,
                    'return_date'=>$getHajj[0]->return_date,
                    'prief_travel'=>$getHajj[0]->prief_travel,
                    'travel_first'=>$getHajj[0]->travel_first,
                    'madina_stay'=>$getHajj[0]->madina_stay,
                    'makkah_stay'=>$getHajj[0]->makkah_stay,
                    'budget_per_person'=>$getHajj[0]->budget_per_person,
                    'price'=>$getHajj[0]->price
            ];
    	$user['first_name']=$person[0]->first_name;
		$user['last_name']=$person[0]->last_name;
		$user['email']=$getHajj[0]->email;
		$user['mobile']=$getHajj[0]->contact_number;
		
		return view('website.bille',['user'=>$user,'hajjBooking'=>$result]);
	}



	public static function email($packageId,$email,$isFromDashbaord = NULL,$messageFromDash = NULL,$check_number=''){

       $GLOBALS['subject']=$messageFromDash;
        
        if($isFromDashbaord ==NULL)
		$user=Auth::user();
		else $user=$isFromDashbaord;
		
		
		
		$GLOBALS['email'] = $email;
		
	    $getHajj=DB::select('SELECT umrahs.id as idumrahs,umrahs.from_city as from_city,orders_package.*,umarh_pricing.price as price  from orders_package 
	                            	INNER JOIN umarh_pricing on umarh_pricing.id=orders_package.package_pricing_id
                                    INNER JOIN umrahs on umrahs.id=umarh_pricing.umarh_id 
                        	WHERE    orders_package.id=?',[$packageId]);
         
         
                 $person=DB::select('SELECT first_name,last_name  from orders_persons WHERE order_package_id=?',[$packageId]);   	
        
        $result=[
      
                    'id'=>$getHajj[0]->idumrahs,
                    'hajj'=>umarh::umarobject($getHajj[0]->idumrahs)['umar'],
                    'status'=>$getHajj[0]->status,
                    'departure_date'=>$getHajj[0]->departure_date,
                    'return_date'=>$getHajj[0]->return_date,
                    'prief_travel'=>$getHajj[0]->prief_travel,
                    'travelFrom'=>$getHajj[0]->city_code,
                    'paid'=>$getHajj[0]->paid,
                    'remaining'=>$getHajj[0]->remaining,
                    'price'=>$getHajj[0]->price,
                    'check_number'=>$check_number
            ];
		
	
		if( $GLOBALS['subject'] == NULL)  $GLOBALS['subject']="bills";
		
	
		
		$user['first_name']=$person[0]->first_name;
		$user['last_name']=$person[0]->last_name;
			$user['email']=$getHajj[0]->email;
		$user['mobile']=$getHajj[0]->contact_number;
		    Mail::send('website.bille',['user'=>$user,'hajjBooking'=>$result], function ($message) {
		          $message->from(emailSender(), $GLOBALS['subject']);
		          $message->subject($GLOBALS['subject']);
		          $message->to($GLOBALS['email']);
		    });
	}
}
