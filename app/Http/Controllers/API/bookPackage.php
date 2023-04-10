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
use App\Http\Controllers\API\tools\helper;
use App\Http\Controllers\website\email;
class bookPackage extends Controller
{
    private $rules=[
       'userId'=>"required|integer|exists:users,id",
       'pricingId'=>'required|integer|exists:umarh_pricing,id',
       'pricing'=>'required|numeric',
       'address'=>'required|min:1',
       'contact_number'=>'required|min:1',
       'email'=>'required|email',
       'travlFrm'=>'required|min:1',
       'prief_travel'=>'required|min:1',
       'travel_alone'=>'required|in:yes,no',
       'payment_type'=>'required|in:Cashe,Visa',
       'paid'=>'integer',
       'remaining'=>'integer',
       'first_name'=>'required|min:1',
       'last_name'=>'required|min:1',
       'zip_code'=>'required|min:1',
       'gender'=>'required|in:male,female',
       'passport'=>'required|min:1',
       'check_number'=>'min:1',
       'passport_image'=>'required|image',
       'personal_image'=>'required|image'


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
           $order->address=$request->address;
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
           $ordersPersons->passport_image=helper::base64_image($request->passport_image);
           $ordersPersons->personal_image=helper::base64_image($request->personal_image);
           $ordersPersons->save();   



           if($umar->package_type == "umar")
           $type="Umarh Booking-Baraka Travel";
           else $type="Hajj Booking-Baraka Travel";
           
           email::email($order->id,\App\User::find($request->userId)->email,\App\User::find($request->userId),$type);
           email::email($order->id,AppSetting::all()->first()->email,\App\User::find($request->userId),$type);
           

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
           
          return response()->json(['status'=>'success','message'=>'for booking with Baraka Travel, we will contact you within 48 hours max to confirm your booking.']);


    


    }


}
