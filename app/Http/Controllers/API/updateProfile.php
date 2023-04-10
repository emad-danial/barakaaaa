<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Mail;
use App\Http\Controllers\API\tools\helper;
use Hash;
class updateProfile extends Controller
{
    


	protected $userId;
	private $rules=[
			'userId'=>'required|integer|exists:users,id',
	    	'first_name'=>'min:3',
	    	'last_name'=>'min:3',
	    	'mobile'=>"min:6",
	    	'email'=>'email',
	    	'password'=>'min:8',
	    	'image'=>"image",
	 ];



    public function index(Request $request){
    	$validator = Validator::make($request->all(), $this->rules);
    		if($validator->fails()) 
    			   	return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);


    	// check the user mobile and email 
    	if($request->has('email') == true){
    		$chk=User::where('email','=',$request->email)->where('id','!=',$request->userId)->count();
    		if($chk >=1) return response()->json(['status'=>"fail",'message'=>"the email already token"]);
    	}

    	if($request->has('mobile') == true){
    		$chk=User::where('mobile','=',$request->mobile)->where('id','!=',$request->userId)->count();
    		if($chk >=1) return response()->json(['status'=>"fail",'message'=>"the mobile already token"]);
    	}


    	// get the user 
    	$user=User::find($request->userId);

    if($request->has('first_name') == true) $user->first_name=$request->first_name;
    if($request->has('last_name') == true) $user->last_name=$request->last_name;
    if($request->has('mobile') == true) $user->mobile=$request->mobile;
    if($request->has('email') == true) $user->email=$request->email;
    if($request->has('password') == true) $user->password=Hash::make($request->password);
    if($request->file('image') == true) $user->image=helper::base64_image($request->image);
    $user->save();

	return response()->json(['status'=>"success",'user'=>$user]);

    }
}
