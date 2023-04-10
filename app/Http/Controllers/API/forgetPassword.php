<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Hash;
use App\User;
use Illuminate\Support\Str;
use Validator;
class forgetPassword extends Controller
{
	private $rules=[
		'email'=>'required|email|exists:users,email'
	];
	


  public function index(Request $request){
  	$validator = Validator::make($request->all(), $this->rules);
  		if($validator->fails()) 
  			   return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);
    	        
    		    
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


    	return response()->json(['status'=>"success"]);
    }
}
