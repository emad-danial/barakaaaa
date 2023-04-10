<?php

namespace App\Http\Controllers\Broker;


use App\Http\Controllers\Controller;
use App\models\PackageInclude;
use App\models\Umrah;
use App\models\Hotel;
use App\models\Flight;
use App\models\FlightsOrders;
use App\models\OrderHotels;
use App\models\BrokerBonuses;
use App\models\BrokerWithdraw;
use DB;
use App\models\PackagesOrders;
use App\models\BrokerPaidUser;
use App\models\BrokerCommission;

class BrokerGeneralController extends Controller
{
    //
    public function dashboard()
    {
        
        $userID= auth()->user()->id ;
        
       
         $commission = BrokerCommission::where('user_id', $userID)->first();
         $brokercommition=0;
            if($commission !=null){
               if($commission->commission !=null && $commission->commission >0){
                   $brokercommition=$commission->commission;
               }
            }
          
        
        $flightsOrders = FlightsOrders::where('user_id',$userID)->count();
        $hotelOrders = OrderHotels::where('user_id',$userID)->count();
        
        $packageIncluds = PackageInclude::count();
         $umrahPackages=Umrah::where('package_type','umar')->count();
         $hajjPackages=Umrah::where('package_type','hajj')->count();
        $flights = Flight::count();
        $hotels = Hotel::count();



        $ordersUmrh = DB::table('orders_package')
            ->join('umarh_pricing', 'orders_package.package_pricing_id', 'umarh_pricing.id')
            ->join('umrahs', 'umrahs.id', 'umarh_pricing.umarh_id')->where('umrahs.package_type', '=', 'umar')->where('orders_package.user_id', '=', $userID)->count();
        $ordersHajj = DB::table('orders_package')
            ->join('umarh_pricing', 'orders_package.package_pricing_id', 'umarh_pricing.id')
            ->join('umrahs', 'umrahs.id', 'umarh_pricing.umarh_id')->where('umrahs.package_type', '=', 'hajj')->where('orders_package.user_id', '=', $userID)->count();


$totalOrders=$ordersUmrh+$ordersHajj+$flightsOrders+$hotelOrders;




        $totalumrahprice = DB::select("SELECT sum(um.price) as totoal FROM `umarh_pricing` um LEFT JOIN orders_package po on(um.id=po.package_pricing_id) LEFT JOIN umrahs u on(um.umarh_id=u.id) WHERE (po.user_id=$userID )  AND u.package_type ='umar'");

        $totalhajjprice = DB::select("SELECT sum(um.price) as totoal FROM `umarh_pricing` um LEFT JOIN orders_package po on(um.id=po.package_pricing_id) LEFT JOIN umrahs u on(um.umarh_id=u.id) WHERE (po.user_id=$userID )  AND u.package_type ='hajj'");
        $totalhotelsprice = DB::select("SELECT sum(um.price) as totoal FROM `hotel_rooms` um LEFT JOIN order_hotel po on(um.id=po.hotel_room_id) WHERE po.user_id=$userID");
        $totalflightssprice = DB::select("SELECT sum(user_flight.num_of_adults*flights.price)+SUM(user_flight.num_of_child*flights.price_ch) as totoal from user_flight INNER JOIN flights on flights.id=user_flight.flight_id WHERE user_flight.user_id=$userID");

        if ($totalumrahprice[0]->totoal == null) {
            $umrahprice = 0;
        } else {
            $umrahprice = ($totalumrahprice[0]->totoal * $brokercommition/100 ) ;
        }
        if ($totalhajjprice[0]->totoal == null) {
            $hajjprice = 0;
        } else {
            $hajjprice = $totalhajjprice[0]->totoal * $brokercommition/100 ;
        }
        if ($totalhotelsprice[0]->totoal == null) {
            $hotelsprice = 0;
        } else {
            $hotelsprice = $totalhotelsprice[0]->totoal* $brokercommition/100 ;
        }
        if ($totalflightssprice[0]->totoal == null) {
            $flightssprice = 0;
        } else {
            $flightssprice = $totalflightssprice[0]->totoal* $brokercommition/100 ;
        }
        $total_commission = ($umrahprice + $hajjprice);






$Umrahbonuses=BrokerBonuses::where('order_type','umar')->where('user_id',$userID)->get()->sum("commission");
$Hajjbonuses=BrokerBonuses::where('order_type','hajj')->where('user_id',$userID)->get()->sum("commission");
$Hotelbonuses=BrokerBonuses::where('order_type','hotel')->where('user_id',$userID)->get()->sum("commission");
$Flightbonuses=BrokerBonuses::where('order_type','flight')->where('user_id',$userID)->get()->sum("commission");

$totalbonuses=$Umrahbonuses+$Hajjbonuses;


        $totalwithdrow = BrokerWithdraw::where('user_id','=',$userID)->where('status','=','completed')->get()->sum("value");
        $totalbalance=($totalbonuses-$totalwithdrow);



        return view('broker.dashboard',compact('packageIncluds','umrahPackages','ordersHajj','ordersUmrh','hotelOrders','flightsOrders','hajjPackages','flights','hotels','totalOrders','Umrahbonuses','Hajjbonuses','Hotelbonuses','Flightbonuses','totalbonuses','totalbalance','totalwithdrow','total_commission','umrahprice','flightssprice','hotelsprice','hajjprice'));
    }
    
    
    
     public function  deleteFinancialoperations($id,$type){
      
        $userID= auth()->user()->id ;
      
       $Financialoperations=BrokerPaidUser::where('broker_id',$userID)->where('id',$id)->first();

if($Financialoperations !=null){
     $records = PackagesOrders::findOrFail($Financialoperations->order_id);
  
  if($records !=null){
       $records->update([
                    'paid' => ($records->paid -$Financialoperations->value),
                    'remaining' => ($records->remaining +$Financialoperations->value),
                   
                   ]);
                   
  }
  BrokerPaidUser::where('broker_id',$userID)->where('id',$id)->delete();

   return ['data'=>'success'];
}
 
      
    }
}







