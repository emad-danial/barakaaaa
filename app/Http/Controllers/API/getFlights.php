<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\website\objects\flight;
class getFlights extends Controller
{
    private $rules=[
    	"page"=>"required|integer",
    	"search"=>"min:3",
        'priceFrom'=>'numeric',
        'priceTo' =>'numeric',
    ];


    public function index(Request $request){
    	$validator = Validator::make($request->all(), $this->rules);
    		if($validator->fails()) 
    			 	return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);


    	$plus="";
    	if($request->has('search') == true)
    			$plus="where flights.flight_name like '%".$request->search."%' or flights.from_city like '%".$request->search."%'";

        if($request->has('priceFrom') == true && $request->has('priceTo') == true)
            $plus=" where flights.price >=".$request->priceFrom." and flights.price <=".$request->priceTo;    
    
        
     
    	

    	$getFlights=DB::select('SELECT flights.id as id FROM flights '.$plus.'  limit 20 offset ?',[$request->page*20]);		



    	$result=[];  foreach ($getFlights as $key ) array_push($result,flight::flightObject($key->id));

    	if(empty($result) == true) return response()->json(['status'=>"success",'message'=>"No More Data"]);

    	return response()->json(['status'=>"success","flights"=>$result]);






    }		
}
