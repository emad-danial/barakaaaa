<?php

namespace App\Http\Controllers\Admin;



use App\models\Hotel;
use App\models\OrderHotels;
use App\models\PackagesOrders;
use App\models\PackagesOrdersPersons;
use App\models\UmrahPricing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\BrokerCommission;
use App\models\BrokerBonuses;
use DB;
use DateTime;

use Mail;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\website\hotelsController as sendEmail;
class OrderHotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IncludeDatatable $client
     * @return void
     */
    public function index()
    {
         $totalSales='';
        $status="pending";
        $records=DB::table('order_hotel')
            ->join('hotels','hotels.id','order_hotel.hotel_id')
            ->join('hotel_rooms','hotel_rooms.id','order_hotel.hotel_room_id')
            ->join('users','users.id','order_hotel.user_id')
            ->where('order_hotel.status','=','pending')
            ->select('users.*','hotel_rooms.*','hotels.name as hotelsname','order_hotel.*')->orderBy('order_hotel.id', 'DESC')
            ->paginate(20);
//        dd($records);

        return view('admin.order_h.index', compact('records','status','totalSales'));
//
//        $records = OrderHotels::orderBy('id', 'desc')->paginate(20);
//        return view('admin.order_h.index', compact('records'));
    }
    public function spicificOrder($status='pending')
    {
        $totalSales='';
        if($status == 'complete'){
            $totalhotelsprice = DB::select("SELECT sum(um.price) as totoal FROM `hotel_rooms` um LEFT JOIN order_hotel po on(um.id=po.hotel_room_id) WHERE po.status='complete'");
            if ($totalhotelsprice[0]->totoal == null) {
                $totalSales = 0;
            } else {
                $totalSales = $totalhotelsprice[0]->totoal;
            }
        }
        $records=DB::table('order_hotel')
            ->join('hotels','hotels.id','order_hotel.hotel_id')
            ->join('hotel_rooms','hotel_rooms.id','order_hotel.hotel_room_id')
            ->join('users','users.id','order_hotel.user_id')
            ->where('order_hotel.status','=',$status)
            ->select('users.*','hotel_rooms.*','hotels.name as hotelsname','order_hotel.*')->orderBy('order_hotel.id', 'DESC')
            ->paginate(20);
//        dd($records);

        return view('admin.order_h.index', compact('records','status','totalSales'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
//        return view('admin.rates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientCreateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'is_approve' => 'required',
//        ]);
//
//        $record = PackagesOrders::create($request->all());
//        $record->save();
//
//        flash()->success('Create Success');
//        return redirect(route('rates.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       
        
        
        $model=DB::table('order_hotel')
            ->join('hotels','hotels.id','order_hotel.hotel_id')
            ->join('hotel_rooms','hotel_rooms.id','order_hotel.hotel_room_id')
            ->join('users','users.id','order_hotel.user_id')
            ->where('order_hotel.id','=',$id)
            ->select('users.*','order_hotel.*','hotel_rooms.*','hotels.name as hotelsname','order_hotel.id as order_id')
            ->first();
            
            if($model !=null){
                $fdate = $model->reserve_from;
                $tdate = $model->reserve_to;
                $datetime1 = new DateTime($fdate);
                $datetime2 = new DateTime($tdate);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');

                    if($days > 0){
                    }else{
                        $days=1;
                    }
                $tootalPrice=($model->price*$days);
                $model->number_days=$days;
                $model->total_price=$tootalPrice;
            }
            
            
        //  dd($model);

        return view('admin.order_h.show', compact('model'));
        
        
//        $model = PackagesOrders::findOrFail($id);
//        $price = UmrahPricing::findOrFail($model->package_pricing_id);
//        $persons = PackagesOrdersPersons::where('order_package_id',$id)->paginate(1000);
////        dd($persons->count());
//        return view('admin.order_h.show', compact('model','price','persons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
         
        $model = OrderHotels::findOrFail($id);
      
        return view('admin.order_h.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse|Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
    
        
        $records = OrderHotels::findOrFail($id);
        $this->validate($request, [
            'status' => 'required',
        ]);

        $records->update([
            'status' => $request->status,
        ]);

    $GLOBALS['email']=$records->User->email;
if($request->status == 'complete'){
   
     if($records->User->type=='broker'){
            $type='hotel';
              $commission = BrokerCommission::where('user_id', $records->User->id)->first();
              
               $totalhotelsprice = DB::select("SELECT sum(um.price) as totoal FROM `hotel_rooms` um LEFT JOIN order_hotel po on(um.id=po.hotel_room_id) WHERE po.status='complete' AND po.id=$records->id");
       
             if($totalhotelsprice[0]->totoal != null ){
                  
                  $finelcommission=(($commission->commission/100)*$totalhotelsprice[0]->totoal);
             }
             
              
              BrokerBonuses::create([
                'user_id' => $records->user_id,
                'order_id' => $records->id,
                'order_type' => $type,
                'commission' => $finelcommission,

            ]);
        }
   

    sendEmail::sendEmail($records->id,$records->User->email,'Thanks For Hotel Payment Success',$records->User);

        
    }else{
    if($records->User->type=='broker'){
        $pouns=BrokerBonuses::where('user_id',$records->user_id)->where('order_id',$records->id)->where('order_type','hotel')->first();
       
        if($pouns !=null){
            BrokerBonuses::where('user_id',$records->user_id)->where('order_id',$records->id)->where('order_type','hotel')->delete();
        }
    }
}
    
     flash()->success('Edit Success');
     return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        OrderHotels::find($id)->delete();
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
