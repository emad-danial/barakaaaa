<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\models\Hotel;
use App\models\OrderHotels;
use App\models\PackageInclude;
use App\models\Umrah;
use App\models\Flight;
use App\models\evisa;
use App\models\FlightsOrders;
use App\models\PackagesOrders;
use App\models\Rate;
use App\models\UmarhGallery;
use App\models\HotelGallery;
use App\User;
use App\models\BrokerPaid;
use DB;

class GeneralController extends Controller
{
    //
    public function dashboard()
    {
        $packageIncluds = PackageInclude::count();
        $umrahPackages = Umrah::where('package_type', 'umar')->count();
        $hajjPackages = Umrah::where('package_type', 'hajj')->count();
        $users = User::where('type', 'user')->count();
        $brokers = User::where('type', 'broker')->count();
        $flights = Flight::count();
        $flightsOrders = FlightsOrders::where('status', 'pending')->count();
        $rates = Rate::count();
        $ordersUmrh = DB::table('orders_package')
            ->leftJoin('umarh_pricing', 'orders_package.package_pricing_id','=', 'umarh_pricing.id')
            ->join('users', 'orders_package.user_id','=', 'users.id')
            ->leftJoin('umrahs','umarh_pricing.umarh_id', '=', 'umrahs.id')->where('umrahs.package_type', '=', 'umar')->where('orders_package.status', '=', 'pending')->count();
        $ordersHajj = DB::table('orders_package')
            ->leftJoin('umarh_pricing', 'orders_package.package_pricing_id', '=','umarh_pricing.id')
            ->join('users', 'orders_package.user_id','=', 'users.id')
            ->leftJoin('umrahs', 'umarh_pricing.umarh_id','=', 'umrahs.id')->where('umrahs.package_type', '=', 'hajj')->where('orders_package.status', '=', 'pending')->count();
            
        $hotels = Hotel::count();
        $hotelOrders = OrderHotels::where('status', 'pending')->count();
        $evisa = evisa::count();


        $totalumrahprice = DB::select("SELECT sum(um.price) as totoal FROM `umarh_pricing` um LEFT JOIN orders_package po on(um.id=po.package_pricing_id) LEFT JOIN umrahs u on(um.umarh_id=u.id) WHERE (po.status='complete' OR po.status='paymentComplete' )  AND u.package_type ='umar'");

        $totalhajjprice = DB::select("SELECT sum(um.price) as totoal FROM `umarh_pricing` um LEFT JOIN orders_package po on(um.id=po.package_pricing_id) LEFT JOIN umrahs u on(um.umarh_id=u.id) WHERE (po.status='complete' OR po.status='paymentComplete' )  AND u.package_type ='hajj'");
        $totalhotelsprice = DB::select("SELECT sum(um.price) as totoal FROM `hotel_rooms` um LEFT JOIN order_hotel po on(um.id=po.hotel_room_id) WHERE po.status='complete'");
        $totalflightssprice = DB::select("SELECT sum(user_flight.num_of_adults*flights.price)+SUM(user_flight.num_of_child*flights.price_ch) as totoal from user_flight INNER JOIN flights on flights.id=user_flight.flight_id WHERE user_flight.status='complete'");

        if ($totalumrahprice[0]->totoal == null) {
            $umrahprice = 0;
        } else {
            $umrahprice = $totalumrahprice[0]->totoal;
        }
        if ($totalhajjprice[0]->totoal == null) {
            $hajjprice = 0;
        } else {
            $hajjprice = $totalhajjprice[0]->totoal;
        }
        if ($totalhotelsprice[0]->totoal == null) {
            $hotelsprice = 0;
        } else {
            $hotelsprice = $totalhotelsprice[0]->totoal;
        }
        if ($totalflightssprice[0]->totoal == null) {
            $flightssprice = 0;
        } else {
            $flightssprice = $totalflightssprice[0]->totoal;
        }
        $total_sales = $umrahprice + $hajjprice + $hotelsprice + $flightssprice;

        $totalhajjviews = DB::select("SELECT sum(um.view_count) as views FROM `umrahs` um WHERE um.package_type='hajj'")[0]->views;
        $totalumrahviews = DB::select("SELECT sum(um.view_count) as views FROM `umrahs` um WHERE um.package_type='umar'")[0]->views;
        $totalflightviews = DB::select("SELECT sum(view_count) as views FROM `flights`")[0]->views;
        $totalhotelviews = DB::select("SELECT sum(view_count) as views FROM `hotels`")[0]->views;
        if ( $totalhajjviews== null) {
            $hajjviews = 0;
        } else {
            $hajjviews = $totalhajjviews;
        }
        if ( $totalumrahviews== null) {
            $umrahviews = 0;
        } else {
            $umrahviews = $totalumrahviews;
        }
        if ( $totalflightviews== null) {
            $flightviews = 0;
        } else {
            $flightviews = $totalflightviews;
        }
        if ( $totalhotelviews== null) {
            $hotelviews = 0;
        } else {
            $hotelviews = $totalhotelviews;
        }
        $total_views = $hajjviews + $umrahviews + $flightviews + $hotelviews;
//dd($totalhajjviews);


        return view('admin.dashboard', compact('packageIncluds', 'umrahPackages', 'hajjPackages', 'users', 'brokers', 'rates', 'flights', 'flightsOrders', 'ordersUmrh', 'ordersHajj', 'hotels', 'hotelOrders', 'umrahprice', 'hajjprice', 'hotelsprice', 'flightssprice', 'total_sales','hajjviews','umrahviews','flightviews','hotelviews','total_views','evisa'));
    }
     public function deleteImage($id,$type)
    {
        if($type == 'umrah'){
            UmarhGallery::where('id','=', $id)->delete();
            return ['data'=>'success'];
        } elseif ($type=='hotel'){
            HotelGallery::where('id', $id)->delete();
            return ['data'=>'success'];
        }
    }
    
    
    
    
     public function  deleteFinancialoperationsadmin($id,$type){
         
       $Financialoperations=BrokerPaid::where('id',$id)->delete();

   return ['data'=>'success'];
      
    }
    
    
}
