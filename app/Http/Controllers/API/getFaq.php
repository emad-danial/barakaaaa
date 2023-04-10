<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
class getFaq extends Controller
{

	private $rules=[
	  'page'=>'required|integer'
	];


    public function index(Request $request){
    	$validator = Validator::make($request->all(), $this->rules);
    		if($validator->fails()) 
    		 return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);
  
        $faqs=DB::select('SELECT * FROM faq limit 20 offset ? ',[$request->page]);

		return response()->json(['status'=>"success",'faq'=>$faqs]);

    }
}
