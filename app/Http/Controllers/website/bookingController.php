<?php

namespace App\Http\Controllers\website;

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
use App\Http\Controllers\website\eVisaController;
use App\Http\Controllers\website\email;
class bookingController extends Controller
{
    public function bookingPackage(Request $request){
       
       
      
        $validate=Validator::make($request->all(), [
				'pricingId'=>'required|integer',
				'txtLastName_umrah'=>'required|min:1',
				'txtFirstName_umrah'=>'required|min:1',
				'txtContactNo_umrah_text'=>'required|min:1',
				'ddlPassport_Umrah'=>'required|min:1',
				'txtExmailAddress_umrah'=>'required|email',
				'txtTravlFrm_umrah'=>'required|min:1',
				'ddlflexible'=>'required|min:1',
				'txtPlanTravelTrip'=>'required|min:1',
				'ddltravelingalone'=>'required|min:1',
				'gender'=>'required',
				'age'=>'required|min:1',
                "payMentType"=>'required|in:Cashe,Visa',
                'passport_image'=>'required',
                'personal_image'=>'required'
				
		]);
		if($validate->fails())
                    	return redirect()->back()->with('error', 'Your message has been sent successfully!');
        
        


     
 
        $umarPricing=UmrahPricing::find($request->pricingId);
        $umar=Umrah::find($umarPricing->umarh_id);
                
        $order=new PackagesOrders();        
        $order->user_id=Auth::user()->id; 
        $order->package_pricing_id=$request->pricingId;
        $order->address=$request->age;
        $order->status="pending";
        $order->contact_number=$request->txtContactNo_umrah_text;
        $order->email=$request->txtExmailAddress_umrah;
        $order->city_code=$request->txtTravlFrm_umrah;
        $order->departure_date=$umar->start_date;
        $order->return_date=$umar->end_date;
        $order->prief_travel=$request->txtPlanTravelTrip;
        $order->travel_alone=$request->ddltravelingalone;
        $order->payment_type=$request->payMentType;
        $order->paid=$request->paid;
        $order->remaining=$request->remaining;
        $order->total_price=$request->pricing;
        
        $order->save();
       
        
        
        $ordersPersons=new PackagesOrdersPersons();
        $ordersPersons->order_package_id=$order->id;
        $ordersPersons->first_name=$request->txtFirstName_umrah;
        $ordersPersons->last_name=$request->txtLastName_umrah;
        $ordersPersons->zip_code=$request->ddlflexible;
        $ordersPersons->gender=$request->gender;
        $ordersPersons->passport=$request->ddlPassport_Umrah;
        $ordersPersons->passport_image=eVisaController::uploadImage($request->file('passport_image'));
        $ordersPersons->personal_image=eVisaController::uploadImage($request->file('personal_image'));
        
        $ordersPersons->save();
        
        if($umar->package_type == "umar")
        $type="Umarh Booking-Baraka Travel";
        else $type="Hajj Booking-Baraka Travel";
        

        

 if($request->paid > 0 && $request->check_number !='' && $order->id >0 ){
            BrokerPaidUser::create([
                'order_id' => $order->id,
                'broker_id' => $order->user_id,
                 'check_number' => $request->check_number,
                 'value' =>$request->paid,

            ]);
        }
        
        $check_number='';  if($request->check_number !='') $check_number=$request->check_number;
        
        email::email($order->id,Auth::user()->email,NULL,$type,$check_number);
        email::email($order->id,AppSetting::all()->first()->email,NULL,$type,$check_number);
        



        if($request->payMentType  == "Visa"){
              if($umar->package_type == "umar")
                          $type="umarh";
              else $type="hajj";              
            
            
                $payment=new paymentController();
            return redirect($payment->payment($request->pricing,Auth::user()->first_name,$order->id,$type));
        }         
        
        if($request->payMentType == "Cashe"){
            $user=Auth::user();
	 
	     	return view('website.confirmation',['user'=>$user]);
        }
        // 	return redirect()->back()->with('success', 'Your message has been sent successfully!');
      
    }
}
