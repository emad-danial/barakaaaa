<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use App\models\ContactUs as contact;
class contactUS extends Controller
{

	private $rules=[
	   'userId'=>"integer|exists:users,id",
	   'name'=>'required|min:3',
	   'mobile'=>'required|numeric',
	   'email'=>'required|email',
	   'message'=>'required|min:3',
	];


    public function index(Request $request){
    	$validator = Validator::make($request->all(), $this->rules);
    		if($validator->fails()) 
    		 return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);
  
    	$contact=new contact();
		$contact->name=$request->name;
		$contact->phone=$request->mobile;
		$contact->email=$request->email;
		$contact->message=$request->message;
	if ($request->has('userId') == true)	
		$contact->user_id=$request->userId;
		$contact->created_at=Carbon::now();
		$contact->updated_at=Carbon::now();
		$contact->save();


		return response()->json(['status'=>"success"]);

    }
}
