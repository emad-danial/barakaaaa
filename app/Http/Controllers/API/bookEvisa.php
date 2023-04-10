<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\evisa_detail;
use Validator;
use DB;
use App\models\evisa;
use App\models\AppSetting;
use App\Http\Controllers\website\eVisaController;
use App\Http\Controllers\paymentController;
use Mail;
use Auth;
class bookEvisa extends Controller
{
    private $rules=[
		'userId'=>'required|integer|exists:users,id',
		'firstName'=>'required|min:1',
		'lastName'=>'required|min:1',
		'contactNumber'=>'required|min:1',
		'email'=>"required|email",
		'countryType'=>'required|in:USACanadian,IndianPakistani,Bangladeshi',
		'passport_photo'=>'required|array',
		'photo'=>'required|array'

	];   


	public function index (Request $request){


		$validator = Validator::make($request->all(), $this->rules);
			if($validator->fails()) 
				 return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);



		$evisa=new evisa();
		$evisa->first_name=$request->firstName;
		$evisa->last_name=$request->lastName;
		$evisa->contact_number=$request->contactNumber;	
		$evisa->user_id=$request->userId;
		$evisa->email=$request->email;
		$evisa->save();

		

	
			



		$count=0;
		for ($i=0; $i < sizeof($request->passport_photo)  ; $i++) { 
			$evisaDetail=new evisa_detail();
			$evisaDetail->evisa_id=$evisa->id;
			$evisaDetail->passport_type=$request->countryType;
			$evisaDetail->passport_photo=eVisaController::uploadImage($request->passport_photo[$i]);
			$evisaDetail->photo=eVisaController::uploadImage($request->photo[$i]);
			$evisaDetail->save();	
			$count++;
		}


		   

			 if($request->countryType == "USACanadian") $price=150;
		else if($request->countryType == "IndianPakistani") $price=250;
		else if($request->countryType == "Bangladeshi") $price=300;	   


		$total=$count*$price;
		$fees=$total*(3/100);
		$totalAmount=$fees+$total;


		eVisaController::sendEmail($request->email,$evisa,$count,$total,$fees,$totalAmount);
		eVisaController::sendEmail(AppSetting::all()->first()->email,$evisa,$count,$total,$fees,$totalAmount);


        $payment=new paymentController();
        
        
	 	

		return response()->json(['status'=>"success",
							     'evisa'=>$evisa,'total'=>$total,
	                             'totalAmount'=>$totalAmount,'fees'=>$fees,
	                             'countryType'=>$request->countryType,'count'=>$count,
	                             'payment'=>$payment->payment($totalAmount,$request->first_name,$evisa->id)]);
				
	
	}
}
