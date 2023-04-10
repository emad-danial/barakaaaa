<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\website\objects\hotel;
class getHotels extends Controller
{
    private $rules=[
        "page"=>"required|integer",
        "search"=>"min:3",
        'priceFrom'=>'numeric',
        'priceTo'=>'numeric',
        'amenitiesId'=>'array'
    ];


    public function index(Request $request){
        $validator = Validator::make($request->all(), $this->rules);
            if($validator->fails()) 
                    return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);
     


  



        // get Hotels 
        $plus="where";

        if($request->has('search') == true) 
            $plus=$plus."  hotels.name like '%".$request->search."%'  ";

        if($request->has('priceFrom') == true)
            if($plus != "where") $plus=$plus." AND hotel_rooms.price >=".$request->priceFrom."   ";
            else                 $plus=$plus." hotel_rooms.price >=".$request->priceFrom."   ";



        if($request->has('priceTo') == true)
            if($plus != "where") $plus=$plus." AND hotel_rooms.price <=".$request->priceTo."   ";
            else                 $plus=$plus." hotel_rooms.price <=".$request->priceTo."   ";   


        if($request->has('amenitiesId') == true) 
            if($plus != "where") {
            
                $amenities="0";
                 foreach($request->amenitiesId as $key)  $amenities=$amenities." , ".$key;   

                $plus=$plus." AND hotel_amenities.amenities_id in(".$amenities.") ";
                
            }
            else {
                $amenities="0";
                 foreach($request->amenitiesId as $key)  $amenities=$amenities." , ".$key; 
             $plus=$plus." hotel_amenities.amenities_id in(".$amenities.") ";   
            }

     

        if($plus == "where") $plus="";
            
       
        $getHotels=DB::select('SELECT hotels.id as id from hotels 
                                      INNER JOIN hotel_rooms on hotel_rooms.hotel_id=hotels.id
                                      INNER JOIN hotel_amenities on hotel_amenities.hotel_id=hotels.id 
                                      '.$plus.'   
                                   
                                 GROUP BY hotels.id   order by hotels.id DESC    limit 20 offset ? ',[$request->page*20]);



        $result=[];  foreach ($getHotels as $key ) array_push($result,hotel::hotelObject($key->id));


        if(empty($result) == true) return response()->json(['status'=>"success",'message'=>"no More Data"]);

        return response()->json(['status'=>"success","hotels"=>$result]);

    }           
}
