<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\website\objects\umarh;
class getPackage extends Controller
{
    private $rules=[
        'type'=>'required|in:umrah,hajj',
        'page'=>'required|integer'
       
    ];   

   


    public function index(Request $request){
    	$validator = Validator::make($request->all(), $this->rules);
    		if($validator->fails()) 
    			   	return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);


    	

    	if($request->type == "umrah") 		$plus=' umrahs.package_type="umar" ';
    	elseif ($request->type == "hajj") 	$plus=' umrahs.package_type="hajj" ';
    	

    	$getPackage=DB::select('SELECT umrahs.id as id from umrahs 
    									WHERE umrahs.is_active="active" and '.$plus.'  limit 20 offset ?',[$request->page*20]);
    	

    	$result=[]; foreach($getPackage as $key) array_push($result,umarh::umarobject($key->id));

    	if(empty($result) == true) return response()->json(['status'=>"success","message"=>"no More Data"]);
    	

    	return response()->json(['status'=>"success",'type'=>$request->type,'package'=>$result]);	



 	}

}
