<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\models\PackagesOrders;
use App\models\PackagesOrdersPersons;
use Auth;
use App\models\BrokerPaidUser;
use App\models\UmrahPricing;
use App\models\Umrah;
use App\models\AppSetting;
use Redirect;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\website\email;
class bookPackage extends Controller
{
    private $rules=[
       'userId'=>"required|integer|exists:users,id",
       'pricingId'=>'required|integer',
       'pricing'=>'required|numeric',
       'age'=>'required|integer',
       'contact_number'=>'required|min:3',
       'email'=>'required|email',
       'travlFrm'=>'required|min:3',
       'prief_travel'=>'required|min:3',
       'travel_alone'=>'required|in:yes,no',
       'payment_type'=>'required|in:Cashe,Visa',
       'paid'=>'integer',
       'remaining'=>'integer',
       'first_name'=>'required|min:3',
       'last_name'=>'required|min:3',
       'zip_code'=>'required|min:3',
       'gender'=>'required|in:male,female',
       'passport'=>'required|min:3',
       'check_number'=>'min:3'


    ];   


    public function index(Request $request){
    	$validator = Validator::make($request->all(), $this->rules);
    		if($validator->fails()) 
    			 	return response()->json(["status"=>"fail",'message'=>$validator->errors()->first()]);


    	
    			 
    			 $umarPricing=UmrahPricing::find($request->pricingId);


    			 $umar=Umrah::find($umarPricing->umarh_id);
    			         
    			 $order=new PackagesOrders();        
    			 $order->user_id=$request->userId;
    			 $order->package_pricing_id=$request->pricingId;
    			 $order->address=$request->age;
    			 $order->status="pending";
    			 $order->contact_number=$request->contact_number;
    			 $order->email=$request->email;
    			 $order->city_code=$request->travlFrm;
    			 $order->departure_date=$umar->start_date;
    			 $order->return_date=$umar->end_date;
    			 $order->prief_travel=$request->prief_travel;
    			 $order->travel_alone=$request->travel_alone;
    			 $order->payment_type=$request->payment_type;
    			 $order->paid=$request->paid;
    			 $order->remaining=$request->remaining;
    			 $order->total_price=$request->pricing;
    			 
    			 $order->save();
    			 
    			 
    			 
    			 $ordersPersons=new PackagesOrdersPersons();
    			 $ordersPersons->order_package_id=$order->id;
    			 $ordersPersons->first_name=$request->first_name;
    			 $ordersPersons->last_name=$request->last_name;
    			 $ordersPersons->zip_code=$request->zip_code;
    			 $ordersPersons->gender=$request->gender;
    			 $ordersPersons->passport=$request->passport;
    			 $ordersPersons->save();	 



    			 if($umar->package_type == "umar")
    			 $type="Umarh Booking-Baraka Travel";
    			 else $type="Hajj Booking-Baraka Travel";
    			 
    			 email::email($order->id,\App\User::find($request->userId)->email,NULL,$type);
    			 email::email($order->id,AppSetting::all()->first()->email,NULL,$type);
    			 

    			 if($request->paid > 0 && $request->check_number !='' && $order->id >0 ){
    			     BrokerPaidUser::create([
    			         'order_id' => $order->id,
    			         'broker_id' => $order->user_id,
    			         'check_number' => $request->check_number,
    			         'value' =>$request->paid,

    			     ]);
    			 }
    			 



    			 if($request->payment_type  == "Visa"){
    			       if($umar->package_type == "umar")
    			                   $type="umarh";
    			       else $type="hajj";              
    			     
    			     
    			         $payment=new paymentController();

    			         return response()->json(['status'=>"success",'paypal'=>$payment->payment($request->pricing,\App\User::find($request->userId)->first_name,$order->id,$type)]);
    			 }         
    			 
    			return response()->json(['status'=>'success']);


		


    }


}
