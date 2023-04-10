<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\paymentController as paymentControllerAPI;
use App\models\PackagesOrders;
use App\User;
class paymentController extends Controller
{
    public function completePayment($orderId,$type,$webOrAPI){

    	$order=PackagesOrders::find($orderId);
    	$user=User::find($order->user_id);
    	$payment=new paymentControllerAPI();
    
        if($webOrAPI == "web") return redirect($payment->payment($order->total_price,$user->first_name,$order->id,$type));
        
         return $payment->payment($order->total_price,$user->first_name,$order->id,$type);
    }
}
