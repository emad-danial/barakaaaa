<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Mail;
use Hash;
class register extends Controller
{

	private $rules=[
	    	'first_name'=>'required|min:3',
	    	'last_name'=>'required|min:3',
	    	'mobile'=>"required|min:6|unique:users,mobile",
	    	'email'=>'required|email|unique:users,email',
	    	'password'=>'required|min:8'
	 ];


	 



    public function index(Request $request){
    	$validator = Validator::make($request->all(), $this->rules);
    		if($validator->fails()) 
    			   	return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);




	     $GLOBALS['email']= $request->email;
	     Mail::send('admin.emails.user',
	     	['name'=>$request->first_name ,
	     	 'email'=> $request->email,
	     	 'password'=> $request->password], function ($message) {
			          $message->from(emailSender(), 'Registration User Success');
			          $message->subject('Registration Success');
			          $message->to($GLOBALS['email']);
	      });



         $link=$request->root()."/vergifed/".$request->email;
          Mail::send('emails.vergifed',['link'=>$link], function ($message) {
     		          $message->from(emailSender(), 'vertified User');
     		          $message->subject('vertified');
     		          $message->to($GLOBALS['email']);
           });
    	    
    	       
    	   $user=User::create([
    	        'first_name' => $request->first_name,
    	        'last_name' => $request->last_name,
    	        'mobile' => $request->mobile,
    	        'email' => $request->email,
    	        'password' => Hash::make($request->password),
    	    ]);
    	    


    	   return response()->json(['status'=>"success"]);

    }
}
