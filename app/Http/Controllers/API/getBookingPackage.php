<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use URL;
use App\Http\Controllers\website\objects\umarh;
use App\User;
class getBookingPackage extends Controller
{


    private $rules=[
        'type'=>'required|in:umrah,hajj',
        'page'=>'required|integer',
        'userId'=>"required|integer|exists:users,id"
       
    ];   



    public function index(Request $request){
        $validator = Validator::make($request->all(), $this->rules);
            if($validator->fails()) 
                    return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);


        $type=$request->type;
        if($request->type == "umrah") $type="umar";
        
            
        
        $user=User::find($request->userId);

    

        $getHajj=DB::select('SELECT umrahs.id as idumrahs,orders_package.*,umarh_pricing.price as price  from orders_package 
                                    INNER JOIN umarh_pricing on umarh_pricing.id=orders_package.package_pricing_id
                                    INNER JOIN umrahs on umrahs.id=umarh_pricing.umarh_id 
                            WHERE umrahs.package_type=? AND
                                  orders_package.user_id=? limit 20 offset ?',[$type,$user->id,$request->page*20]);
                                  
       
        $result=[];
        foreach($getHajj as $key){ 

            $package=[
                  
                    'packageDetail'=>umarh::umarobject($key->idumrahs),
                    'status'=>$key->status,
                    'departure_date'=>$key->departure_date,
                    'return_date'=>$key->return_date,
                    'prief_travel'=>$key->prief_travel,
                    'total_price'=>$key->total_price,
                    'paid'=>$key->paid,
                    'remaining'=>$key->remaining,
                    'address'=>$key->address,
                    'package_pricing_id'=>$key->package_pricing_id,
                    'payment_type'=>$key->payment_type,
                    'contact_number'=>$key->contact_number,
                    'email'=>$key->email,
                    'city_code'=>$key->city_code,
                    'packagePerson'=>self::getPerson($key->id)

            ];

            if($key->status == "pending" && $key->payment_type == "Visa") 
                $package['completePayment']=URL::to('/')."/getPaymentPackage/".$key->id."/".$request->type."/web";

            array_push($result,$package);
        }



        return response()->json(['status'=>"success",'type'=>$request->type,'package'=>$result]);    
                
                
          
    }
    
    public function getPerson($id){
          $packagePerson=DB::select('SELECT * FROM orders_persons WHERE  orders_persons.order_package_id=?',[$id]);      
          return $packagePerson[0];
    }
}
