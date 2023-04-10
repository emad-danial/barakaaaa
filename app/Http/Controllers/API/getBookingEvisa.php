<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\User;
use App\Http\Controllers\website\objects\evisaObject;
class getBookingEvisa extends Controller
{
        private $rules=[
    	    'page'=>'required|integer',
    	    'userId'=>"required|integer|exists:users,id"
    	   
    	];   



	public function index(Request $request){
		$validator = Validator::make($request->all(), $this->rules);
			if($validator->fails()) 
				 	return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);


		  $getEvisa=DB::select('SELECT * FROM evisa WHERE evisa.user_id=? 
		  				  order by evisa.created_at DESC limit 20 offset ?',[$request->userId,$request->page*20]);


		  $result=[];
		  foreach ($getEvisa as $key )  array_push($result,evisaObject::evisaObject($key->id));


			if(empty($result)) return response()->json(['status'=>"success",'message'=>'No Data To Display']);


			return response()->json(['status'=>"success",'data'=>$result]);		
				 



	}
}
