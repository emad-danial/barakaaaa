<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Http\Controllers\website\homeController;
use App\Http\Controllers\website\objects\umarh;
use App\Http\Controllers\website\objects\hotel;
use Mail;
use Hash;
use Illuminate\Support\Str;
class homeController extends Controller
{
	public function index(){
		// get top umar in activation mode 

		$getTopUmar=homeController::getTopUmar();
		$getTophajj=homeController::getTophajj();
		$getStopOver=homeController::getStopOver();
		$getTopVisit=homeController::getTopVisit();
		$getTopHotels=homeController::getTopHotels();
	    $getLogo=DB::select('SELECT * FROM app_gallery WHERE app_gallery.type="logo"');
	    $getBackground=DB::select('SELECT * FROM app_gallery WHERE app_gallery.type="background"');
		$getTopRate=homeController::getTopRate();
		return view('website.index',[
			'getTopUmar'=>$getTopUmar,
			'getTophajj'=>$getTophajj,
			'getStopOver'=>$getStopOver,
			'getTopVisit'=>$getTopVisit,
			'getTopRate'=>$getTopRate,
			'getTopHotels'=>$getTopHotels,
			'getLogo'=>$getLogo,
			'getBackground'=>$getBackground
		]);
	}




	public static function confirmation(){
	    	$user=Auth::user();
	   // 	dd($user);
	   
		return view('website.confirmation',['user'=>$user]);
	}


/**
 * [getTopUmar description]   to get the top umarh 
 * @return [array ] [the objects of umar objects] 
 */
	public static function getTopUmar(){
		$getTopUmar=DB::select('SELECT umrahs.id as id from umrahs 
					WHERE umrahs.is_active="active" and umrahs.package_type="umar" and umrahs.type="regular" order by view_count DESC  LIMIT 6 ');
		$result=[];
		 foreach($getTopUmar as $umar) array_push($result,umarh::umarobject($umar->id));
		 return $result;
	}



	public static function getTophajj(){
		$getTophajj=DB::select('SELECT umrahs.id as id from umrahs
							 where umrahs.is_active="active" and
							       umrahs.package_type="hajj" and
							       umrahs.type="regular" order by view_count DESC limit 3 ');

		$result=[];
		foreach($getTophajj as $hajj)  array_push($result,umarh::umarobject($hajj->id));

		return $result;
	}

	public static function getStopOver(){
		$getStopOver=DB::select('SELECT umrahs.id as id from umrahs 
						WHERE umrahs.is_active="active" and umrahs.type="stop_over" order by view_count DESC  LIMIT 6');
		$result=[];
		 foreach($getStopOver as $key) array_push($result,umarh::umarobject($key->id));
		 return $result;
	}

	public static function getTopVisit(){
		$getStopOver=DB::select('SELECT umrahs.id as id from umrahs 
						WHERE umrahs.is_active="active"  order by view_count DESC  LIMIT 6');
		$result=[];
		 foreach($getStopOver as $key) array_push($result,umarh::umarobject($key->id));
		 return $result;
	}

	public static function getTopRate(){
		$getTopRate=DB::select('SELECT * FROM rates WHERE rates.is_approve="active"  ORDER BY rates.rate DESC limit 4 ');
		return $getTopRate;
	}
	public static function getTopHotels(){
	  $getTopHotels=DB::select('SELECT * FROM hotels  order by hotels.view_count DESC  LIMIT 3 ');
	  $result=[]; foreach($getTopHotels as $key) array_push($result,hotel::hotelObject($key->id));
	  return $result;
	    
	}
	
	
	
	public function forgetPassword(){
	   	return view('website.forgetPassword');
	}
	
	
	public function postForgetPassword(Request $request){
	   if(User::where('email','=',$request->email)->count() == 0)
	            return back()->withErrors(['email'=>"there is no Email register with That Email"]);
	            
	    
	    $user=User::where('email','=',$request->email)->first();
	    $newPassword=Str::random(8);
	    $user->password=Hash::make($newPassword);
	    $user->save();
	    

	    
	     $GLOBALS['email']= $request->email;
         Mail::send('admin.emails.forgetPassword',['name'=>$user->first_name ,'email'=> $user->email,'password'=> $newPassword], function ($message) {
    		          $message->from(emailSender(), 'Baraka Travel - Forget Pasword');
    		          $message->subject('Baraka Travel - Forget Pasword');
    		          $message->to($GLOBALS['email']);
          });
          
          
        return redirect('/login')->with(['status'=>'Please check Your Email']);
	   
	    
	}
	
	
		public function vergifed($email){

		$user=User::where('email','=',$email)->first();

		$user->is_vertfied=1; $user->save();
		 return redirect('/login')->with(['completeverfied'=>'You have been vertified Your Account ']);
	}
	
	
	
	
	
	
}
