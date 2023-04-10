<?php

namespace App\Http\Controllers\Broker;



use App\models\Flight;
use App\models\FlightsOrders;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Routing\Redirector;

class MyFlightsOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IncludeDatatable $client
     * @return void
     */
    public function index()
    {

        $userID= auth()->user()->id ;
        $records=DB::table('user_flight')
            ->join('users','users.id','user_flight.user_id')
            ->join('flights','flights.id','user_flight.flight_id')
            ->where('user_flight.user_id','=',$userID)
            ->select('users.*','user_flight.*','flights.flight_name')
            ->paginate(20);
//        dd($records);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('broker.my_flight_orders.index', compact('records'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientCreateRequest $request
     * @return RedirectResponse|Redirector
     */


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       
       
    //   $userID= auth()->user()->id ;
    //     $model=DB::table('order_hotel')
    //         ->join('hotels','hotels.id','order_hotel.hotel_id')
    //         ->join('hotel_rooms','hotel_rooms.id','order_hotel.hotel_room_id')
    //         ->where('order_hotel.user_id','=',$userID)->where('order_hotel.id','=',$id)
    //         ->select('order_hotel.*','hotel_rooms.*','hotels.name as hotelsname','order_hotel.id as order_id')
    //         ->first();
            
    //         if($model !=null){
    //             $fdate = $model->reserve_from;
    //             $tdate = $model->reserve_to;
    //             $datetime1 = new DateTime($fdate);
    //             $datetime2 = new DateTime($tdate);
    //             $interval = $datetime1->diff($datetime2);
    //             $days = $interval->format('%a');

    //                 if($days > 0){
    //                 }else{
    //                     $days=1;
    //                 }
    //             $tootalPrice=($model->price*$days);
    //             $model->number_days=$days;
    //             $model->total_price=$tootalPrice;
    //         }
            
            
    //     //  dd($model);

    //     return view('broker.my_flight_orders.show', compact('model'));
        
        
         $userID= auth()->user()->id ;
        $model=DB::table('user_flight')
            ->join('users','users.id','user_flight.user_id')
             ->join('flights','flights.id','user_flight.flight_id')
            ->where('user_flight.user_id','=',$userID)->where('user_flight.id','=',$id)
            ->select('users.*','user_flight.*','flights.flight_name','flights.price','flights.price_ch')
           ->first();
           
            if($model !=null){
                
              $adultsprice= ($model->num_of_adults*$model->price);
              $chprice= ($model->num_of_child*$model->price_ch);
              $model->child_price=$chprice;
              $model->adults_price=$adultsprice;
              $model->total_price=($adultsprice+$chprice);
            }
            
        // dd($model);

        return view('broker.my_flight_orders.show', compact('model'));
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse|Redirector
     * @throws \Illuminate\Validation\ValidationException
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        FlightsOrders::find($id)->delete();
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
