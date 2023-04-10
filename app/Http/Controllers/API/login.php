<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Validator;
use Mail;
class login extends Controller
{
    private $rules=[
        'email'=>'required|email|exists:users,email',
        'password'=>'required|min:6'
    ];    	

  


   
   public function index(Request $request){
   	$validator = Validator::make($request->all(), $this->rules);
 

   	if($validator->fails()) 
   			   return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);


	   	$user=User::where('email','=',$request->email)->first();
	   	if(Hash::check($request->password,$user->password) == false)
	   				 return response()->json(['status'=>"fail",'message'=>"the password is not correct"]);



	   	if($user->is_vertfied == 0) {
	   	         $GLOBALS['email']= $request->email;
	   	       $link=$request->root()."/vergifed/".$request->email;
          Mail::send('emails.vergifed',['link'=>$link], function ($message) {
     		          $message->from(emailSender(), 'vertified User');
     		          $message->subject('vertified');
     		          $message->to($GLOBALS['email']);
           });
	   	    
	   	    
	   			return response()->json(['status'=>"fail",
                                    'message'=>"the user is not vertified to login please visit your email"]);
        
	   	}


	   	return response()->json(['status'=>"success",'user'=>$user]);					

   }
}
