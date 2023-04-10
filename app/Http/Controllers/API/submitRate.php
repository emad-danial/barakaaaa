<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use App\models\Rate;
class submitRate extends Controller
{
	private $rules=[
		'userId'=>"required|integer|exists:users,id",
		'name'=>'required|min:3',
		'mobile'=>'required|min:3',
		'message'=>'required|min:3',
		'rate'=>'required|in:1,2,3,4,5',
		'packageId'=>'integer|exists:umrahs,id',
		'hotel_id'=>'integer|exists:hotels,id',
	];

	public function index(Request $request){
		$validator = Validator::make($request->all(), $this->rules);
			if($validator->fails()) 
				 	return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);

		if($request->has('packageId') == false && $request->has('hotel_id') == false) 
				return response()->json(["status"=>"fail",'message'=>"you Should send Hotel ID Or Package ID "]); 	

		$rate=new Rate();
		$rate->uamr_id=$request->packageId;
		$rate->hotel_id=$request->hotel_id;
		$rate->name=$request->name;
		$rate->mobile=$request->mobile;
		$rate->message=$request->message;
		$rate->rate=$request->rate;
		$rate->user_id=$request->userId;
		$rate->is_approve="disactive";
		$rate->create_at=Carbon::now();	
		$rate->Save();
		



		return response()->json(['status'=>'success']);	



	}
}
